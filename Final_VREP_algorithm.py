"""Vehicle Routing Problem"""
#!"D:\python\python.exe"
from __future__ import print_function
from six.moves import xrange
from ortools.constraint_solver import pywrapcp
from ortools.constraint_solver import routing_enums_pb2
import requests
import pymysql
import datetime
###########################
# Problem Data Definition #
###########################
connection = pymysql.connect(host="localhost",user="root",passwd="",database="demo")
cursor = connection.cursor()
curr_date=datetime.datetime.today().strftime('%Y-%m-%d')

# SQL command to get total employee count travelling today
cursor.execute('SELECT count(*) FROM rota where rota_date=%s',curr_date)
emp_Count = cursor.fetchone()[0]

# SQL command to get cab capacities
cursor.execute('SELECT cab_number, cab_seater FROM cab ORDER BY cab_seater DESC')
a=cursor.fetchall()

# SQL command to get total number of cabs available in database
cursor.execute('SELECT count(*) FROM cab')
cabcount = cursor.fetchone()[0]

# SQL command to get unique locations and no. of employees in that location
query = """
Select A.location, COUNT(A.employee_id) As NoOfEmp 
From employee A, rota B 
WHERE A.employee_id = B.rota_employee_id and B.rota_date = %s 
Group By A.location 
Order By NoOfEmp Desc 
"""

# Form list of locations and list of demands to feed algorithm
addresses = []
demands = []
capacities = []
cab_ID = []
routes = [[]]
cursor.execute(query,curr_date)
address=cursor.fetchall()
for row in address:
    addresses.append(row[0])
    demands.append(row[1])
    
# Insert origin in the beginning of the list and demand is zero for origin
addresses.insert(0,"Siruseri")
demands.insert(0,0)

cabcap = 0
i = 0
vehicleCount = 0
while(i < cabcount):
    cabcap += (a[i][1])
    cab_ID.append(a[i][0])
    capacities.append(a[i][1])
    vehicleCount += 1
    if (cabcap < emp_Count):
        i += 1
        print(cabcap,emp_Count)
    else:
        break
        
print(vehicleCount)       
print(cab_ID)
print(capacities)
print(addresses)
print(demands)
# Commit and close the connection
connection.commit()
connection.close()


class Vehicle():
    """Stores the property of a vehicle"""
    def __init__(self):
        """Initializes the vehicle properties"""
        self._capacity = capacities

    @property
    def capacity(self):
        """Gets vehicle capacity"""
        return self._capacity


class DataProblem():
    """Stores the data for the problem"""
    def __init__(self):
        """Initializes the data for the problem"""
        self._vehicle = Vehicle()
        self._num_vehicles = vehicleCount        
        self._locations = [getLatLong(address) for address in addresses]
        
        self._demands = demands

        self._depot = 0

    @property
    def vehicle(self):
        """Gets a vehicle"""
        return self._vehicle
    
    @property
    def num_vehicles(self):
        """Gets number of vehicles"""
        return self._num_vehicles

    @property
    def locations(self):
        """Gets locations"""
        return self._locations

    @property
    def num_locations(self):
        """Gets number of locations"""
        return len(self.locations)

    @property
    def depot(self):
        """Gets depot location index"""
        return self._depot
    
    @property
    def demands(self):
        """Gets demands at each location"""
        return self._demands    

#######################
# Problem Constraints #
#######################
def getLatLong(address):
    # url variable store url 
    url = 'https://maps.googleapis.com/maps/api/geocode/json'
    #Use proxy to access internet
    proxies = {"https": "http://10.165.0.33:8080"}
    #Use API Key
    api_key = 'AIzaSyCRP2twwnkwtAbuo_UUSr7Z_KKvHzpDdWg'    
    #set address
    params = {
                'address': address,
                'sensor': 'false',
                'region': 'india',
                'key': api_key
            }
    # Do the request and get the response data
    response = requests.get(url, params=params, proxies=proxies)
    #Take the json response code
    x = response.json()
    # Return the latitude and longitude
    return (x['results'][0]['geometry']['location']['lat'],
            x['results'][0]['geometry']['location']['lng'])
    

def get_Road_Dist(source, dest):
    print(source)
    print(dest)
    # url variable store url 
    url ='https://maps.googleapis.com/maps/api/distancematrix/json?'
    #Use proxy to access internet
    proxies = {"https": "http://10.165.0.33:8080"}
    #Use API Key
    api_key = 'AIzaSyCRP2twwnkwtAbuo_UUSr7Z_KKvHzpDdWg'        
    origin = str(source[0]) + ',' + str(source[1])
    destination = str(dest[0]) + ',' + str(dest[1])
    #set address
    params = {
                'origins': origin,
                'destinations':destination,
                'mode' : 'driving',
                'sensor': 'false',
                'key': api_key
            }
    # Get method of requests module
    r = requests.get(url, params=params, proxies=proxies)                    
    # json method of response object
    x = r.json()
    print(r.url)
    print(x['rows'][0]['elements'][0]['distance']['value'])
    # Return distance value in meters
    return (x['rows'][0]['elements'][0]['distance']['value'])
    
    
class CreateDistanceEvaluator(object): # pylint: disable=too-few-public-methods
    """Creates callback to return distance between points."""
    def __init__(self, data):
        """Initializes the distance matrix."""
        self._distances = {}

        # precompute distance between location to have distance callback in O(1)
        for from_node in xrange(data.num_locations):
            self._distances[from_node] = {}
            for to_node in xrange(data.num_locations):
                if (from_node == to_node or to_node == data.depot):
                    self._distances[from_node][to_node] = 0
                else:
                    self._distances[from_node][to_node] = (
                        get_Road_Dist(
                            data.locations[from_node],
                            data.locations[to_node]))

    def distance_evaluator(self, from_node, to_node):
        """Returns the manhattan distance between the two nodes"""
        return int(self._distances[from_node][to_node])


def add_distance_dimension(routing, distance_evaluator):
    """Add Global Span constraint"""
    distance = "Distance"
    maximum_distance = 50000
    routing.AddDimension(
        distance_evaluator,
        0, # null slack
        maximum_distance, # maximum distance per vehicle
        True, # start cumul to zero
        distance)
    distance_dimension = routing.GetDimensionOrDie(distance)
    # Try to minimize the max distance among vehicles.
    # /!\ It doesn't mean the standard deviation is minimized
    distance_dimension.SetGlobalSpanCostCoefficient(100)


class CreateDemandEvaluator(object): # pylint: disable=too-few-public-methods
    """Creates callback to get demands at each location."""
    def __init__(self, data):
        """Initializes the demand array."""
        self._demands = data.demands

    def demand_evaluator(self, from_node, to_node):
        """Returns the demand of the current node"""
        del to_node
        return self._demands[from_node]
    

def add_capacity_constraints(routing, data, demand_evaluator):
    """Adds capacity constraint"""
    capacity = "Capacity"
    routing.AddDimensionWithVehicleCapacity(
        demand_evaluator,
        0, # null capacity slack
        data.vehicle.capacity, # vehicle maximum capacity
        True, # start cumul to zero
        capacity)

    
###########
# Printer #
###########
class ConsolePrinter():
    """Print solution to console"""
    def __init__(self, data, routing, assignment):
        """Initializes the printer"""
        self._data = data
        self._routing = routing
        self._assignment = assignment

    @property
    def data(self):
        """Gets problem data"""
        return self._data

    @property
    def routing(self):
        """Gets routing model"""
        return self._routing

    @property
    def assignment(self):
        """Gets routing model"""
        return self._assignment

    def print(self):
        """Prints assignment on console"""
        # Inspect solution.
        for vehicle_id in xrange(self.data.num_vehicles):
            index = self.routing.Start(vehicle_id)
            plan_output = 'Route for vehicle {0} with capacity of {1}:\n'.format(cab_ID[vehicle_id],capacities[vehicle_id])
            while not self.routing.IsEnd(index):
                node_index = self.routing.IndexToNode(index)
                if (node_index == 0) :
                    plan_output += str(addresses[node_index])
                else:
                    plan_output += ' -> ' + str(addresses[node_index]) + '(' + str(demands[node_index]) + ')'
                    connection = pymysql.connect(host="localhost",user="root",passwd="",database="demo")
                    cursor = connection.cursor()
                    query="UPDATE rota A SET A.rota_cab_number = %s, A.rota_generated = 'Y' WHERE EXISTS(SELECT B.employee_id FROM employee B WHERE A.rota_employee_id = B.employee_id AND B.location = %s AND A.rota_date = %s)"
                    cursor.execute(query, (cab_ID[vehicle_id],addresses[node_index],curr_date))
                    connection.commit()
                    connection.close()
                index = self.assignment.Value(self.routing.NextVar(index))
                
            node_index = self.routing.IndexToNode(index)
            plan_output += '\n'
            print(plan_output)

########
# Main #
########
def main():
    """Entry point of the program"""
    # Instantiate the data problem.
    data = DataProblem()
    if (data.num_locations > 0 and data.num_vehicles > 0) :
        """ Create Routing Model """
        routing = pywrapcp.RoutingModel(data.num_locations, data.num_vehicles, data.depot)
        # Define weight of each edge
        distance_evaluator = CreateDistanceEvaluator(data).distance_evaluator
        routing.SetArcCostEvaluatorOfAllVehicles(distance_evaluator)
    
        """ Add Max distance a vehicle can travel """
        """add_distance_dimension(routing, distance_evaluator)"""
    
        """ Evaluate demand at each node """
        demand_evaluator = CreateDemandEvaluator(data).demand_evaluator
        add_capacity_constraints(routing, data, demand_evaluator)
    
        # Setting first solution heuristic (cheapest addition).
        search_parameters = pywrapcp.RoutingModel.DefaultSearchParameters()
        search_parameters.first_solution_strategy = (
                routing_enums_pb2.FirstSolutionStrategy.PATH_CHEAPEST_ARC)
        # Solve the problem.
        assignment = routing.SolveWithParameters(search_parameters)
        if assignment:
            printer = ConsolePrinter(data, routing, assignment)
            printer.print()
        else:
            print('No data found')
    else:
        print('Number of locations or vehicles not > 0')

if __name__ == '__main__':
  main()