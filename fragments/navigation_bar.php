<?php include 'bootstrap.php';?>
<style>
  .custom-nav-var{
    height: 500px;
    background-color: #232323;
  }
</style>
<nav class="navbar navbar-expand-lg bg-dark py-2" >
<div class="container-fluid">
  <a class="navbar-brand" href="#"><img src="../images/final_image_logo.png" style="height:50px"alt=""></a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <a class="navbar-brand" href="#" style="color: white;">GoodBoyz <span>Pet Shop</span></a>
    </ul>
      <a href="../page/log_in.php" ><button class="btn btn-sm m-2" type="submit" style="width: 5rem; background-color: #E2B42B;">Log In</button></a>
      <a href="../page/sign_up.php" ><button class="btn btn-outline-light btn-sm m-2" type="submit"style="width: 5rem">Register</button></a>
  </div>
</div>
</nav>