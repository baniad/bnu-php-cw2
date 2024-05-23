<?php
include("_includes/functions.inc");

// check logged in
if (isset($_SESSION['id'])) {
    if (empty($_POST['students'])){
        header("Location: students.php");
    }

    <?php
if (!isset($_POST['students']) || empty($_POST['students'])) {
    echo "No students selected for deletion.";
    exit;
}


    if (isset($_POST['confirm'])) {
        $stmt = $conn->prepare('DELETE FROM student WHERE studentid = ?');
        foreach($_POST['students'] as $theStudent){
            $stmt->bind_param("i", $theStudent);
            $stmt->execute();
        }
        $stmt->close();
        header("Location: students.php");
    } else {
        echo '<form method="POST" action="deletestudents.php">';
        foreach($_POST['students'] as $theStudent){
            echo '<input type="hidden" name="students[]" value="' . $theStudent . '">';
        }
        echo '<input type="hidden" name="confirm" value="true">';
        echo 'Are you sure you want to delete these students?';
        echo '<input type="submit" value="Yes">';
        echo '<a href="students.php">No</a>';
        echo '</form>';
    }
}
?>