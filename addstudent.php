<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

// check logged in
if (isset($_SESSION['id'])) {

    echo template("templates/partials/header.php");
    echo template("templates/partials/nav.php");

    // if the form has been submitted
    if (isset($_POST['submit'])) {

        $studentid = $_POST['studentid'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $house = $_POST['house'];

        // Validate inputs
        if (!filter_var($studentid, FILTER_VALIDATE_INT)) {
            echo "Invalid student ID";
        } elseif (strlen($password) < 8) {
            echo "Password must be at least 8 characters";
        } elseif (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
            echo "Only letters and white space allowed in first name";
        } elseif (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
            echo "Only letters and white space allowed in last name";
        } else {
            // Convert dob to MySQL format
            $dob = DateTime::createFromFormat('d-m-Y', $dob);
            if (!$dob) {
                echo "Invalid date of birth. Please use the format dd-mm-yyyy";
            } else {
                $dob = $dob->format('Y-m-d');

                // Hash password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Insert into database
                $sql = "INSERT INTO student (studentid, password, firstname, lastname, dob, house) 
                        VALUES ('$studentid', '$hashed_password', '$firstname', '$lastname', '$dob', '$house')";
                if (mysqli_query($conn, $sql)) {
                    echo "New student created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        }
    } else {
        // Display the form
        echo "
        <form method='post' action=''>
            Student ID: <input type='text' name='studentid'><br>
            Password: <input type='password' name='password'><br>
            First Name: <input type='text' name='firstname'><br>
            Last Name: <input type='text' name='lastname'><br>
            Date of Birth: <input type='text' name='dob'><br>
            House: <input type='text' name='house'><br>
            <input type='submit' name='submit' value='Add Student'>
        </form>
        ";
    }

    echo template("templates/partials/footer.php");
}
?>