<?php
session_start();
require_once "../database/connection.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(isset($_POST['submit'])){
    $budget=$_POST['budget'];
    $serviceType=$_POST['service'];
    $numberOfPeople=$_POST['number'];
    $longitude=$_POST['longitude'];
    $latitude=$_POST['latitude'];

    $sql = "SELECT * FROM banquet_tb";
    $retval = mysqli_query($conn, $sql);
    $data = mysqli_num_rows($retval);

    if($data = 0){
      echo "no data found in database";
      exit();
    }

    while($row = mysqli_fetch_assoc($retval)) {
      $distance = haversine($latitude, $longitude, $row['latitude'], $row['longitude']);
      $distances[] = ['id' => $row['id'], 'distance' => $distance, 'name' => $row['name'], 'address' => $row['address'], 'contact' => $row['contact']];
    }

    usort($distances, function($a, $b) {
      return $a['distance'] <=> $b['distance'];
    });

    $nearestThree = array_slice($distances, 0, 3);

  }
}

mysqli_close($conn);

function haversine($userLatitude, $userLongitude, $banquetlatitude, $banquetlongitude) {
  $earthRadius = 6371;
  $userLatitude = deg2rad($userLatitude);
  $userLongitude = deg2rad($userLongitude);
  $banquetlatitude = deg2rad($banquetlatitude);
  $banquetlongitude = deg2rad($banquetlongitude);

  $latitudeDelta = $banquetlatitude - $userLatitude;
  $longitudeDelta = $banquetlongitude - $userLongitude;

  $angle = 2 * asin(sqrt(pow(sin($latitudeDelta / 2), 2) + cos($userLatitude) * cos($banquetlatitude) * pow(sin($longitudeDelta / 2), 2)));
  return $angle * $earthRadius;
}
?>