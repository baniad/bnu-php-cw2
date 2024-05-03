<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");

   
   echo template("templates/partials/header.php");
   
   //faker library
   require_once 'vendor/autoload.php';

   //declaring new instance of Faker Library
   $faker = Faker\Factory::create();

   //db connection
   $db = new mysqli("localhost", "root", "", "oss-cw2");

   //inserting manually
   
   //$db->query("INSERT INTO student(studentid, password, dob, firstname, lastname, house, town, county, country, postcode) 
   //VALUES ('2000000','$2y$10$.LJBO164nZWEVVE/v5mgNuzR01zx1zoyXuGJUa/zp2U.MQxkps3LS','1974-11-10','Jon','Smith','23 Victoria Road',
   //'High Wycombe', 'Bucks', 'UK', 'HP11 1RT');");

   // Insert 5 student records into the database using faker library
  
   for ($i = 0; $i < 5; $i++) {
      $studentid = $faker->unique()->numberBetween(20000001, 29999999);
      $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
     // $password = $faker->password();
      $dob = mysqli_real_escape_string($db, $faker->date());
      $firstname = mysqli_real_escape_string($db, $faker->firstName());
      $lastname = mysqli_real_escape_string($db, $faker->lastName());
      $house = mysqli_real_escape_string($db, $faker->buildingNumber());
      $town = mysqli_real_escape_string($db, $faker->city());
      $county = mysqli_real_escape_string($db, $faker->state());
      $country = mysqli_real_escape_string($db, $faker->country());
      $postcode = mysqli_real_escape_string($db, $faker->postcode());
      
      

  
      $sql = "INSERT INTO student (studentid, password, dob, firstname, lastname, house, town, county, country, postcode)
              VALUES ('$studentid', '$hashed_password', '$dob', '$firstname', '$lastname', '$house', '$town', '$county', '$country',
               '$postcode')";

      $db->query($sql);
  }

  // if my query is correct this message should be displayed:
  echo "Inserted 5 student records into the database.";

  echo template("templates/partials/footer.php");

?>