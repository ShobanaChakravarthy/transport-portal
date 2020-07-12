<?php
// Include config file
include 'config.php';
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["login"])){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter adone-id.';
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
	    $sql = "SELECT username FROM users WHERE username = '".$username."' ";
        $userdetail = $link->query($sql)->fetch_all(MYSQLI_ASSOC);
	    if(empty($userdetail)){	  
                  $username_err = 'No account found with that username.';
			  }
        else 
		{
        $sql = "SELECT password FROM users WHERE username = '".$username."' and password = '".$password."' ";
        $userdetail = $link->query($sql)->fetch_all(MYSQLI_ASSOC);			
			    if(empty($userdetail)){	  
                   $password_err = 'Incorrect password.';			   
	            }			
		        else{
                   session_start();
                   $_SESSION['username'] = $username;      
                   header("location: tdayrota.php");
	            }
		}
	}	
}
?>
<html> 
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Modern+Antiqua" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <style type="text/css">
		header {
			height:20%;
		}
		h1 {
			background:rgba(0,0,0,0.4);
			background-size:cover;
			color:black;
			font-family: 'Monoton', cursive;
			font-size: 80px;
			margin-top:0px;
			//margin-bottom: 10px;
		}
		body{ 
			font-family: Modern Antiqua', cursive;
			font-size: 15px;
			background-image: url('imgs/bg-04.jpg');
			background-size: cover;
		}
		.wrapper{ 
			background-color:black;
			background:rgba(0,0,0,0.4);
			position: absolute;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			width: 350px; 
			height:350px;
			padding: 20px;
			margin: 250px auto auto auto;
			border: 1px  black;
		}
		label {
			font-family: Modern Antiqua', cursive;
			font-size: 50px;
			color:black;
		}
		h2 {
			text-align: center;
			color:black;
			font-family: 'Lato', sans-serif;
			font-size: 40px;
			margin-top: -05px;
		}
		p {
			text-align: center;
			color:black;
			font-family: Modern Antiqua', cursive;
			font-size: 15px;
		}
    </style>
</head>
<body>
	<header>
		<h1>
			&nbsp;
			<img src="imgs\Sopra_Steria.png" width="220px"> 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			TRANSPORT&nbsp;&nbsp; PORTAL	
		</h1>
	</header>
    <div class="wrapper">
        <h2>LOGIN</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-primary" value="Login" name="login">
            </div>
        </form>
    </div>    
</body>
</html>