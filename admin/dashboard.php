<?php 
// include('php_script/databaseConfig.php');
// include('php_script/session.php');
// $counts = '';
?>
<!DOCTYPE html>
<html>
  <?php require_once('head.php');?>
  <body>
    <div class="page">
      <!-- Main Navbar-->
      <?php require_once('header.php');?>
      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <?php require_once('nav.php');?>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Dashboard</h2>
            </div>
          </header>
          <!-- Dashboard Counts Section-->
          <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
              <div class="row bg-white has-shadow">
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="icon-user"></i></div><br>
                    <div class="title"><span>Members</span>
                    <?php 

                    $sql = "SELECT COUNT(memberid) AS member FROM icgcmembers";
                    $result = mysqli_query($conn, $sql);

                    $counts_row = mysqli_fetch_array($result);
                    $counts = $counts_row["member"];

                    ?>
                      <div class="progress">
                      
                        <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="<?php echo $counts; ?>" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                      </div>
                    </div>
                    <div class="number"><strong><?php echo $counts; ?></strong></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-red"><i class="icon-padnote"></i></div><br>
                    <div class="title"><span>Visitors</span>
                     <?php 

                    $sql_visitor = "SELECT COUNT(*) AS visitor FROM visitors";
                    $result_visitor = mysqli_query($conn, $sql_visitor);

                    $visitor_row = mysqli_fetch_array($result_visitor);
                    $visitor = $visitor_row["visitor"];

                    ?>
                      <div class="progress">
                        <div role="progressbar" style="width: 10%; height: 4px;" aria-valuenow="<?php echo $visitor; ?>" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                      </div>
                    </div>
                    <div class="number"><strong><?php echo $visitor; ?></strong></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-green"><i class="fa fa-male"></i></div>
                    <div class="title"><span>Total<br>Males</span>
                    <?php 
                    $student_male = 'male';
                    $sql_male = "SELECT COUNT(gender) AS male FROM icgcmembers WHERE gender='$student_male'";
                    $result_male = mysqli_query($conn, $sql_male);

                    $male_student = mysqli_fetch_array($result_male);
                    $male = $male_student["male"];

                    ?>
                      <div class="progress">
                        <div role="progressbar" style="width: 40%; height: 4px;" aria-valuenow="<?php echo $visitor; ?>" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
                      </div>
                    </div>
                    <div class="number"><strong><?php echo $male; ?></strong></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-orange"><i class="fa fa-female"></i></div>
                    <div class="title"><span>Total<br>Females</span>
                    <?php 
                    $student_female = 'female';
                    $sql_female = "SELECT COUNT(gender) AS female FROM icgcmembers WHERE gender='$student_female'";
                    $result_female = mysqli_query($conn, $sql_female);

                    $female_student = mysqli_fetch_array($result_female);
                    $female = $female_student["female"];

                    ?>
                      <div class="progress">
                        <div role="progressbar" style="width: 50%; height: 4px;" aria-valuenow="<?php echo $female; ?>" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
                      </div>
                    </div>
                    <div class="number"><strong><?php echo $female; ?></strong></div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Dashboard Header Section    -->
          <section class="dashboard-header">
            <div class="container-fluid">
              <div class="row">
                <!-- Statistics -->
                <div class="statistics col-lg-3 col-12">
                  <div class="statistic d-flex align-items-center bg-white has-shadow">
                  <?php 
                  $student_level_100 = 'level100';
                  $sql_visitor_100 = "SELECT COUNT(m_level) AS m_level FROM icgcmembers WHERE m_level='$student_level_100'";
                  $result_visitor_100 = mysqli_query($conn, $sql_visitor_100);

                  $visitor_row_100 = mysqli_fetch_array($result_visitor_100);
                  $visitor_100 = $visitor_row_100["m_level"];

                  ?>
                    <div class="icon bg-red"><i class="icon-user"></i></div>
                    <div class="text"><strong><?php echo $visitor_100; ?></strong><br><small>Level 100 Students</small></div>
                  </div>
                  <div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-green"><i class="icon-user"></i></div>
                    

                    <?php 

                    $student_level_200 = 'level200';
                    $sql_visitor_200 = "SELECT COUNT(m_level) AS m_level200 FROM icgcmembers WHERE m_level='$student_level_200'";
                    $result_visitor_200 = mysqli_query($conn, $sql_visitor_200);

                    $visitor_row_200 = mysqli_fetch_array($result_visitor_200);
                    $visitor_200 = $visitor_row_200["m_level200"];

                    ?>
                    <div class="text"><strong><?php echo $visitor_200; ?></strong><br><small>Level 200 Students</small></div>
                  </div>
                  <div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-orange"><i class="icon-user"></i></div>

                    <?php 

                    $student_level_300 = 'level300';
                    $sql_visitor_300 = "SELECT COUNT(m_level) AS m_level300 FROM icgcmembers WHERE m_level='$student_level_300'";
                    $result_visitor_300 = mysqli_query($conn, $sql_visitor_300);

                    $visitor_row_300 = mysqli_fetch_array($result_visitor_300);
                    $visitor_300 = $visitor_row_300["m_level300"];

                    ?>
                    <div class="text"><strong><?php echo $visitor_300; ?></strong><br><small>Level 300 Students</small></div>
                  </div>
                  <div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-green"><i class="icon-user"></i></div>

                    <?php 

                    $student_level_400 = 'level400';
                    $sql_visitor_400 = "SELECT COUNT(m_level) AS m_level400 FROM icgcmembers WHERE m_level='$student_level_400'";
                    $result_visitor_400 = mysqli_query($conn, $sql_visitor_400);

                    $visitor_row_400 = mysqli_fetch_array($result_visitor_400);
                    $visitor_400 = $visitor_row_400["m_level400"];

                    ?>
                    <div class="text"><strong><?php echo $visitor_400; ?></strong><br><small>Level 400 Students</small></div>
                  </div>
                </div>
                <!-- Line Chart -->            
                <div class="chart col-lg-6 col-12">
                  <div class="line-chart bg-white d-flex align-items-center justify-content-center has-shadow">
                    <canvas id="lineCahrt"></canvas>
                  </div>
                </div>
                <div class="chart col-lg-3 col-12">
                  <!-- Bar Chart -->  
                  <div class="bar-chart has-shadow bg-white">
                    <div class="title"><strong class="text-violet">95%</strong><br><small>Current Server Uptime</small></div>
                    <canvas id="barChartHome"></canvas>
                  </div>
                  <!-- Numbers -->
                  <div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-green"><i class="fa fa-line-chart"></i></div>
                    <div class="text"><strong><span>Total Users</span><br />5%</strong><br><small><marquee>Sign up</marquee></small>
                  <a href="signup.php" class="btn btn-primary">Sign up</a>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </section> 
          <!-- Projects Section-->
         <!-- <section class="projects no-padding-top">
            <div class="container-fluid">
              <!-- Project-->
              <!--<div class="project">
                <div class="row bg-white has-shadow">
                  <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                    <div class="project-title d-flex align-items-center">
                      <div class="image has-shadow"><img src="img/project-1.jpg" alt="..." class="img-fluid"></div>
                      <div class="text">
                        <h3 class="h4">Project Title</h3><small>Lorem Ipsum Dolor</small>
                      </div>
                    </div>
                    <div class="project-date"><span class="hidden-sm-down">Today at 4:24 AM</span></div>
                  </div>
                  <div class="right-col col-lg-6 d-flex align-items-center">
                    <div class="time"><i class="fa fa-clock-o"></i>12:00 PM </div>
                    <div class="comments"><i class="fa fa-comment-o"></i>20</div>
                    <div class="project-progress">
                      <div class="progress">
                        <div role="progressbar" style="width: 45%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>-->
              <!-- Project-->
            <!--  <div class="project">
                <div class="row bg-white has-shadow">
                  <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                    <div class="project-title d-flex align-items-center">
                      <div class="image has-shadow"><img src="img/project-2.jpg" alt="..." class="img-fluid"></div>
                      <div class="text">
                        <h3 class="h4">Project Title</h3><small>Lorem Ipsum Dolor</small>
                      </div>
                    </div>
                    <div class="project-date"><span class="hidden-sm-down">Today at 4:24 AM</span></div>
                  </div>
                  <div class="right-col col-lg-6 d-flex align-items-center">
                    <div class="time"><i class="fa fa-clock-o"></i>12:00 PM </div>
                    <div class="comments"><i class="fa fa-comment-o"></i>20</div>
                    <div class="project-progress">
                      <div class="progress">
                        <div role="progressbar" style="width: 60%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>-->
              <!-- Project-->
              <!--<div class="project">
                <div class="row bg-white has-shadow">
                  <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                    <div class="project-title d-flex align-items-center">
                      <div class="image has-shadow"><img src="img/project-3.jpg" alt="..." class="img-fluid"></div>
                      <div class="text">
                        <h3 class="h4">Project Title</h3><small>Lorem Ipsum Dolor</small>
                      </div>
                    </div>
                    <div class="project-date"><span class="hidden-sm-down">Today at 4:24 AM</span></div>
                  </div>
                  <div class="right-col col-lg-6 d-flex align-items-center">
                    <div class="time"><i class="fa fa-clock-o"></i>12:00 PM </div>
                    <div class="comments"><i class="fa fa-comment-o"></i>20</div>
                    <div class="project-progress">
                      <div class="progress">
                        <div role="progressbar" style="width: 50%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Project-->
             <!-- <div class="project">
                <div class="row bg-white has-shadow">
                  <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                    <div class="project-title d-flex align-items-center">
                      <div class="image has-shadow"><img src="img/project-4.jpg" alt="..." class="img-fluid"></div>
                      <div class="text">
                        <h3 class="h4">Project Title</h3><small>Lorem Ipsum Dolor</small>
                      </div>
                    </div>
                    <div class="project-date"><span class="hidden-sm-down">Today at 4:24 AM</span></div>
                  </div>
                  <div class="right-col col-lg-6 d-flex align-items-center">
                    <div class="time"><i class="fa fa-clock-o"></i>12:00 PM </div>
                    <div class="comments"><i class="fa fa-comment-o"></i>20</div>
                    <div class="project-progress">
                      <div class="progress">
                        <div role="progressbar" style="width: 50%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>-->
          <!-- Client Section-->
          <!--<section class="client no-padding-top">
            <div class="container-fluid">
              <div class="row">
                <!-- Work Amount  -->
                <!--<div class="col-lg-4">
                  <div class="work-amount card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-body">
                      <h3>Work Hours</h3><small>Lorem ipsum dolor sit amet.</small>
                      <div class="chart text-center">
                        <div class="text"><strong>90</strong><br><span>Hours</span></div>
                        <canvas id="pieChart"></canvas>
                      </div>
                    </div>
                  </div>
                </div>-->
                <!-- Client Profile -->
               <!-- <div class="col-lg-4">
                  <div class="client card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-body text-center">
                      <div class="client-avatar"><img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle">
                        <div class="status bg-green"></div>
                      </div>
                      <div class="client-title">
                        <h3>Jason Doe</h3><span>Web Developer</span><a href="#">Follow</a>
                      </div>
                      <div class="client-info">
                        <div class="row">
                          <div class="col-4"><strong>20</strong><br><small>Photos</small></div>
                          <div class="col-4"><strong>54</strong><br><small>Videos</small></div>
                          <div class="col-4"><strong>235</strong><br><small>Tasks</small></div>
                        </div>
                      </div>
                      <div class="client-social d-flex justify-content-between"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a><a href="#" target="_blank"><i class="fa fa-twitter"></i></a><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a><a href="#" target="_blank"><i class="fa fa-instagram"></i></a><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></div>
                    </div>
                  </div>
                </div>-->
                <!-- Total Overdue             -->
               <!-- <div class="col-lg-4">
                  <div class="overdue card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-body">
                      <h3>Total Overdue</h3><small>Lorem ipsum dolor sit amet.</small>
                      <div class="number text-center">$20,000</div>
                      <div class="chart">
                        <canvas id="lineChart1">                               </canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>-->
          <!-- Feeds Section-->
          <!--<section class="feeds no-padding-top">
            <div class="container-fluid">
              <div class="row">
                <!-- Trending Articles-->
                <!--<div class="col-lg-6">
                  <div class="articles card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h2 class="h3">Trending Articles   </h2>
                      <div class="badge badge-rounded bg-green">4 New       </div>
                    </div>
                    <div class="card-body no-padding">
                      <div class="item d-flex align-items-center">
                        <div class="image"><img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="text"><a href="#">
                            <h3 class="h5">Lorem Ipsum Dolor</h3></a><small>Posted on 5th June 2017 by Aria Smith.   </small></div>
                      </div>
                      <div class="item d-flex align-items-center">
                        <div class="image"><img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="text"><a href="#">
                            <h3 class="h5">Lorem Ipsum Dolor</h3></a><small>Posted on 5th June 2017 by Frank Williams.   </small></div>
                      </div>
                      <div class="item d-flex align-items-center">
                        <div class="image"><img src="img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="text"><a href="#">
                            <h3 class="h5">Lorem Ipsum Dolor</h3></a><small>Posted on 5th June 2017 by Ashley Wood.   </small></div>
                      </div>
                      <div class="item d-flex align-items-center">
                        <div class="image"><img src="img/avatar-4.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="text"><a href="#">
                            <h3 class="h5">Lorem Ipsum Dolor</h3></a><small>Posted on 5th June 2017 by Jason Doe.   </small></div>
                      </div>
                      <div class="item d-flex align-items-center">
                        <div class="image"><img src="img/avatar-5.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="text"><a href="#">
                            <h3 class="h5">Lorem Ipsum Dolor</h3></a><small>Posted on 5th June 2017 by Sam Martinez.   </small></div>
                      </div>
                    </div>
                  </div>
                </div>-->
                <!-- Check List -->
               <!-- <div class="col-lg-6">
                  <div class="checklist card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard5" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">           
                      <h2 class="h3">To Do List </h2>
                    </div>
                    <div class="card-body no-padding">
                      <div class="item d-flex">
                        <input type="checkbox" id="input-1" name="input-1" class="checkbox-template">
                        <label for="input-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                      </div>
                      <div class="item d-flex">
                        <input type="checkbox" id="input-2" name="input-2" class="checkbox-template">
                        <label for="input-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                      </div>
                      <div class="item d-flex">
                        <input type="checkbox" id="input-3" name="input-3" class="checkbox-template">
                        <label for="input-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                      </div>
                      <div class="item d-flex">
                        <input type="checkbox" id="input-4" name="input-4" class="checkbox-template">
                        <label for="input-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                      </div>
                      <div class="item d-flex">
                        <input type="checkbox" id="input-5" name="input-5" class="checkbox-template">
                        <label for="input-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                      </div>
                      <div class="item d-flex">
                        <input type="checkbox" id="input-6" name="input-6" class="checkbox-template">
                        <label for="input-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Updates Section                                                -->
         <!-- <section class="updates no-padding-top">
            <div class="container-fluid">
              <div class="row">
                <!-- Recent Updates-->
             <!--   <div class="col-lg-4">
                  <div class="recent-updates card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard6" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header">
                      <h3 class="h4">Recent Updates</h3>
                    </div>
                    <div class="card-body no-padding">
                      <!-- Item-->
                     <!-- <div class="item d-flex justify-content-between">
                        <div class="info d-flex">
                          <div class="icon"><i class="icon-rss-feed"></i></div>
                          <div class="title">
                            <h5>Lorem ipsum dolor sit amet.</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p>
                          </div>
                        </div>
                        <div class="date text-right"><strong>24</strong><span>May</span></div>
                      </div>
                      <!-- Item-->
                     <!-- <div class="item d-flex justify-content-between">
                        <div class="info d-flex">
                          <div class="icon"><i class="icon-rss-feed"></i></div>
                          <div class="title">
                            <h5>Lorem ipsum dolor sit amet.</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p>
                          </div>
                        </div>
                        <div class="date text-right"><strong>24</strong><span>May</span></div>
                      </div>
                      <!-- Item        -->
                      <!--<div class="item d-flex justify-content-between">
                        <div class="info d-flex">
                          <div class="icon"><i class="icon-rss-feed"></i></div>
                          <div class="title">
                            <h5>Lorem ipsum dolor sit amet.</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p>
                          </div>
                        </div>
                        <div class="date text-right"><strong>24</strong><span>May</span></div>
                      </div>
                      <!-- Item-->
                      <!--<div class="item d-flex justify-content-between">
                        <div class="info d-flex">
                          <div class="icon"><i class="icon-rss-feed"></i></div>
                          <div class="title">
                            <h5>Lorem ipsum dolor sit amet.</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p>
                          </div>
                        </div>
                        <div class="date text-right"><strong>24</strong><span>May</span></div>
                      </div>
                      <!-- Item-->
                      <!--<div class="item d-flex justify-content-between">
                        <div class="info d-flex">
                          <div class="icon"><i class="icon-rss-feed"></i></div>
                          <div class="title">
                            <h5>Lorem ipsum dolor sit amet.</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p>
                          </div>
                        </div>
                        <div class="date text-right"><strong>24</strong><span>May</span></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Daily Feeds -->
               <!-- <div class="col-lg-4">
                  <div class="daily-feeds card"> 
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard7" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header">
                      <h3 class="h4">Daily Feeds</h3>
                    </div>
                    <div class="card-body no-padding">
                      <!-- Item-->
                      <!--<div class="item">
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between"><a href="#" class="feed-profile"><img src="img/avatar-5.jpg" alt="person" class="img-fluid rounded-circle"></a>
                            <div class="content">
                              <h5>Aria Smith</h5><span>Posted a new blog </span>
                              <div class="full-date"><small>Today 5:60 pm - 12.06.2014</small></div>
                            </div>
                          </div>
                          <div class="date text-right"><small>5min ago</small></div>
                        </div>
                      </div>
                      <!-- Item-->
                      <!--<div class="item"> 
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between"><a href="#" class="feed-profile"><img src="img/avatar-2.jpg" alt="person" class="img-fluid rounded-circle"></a>
                            <div class="content">
                              <h5>Frank Williams</h5><span>Posted a new blog </span>
                              <div class="full-date"><small>Today 5:60 pm - 12.06.2014</small></div>
                              <div class="CTAs"><a href="#" class="btn btn-xs btn-secondary"><i class="fa fa-thumbs-up"> </i>Like</a><a href="#" class="btn btn-xs btn-secondary"><i class="fa fa-heart"> </i>Love    </a></div>
                            </div>
                          </div>
                          <div class="date text-right"><small>5min ago</small></div>
                        </div>
                      </div>
                      <!-- Item-->
                     <!-- <div class="item clearfix">
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between"><a href="#" class="feed-profile"><img src="img/avatar-3.jpg" alt="person" class="img-fluid rounded-circle"></a>
                            <div class="content">
                              <h5>Ashley Wood</h5><span>Posted a new blog </span>
                              <div class="full-date"><small>Today 5:60 pm - 12.06.2014</small></div>
                            </div>
                          </div>
                          <div class="date text-right"><small>5min ago</small></div>
                        </div>
                        <div class="quote has-shadow"> <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Over the years.</small></div>
                        <div class="CTAs pull-right"><a href="#" class="btn btn-xs btn-secondary"><i class="fa fa-thumbs-up"> </i>Like</a></div>
                      </div>
                    </div>
                  </div>
                </div>-->
                <!-- Recent Activities -->
                <!--<div class="col-lg-4">
                  <div class="recent-activities card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard8" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard8" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header">
                      <h3 class="h4">Recent Activities</h3>
                    </div>
                    <div class="card-body no-padding">
                      <div class="item">
                        <div class="row">
                          <div class="col-4 date-holder text-right">
                            <div class="icon"><i class="icon-clock"></i></div>
                            <div class="date"> <span>6:00 am</span><br><span class="text-info">6 hours ago</span></div>
                          </div>
                          <div class="col-8 content">
                            <h5>Meeting</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
                          </div>
                        </div>
                      </div>
                      <div class="item">
                        <div class="row">
                          <div class="col-4 date-holder text-right">
                            <div class="icon"><i class="icon-clock"></i></div>
                            <div class="date"> <span>6:00 am</span><br><span class="text-info">6 hours ago</span></div>
                          </div>
                          <div class="col-8 content">
                            <h5>Meeting</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
                          </div>
                        </div>
                      </div>
                      <div class="item">
                        <div class="row">
                          <div class="col-4 date-holder text-right">
                            <div class="icon"><i class="icon-clock"></i></div>
                            <div class="date"> <span>6:00 am</span><br><span class="text-info">6 hours ago</span></div>
                          </div>
                          <div class="col-8 content">
                            <h5>Meeting</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>--> 
          <!-- Page Footer-->
          <?php require_once('footer.php');?>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <?php require_once('footer_link.php');?>
  </body>
</html>