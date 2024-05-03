
<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");


echo template("templates/partials/header.php");
echo template("templates/partials/nav.php");

echo"</br><h3> University Students: </h3></br>";
//db connection
  // $db = new mysqli("localhost", "root", "", "oss-cw2");


// Retrieve all the records from the student table
$sql = "SELECT * FROM student";
$result = mysqli_query($conn, $sql);

// Display the records in an HTML table

echo"<form action='deletestudents.php' method='POST' onsubmit='return checkForm(this)'>";
if ($result->num_rows > 0) {
  echo"<div class='table-responsive'>";
  echo "<table class='table table-striped'>";
  echo "<tr><th>Student ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th> 
            <th>House</th>
            <th>Town</th>
            <th>County</th>
            <th>Country</th>
            <th>Postcode</th>
            <th> Profile Photo</th>
            <th> X </th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>". $row["studentid"] . "</td>";
    echo "<td>". $row["firstname"] . "</td>";
    echo "<td>". $row["lastname"] . "</td>";
    echo "<td>" . $row["dob"] . "</td>";
    echo "<td>" . $row["house"] . "</td>";
    echo "<td>". $row["town"] . "</td>";
    echo "<td>". $row["county"] . "</td>";
    echo "<td>". $row["country"] . "</td>";
    echo "<td>". $row["postcode"] . "</td>";
    if(!empty($row["profileimg"])){
     echo "<td class='text-center'> <img src='data:image/jpeg;base64," . base64_encode($row['profileimg']) . "' height='80' width='120' /> </td>";
    }else {
     echo "<td> No Image Available </td>";
  }
    echo " <td>". "<input type = 'checkbox' name='students[]' value='$row[studentid]' </td>";
    //echo "<td><img src='getjpeg.php?id=". $row["studentid"] . "' height='50' width='50'</td>" ;
    echo "</tr>";
  }
  echo "</table>";
  echo "</div>";
  echo "<br>";
  echo "&nbsp;&nbsp;&nbsp;";
  echo "<input type='button' value=' Back to Dashboard' onclick='window.location.href=\"index.php\"'>";
  echo "&nbsp;&nbsp;&nbsp;";
  echo "<input type='submit' name='deletebtn' value='Delete'/>";
  echo "&nbsp;&nbsp;&nbsp;";
  echo "<input type='button' value='Add New Student' onclick='window.location.href=\"addstudent2.php\"'>";
  echo"</form>";
} else {
  echo "No records found.";
}

echo template("templates/partials/footer.php");

//$db->close();

?>

<script>
function checkForm(form) {
    // Check if at least one checkbox is selected
    var checkboxes = form.elements['students[]'];
    var checkboxChecked = false;
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            checkboxChecked = true;
            break;
        }
    }
    if (!checkboxChecked) {
        alert('Please select at least one student to delete.');
        return false;
    }
    return true;
}
</script>