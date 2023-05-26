<nav class="sidebar sidebar-offcanvas " id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo text-success" href="dashboard.php"><b>RESUME BUILDER</b></a>
          <a class="sidebar-brand brand-logo-mini text-success" href="dashboard.php"><b>RB</b></a>
        </div>
        <ul class="nav">
          
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="dashboard.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer text-danger"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

<!--           <?php if($permisn->result_view==1){ ?>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#resumes" aria-expanded="false" aria-controls="resumes">
              <span class="menu-icon ">
                <i class="mdi mdi-account-card-details text-warning"></i>
              </span>
              <span class="menu-title">Resumes / CVs</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="resumes">
              <ul class="nav flex-column sub-menu">
                <?php if($permisn->result_add==1){ ?>
                <li class="nav-item"> <a class="nav-link" href="add_notification.php">Generate Resume</a></li>
                <?php } ?>
                <li class="nav-item"> <a class="nav-link" href="manage_notification.php">Manage Resumes</a></li>
              </ul>
            </div>
          </li>
          <?php } ?> -->

          <li class="nav-item menu-items">
            <a class="nav-link" href="generate_resume.php">
              <span class="menu-icon">
                <i class="mdi mdi-account-card-details text-primary"></i>
              </span>
              <span class="menu-title">Generate Resume</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="manage_resumes.php">
              <span class="menu-icon">
                <i class="mdi mdi-format-list-bulleted text-warning"></i>
              </span>
              <span class="menu-title">Manage Resumes</span>
            </a>
          </li>

          <?php //if($_SESSION['role'] == 0 ){ ?>
            
             
            </a>
          </li>              
          <?php //} ?>
          <?php //if($_SESSION['role'] == 0 ){ ?>
            
          </li>              
          <?php //} ?>
        </ul>
      </nav>