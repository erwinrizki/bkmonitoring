<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SIMN Smada</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo base_url() ?>public/theme/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="<?php echo base_url() ?>public/theme/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
		<div class="navbar navbar-default navbar-fixed-top">
		  <div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">SIMN Smada</a>
		  </div>
		  <div class="navbar-collapse collapse navbar-responsive-collapse">
			<ul class="nav navbar-nav">
			  <li><a href="#">Home</a></li>
			  <li><a href="<?php echo base_url() ?>simn/logout">Logout</a></li>
			</ul>
		  </div>
		</div>
		
		<div class="container">
			<?php 
				if($this->session->flashdata('success') != '') {
			?>
					<div class="row">
						<div class="col-lg-7">
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button><?php echo $this->session->flashdata('success') ?>
						</div>
						</div>
					</div>
			<?php
				}
			?>
			<?php 
				if($this->session->flashdata('error') != '') {
			?>
					<div class="row">
						<div class="col-lg-5 col-md-offset-3">
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert">×</button><?php echo $this->session->flashdata('error') ?>
						</div>
						</div>
					</div>
			<?php
				}
			?>
			<div class="jumbotron">
				<h2>Menu Utama</h2><br/><br/>
				<div class="row">
				<div class="span3">
					<a href="<?php echo base_url(); ?>nilai/pilih_penilaian"><img src="<?php echo base_url() ?>public/images/nilai.png" title="Input Nilai Siswa" /></a><br/><br/>
					<a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>nilai/pilih_penilaian">Input Nilai Siswa</a>
				</div>
				</div>
			</div>
			
			<footer>
				<p>Copyright &copy; ERA 2014</p>
			</footer>
		</div>
		
		<script src="<?php echo base_url() ?>public/theme/jquery-1.10.2.min.js"></script>
		<script src="<?php echo base_url() ?>public/theme/bootstrap.min.js"></script>
		<script src="<?php echo base_url() ?>public/theme/bootswatch.js"></script>
  </body>
</html>