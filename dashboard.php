<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>
<?php include("navbar.php"); ?>
<div class="main-panel">
    <div class="content-wrapper">

      <?php 

          //session_start();

          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "placement_portal";
          $conn = mysqli_connect($servername, $username, $password, $dbname);

          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }

          //if($_SESSION['role'] == 0){
            $sql = 'SELECT * FROM `resumes`';
          /*}else{
            $sql = 'SELECT * FROM `resumes` WHERE `user_id`='.$_SESSION['user_id'].'';
          }*/
          $result = mysqli_query($conn, $sql);
          $total_resumes = mysqli_num_rows($result);

          $sql = 'SELECT * FROM `users`';
          $result = mysqli_query($conn, $sql);
          $total_users = mysqli_num_rows($result);          

          //$row = mysqli_fetch_assoc($result);        

          //echo "<pre>";print_r($row);exit;
          $user_id = 0;

          if(isset($_POST['submit_form'])){

            $applied_company_post = ($_POST['applied_company'])?serialize($_POST['applied_company']):'';//SERIALIZE

            $sql = "UPDATE `users` SET `applied_company`='$applied_company_post'  WHERE `user_id`='$user_id' ";

              //echo "$sql";exit;

              if (mysqli_query($conn, $sql)) {
                  echo "User has been Updated Successfully!";
                  //header("location:dashboard.php");
                  //exit;
              } else {
                  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
          }

          $sql = 'SELECT * FROM `users` WHERE `user_id`='.$user_id;
          $result = mysqli_query($conn, $sql);

          $row = mysqli_fetch_assoc($result);  

          //NOTIFICATION
          $sql_noti = 'SELECT * FROM `notifications` WHERE `status`= 1';
          $result_noti = mysqli_query($conn, $sql_noti);
          $row_noti = mysqli_fetch_assoc($result_noti);  

          //print_r($row_noti);exit;

          ?>

    	<!-- BODY CONTENT START -->
      <?php //if($_SESSION['role'] == 0){ ?>
    	
            <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h2 class="mb-0"><b><?php echo $total_resumes; ?></b></h2>
                          <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p> -->
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                          <span class="mdi mdi-account-check icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal mt-1"><b>Total Resumes</b></h6>
                  </div>
                </div>
            </div>
        </div>
        <!-- BODY CONTENT END -->
        <?php //} ?>





	</div>

