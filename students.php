<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

// check logged in
if (isset($_SESSION['id'])) {

   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");

   $sql = "SELECT * FROM student";

   $result = mysqli_query($conn,$sql);

   $data['content'] .= '<form onsubmit="return confirm(\'Are you sure you want to delete?\')" action="deletestudents.php" method="POST">';
   
   // Start a new row
   $data['content'] .= "<div class='row'>";
   
   // Display the student information within Bootstrap cards
   while($row = mysqli_fetch_array($result)) {
      $data['content'] .= "<div class='col-sm-4'>";
      $data['content'] .= "<div class='card' style='width: 18rem;'>";
      $data['content'] .= "<div class='card-body'>";
      $data['content'] .= "<h5 class='card-title'>{$row["firstname"]} {$row["lastname"]}</h5>";
      $data['content'] .= "<p class='card-text'>DOB: {$row["dob"]}</p>";
      $data['content'] .= "<p class='card-text'>House: {$row["house"]}</p>";
      $data['content'] .= "<p class='card-text'>Town: {$row["town"]}</p>";
      $data['content'] .= "<input type='checkbox' name='students[]' value='{$row["studentid"]}'/>";
      $data['content'] .= "</div>";
      $data['content'] .= "</div>";
      $data['content'] .= "</div>"; // End of col-sm-4
   }
   
   $data['content'] .= "</div>"; // End of row
   $data['content'] .= "<input type='submit' name='deletebtn' value='Delete'/>";
   $data['content'] .= "</form>";
   
   // render the template
   echo template("templates/default.php", $data);
}
else 
{
   header("Location: index.php");
}

echo template("templates/partials/footer.php");
?>