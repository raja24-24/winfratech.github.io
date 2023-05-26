<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>
<?php include("navbar.php"); ?>
<div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header bg-dark">
            <h3 class="page-title">  <?php 
                if(isset($_REQUEST['notificationid']))
                    echo 'Edit Resume';
                else  echo 'Generate Resume';
                ?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="text-primary">Resumes</a></li>
                    <li class="breadcrumb-item active" aria-current="page">  <?php 
                        if(isset($_REQUEST['notificationid']))
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
                      <p class="card-description">Personal info</p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">First Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="first_name" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Last Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="last_name" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email-ID</label>
                            <div class="col-sm-9">
                              <input type="email" class="form-control" name="email" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phone no.</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" name="phone" required/>
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
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date of Birth</label>
                            <div class="col-sm-9">
                              <input type="date" class="form-control" placeholder="DoB" name="birthdate" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Mother Tongue</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="mother_tongue" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Languages Known</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="languages_known" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nationality</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="nationality" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Marital Status</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="marital_status" required>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
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
                              <input type="text" class="form-control" name="address_1" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">State</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="state" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address 2</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="address_2" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Postcode</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" name="postcode" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">City</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="city" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Country</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="country" required/>
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
                              <input type="text" class="form-control" name="group_department" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Percentage</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" name="percentage" required/>
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
                        <tr data-repeater-item>
                            <td><input type="text" class="form-control" placeholder="Course Name" name="course_name" required></td>
                            <td><input type="number" class="form-control" placeholder="Passing Year" name="passing_year" required></td>
                            <td><input type="text" class="form-control" placeholder="Board/university" name="board_university" required></td>
                            <td><input type="text" class="form-control" placeholder="Institute" name="institute" required></td>
                            <td><input type="text" class="form-control" placeholder="Percentage" name="percentage" required></td>
                            <td class="text-center" style="margin:0px;padding:0px;">
                                <a data-repeater-delete>
                                    <i class="icon-md mdi mdi-delete-forever text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <!-- END ACADEMIC PROFILE -->
        <hr color="grey">

        <!-- Project details -->
            <p class="card-description">Project Details</p>
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
                        <tr data-repeater-item>
                            <td><input type="text" class="form-control" placeholder="Project Title" name="project_title" required></td>
                            <td><input type="text" class="form-control" placeholder="Role Play" name="role_play" required></td>
                            <td><input type="number" class="form-control" placeholder="Team Size" name="team_size" required></td>
                            <td><textarea class="form-control" placeholder="Description" name="description" required></textarea></td>
                            <td class="text-center" style="margin:0px;padding:0px;">
                                <a data-repeater-delete>
                                    <i class="icon-md mdi mdi-delete-forever text-danger"></i>
                                </a>
                            </td>
                        </tr>
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
            <div class="repeater">
                <table border="1" class="table table-bordered">
                    <thead class="bg-dark">
                      <tr>
                        <th>Technical Skills Details</th>
                        <th class="text-center" style="margin:0px;padding:0px;"><a data-repeater-create class="text-primary"><i class="icon-md mdi mdi-plus-circle" aria-hidden="true"></i></a></th>
                      </tr>
                    </thead>
                    <tbody data-repeater-list="technical_skills">
                      <tr data-repeater-item>
                        <td><input type="text" class="form-control" placeholder="Please Enter Technical Skills Here..." name="details" required></td>
                        <td class="text-center" style="margin:0px;padding:0px;" >
                            <a data-repeater-delete>
                                <i class="icon-md mdi mdi-delete-forever text-danger"></i>
                            </a>
                        </td>
                      </tr>
                    </tbody>
                </table>
            </div>
        <!-- END Technical Skills -->
        <hr color="grey">

        <!-- Key Skills -->
            <p class="card-description">Key Skills</p>
            <div class="repeater">
                <table border="1" class="table table-bordered">
                    <thead class="bg-dark">
                      <tr>
                        <th>Key Skills Details</th>
                        <th class="text-center" style="margin:0px;padding:0px;"><a data-repeater-create class="text-primary"><i class="icon-md mdi mdi-plus-circle" aria-hidden="true"></i></a></th>
                      </tr>
                    </thead>
                    <tbody data-repeater-list="key_skills">
                      <tr data-repeater-item>
                        <td><input type="text" class="form-control" placeholder="Please Enter Key Skills Here..." name="details" required></td>
                        <td class="text-center" style="margin:0px;padding:0px;">
                            <a data-repeater-delete>
                                <i class="icon-md mdi mdi-delete-forever text-danger"></i>
                            </a>
                        </td>
                      </tr>
                    </tbody>
                </table>
            </div>
        <!-- END Key Skills -->
        <hr color="grey">

        <!-- Personality Traits -->
            <p class="card-description">Personality Traits</p>
            <div class="repeater">
                <table border="1" class="table table-bordered">
                    <thead class="bg-dark">
                        <tr>
                            <th>Personality Traits Details</th>
                            <th class="text-center" style="margin:0px;padding:0px;"><a data-repeater-create class="text-primary"><i class="icon-md mdi mdi-plus-circle" aria-hidden="true"></i></a></th>
                        </tr>
                    </thead>
                    <tbody data-repeater-list="personality_traits">
                        <tr data-repeater-item>
                            <td><input type="text" class="form-control" placeholder="Please Enter Personality Traits Here..." name="details" required></td>
                            <td class="text-center" style="margin:0px;padding:0px;">
                                <a data-repeater-delete>
                                    <i class="icon-md mdi mdi-delete-forever text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <!-- END Personality Traits -->
        <hr color="grey">

        <!-- Achivements -->
            <p class="card-description">Achivements</p>
            <div class="text-dark">
                <textarea id="editor_achivement" name="achivements" required>Something about Achivements...</textarea>
            </div>
        <hr color="grey">
        <!-- END Achivements -->

        <!-- Workshops and Seminars -->
            <p class="card-description">Workshops & Seminars</p>
            <div class="text-dark">
                <textarea id="editor_workshop" name="workshops_seminars" required>Something about Workshops and Seminars...</textarea>
            </div>
        <hr color="grey">
        <!-- END Workshops and Seminars -->

        <input type="submit" name="submit_resume_form" id="submit_form" value="Save" class="btn btn-success danger-btn">
        <input type="submit" name="submit_form_preview" id="submit_form_preview" value="Preview" class="btn btn-primary danger-btn">

        </form>
        
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>

<script type="text/javascript">

$(document).ready(function(){
    //var editor_achivement = new RichTextEditor("#editor_achivement", {skin: "rounded-corner",  toolbar: "default" });
    //var editor_workshop = new RichTextEditor("#editor_workshop", {skin: "rounded-corner",  toolbar: "default" });
    /*$(".rte-toggleborder").css("line-height","2px");*/

    $('.repeater').repeater();

    $("#submit_form_preview").click(function(e){
        $('#resume_form').attr('action', 'resume_preview.php');
        $("#resume_form").attr('target', '_blank');
    });

    $("#submit_form").click(function(e){
        $('#resume_form').attr('action', 'save_resume.php');
        $("#resume_form").attr('target', '');
    });

    function readURL(input){
      var fileInput = document.getElementById('user_logo');
      var filePath = fileInput.value;
      var fileUrl = window.URL.createObjectURL(fileInput.files[0]);
      var extension = filePath.substr((filePath.lastIndexOf('.') + 1)).toLowerCase();
      if(input.files[0].size <= 10506316){ // 10 MB
          if(extension == 'png' || extension == 'jpg' || extension == 'jpeg' || extension == 'gif') {
              if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                }
                reader.readAsDataURL(input.files[0]);
              }
          }
      }
    }

});

/*ClassicEditor
    .create( document.querySelector('#editor'),{removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed', 'BlockQuote', 'Table' ],} )
    .catch( error => {
        console.error( error );
    } );*/

//var editor1 = new RichTextEditor("#editor", {skin: "rounded-corner", skin: "blue",  toolbar: "basic" });
/*$(".rte-toggleborder").css("line-height","2px");*/


</script>