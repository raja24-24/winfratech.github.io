<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>
<?php include("navbar.php"); ?>
<div class="main-panel">
    <div class="content-wrapper">
      
        <div class="page-header bg-dark">
            <h3 class="page-title"> Manage Resumes </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="text-warning">Resumes</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Manage Resumes </li>
                </ol>
            </nav>
        </div>

        <?php
          if(isset($_REQUEST['usuccess']))
          {
          ?>
          <div class="panel-body">
            <div class="alert bg-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             <i class="mdi mdi-check-circle bg-success "></i> Notification updated successfully. 
            </div>
          </div>
          <?php
          }
          else if(isset($_REQUEST['fail']))
          {
          ?>
          <div class="panel-body">   
            <div class="alert bg-danger">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             <i class="mdi mdi mdi-exclamation bg-danger "></i> Something was wrong.
            </div>
          </div>
          <?php
          }else if(isset($_REQUEST['asuccess']))
          {
          ?>
          <div class="panel-body">   
            <div class="alert bg-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <i class="mdi mdi-check-circle bg-success "></i> Notification added successfully.
            </div>
          </div>
          <?php
          }
          else if(isset($_REQUEST['dsuccess']))
          {
          ?>
          <div class="panel-body">   
            <div class="alert bg-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <i class="mdi mdi-check-circle bg-success "></i> Notification deleted successfully.
            </div>
          </div>
          <?php
          }
          ?>

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
            $sql = 'SELECT * FROM `resumes` WHERE `user_id`='.$_SESSION['user_id'].' ORDER BY `resume_id` DESC LIMIT 1';
          }*/
          $result = mysqli_query($conn, $sql);  

          //$row = mysqli_fetch_assoc($result);        

          //echo "<pre>";print_r($row);exit;

          ?>

        <div class=" grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Resumes</h4>
                    <!-- <p class="card-description"> Add class <code>.table-bordered</code> -->
                    </p>
                    <table data-toggle="table" data-search="true" data-pagination="true" data-page-size="10" data-page-list="[5,10, 25, 50, All]" data-loading-template="loadingTemplate">
                      <thead class="thead-dark">
                        <tr>
                          <th >#</th>
                          <th >Username</th>
                          <th >Email</th>
                          <th >Phone</th>
                          <th >Gender</th>
                          <th >Birthdate</th>
                          <th >City</th>
                          <th >Group</th>
                          <th >Percentage</th>
                          <th >Actions</th>
                        </tr>  
                      </thead>
                      <tbody>
                <?php
                if(mysqli_num_rows($result) > 0){
                $count = 1;
                 while($row = mysqli_fetch_assoc($result)){ ?>
                  <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo date("d-M-Y",strtotime($row['birthdate'])); ?></td>
                    <td><?php echo $row['city']; ?></td>
                    <td><?php echo $row['group_department']; ?></td>
                    <td><?php echo $row['percentage']; ?></td>
                    <td class="text-center"><?php echo '<a href="edit_resume.php?resume_id='.$row['resume_id'].'" ><i class="icon-md text-primary mdi mdi-pencil" ></i></a>'; ?>
                    <?php echo '<a target="_blank" href="download_resume.php?resume_id='.$row['resume_id'].'" ><i class="icon-md text-warning mdi mdi-download" ></i></a>'; ?></td>
                  </tr>
                <?php } ?>
              <?php }else{ ?>
                <tr class="text-center">
                  <td colspan="8">NO RECORDS FOUND!</td>
                </tr>
              <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>      
    </div>
<?php include("footer.php"); ?>

<script type="text/javascript">

</script>