<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SIMN Smada</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo base_url() ?>public/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="<?php echo base_url() ?>public/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">SIMN Smada</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
			  <li class="active"><a href="<?php echo base_url() ?>wonggundul/logout">Logout</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <!-- Example row of columns -->
	  <?php
			if($this->session->flashdata('semester') != '') {
	  ?>
			    <center>
				<div class="row-fluid">
					<div class="span4 offset4 alert alert-success">
						<button type="button" class="close" data-dismiss="alert">×</button><?php echo $this->session->flashdata('semester') ?>
					</div>
				</div>
				</center>
	  <?php
			}
	  ?>
	  
	  <?php
			if($this->session->flashdata('ajaran') != '') {
	  ?>
			    <center>
				<div class="row-fluid">
					<div class="span4 offset4 alert alert-success">
						<button type="button" class="close" data-dismiss="alert">×</button><?php echo $this->session->flashdata('ajaran') ?>
					</div>
				</div>
				</center>
	  <?php
			}
	  ?>
	  
      <div class="hero-unit">
		<h3>Master Data</h3><br/><br/>
		<div class="row">
		<div class="span3">
			<a href="<?php echo base_url(); ?>siswa/get_siswa"><img src="<?php echo base_url() ?>public/images/siswa.png" title="Master Siswa" /></a><br/><br/>
			<a class="btn btn-large" href="<?php echo base_url(); ?>siswa/get_siswa">Master Siswa</a>
		</div>
		<div class="span3">
			<a href="<?php echo base_url(); ?>gurumapel/get_guru"><img src="<?php echo base_url() ?>public/images/guru.png" title="Master Guru Mapel" /></a><br/><br/>
			<a class="btn btn-large" href="<?php echo base_url(); ?>gurumapel/get_guru">Master Guru Mapel</a>
		</div>
		<div class="span3">
			<a href="<?php echo base_url(); ?>gurubk/get_guru"><img src="<?php echo base_url() ?>public/images/bk.png" title="Master Guru BK" /></a><br/><br/>
			<a class="btn btn-large" href="<?php echo base_url(); ?>gurubk/get_guru">Master Guru BK</a>
		</div>
		</div>
		<br/><br/>
		<div class="row">
		<div class="span3">
			<a href="<?php echo base_url(); ?>kelas/get_kelas"><img src="<?php echo base_url() ?>public/images/kelas.png" title="Master Kelas" /></a><br/><br/>
			<a class="btn btn-large" href="<?php echo base_url(); ?>kelas/get_kelas">Master Kelas</a>
		</div>
		<div class="span3">
			<a href="<?php echo base_url(); ?>mapel/get_mapel"><img src="<?php echo base_url() ?>public/images/mapel.png" title="Master Mapel" /></a><br/><br/>
			<a class="btn btn-large" href="<?php echo base_url(); ?>mapel/get_mapel">Master Mapel</a>
		</div>
		<div class="span3">
			<a href="<?php echo base_url(); ?>ajar/get_ajar"><img src="<?php echo base_url() ?>public/images/ajar.png" title="Data Ajar Guru" /></a><br/><br/>
			<a class="btn btn-large" href="<?php echo base_url(); ?>ajar/get_ajar">Data Ajar Guru</a>
		</div>
		</div>
	  </div>
	  
	  <div class="hero-unit">
		<h3>Special Tools</h3>
		<b>(Hati - Hati dalam menggunakan tools ini)</b>
		<br/><br/>
		<a class="btn btn-large btn-danger" href="<?php echo base_url(); ?>wonggundul/ganti_semester" onclick="return confirm('Anda Yakin Ingin Ganti Semester?');"><i class="icon-trash"></i> Ganti Semester</a><br/>Nb: Tool ini digunakan saat pergantian semester
		<br/><br/>
		<a class="btn btn-large btn-danger" href="<?php echo base_url(); ?>wonggundul/ganti_tahun_ajaran" onclick="return confirm('Anda Yakin Ingin Ganti Tahun Ajaran?');"><i class="icon-trash"></i> Ganti Tahun Ajaran</a><br/>Nb: Tool ini digunakan saat pergantian tahun ajaran
		<br/>
	  </div>


      <footer>
        <p>Copyright &copy; ERA 2014</p>
      </footer>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url() ?>public/js/jquery.js"></script>
    <script src="<?php echo base_url() ?>public/js/bootstrap-transition.js"></script>
    <script src="<?php echo base_url() ?>public/js/bootstrap-alert.js"></script>
    <script src="<?php echo base_url() ?>public/js/bootstrap-modal.js"></script>
    <script src="<?php echo base_url() ?>public/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo base_url() ?>public/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo base_url() ?>public/js/bootstrap-tab.js"></script>
    <script src="<?php echo base_url() ?>public/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo base_url() ?>public/js/bootstrap-popover.js"></script>
    <script src="<?php echo base_url() ?>public/js/bootstrap-button.js"></script>
    <script src="<?php echo base_url() ?>public/js/bootstrap-collapse.js"></script>
    <script src="<?php echo base_url() ?>public/js/bootstrap-carousel.js"></script>
    <script src="<?php echo base_url() ?>public/js/bootstrap-typeahead.js"></script>

  </body>
</html>
