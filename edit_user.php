<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>
<?php include("navbar.php"); ?>

<div class="main-panel">
    <div class="content-wrapper">

<?php 
  
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "placement_portal";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit_form'])){
  $user_id = $_GET['user_id'];

            $applied_company_post = ($_POST['applied_company'])?serialize($_POST['applied_company']):'';//SERIALIZE

            $sql = "UPDATE `users` SET `applied_company`='$applied_company_post'  WHERE `user_id`='$user_id'";

              //echo $sql;exit;

              if (mysqli_query($conn, $sql)) {
                  //echo "User has been Updated Successfully!";
                  //header("location:user_list.php");
                  //exit;
              } else {
                  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
}

$sql = 'SELECT * FROM `users` WHERE `user_id`='.$_GET["user_id"];
$result = mysqli_query($conn, $sql);

    
$row = mysqli_fetch_assoc($result); 





//echo "<pre>";print_r($row);exit;

?>




        <div class="page-header bg-dark">
            <h3 class="page-title">  <?php 
                if(isset($_REQUEST['user_id']))
                    echo 'Edit User';
                else  echo 'Generate Resume';
                ?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="text-primary">Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">  <?php 
                        if(isset($_REQUEST['user_id']))
                            echo 'Edit User';
                        else  echo 'Generate Resume';
                        ?></li>
                </ol>
            </nav>
        </div>

        <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">User Applied Company</h4>
                    <hr color="grey">
                    <form class="form-sample" method="POST">
                      <input type="hidden" name="user_id" value="<?php echo $_GET['user_id']; ?>">
                      <p class="card-description">Personal info</p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">User Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control"  value="<?php echo $row['username'] ?>" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email-Id</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control"  value="<?php echo $row['email'] ?>" required />
                            </div>
                          </div>
                        </div>
                      </div>

         <?php if(!empty($row['applied_company'])){  ?>
            <?php $applied_company = unserialize($row["applied_company"]);
                  //print_r($applied_company);   ?>
            <?php } ?>
            <div class="repeater">
                <table border="1" class="table table-bordered">
                    <thead class="bg-dark">
                        <tr>
                            <th colspan="2">Applied Company Details</th>
                            <th class="text-center" style="margin:0px;padding:0px;"><a data-repeater-create class="text-primary"><i class="icon-md mdi mdi-plus-circle" aria-hidden="true"></i></a></th>
                        </tr>
                        <tr>
                            <th>Company Name</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody data-repeater-list="applied_company">
                      <?php if(!empty($applied_company)){ ?>
                      <?php foreach ($applied_company as $key => $value) {  ?>
                        <tr data-repeater-item>
                            <td><input type="text" class="form-control" placeholder="Company name" value="<?php echo $value['company_name'] ?>"  name="company_name" required></td>
                            <td>
                              <select class="form-control text-white" name="status" required>
                                <option value="">Select Status</option>
                                <option value="Applied" <?php echo ($value['status']=='Applied')?'selected':''; ?> >Applied</option>
                                <option value="Interviewed" <?php echo ($value['status']=='Interviewed')?'selected':''; ?> >Interviewed</option>  
                                <option value="Selected" <?php echo ($value['status']=='Selected')?'selected':''; ?> >Selected</option>  
                                <option value="Rejected" <?php echo ($value['status']=='Rejected')?'selected':''; ?> >Rejected</option>  
                              </select>
                            </td>
                            <td class="text-center" style="margin:0px;padding:0px;">
                                <a data-repeater-delete>
                                    <i class="icon-md mdi mdi-delete-forever text-danger"></i>
                                </a>
                            </td>
                        </tr>
                      <?php } ?>
                    <?php }else{ ?>
                      <tr data-repeater-item>
                            <td><input type="text" class="form-control" placeholder="Company name"  name="company_name" required></td>
                            <td>
                              <select class="form-control text-white" name="status" required>
                                <option value="">Select Status</option>
                                <option value="Applied" >Applied</option>
                                <option value="Interviewed">Interviewed</option>  
                                <option value="Selected">Selected</option>  
                                <option value="Rejected">Rejected</option>  
                              </select>
                            </td>
                            <td class="text-center" style="margin:0px;padding:0px;">
                                <a data-repeater-delete>
                                    <i class="icon-md mdi mdi-delete-forever text-danger"></i>
                                </a>
                            </td>
                        </tr>
                     <?php } ?> 
                    </tbody>
                </table>
            </div>
            <hr color="grey">

        <input type="submit" name="submit_form" id="submit_form" value="Update" class="btn btn-success danger-btn">

        </form>
        
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>

<script type="text/javascript">

$(document).ready(function(){
    

    $('.repeater').repeater();

});


</script>