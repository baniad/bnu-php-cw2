<?php
   $current_page = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">University Database</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?php if($current_page == 'modules.php') { echo 'active'; } ?>" href="modules.php">My Modules</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($current_page == 'students.php') { echo 'active'; } ?>" href="students.php">Students</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($current_page == 'assignmodule.php') { echo 'active'; } ?>" href="assignmodule.php">Assign Module</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($current_page == 'details.php') { echo 'active'; } ?>" href="details.php">My Details</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($current_page == 'addstudent.php') { echo 'active'; } ?>" href="addstudent.php">Add Student</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($current_page == 'logout.php') { echo 'active'; } ?>" href="logout.php">Logout</a>
        </li>
    </ul>
  </div>
</nav>