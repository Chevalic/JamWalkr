<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("res/auth.php");
        include("res/loadfunc.php"); 
	include("res/links.php") ?>
</head>
<body>
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container-fluid">
	<a class="brand" href="./index.php">JamWalkr</a>
	<ul class="nav">
	  <li><a href="./index.php"><i class="icon-home icon-white"></i></a></li>
	  <li><a href="./lfm.php"><i class="icon-music icon-white"></i></a></li>
	  <li><a href="./8tracks.php"><i class="icon-headphones icon-white"></i></a></li>
	  <li><a href="./map.php"><i class="icon-map-marker icon-white"></i></a></li>
	  <li class="active"><a href="./database.php"><i class="icon-hdd icon-white"></i></a></li>
	</ul>
      </div>
    </div>
  </div>
  
  <div class="container-fluid" style="margin-top: 50px;">
    <div class="row-fluid">
      <div class="span3">
	<ul class="nav nav-pills nav-stacked">
	  <li><a href="./index.php"><i class="icon-home"></i> Home</a></li>
	  <li><a href="./lfm.php"><i class="icon-music"></i> Last.fm API</a></li>
	  <li><a href="./8tracks.php"><i class="icon-headphones"></i> 8Tracks API</a></li>
	  <li><a href="./map.php"><i class="icon-map-marker"></i> Google Maps API</a></li>
	  <li class="active"><a href="./database.php"><i class="icon-hdd"></i> MySQL Database</a></li>
	</ul>
      </div>
      <div class="span9">
	<h1>MySQL Database</h1>
	  <!-- Connect to host -->
	  <?php
				  	 $mysql_host = "mysql13.000webhost.com";
				     $username="a9185905_smucker";
				     $password="ProfessorWhite3308";
				     $database="a9185905_jar";
				     ?> 	  

	  <?php
	     
	     //Set up database, if necessary
	     mysql_connect($mysql_host,$username,$password);
	     $con = mysql_connect($mysql_host,$username,$password);	     
	     if (!$con) {
	       die("<div class='alert alert-error'><button type='button' class='close' data-dismiss='alert'>×</button><strong>Error: </strong>" . mysql_error() . "</strong></div>");
	     }
	     
	     if (mysql_query("CREATE DATABASE $database",$con)) {
	       echo "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>×</button><strong>Success! </strong>Database created</strong></div>";
	     }
	     else {
	       echo "<div class='alert'><button type='button' class='close' data-dismiss='alert'>×</button><strong>Warning: </strong>" . mysql_error() . "</strong></div>";
	     }
	     
	     @mysql_select_db($database) or die( "Unable to select database");
	     

	     //Tags table holds the different tags that have been added. The first entry is the id in the table, the second entry is the id of the building in the Buildings table
	     //that the tag is being applied to, the third entry is the actual tag, and the fourth entry is an integer rating that tracks how many approves and disapproves users
	     //have given the particular tag.
	     $query="CREATE TABLE Tags (id int(6) PRIMARY KEY NOT NULL auto_increment, building_id int(6) NOT NULL, tag_name varchar(30) NOT NULL, rating int(6) NOT NULL)";
	     mysql_query($query);

	     //Adding a new entry into Tags
	     //$building_id = ;
	     //$tag_name = ;
	     //$query = "INSERT INTO Tags VALUES ('', '$building_id', '$tag_name', 0)";
	     //mysql_query($query);

	     //Buildings table tracks the different buildings that have been tagged. The first entry is the id in the table, the second entry is the name of the building, the
	     //third entry is the latitude of the location, and the fourth entry is the longitude of the location.
	     $query="CREATE TABLE Buildings (id int(6) PRIMARY KEY NOT NULL auto_increment, building_name varchar(30) NOT NULL, lat double precision(13, 10) NOT NULL, lon double precision(13, 10) NOT NULL )";
	     mysql_query($query);
	     
	     //Adding to Buildings
	     //$building_name = ;
	     //$lat = ;
	     //$lon = ;
	     //$query = "INSERT INTO Buildings VALUES ('', '$building_name', '$lat', '$lon')";
	     //mysql_query($query);

		
		mysql_close(); 
	    
	    
	    // run initializer to set $username, $password, $database
	    mysql_connect($mysql_host,$username,$password);
		@mysql_select_db($database) or die( "Unable to select database");
	    $query="SELECT * FROM Buildings";
	    $result=mysql_query($query);

		//Getting information from the databases
	     $query = "SELECT * FROM Buildings" or die(mysql_error());
		 
		 /*
		 $query = "SELECT * FROM Buildings" WHERE $building_id= '$auto_increment' or die(mysql_error());
		
		 */
	     $result = mysql_query($query);
							
		 // recover ALL the things from this broad query
	    $num=mysql_numrows($result); 



	     //Old
	     # var_dump(curl_version());
	     $lfmmethod = "chart.getTopArtists";
	     $url = $lfmbase . "?method=" . $lfmmethod . $lfmkey;
			   echo "<p class='lead'>" . $lfmmethod . "</p>";	   
	     
	     $response = get_page($url);
	     $xml = new SimpleXMLElement($response);
	     
	     $data = $xml->artists->artist; 
	  for ($i = 0; $i < sizeof($data); $i++) { 
			    
			    $name = (string) $data[$i]->name;
	    $img  = $data[$i]->children();
	    $img  = (string) $img->image[3];
	    
	    $query = "INSERT INTO Buildings VALUES ('', '$name', '$img')";
	    //$sql = 'INSERT INTO `test` ( `title` , `BODY` ) ' . "VALUES ( '$title', '$body' )"
	    mysql_query($query);
	    }
	    
	    mysql_close(); 
	    
	    // run initializer to set $username, $password, $database
	    mysql_connect($mysql_host,$username,$password);
	    @mysql_select_db($database) or die( "Unable to select database");
	    $query="SELECT * FROM Buildings";
	    $result=mysql_query($query);
	    
	    // recover ALL the things from this broad query
	    $num=mysql_numrows($result); 	
	    
	    echo "<p style='font-weight: bold; text-align:center;'>Last.fm Database<p/>";
	    
	    ?>

	  <?php
	     $i=0;
	     while ($i < $num) {
			 $name=mysql_result($result,$i,"name");
			 $img=mysql_result($result,$i,"img");
			 ?>
	     
	     
	     <?php
		echo "<div class='media'>";
		echo "<img src='" . $img . "' alt='" . $name . "' class='media-object thumbnail'/></a>";
		echo "<div class='media-body'>";
		echo "<h2 class='media-heading'>" . $name . "</h2>";
		echo "</div></div>";
		?>
	     
	     
	     <?php
		++$i;
		} 
		//End old

		?>
      </div>
    </div>
  </div>
</body>
</html>
