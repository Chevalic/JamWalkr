<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    include("res/php/auth.php");
    include("res/php/loadfunc.php"); 
    include("res/php/links.php");
  ?>
</head>
<body>
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container-fluid">
      	<a class="brand" href="./index.php">JamWalkr</a>
      	<ul class="nav">
      	  <li class="active"><a href="./index.php"><i class="icon-home icon-white"></i></a></li>
          <li><a href="./ajax.php"><i class="icon-music icon-white"></i></a></li>
      	  <li><a href="./8tracks.php"><i class="icon-headphones icon-white"></i></a></li>
      	  <li><a href="./map.php"><i class="icon-map-marker icon-white"></i></a></li>
      	</ul>
      </div>
    </div>
  </div>
  
  <div class="container-fluid" style="margin-top: 50px;">
    <div class="row-fluid">
      <div class="span2">
      	<ul class="nav nav-pills nav-stacked">
      	  <li class="active"><a href="./index.php"><i class="icon-home"></i> Home</a></li>
          <li><a href="./ajax.php"><i class="icon-music"></i> AJAX</a></li>
      	  <li><a href="./8tracks.php"><i class="icon-headphones"></i> 8Tracks API</a></li>
      	  <li><a href="./map.php"><i class="icon-map-marker"></i> Google Maps API</a></li>
      	</ul>
      </div>
      <div class="span10">
      	<h1>JamWalkr</h1>
      	<p class="lead">The Music Tagging Project</p>

      	<p>For Deliverable III, select the tabs to the left (12 December 2012). In this deliverable we should be able to:</p>
      	<ul>
      	  <li>Display information collected in a visualizing manner</li>
          <li>User Profile creation, modification, and deletion</li>
          <li>Integration of tags and profiles</li>
      	</ul>
      </div>
    </div>
  </div>
</body>
</html>
