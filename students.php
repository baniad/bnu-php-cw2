<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

echo template("templates/partials/header.php");

require_once 'vendor/autoload.php';

// Create a new instance of Faker
$faker = Faker\Factory::create();

// Connect to the database
$db = new mysqli("localhost", "root", "", "oss-cw2");

// Check the connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$sql = "INSERT INTO student (studentid, password, dob, firstname, lastname, house, town, county, country, postcode)
        VALUES ('20000001', 'password', '2000-01-01', 'John', 'Doe', '1', 'Town', 'County', 'Country', 'AB1 2CD')";

// Insert 5 student records into the database
/*for ($i = 0; $i < 5; $i++) {
    $studentid = $faker->unique()->numberBetween(20000001, 29999999);
    $password = password_hash($faker->password, PASSWORD_DEFAULT);
    $dob = $faker->date('Y-m-d');
    $firstname = $db->real_escape_string($faker->firstName);
    $lastname = $db->real_escape_string($faker->lastName);
    $house = $db->real_escape_string($faker->buildingNumber);
    $town = $db->real_escape_string($faker->city);
    $county = $db->real_escape_string($faker->state);
    $country = $db->real_escape_string($faker->country);
    $postcode = $db->real_escape_string($faker->postcode);

    $sql = "INSERT INTO student (studentid, password, dob, firstname, lastname, house, town, county, country, postcode)
            VALUES ('$studentid', '$password', '$dob', '$firstname', '$lastname', '$house', '$town', '$county', '$country', '$postcode')";

    if ($db->query($sql) === TRUE) {
        echo "New record created successfully\n";
    } else {
        echo "Error: " . $sql . "\n" . $db->error;
    }


echo template("templates/partials/footer.php");
*/
?>
