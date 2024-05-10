<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");


   // check logged in
   if (isset($_SESSION['id'])) {

   
  

   if (empty($_POST['students'])){

       header("Location: students.php");
   }

   foreach($_POST['students'] as $theStudent){
        $sql = "DELETE FROM student WHERE studentid = $theStudent";

        $result = mysqli_query($conn,$sql);
   }


   header("Location: students.php");

   } else {
      header("Location: index.php");
   }

?>