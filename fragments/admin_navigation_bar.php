<?php include 'bootstrap.php';?>
<?php include ('modal_schedule.php'); ?>
<nav class="navbar navbar-expand-lg bg-dark py-2">
<div class="container-fluid">
  <a class="navbar-brand" href="home.php"><img src="../../images/final_image_logo.png" style="height:60px"alt=""></a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active text-white" aria-current="page" href="http://localhost/medical/page/admin/home.php">Reservations</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active text-white" aria-current="page" href="http://localhost/medical/page/inventory/home.php">Medicines</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active text-white" aria-current="page" href="http://localhost/medical/page/services/home.php">Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active text-white" aria-current="page" href="http://localhost/medical/page/employee/home.php">Employees</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active text-white" aria-current="page" href="http://localhost/medical/page/admin/schedules.php">Schedules</a>
      </li>
    </ul>
    <button class="btn btn-primary btn-sm" style="width:10rem;" data-bs-toggle="modal" data-bs-target="#exampleModal" >Create Schedule <i class="bi bi-calendar2-plus text-white ps-2"></i></button>
    <a href="../../../medical/utilities/library/session_destroy.php"><button class="btn btn-danger btn-sm m-2" type="submit" style="width: 6rem">Log Out <i class="bi-box-arrow-right ms-1"></i></button></a>
  </div>
</div>
</nav>




