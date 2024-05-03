<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

global $conn;

echo template("templates/partials/header.php");
echo template("templates/partials/nav.php");

$data['content'] = "";
// check logged in
if (isset($_SESSION['id'])) {


   // if the form has been submitted
   if (isset($_POST['submit'])) {
   // if all fields are filled
    if(empty($_POST['studentid']) 
    || empty($_POST['firstname'])
    || empty($_POST['lastname'])
    || empty($_POST['dob']) 
    || empty($_POST['house']
    || empty($_POST['town']))
    || empty($_POST['county'])
    || empty($_POST['postcode'])
    || empty($_POST['password']))
    {

   $data['content'] = "<p>Please fill in all the required feilds to continue!</p><br>" .
   $data['content'] = "<input type='button' value='Return' onclick='window.location.href=\"addstudent2.php\"'>";

    } else {

       //encrypt securely the password provided by the user
      $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

      //Obtain the file sent to the server within the response
      $image = $_FILES['photo']['tmp_name'];
      $studentid = $_POST['studentid'];
      //return $image[$studentid] ?? null;
      // get the binary data
      $imagedata = addslashes(fread(fopen($image, "r"), filesize($image)));
      
      // insert student statement

     $sql = "INSERT INTO student(studentid, firstname, lastname,  dob, house, town, county, country, postcode, password, profileimg) 
      VALUES ('{$_POST['studentid']}', '{$_POST['firstname']}', '{$_POST['lastname']}','{$_POST['dob']}', 
       '{$_POST['house']}', '{$_POST['town']}', '{$_POST['county']}', '{$_POST['country']}', '{$_POST['postcode']}', '$hashed_password', '$imagedata')";
      
    $result = mysqli_query($conn,$sql);

  // $data["content"] = "<h4> Student record has been addded</h4>";
  echo "<center>";
  echo "<h3> Student record has been addded</h3>";
 

   echo "<input type='button' value='Add New Student' onclick='window.location.href=\"addstudent2.php\"'>";
   echo "&nbsp;&nbsp;&nbsp;";
   echo "<input type='button' value='Back to Students' onclick='window.location.href=\"students.php\"'>";
   echo"</center>";
    } 
   }
    else{
        // using <<<EOD notation to allow building of a multi-line string
      // see http://stackoverflow.com/questions/6924193/what-is-the-use-of-eod-in-php for info
      // also http://stackoverflow.com/questions/8280360/formatting-an-array-value-inside-a-heredoc
      $data['content'] = <<<EOD

      <h3>Add New Student:</h3>
      <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
    
        <form name="frmdetails" action="" method="post" enctype="multipart/form-data">
       
          <!-- student id -->
       
          Student ID :
          <input name="studentid" type="number" min="20000000" max="29999999" value=""/><br/><br/>
       
          First Name :
          <input name="firstname" type="text" value="" /><br/><br/>
          Surname :
          <input name="lastname" type="text"  value="" /><br/><br/>
          Date of Birth:
          <input type="date" id="dob" name="dob"/><br/><br/>
       
          <!-- student password -->
          Password:
          <input type="password" id="password" name="password"/><br/><br/>
       
          Number and Street :
          <input name="house" type="text"  value="" /><br/><br/>
          Town :
          <input name="town" type="text"  value="" /><br/><br/>
          County :
          <input name="county" type="text"  value="" /><br/><br/>
          Country :
          <input name="country" type="text"  value="" /><br/><br/>
          Postcode :
          <input name="postcode" type="text"  value="" /><br/><br/>
          Profile Photo :
          <input type="file" name="photo" accept="image/jpeg" class="form control"/><br/><br/>
          <input type="submit" value="Save" name="submit"/>
          
          </form>
        </div>
      </div>
    </div>
   
   EOD;
  

}
 // render the template
   echo template("templates/default.php", $data);
}else{
   header("Location:students2.php");
}
   //back to students page button from resent 'add students'
 
echo template("templates/partials/footer.php");



?>