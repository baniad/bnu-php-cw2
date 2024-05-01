<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");
require_once 'vendor/autoload.php';

// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create();

if (isset($_SESSION['id'])) {

    $sql = "INSERT INTO student (studentid, dob, firstname, lastname, house, town, county, country, postcode, module) 
            VALUES ('" . $_POST['studentid'] . "','" . $_POST['dob'] . "','" . $faker->firstName . "','" . $faker->lastName . "','" . $_POST['house'] . "','" . $_POST['town'] . "','" . $_POST['county'] . "','" . $_POST['country'] . "','" . $_POST['postcode'] . "','" . $_POST['module'] . "');";
      
    $result = mysqli_query($conn,$sql);
}

?>