<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Transport Portal</title>
    <link href="css/style.css" rel="stylesheet" >
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">	
	<link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">	
	<link href="https://fonts.googleapis.com/css?family=Raleway'" rel="stylesheet">	
	<link href="https://fonts.googleapis.com/css?family=Modern+Antiqua" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Neuton" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro" rel="stylesheet">
	<link href="https://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <style type="text/css">
		header{
			height:21.5%;
		}
		h1 {		
			background:rgba(0,0,0,0.6);
			background-size:cover;
			color:#F0E68C;
			font-family: 'Monoton', cursive;
			font-size: 80px;
			margin-top:0px;
			background-repeat: no-repeat;
		}
		h1:before{
			content: '';
			position: absolute;
			left: 0px;
			top: 0px;
			background-image: url('imgs/smokecar.png');
			background-repeat: no-repeat;
			background-size: 100%;
			width: 320px;
			height: 600px;
			margin-top:0px;
			animation: nope 7.5s linear;
			animation-fill-mode: forwards
		}
		
		@keyframes nope {
          0% {
            transform: translateX(0px);
        } 100% {
            transform: translateX(1600px);
        }
        }
		body{ 
			font-family: Raleway;
			font-size: 15px;
			//background-image: url('imgs/bg-04.jpg');
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
			height:330px;
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
		video { 
			position: fixed;
			top: 50%;
			left: 50%;
			min-width: 100%;
			min-height: 100%;
			width: auto;
			height: auto;
			z-index: -100;
			transform: translateX(-50%) translateY(-50%);
			background-size: cover;
			transition: 1s opacity;
		}
		.modal-header {
			background-color: #5cb85c;
			text-align: center;
			color: white !important;
		}
		.modal-footer {
			background-color: #f9f9f9;
		}
        .maincont{
			margin-top:100px;
		}
		.ml7 {
			position: relative;
			font-weight: 900;
			font-size: 4.8em;
		}
		.ml7 .text-wrapper {
			position: relative;
			display: inline-block;
			padding-top: 0.2em;
			padding-right: 0.05em;
			padding-bottom: 0.1em;
			overflow: hidden;
		}
		.ml7 .letter {
			transform-origin: 0 100%;
			display: inline-block;
			line-height: 1em;
		}
	</style>
	<script>
		$(function() {
            $( "#mydate" ).datepicker({
				dateFormat:"yy-mm-dd"				
            });
			$("#logo").delay(1000).fadeIn();
         });
	</script>
</head>

<body>
	<video poster="video/Concrete_jungle.jpg" id="bgvid" playsinline autoplay muted loop>
		<!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->
		<!--source src="file://///inche-nasone01/shrddrv$/Chn%20IT/TESCO/Tesco/Denver%20Development/Team%20Documents/Scrum%201/Aravind/New folder/Muji_Doodle.webm" type="video/webm"-->
		<source src="video/Concrete_jungle.mp4" type="video/mp4">
	</video>
	<header>
		<h1 class="ml7">
			<span class="text-wrapper">
				&nbsp;
				<img class="logo" id="logo" src="imgs\steriaa.png" width="220px" style="display:none"> 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="letters">
					TRANSPORT&emsp;PORTAL
				</span>
			</span>
		</h1>
	</header>
	<div class="loader"></div>
</body>
<script>
// Wrap every letter in a span
$('.ml7 .letters').each(function(){
  $(this).html($(this).text().replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>"));
});

anime.timeline({loop: true})
  .add({
    targets: '.ml7 .letter',
    translateY: ["1.1em", 0],
    translateX: ["0.55em", 0],
    translateZ: 0,
    rotateZ: [180, 0],
    duration: 750,
    easing: "linear", 
    delay: function(el, i) {
      return 2200+(300 * i);
    }
  }).add({
    targets: '.text-wrapper',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 999999999
  });
</script>
