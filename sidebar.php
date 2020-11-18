 <?php
function check_active($a,$b)
{
  if($a==$b)
  {
    return " active ";
  }
  else if($a == "home")
  {
    return " ";
  }
  // /$page
}
?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="home" class="brand-link">
      <img src="assets/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">OSH PRO</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="assets/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">        </div>
        <div class="info">
          <span class="text-white font-weight-light">OSH PRO</span>
        </div>
      </div>
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="uploads/user/<?=$result[0]['user_foto']?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="profile" class="d-block"><?=$result[0]['user_nama']?></a>
          <!-- <br>
          <a href="#" class="d-block"><?=$result[0]['user_tipe']?></a> -->

        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="home" class="nav-link <?=check_active($page,'home')?>">
              <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
              <p>
              OSH PRO
              </p>
            </a>

          </li>
          <?php
          if($tipe_user=="ADMIN")
          {
          ?>
          <!--hr class="text-primary"-->
          <li class="nav-item has-treeview">
            <a href="statistic" class="nav-link <?=check_active($page,'statistic')?>">
              <i class="nav-icon fas fa-chart-bar text-primary"></i>
              <p>
                Statistic 
              </p>
            </a>
           
          </li>
          

          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-file  text-success"></i>
              <p>
              Report
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="oshereport" class="nav-link<?=check_active($page,'oshereport')?>">
                  <i class="far fa-circle nav-icon  text-primary"></i>
                  <p>OSHE Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ngoreport" class="nav-link<?=check_active($page,'ngoreport')?>">
                  <i class="far fa-circle nav-icon text-success"></i>
                  <p>NGO Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ucuxreport" class="nav-link<?=check_active($page,'ucuxreport')?>">
                  <i class="far fa-circle nav-icon text-warning"></i>
                  <p>U.C.U.X Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="vzreport" class="nav-link<?=check_active($page,'vzreport')?>">
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <p>VISION ZERO Report</p>
                </a>
              </li>
              
            </ul>
          </li> -->


            <?php } ?>

            <li class="nav-header"><hr></li>

            <?php
          if($tipe_user=="SOCSO" || $tipe_user=="HQ" || $tipe_user=="ADMIN")
          {
          ?>

            <li class="nav-item has-treeview">
            <a href="oshe" class="nav-link" <?=check_active($page,'oshe')?>>
              <i class="nav-icon far fa-circle text-primary"></i>
              <p>
              OSHE
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="oshe" class="nav-link<?=check_active($page,'oshe')?>">
                  <i class="fa fa-home nav-icon text-info"></i>
                  <p>Home</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="newoshe" class="nav-link<?=check_active($page,'newoshe')?>">
                  <i class="fa fa-file nav-icon text-primary"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=oshesubmittedtable&mode=draft" class="nav-link<?=check_active($page,'oshedrafttable')?>">
                  <i class="fa fa-save nav-icon text-warning"></i>
                  <p>Draft</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=oshesubmittedtable&mode=submitted" class="nav-link<?=check_active($page,'oshesubmittedtable')?>">
                  <i class="fa fa-list nav-icon text-success"></i>
                  <p>Report</p>
                </a>
              </li>

              </ul>
            </li>
            <?php
          }
          if($tipe_user=="SOCSO" || $tipe_user=="HQ" || $tipe_user=="NGO" || $tipe_user=="ADMIN")
          {
          ?>
            
            <li class="nav-item has-treeview">
            <a href="ngo" class="nav-link" <?=check_active($page,'ngo')?>>
              <i class="nav-icon far fa-circle text-success"></i>
              <p>
              NGO
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="ngo" class="nav-link<?=check_active($page,'ngo')?>">
                  <i class="fa fa-home nav-icon text-info"></i>
                  <p>Home</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="newngo" class="nav-link<?=check_active($page,'newngo')?>">
                  <i class="fa fa-file nav-icon text-primary"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ngodrafttable" class="nav-link<?=check_active($page,'ngodrafttable')?>">
                  <i class="fa fa-save nav-icon text-warning"></i>
                  <p>Draft</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ngosubmittedtable" class="nav-link<?=check_active($page,'ngosubmittedtable')?>">
                  <i class="fa fa-list nav-icon text-success"></i>
                  <p>Report</p>
                </a>
              </li>

              
            </ul>
          </li>
          <?php 
          }
          if($tipe_user=="MAINTENANCE" || $tipe_user=="HQ" || $tipe_user=="SOCSO" || $tipe_user=="ADMIN")
          {
            ?>

            <li class="nav-item has-treeview">
            <a href="ucux" class="nav-link" <?=check_active($page,'ucux')?>>
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>
              U.C.U.X
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="ucux" class="nav-link<?=check_active($page,'ucux')?>">
                  <i class="fa fa-home nav-icon text-info"></i>
                  <p>Home</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="newucux" class="nav-link<?=check_active($page,'newucux')?>">
                  <i class="fa fa-file nav-icon text-primary"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="draftlistucux" class="nav-link<?=check_active($page,'draftlistucux')?>">
                  <i class="fa fa-save nav-icon text-warning"></i>
                  <p>Draft</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="listucux" class="nav-link<?=check_active($page,'listucux')?>">
                  <i class="fa fa-list nav-icon text-success"></i>
                  <p>Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="historylistucux" class="nav-link<?=check_active($page,'historylistucux')?>">
                  <i class="fa fa-history nav-icon"></i>
                  <p>History</p>
                </a>
              </li>
              
            </ul>
          </li>

          <?php
          }
          // if($tipe_user=="VZ" || $tipe_user=="ADMIN")
          {
          ?>
            <li class="nav-item has-treeview">
            <a href="vz" class="nav-link" <?=check_active($page,'vz')?>>
              <i class="nav-icon far fa-circle text-danger"></i>
              <p>
              Vision Zero
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="vz" class="nav-link<?=check_active($page,'vz')?>">
                  <i class="fa fa-home nav-icon text-info"></i>
                  <p>Home</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="newvz" class="nav-link<?=check_active($page,'newvz')?>">
                  <i class="fa fa-file nav-icon text-primary"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="vzdrafttable" class="nav-link<?=check_active($page,'vzdrafttable')?>">
                  <i class="fa fa-save nav-icon text-warning"></i>
                  <p>Draft</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="vzsubmittedtable" class="nav-link<?=check_active($page,'vzsubmittedtable')?>">
                  <i class="fa fa-list nav-icon text-success"></i>
                  <p>Report</p>
                </a>
              </li>

              </ul>
            </li>
            <?php } ?>
            <?php
          if($tipe_user=="ADMIN")
          {
          ?>                
          <li class="nav-header"><hr></li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list text-primary"></i>
              <p>
                Program
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="program" class="nav-link<?=check_active($page,'program')?>">
                  <i class="far fa-circle nav-icon text-primary"></i>
                  <p>Daftar Program</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="newprogram" class="nav-link<?=check_active($page,'newprogram')?>">
                  <i class="far fa-circle nav-icon text-success"></i>
                  <p>Add Program</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user  text-primary"></i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="users" class="nav-link<?=check_active($page,'users')?>">
                  <i class="far fa-circle nav-icon text-primary"></i>
                  <p>Daftar user</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="adduser" class="nav-link<?=check_active($page,'adduser')?>">
                  <i class="far fa-circle nav-icon text-success"></i>
                  <p>Add User</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tasks  text-primary"></i>
              <p>
                Role
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="role" class="nav-link<?=check_active($page,'role')?>">
                  <i class="far fa-circle nav-icon text-primary"></i>
                  <p>Daftar Role</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="addrole" class="nav-link<?=check_active($page,'addrole')?>">
                  <i class="far fa-circle nav-icon text-success"></i>
                  <p>Add Role</p>
                </a>
              </li>
              
            </ul>
          </li>
          <?php } ?>
          <!-- <li class="nav-item">
            <a href="gallery" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li> -->


          <li class="nav-header">Menu</li>
          <li class="nav-item">
            <a href="settings" class="nav-link">
              <i class="nav-icon fas fa-cog text-info"></i>
              <p class="text">Setting</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Log Out</p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>