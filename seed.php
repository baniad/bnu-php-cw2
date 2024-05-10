<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");

   // when installed via composer
    require_once 'vendor/autoload.php';

    require_once 'vendor/autoload.php';

// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create();


for ($i=0; $i < 5; $i++){
    $studentid = $faker->unique()->numberBetween(20000001, 29999999);
    $sql = "INSERT  INTO student
        (studentid, password, dob, firstname, lastname, house, town, county, country, postcode)
        VALUES ('$studentid', '{$faker->password()}', '{$faker->date('Y_m_d')}','{$faker->firstname()}','{$faker->lastname()}', '{$faker->secondaryAddress()}', '{$faker->citySuffix()}',
                    '{$faker->state()}', '{$faker->country()}', '{$faker->postcode()}')";
    $result = mysqli_query($conn,$sql);
}
?>

