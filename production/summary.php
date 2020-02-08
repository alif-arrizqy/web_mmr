<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Summary Text</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    <script type="text/javascript">
        function printValue(sliderID, textbox) {
            var x = document.getElementById(textbox);
            var y = document.getElementById(sliderID);
            x.value = y.value;
        }
    </script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-pencil"></i> <span>Summary Text</span></a>
            </div>

            <div class="clearfix"></div>
            <!-- fungsi -->
                  <?php
                      error_reporting(E_ERROR | E_PARSE);
                      include "./summarize.php";
                      
                      // scan nama file korpus
                      $dir_corpus = "./corpus";
                      $files    = scandir($dir_corpus);
                      $files    = array_slice($files, 2);
                      //print_r($files);
                      
                      // hasil
                      if(isset($_GET["filename"]) && isset($_GET["compression"])) {
                        $filename  = $_GET["filename"];
                        $compression = $_GET["compression"];
                        $output    = summarize($filename, $compression);
                        $title     = substr($filename, 0, -4);
                      }
                  ?>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Kuproy!</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">       
                <?php include 'content.php' ?>           
                  <!-- <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-active"></span></a> -->
                    <!-- <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul> -->
                  <!-- </li> -->
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div> 
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="page-title">
              <div class="title_left">
                <h3>Auto Text Summarization</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo $title;?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="x_content">
                    <div class="row">
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <form action="summary.php" method="GET">
                          <label class="control-label">Select File</label>
                          <ul>
                              <h2>
                              <select class="form-control" name="filename">
                              <option value="0">Select File</option>
                              <?php
                                  foreach ($files as $key => $value) {
                                      $title = str_replace("_", " ", substr($value, 0, -4));
                                      if($filename == $value) {
                                        echo "<option value='$value' SELECTED>$title</option>";
                                      }
                                      else {
                                        echo "<option value='$value'>$title</option>";
                                      }
                                  }
                              ?>
                              </select>
                            </h2>
                          </ul>  
                        <label class="control-label">Set Compression Rate</label>
                          <ul>
                            <table border="0">
                            <tr>
                              <td><input type="range" id="slider" min="1" max="100" value="<?php echo !empty($compression)? $compression : '';?>" step="1" style="width:100%;" onchange="printValue('slider','rangeValue')"></td>
                              <td><input type="text" id="rangeValue" name="compression" value="<?php echo !empty($compression)? $compression : '50';?>" style="width:35px;" /></td>
                            </tr>
                            </table>
                          </ul>
                          <input class="btn btn-primary" type="submit" value="Go!" style="float: right;">
                          <a href="index.php"><button type="button" class="btn btn-primary" style="float: right;">Reset</button></a>
                        </div>
                      </div>
                      <!--  -->
                      <!-- /MAIL LIST -->

                      <!-- CONTENT MAIL -->
                        <div class="row">
                          <div class="col-md-12">
                            <div class="x_panel">
                              <div class="x_title">
                                <h2>ORIGINAL</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                  <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                                </ul>
                                <div class="clearfix"></div>
                              </div>
                              <div class="x_content">
                                <div class="row" style="border-bottom: 1px solid #E0E0E0; padding-bottom: 5px; margin-bottom: 5px;">
                                  <!-- CONTENT -->
                                  <div class="row-fluid" style="margin-top:0px;">
                                    <div class="span6">
                                      <p><?php echo !empty($output['original'])? $output['original'] : "";?></p>
                                    </div><!--/span-->
                                  </div><!--/row-->
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="x_panel">
                              <div class="x_title">
                                <h2>SUMMARY</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                  <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                                </ul>
                                <div class="clearfix"></div>
                              </div>
                              <div class="x_content">
                                <div class="row" style="border-bottom: 1px solid #E0E0E0; padding-bottom: 5px; margin-bottom: 5px;">
                                  <!-- CONTENT -->
                                  <div class="row-fluid" style="margin-top:0px;">
                                    <div class="span6">
                                      <p><?php echo !empty($output['summary'])? $output['summary'] : "";?></p>
                                    </div><!--/span-->
                                  </div><!--/row-->
                                </div>
                              </div>
                            </div>
                          </div>
                          </div>
                        </div>
                      </div>
                      <!-- /CONTENT MAIL -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <?php include 'footer.php' ?>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>