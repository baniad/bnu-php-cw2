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

   $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

   // insert statememt 
     
         $sql = "INSERT INTO student 
                  (studentid, password, dob, firstname, lastname, house, town, county, country, postcode, imagedata)
                  VALUES ('{$_POST['studentid']}', '$hashed_password', '{$_POST['dob']}', '{$_POST['firstname']}', '{$_POST['lastname']}',
                         '{$_POST['house']}', '{$_POST['town']}', '{$_POST['county']}', '{$_POST['country']}', '{$_POST['postcode']}', '{$_POST['imagedata']}')";

      echo $sql;

      $result = mysqli_query($conn,$sql)
      
   }
      

      $data['content'] = "<p>A new student record has been added</p>";

   
   else {

      $data['content'] = <<<EOD

      <h2>Add New Student</h2>
   <form name="frmdetails" action="" method="post" enctype="multipart/form-data">
   
   Student ID:
   <input name="studentid" type="text" placeholder="Please enter an ID" value="" required/><br/>
   Password :
   <input name="password" type="text" placeholder="Please enter a password" value="" required/><br/>
   First Name :
   <input name="firstname" type="text" placeholder="Please enter your first name" value="" required/><br/>
   Surname :
   <input name="lastname" type="text" placeholder="Please enter your last name"  value="" required/><br/>
   Date of Birth :
   <input name="dob" type="text" placeholder="dd-mm-yyyy"  value="" /><br/>
   Number and Street :
   <input name="house" type="text"  value="" /><br/>
   Town :
   <input name="town" type="text"  value="" /><br/>
   County :
   <input name="county" type="text"  value="" /><br/>
   Country :
   <input name="country" type="text"  value="" /><br/>
   Postcode :
   <input name="postcode" type="text"  value="" /><br/>
  Select image to upload:
  <input name="imagedata" type="file" accept="image/jpeg "value="">
  </br>
   <input type="submit" value="Save" name="submit"/>
   </form>



EOD;

   }

   // render the template
   echo template("templates/default.php", $data);

} else {
   header("Location: index.php");
}

echo template("templates/partials/footer.php");

?>