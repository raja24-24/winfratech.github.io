<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>
<?php include("navbar.php"); ?>

<?php 
  
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "placement_portal";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

$sql = 'SELECT * FROM `resumes` WHERE `resume_id`='.$_GET["resume_id"];
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);        

//echo "<pre>";print_r($row);exit;

?>


<div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header bg-dark">
            <h3 class="page-title">  <?php 
                if(isset($_REQUEST['resume_id']))
                    echo 'Edit Resume';
                else  echo 'Generate Resume';
                ?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="text-primary">Resumes</a></li>
                    <li class="breadcrumb-item active" aria-current="page">  <?php 
                        if(isset($_REQUEST['resume_id']))
                            echo 'Edit Resume';
                        else  echo 'Generate Resume';
                        ?></li>
                </ol>
            </nav>
        </div>

        <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Resume Details Form</h4>
                    <hr color="grey">
                    <form class="form-sample" id="resume_form" name="resume_form" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="resume_id" value="<?php echo $_GET['resume_id']; ?>">
                      <p class="card-description">Personal info</p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">First Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name'] ?>" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Last Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="last_name" value="<?php echo $row['last_name'] ?>" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email-ID</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="email" value="<?php echo $row['email'] ?>" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phone no.</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" name="phone" value="<?php echo $row['phone'] ?>" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="gender" required>
                                <option value="Male" value="<?php echo ($row['gender'] == 'Male')?'selected':''; ?>" >Male</option>
                                <option value="Female" value="<?php echo ($row['gender'] == 'Female')?'selected':''; ?>" >Female</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date of Birth</label>
                            <div class="col-sm-9">
                              <input type="date" class="form-control" placeholder="DoB" name="birthdate" value="<?php echo date($row['birthdate']); ?>" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Mother Tongue</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="mother_tongue" value="<?php echo $row['mother_tongue'] ?>" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Languages Known</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="languages_known" value="<?php echo $row['languages_known'] ?>" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nationality</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="nationality" value="<?php echo $row['nationality'] ?>" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Marital Status</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="marital_status" required>
                                <option value="Single" value="<?php echo ($row['marital_status'] == 'Single')?'selected':''; ?>">Single</option>
                                <option value="Married" value="<?php echo ($row['marital_status'] == 'Married')?'selected':''; ?>" >Married</option>
                                <option value="Divorced" value="<?php echo ($row['marital_status'] == 'Divorced')?'selected':''; ?>" >Divorced</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Profile Upload</label>
                                <input type="file" name="profile_photo" class="file-upload-default">
                                <div class="input-group col-sm-9">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-dark" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                      </div> -->
                      <p class="card-description">Permanent Address </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address 1</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="address_1" value="<?php echo $row['address_1'] ?>" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">State</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="state" value="<?php echo $row['state'] ?>" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address 2</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="address_2" value="<?php echo $row['address_2'] ?>" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Postcode</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" name="postcode" value="<?php echo $row['postcode'] ?>" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">City</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="city" value="<?php echo $row['city'] ?>" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Country</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="country" value="<?php echo $row['country'] ?>" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr color="grey">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Group</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="group_department" value="<?php echo $row['group_department'] ?>" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Percentage</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="percentage" value="<?php echo $row['percentage'] ?>" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Profile Image</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="file" name="user_logo" id="user_logo" accept="image/*" />
                            </div>
                          </div>
                        </div>
                      </div>
        
        <hr color="grey">
        <!-- ACADEMIC PROFILE -->
        <p class="card-description">Academic Details</p>
        <?php $academic_details = unserialize($row["academic_details"]); ?>
        <div class="repeater">
                <table border="1" class="table table-bordered">
                    <thead class="bg-dark">
                        <tr>
                            <th colspan="5">Academic Details</th>
                            <th class="text-center" style="margin:0px;padding:0px;"><a data-repeater-create class="text-primary"><i class="icon-md mdi mdi-plus-circle" aria-hidden="true"></i></a></th>
                        </tr>
                        <tr>
                            <th>Course</th>
                            <th>Passing Year</th>
                            <th>Board / University</th>
                            <th>Institute</th>
                            <th>Percentage</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody data-repeater-list="academic_details">
                      <?php foreach ($academic_details as $key => $value) {  ?>
                        <tr data-repeater-item>
                            <td><input type="text" class="form-control" placeholder="Course Name" value="<?php echo $value['course_name'] ?>" name="course_name" required></td>
                            <td><input type="number" class="form-control" placeholder="Passing Year" value="<?php echo $value['passing_year'] ?>" name="passing_year" required></td>
                            <td><input type="text" class="form-control" placeholder="Board/university" value="<?php echo $value['board_university'] ?>" name="board_university" required></td>
                            <td><input type="text" class="form-control" placeholder="Institute" value="<?php echo $value['institute'] ?>" name="institute" required></td>
                            <td><input type="text" class="form-control" placeholder="Percentage" value="<?php echo $value['percentage'] ?>" name="percentage" required></td>
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
        <!-- END ACADEMIC PROFILE -->
        <hr color="grey">

        <!-- Project details -->
            <p class="card-description">Project Details</p>
            <?php $project_details = unserialize($row["project_details"]); ?>
            <div class="repeater">
                <table border="1" class="table table-bordered">
                    <thead class="bg-dark">
                        <tr>
                            <th colspan="4">Project Details</th>
                            <th class="text-center" style="margin:0px;padding:0px;"><a data-repeater-create class="text-primary"><i class="icon-md mdi mdi-plus-circle" aria-hidden="true"></i></a></th>
                        </tr>
                        <tr>
                            <th>Project Title</th>
                            <th>Role Play</th>
                            <th style="width:10%">Team Size</th>
                            <th>Description</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody data-repeater-list="project_details">
                      <?php foreach ($project_details as $key => $value) {  ?>
                        <tr data-repeater-item>
                            <td><input type="text" class="form-control" placeholder="Project Title" value="<?php echo $value['project_title'] ?>" name="project_title" required></td>
                            <td><input type="text" class="form-control" placeholder="Role Play" value="<?php echo $value['role_play'] ?>" name="role_play" required></td>
                            <td><input type="number" class="form-control" placeholder="Team Size" value="<?php echo $value['team_size'] ?>" name="team_size" required></td>
                            <td><textarea class="form-control" placeholder="Description" name="description" required><?php echo $value['description'] ?></textarea></td>
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
            <!-- <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Project Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="project_title" placeholder="Project Title" required/>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Role Play</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="role_play" placeholder="Role Play" required/>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Team Size</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" placeholder="Team Size" name="team_size" required/>
                    </div>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Project Description</label>
                    <div class="col-md-10">
                      <textarea class="form-control" rows="4" name="project_description" required placeholder="Please Enter Project Description here..."></textarea >
                    </div>
                  </div>
                </div>
            </div> -->
        <!-- END Project details -->
        <hr color="grey">

        <!-- Technical Skills -->
            <p class="card-description">Technical Skills</p>
            <?php $technical_skills = unserialize($row["technical_skills"]); ?>
            <div class="repeater">
                <table border="1" class="table table-bordered">
                    <thead class="bg-dark">
                      <tr>
                        <th>Technical Skills Details</th>
                        <th class="text-center" style="margin:0px;padding:0px;"><a data-repeater-create class="text-primary"><i class="icon-md mdi mdi-plus-circle" aria-hidden="true"></i></a></th>
                      </tr>
                    </thead>
                    <tbody data-repeater-list="technical_skills">
                      <?php foreach ($technical_skills as $key => $value) {  ?>
                      <tr data-repeater-item>
                        <td><input type="text" class="form-control" placeholder="Please Enter Technical Skills Here..." value="<?php echo $value["details"]; ?>" name="details" required></td>
                        <td class="text-center" style="margin:0px;padding:0px;" >
                            <a data-repeater-delete>
                                <i class="icon-md mdi mdi-delete-forever text-danger"></i>
                            </a>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                </table>
            </div>
        <!-- END Technical Skills -->
        <hr color="grey">

        <!-- Key Skills -->
            <p class="card-description">Key Skills</p>
            <div class="repeater">
              <?php $key_skills = unserialize($row["key_skills"]); ?>
                <table border="1" class="table table-bordered">
                    <thead class="bg-dark">
                      <tr>
                        <th>Key Skills Details</th>
                        <th class="text-center" style="margin:0px;padding:0px;"><a data-repeater-create class="text-primary"><i class="icon-md mdi mdi-plus-circle" aria-hidden="true"></i></a></th>
                      </tr>
                    </thead>
                    <tbody data-repeater-list="key_skills">
                      <?php foreach ($key_skills as $key => $value) {  ?>
                      <tr data-repeater-item>
                        <td><input type="text" class="form-control" placeholder="Please Enter Key Skills Here..." value="<?php echo $value["details"]; ?>" name="details" required></td>
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
        <!-- END Key Skills -->
        <hr color="grey">

        <!-- Personality Traits -->
            <p class="card-description">Personality Traits</p>
            <?php $personality_traits = unserialize($row["personality_traits"]); ?>
            <div class="repeater">
                <table border="1" class="table table-bordered">
                    <thead class="bg-dark">
                        <tr>
                            <th>Personality Traits Details</th>
                            <th class="text-center" style="margin:0px;padding:0px;"><a data-repeater-create class="text-primary"><i class="icon-md mdi mdi-plus-circle" aria-hidden="true"></i></a></th>
                        </tr>
                    </thead>

                    <tbody data-repeater-list="personality_traits">
                      <?php foreach ($personality_traits as $key => $value) { ?>
                        <tr data-repeater-item>
                            <td><input type="text" class="form-control" value="<?php echo $value["details"]; ?>" placeholder="Please Enter Personality Traits Here..." name="details" required></td>
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
        <!-- END Personality Traits -->
        <hr color="grey">

        <!-- Achivements -->
            <p class="card-description">Achivements</p>
            <div class="text-dark">
                <textarea id="editor_achivement" name="achivements" required><?php echo $row['achivements'] ?></textarea>
            </div>
        <hr color="grey">
        <!-- END Achivements -->

        <!-- Workshops and Seminars -->
            <p class="card-description">Workshops & Seminars</p>
            <div class="text-dark">
                <textarea id="editor_workshop" name="workshops_seminars" required><?php echo $row['workshops_seminars'] ?></textarea>
            </div>
        <hr color="grey">
        <!-- END Workshops and Seminars -->

        <input type="submit" name="submit_resume_form" id="submit_form" value="Update" class="btn btn-success danger-btn">
        <input type="submit" name="submit_form_preview" id="submit_form_preview" value="Preview" class="btn btn-primary danger-btn">

        </form>
        
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>

<script type="text/javascript">

$(document).ready(function(){
    var editor_achivement = new RichTextEditor("#editor_achivement", {skin: "rounded-corner",  toolbar: "default" });
    var editor_workshop = new RichTextEditor("#editor_workshop", {skin: "rounded-corner",  toolbar: "default" });
    /*$(".rte-toggleborder").css("line-height","2px");*/

    $('.repeater').repeater();

    $("#submit_form_preview").click(function(e){
        $('#resume_form').attr('action', 'resume_preview.php');
        $("#resume_form").attr('target', '_blank');
    });

    $("#submit_form").click(function(e){
        $('#resume_form').attr('action', 'update_resume.php');
        $("#resume_form").attr('target', '');
    });

});


</script>