<?php
    echo '
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4">Mark Stephen</h1>
              <p>Web Designer</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">
                    <li class="active"><a href="dashboard.php"> <i class="icon-home"></i>Home </a></li>
                    <li><a href="register_members.php"> <i class="icon-grid"></i>Members </a></li>
                    <li><a href="tithe.php"> <i class="fa fa-bar-chart"></i>Tithe </a></li>
                    <li><a href="attendance.php"> <i class="icon-padnote"></i>Attendance </a></li>
                     <li><a href="expenditure.php"> <i class="icon-padnote"></i>Expenditure </a></li>
                    <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Payments </a>
                      <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="offering.php">Offering</a></li>
                        <li><a href="pledge.php">Pledge</a></li>
                        <!--<li><a href="#">Page</a></li>-->
                      </ul>
                    </li>
                  <!-- <li><a href="login.html"> <i class="icon-interface-windows"></i>Login page </a></li>-->
          </ul><span class="heading">Extras</span>
          <ul class="list-unstyled">
            <li> <a href="visitors.php"> <i class="icon-flask"></i>Visitors </a></li>
            <li> <a href="events.php"> <i class="icon-screen"></i>Events </a></li>
            <li> <a href="prayer_request.php"> <i class="icon-mail"></i>Prayer Request </a></li>
            <li> <a href="thanks_giving.php"> <i class="icon-picture"></i>Thanks Giving </a></li>
            <li> <a href="user_account.php"> <i class="icon-picture"></i>User Account</a></li>
            <li> <a href="settings.php"> <i class="icon-picture"></i>Settings </a></li>
          </ul>
        </nav>
    ';
?>