<?php
  ob_start();
  session_start();
  include_once("connection/conn.php");
  include_once("header/header.php");

  $sql_login = "SELECT * FROM `users` WHERE `id`='".$_SESSION['user_id']."' AND `email`='".$_SESSION['email']."'"; 
  $result_login = $conn->query($sql_login);
  $data = $result_login->fetch_assoc(); 

  if($_SESSION['user_id']=="" && $_SESSION['full_name']=="" && $_SESSION['email']==""){ 
    header("location:index.php"); exit; 
  }
?>

<!-- Login 1 - Bootstrap Brain Component -->
<div class="bg-light py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-12 col-md-11 col-lg-8 col-xl-7 col-xxl-6">
        <div class="bg-white p-4 p-md-5 rounded shadow-sm">
          <div class="row">
            <div class="col-12">
              <div class="text-center mb-5">
                <a href="logout.php">
                  Log Out
                </a>
              </div>
            </div>
          </div>
          <form action="javascript:void(0);">
            <div class="row gy-3 gy-md-4 overflow-hidden">
              <div class="col-12">
                <label for="email" class="form-label">Uploaded Image</label>
                <div class="input-group">
                  <img src="../uploads/<?= $data['photo']; ?>" alt="your image" style="height: 150px; width: 150px;"/>
                </div>
              </div>
          </form>
          <div class="row">
            <div class="col-12">
              <hr class="mt-5 mb-4 border-secondary-subtle">
              <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center">
                <a href="javascript:void(0);">
        					Welcome 
        					<?php
          					if(isset($_SESSION['user_id'])){
          						echo $_SESSION['full_name'];		
          					}else{
          						echo "";
          					}
        					?>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  include_once("footer/footer.php");
?>