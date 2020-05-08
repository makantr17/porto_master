<!--  -->
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- <link rel="stylesheet" type="text/css" href="HomeStyle.css"> -->
	<link rel="stylesheet" type="text/css" href="webStyle.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>

<body>
     <!--  <script type="text/javascript" src="project.js"></script>
 -->
	 <header class="pageNav">

     	    <div class="boxes">
	                <img class="logo" src="/icons/makant.jpg">
	                 <!-- Description -->
	                <h1 id="headerMessage">Mamady Kante</h1>
			 </div>
			 
			 <i class="fa fa-bars" id="icon" onclick="displayTopnav()"></i>
               
			<!-- Let first create the page head -->
			<div class="hedearpage">

				<ul>
						<li><a href="home.php">Home</a></li>

						<li><a href="gallery.php">Project</a></li>

						<li><a href="index.php">fellow</a></li>

						<li><a href="project.php">Gallery</a></li>
				</ul>

			</div>
			

			<script>
				function displayTopnav(){
					if (document.querySelector("div.hedearpage").style.display=="block") {
						document.querySelector("div.hedearpage").style.display="none";
					}else{
                        document.querySelector("div.hedearpage").style.display="block";
					}
					
				}
                   
			</script>
				

      </header>
