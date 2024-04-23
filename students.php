<?php 

$servername = "localhost";
$username = "";
$password = "";
$dbname = "php_cw2";

$conn = new mysqli($servername, $username, $password, $database);

// Connected?
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO student (studentid, password, dob, firstname, lastname, house) VALUES 
        (35467291, 'password123', '1991-03-27', 'Nick', 'Bowley', '25 Oak Lane'),
        (73829382, 'password123', '1990-05-01', 'Pip', 'Collins', '34 Southfield Avenue'),
        (10928374, 'password123', '1987-08-25', 'Phil', 'Walsh', '18 Sussex Road'),
        (83746283, 'password123', '1983-08-25', 'Jane', 'Ackers', '4 Evans Close'),
        (47238463, 'password123', '1996-12-12', 'Edwin', 'Roberts', '1 Wessex Circle')";

if ($conn->multi_query($sql) === TRUE){
    echo "Records inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>