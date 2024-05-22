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
           echo "<script>
               var r = confirm('Are you sure you want to delete this student?');
               if (r == true) {
                   <?php
                       $sql = 'DELETE FROM student WHERE studentid = ' . $theStudent;
                       $result = mysqli_query($conn,$sql);
                   ?>
               } else {
                   // User pressed cancel, do nothing
               }
           </script>";
       }
   }
?>