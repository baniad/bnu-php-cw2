<?php
   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");

   // check logged in
   if (isset($_SESSION['id'])) {
       if (empty($_POST['students'])){
           header("Location: students.php");
       }

       echo "<script>
           var r = confirm('Are you sure you want to delete these students?');
           if (r == true) {
               window.location.href = 'deletestudents.php?confirm=true';
           } else {
               window.location.href = 'students.php';
           }
       </script>";

       if (isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
         <?php
         $stmt = $conn->prepare('DELETE FROM student WHERE studentid = ?');
         foreach($_POST['students'] as $theStudent){
             $stmt->bind_param("i", $theStudent);
             $stmt->execute();
             // ... rest of your code ...
         }
         $stmt->close();
         ?>
       }
   }
?>