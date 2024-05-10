<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");

   // when installed via composer
    require_once 'vendor/autoload.php';

// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create();

for ($i=0; $i < 5; $i++){
    $studentid = $faker->unique()->numberBetween(20000001, 29999999);
    $password = mysqli_real_escape_string($conn, $faker->password());
    $dob = $faker->date('Y_m_d');
    $firstname = mysqli_real_escape_string($conn, $faker->firstname());
    $lastname = mysqli_real_escape_string($conn, $faker->lastname());
    $house = mysqli_real_escape_string($conn, $faker->secondaryAddress());
    $town = mysqli_real_escape_string($conn, $faker->citySuffix());
    $county = mysqli_real_escape_string($conn, $faker->state());
    $country = mysqli_real_escape_string($conn, $faker->country());
    $postcode = mysqli_real_escape_string($conn, $faker->postcode());

}

    $sql = "INSERT INTO student
        (studentid, password, dob, firstname, lastname, house, town, county, country, postcode)
        VALUES ('$studentid', '$password', '$dob', '$firstname', '$lastname', '$house', '$town', '$county', '$country', '$postcode')";
    $result = mysqli_query($conn,$sql);


?>


