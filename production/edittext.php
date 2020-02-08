<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>EDIT | DATA TEXT</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
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
                    <?php include 'content.php'; ?>
                </ul>
              </div>
            </div>
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
            <div class="row">
              <div class="title_left">
                <h3>Edit Text</h3>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Text</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <!-- fungsi edit -->
                  <?php 
                    include 'koneksi.php';
                    $id = $_GET['id'];
                    $data = mysqli_query($koneksi, "select*from tb_summary where id='$id'");
                      while($d = mysqli_fetch_array($data)) { 
                  ?>

                    <form class="form-horizontal form-label-left" novalidate method="post" method="post" action="update.php">
                      <div class="item form-group">
                        <label class="control-label col-md-1 col-sm-1 col-xs-12" for="name">Nama File* <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="hidden" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="id" value="<?php echo $d['id']; ?>">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="namafile" placeholder="Nama File .txt"  type="text" value="<?php echo $d['namafile']; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-1 col-sm-1 col-xs-12" for="name">Judul <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="title" placeholder="Judul Text" type="text" value="<?php echo $d['title']; ?>">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <p> *Untuk mencegah perubahan nama file, hapus ".txt" pada form Nama file </p>
                    <!-- </form> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Content</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">
                
                  <!-- <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor-one">                     -->
                  <div class="form-group">
                    <!-- <label class="control-label col-md-3 col-sm-3 col-xs-12">Resizable Text area</label> -->
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea class="form-control" name="content" rows="4" placeholder="Isi Konten"> <?php echo $d['content']; ?> </textarea>
                    </div>
                  </div>
                </div>
                  <br />
                  <!-- <div class="ln_solid"></div> -->
                  <div class="form-group">
                    <div class="col-md-5 col-sm-5 col-xs-5">
                      <a href="viewtext.php"><input type="submit" class="btn btn-primary" value="Cancel"></a>
                      <input id="send" type="submit" class="btn btn-success" value="Simpan">
                    </div>
                  </div>
                  <?php
                  }
                ?>
              </div>
            </div>
           
          </div>
        </div>
      </div>
    </form>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <?php include 'footer.php'; ?>
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
    <!-- validator -->
    <script src="../vendors/validator/validator.js"></script>
  
  </body>
</html>
