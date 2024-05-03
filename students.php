<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");
require_once 'vendor/autoload.php';

// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create();

if (isset($_SESSION['id'])) {

    $dob = $faker->dateTimeThisCentury->format('Y-m-d');

    $sql = "INSERT INTO student (studentid, dob, firstname, lastname, house, town, county)
            VALUES ('" . $_POST['studentid'] . "','" . $dob . "','" . $faker->firstname . "','" . $faker->lastname . "','" . $faker->house. "','" . $faker->town . "','" . $faker->county . "','";
      
    $result = mysqli_query($conn,$sql);
}

?>