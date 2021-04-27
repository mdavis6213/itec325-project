<?php

 $zip = $_POST['zip'];
 $dis = $_POST['dis'];
 $restaurantsNearBy = getNearByRestaurantCount($zip,$dis);

 if(count($restaurantsNearBy) === 0){
     header("Location: 8ball.php?error=norestaurantsfound");
 }
 else{
     $randomRestaurant = $restaurantsNearBy[array_rand($restaurantsNearBy)];
     $name = str_replace(' ', '', $randomRestaurant['name']);
     $id = $randomRestaurant['id'];
     //echo $name;
     header("Location: 8ball.php?name=$name&id=$id");
 }



 // some code from https://www.dougv.com/2009/03/getting-all-zip-codes-in-a-given-radius-from-a-known-point-zip-code-via-php-and-mysql/

 function getNearByRestaurantCount($zip,$distance){
     include_once 'connect.php';

     //query for coordinates of provided ZIP Code
     if(!$rs = mysqli_query($connect,"SELECT * FROM Zips WHERE zip = $zip")) {
         echo "<strong>There was a database error attempting to retrieve your ZIP Code.</strong> Please try again.\n";
     }
     else {
         if (mysqli_num_rows($rs) == 0) {
             echo "<strong>No database match for provided ZIP Code.</strong> Please enter a new ZIP Code.\n";
         }
         else {
             //if found, set variables
             $row = mysqli_fetch_array($rs);
             $lat1 = $row['lat'];
             $lon1 = $row['lng'];
             $d = $distance;
             //earth's radius in miles
             $r = 3959;

             //compute max and min latitudes / longitudes for search square
             $latN = rad2deg(asin(sin(deg2rad($lat1)) * cos($d / $r) + cos(deg2rad($lat1)) * sin($d / $r) * cos(deg2rad(0))));
             $latS = rad2deg(asin(sin(deg2rad($lat1)) * cos($d / $r) + cos(deg2rad($lat1)) * sin($d / $r) * cos(deg2rad(180))));
             $lonE = rad2deg(deg2rad($lon1) + atan2(sin(deg2rad(90)) * sin($d / $r) * cos(deg2rad($lat1)), cos($d / $r) - sin(deg2rad($lat1)) * sin(deg2rad($latN))));
             $lonW = rad2deg(deg2rad($lon1) + atan2(sin(deg2rad(270)) * sin($d / $r) * cos(deg2rad($lat1)), cos($d / $r) - sin(deg2rad($lat1)) * sin(deg2rad($latN))));


             //find all coordinates within the search square's area
             //exclude the starting point and any empty city values

             //$query =  "SELECT * FROM restaurants where ZipCode in  (SELECT zip FROM zips WHERE (lat <= $latN AND lat >= $latS AND lng <= $lonE AND lng >= $lonW) AND city != '' ORDER BY city, lat, lng)";

             $query =  "select * from restaurants left join zips on restaurants.ZipCode = zips.zip where restaurants.ZipCode in (SELECT zip FROM zips WHERE (lat <= $latN AND lat >= $latS AND lng <= $lonE AND lng >= $lonW) AND city != '' ORDER BY city, lat, lng)";


             if (!$rs = mysqli_query($connect, $query)) {
                 return [];
             }
             elseif (mysqli_num_rows($rs) == 0) {
                 return [];
             }
             else {
                 $results = array();

                 while($row = mysqli_fetch_array($rs)) {
                     $rest = array("name"=>$row['Name'],"id"=>$row['ID']);
                     array_push($results,$rest);
                 }
                 return $results;
             }
         }
     }

     mysqli_close ($connect);
 }
?>
