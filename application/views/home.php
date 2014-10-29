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
			</ul>
		  </div>
		</div>
		
		<div class="container">
			<?php
				if($this->session->flashdata('error') != '') {
			?>
					<center>
					<div class="row">
						<div class="col-lg-7">
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert">×</button><?php echo $this->session->flashdata('error') ?>
						</div>
						</div>
					</div>
					</center>
			<?php
				}
			?>
			<div class="row">
			<div class="col-lg-7">
			<div class="jumbotron">
			  <!-- <form class="form-horizontal"> -->
			  <?php
				$form = array(
					'class' => 'form-horizontal',
					'method' => 'post'
				);
				
				echo form_open('simn/validasi_login', $form);
			  ?>
				  <fieldset>
					<legend>Login Sistem</legend>
					<div class="form-group">
					  <label for="inputEmail" class="col-lg-3 control-label">NIP</label>
					  <div class="col-lg-9">
						<input type="text" name="nip" class="form-control" id="nip" placeholder="Masukkan NIP" required="required">
					  </div>
					</div>
					<div class="form-group">
					  <label for="inputPassword" class="col-lg-3 control-label">Password</label>
					  <div class="col-lg-9">
						<input type="password" name="pass" class="form-control" id="inputPassword" placeholder="Password" required="required">
					  </div>
					</div>
					<div class="form-group">
					  <label for="select" class="col-lg-3 control-label">Login Sebagai</label>
					  <div class="col-lg-9">
						<select class="form-control" name="sebagai" id="select" required="required">
						  <option value="">Pilih</option>
						  <option value="1">Guru Mapel</option>
						  <option value="2">Guru BK</option>
						  <option value="3">Wakasiswa</option>
						</select>
					  </div>
					</div>
					<div class="form-group">
					  <div class="col-lg-10 col-lg-offset-2">
						<button class="btn btn-default" type="reset">Batal</button>
						<button type="submit" class="btn btn-primary">Login</button>
					  </div>
					</div>
				  </fieldset>
				<!-- </form> -->
				<?php echo form_close(); ?>
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