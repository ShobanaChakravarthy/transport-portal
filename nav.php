<div class="navbar-expand-sm container1 black borderYtoX ">
<ul class="nav navbar-nav"> 
  <li><a href="tdayrota.php">TODAY'S ROTA</a></li>
  <li><a href="empdet.php">EMPLOYEE DETAILS</a></li>
  <li><a href="cabdet.php">CAB DETAILS</a></li>
</ul>
</div>
<style>
html, body
{
    margin: 0px;
}
.nav{
	margin-left:600px;
}
div.container1
{
    font-family: Raleway;
    margin: -100px auto;
	padding: 1em 1em;
	text-align: center;
	color: white;
}

div.container1 a
{
    color: #FFF;
    text-decoration: none;
    font: 20px Raleway;
    margin: 0px 10px;
    padding: 10px 10px;
    position: relative;
    z-index: 0;
    cursor: pointer;
}
.black
{
    background: black;
	background-image: url('imgs/road2.jpg');
}
/* Border from Y to X  */
div.borderYtoX a:before, div.borderYtoX a:after
{
    position: absolute;
    opacity: 0.5;
    height: 100%;
    width: 2px;
    content: '';
    background: #FFF;
    transition: all 0.3s;
}

div.borderYtoX a:before
{
    left: 0px;
    top: 0px;
}

div.borderYtoX a:after
{
    right: 0px;
    bottom: 0px;
}

div.borderYtoX a:hover:before, div.borderYtoX a:hover:after
{
    opacity: 1;
    height: 2px;
    width: 100%;
}
.active{
	background-color:black;
	color: red;
}
</style>
<script type="text/javascript">
    $(document).ready(function () {
        var url = window.location;
        $('a[href="'+ url +'"]').parent().addClass('active');
        $('a').filter(function() {
             return this.href == url;
        }).parent().addClass('active');
    });
</script> 