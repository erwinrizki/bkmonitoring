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
	<script src="<?php echo base_url() ?>public/theme/jquery-1.10.2.min.js"></script>
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
			  <li><a href="<?php echo base_url() ?>simn/panel_bk">Home</a></li>
			  <li><a href="<?php echo base_url() ?>simn/logout">Logout</a></li>
			</ul>
		  </div>
		</div>
		
		<div class="container">
			<?php
				if($this->session->flashdata('success') != '') {
			?>
					<center>
					<div class="row">
						<div class="col-lg-5 col-md-offset-3">
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button><?php echo $this->session->flashdata('success') ?>
						</div>
						</div>
					</div>
					</center>
			<?php
				}
			?>
			<div class="jumbotron">
				<h3>Cari Siswa</h3><br/><br/>
				<?php 		
					$form = array(
						'method' => 'get',
						'class' => 'form-horizontal'
					);
					
					echo form_open('nilai/cari_siswa', $form);
				?>
				
				<fieldset>
					<div class="form-group">
					  <label for="inputEmail" class="col-lg-2 control-label">NISN Siswa</label>
					  <div class="col-lg-4">
						<input type="text" name="nisn" class="form-control" id="nisn" placeholder="Masukkan NISN" required="required"><br/>
						<button type="submit" name="form_nisn" class="btn btn-primary">Submit</button>
					  </div>
					</div>
				</fieldset>
				<?php echo form_close(); ?>
				<br/><br/>
				<?php 		
					$form = array(
						'method' => 'get',
						'class' => 'form-horizontal'
					);
					
					echo form_open('nilai/cari_siswa', $form);
				?>
				<fieldset>
					<div class="form-group">
					  <label for="inputEmail" class="col-lg-2 control-label">Nama Siswa</label>
					  <div class="col-lg-4">
						<input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama" required="required"><br/>
						<button type="submit" name="form-nama" class="btn btn-primary">Submit</button>
					  </div>
					</div>
				</fieldset>	
				<?php echo form_close(); ?>
				
				<?php if(!empty($nisn) || !empty($nama)) {
				?>
				<hr/>
				<b>Hasil Pencarian:</b><br/><br/>
				<table class="table table-striped" >
				<tr>
					<td><b>No</b></td>
					<td><b>No Induk Siswa</b></td>
					<td><b>Nama Siswa</b></td>
					<td><b>Alamat Siswa</b></td>
					<td><b>No HP Ortu</b></td>
					<td><b>Aksi</b></td>
				</tr>
				<?php
					$no = 1;
					foreach($siswa as $siswaa) {
						$idsiswa = $siswaa->id_siswa;
						$induk = $siswaa->no_induk_siswa;
						$nama = $siswaa->nama_siswa;
						$alamat = $siswaa->alamat_siswa;
						$hp = $siswaa->no_hp_ortu;
						
				?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $induk ?></td>
							<td><?php echo $nama ?></td>
							<td><?php echo $alamat ?></td>
							<td><?php echo $hp ?></td>
							<td>
								<a class="btn btn-success" href="<?php echo base_url(); ?>nilai/lihat_grafik_nilai_siswa/<?php echo $idsiswa ?>">Lihat Nilai</a><br/><br/>
							</td>
						</tr>
				<?php
						$no++;
					}
				?>
			</table>
			<?php 
				  }
			?>
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