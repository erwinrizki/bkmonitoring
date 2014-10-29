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
              <li class="active"><a href="<?php echo $url ?>wonggundul/panel_admin">Home</a></li>
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
			if($this->session->flashdata('success') != '') {
	  ?>
			    <center>
				<div class="row-fluid">
					<div class="span4 offset4 alert alert-success">
						<button type="button" class="close" data-dismiss="alert">×</button><?php echo $this->session->flashdata('success') ?>
					</div>
				</div>
				</center>
	  <?php
			}
	  ?>
	  <?php
			if($this->session->flashdata('update') != '') {
	  ?>
			    <center>
				<div class="row-fluid">
					<div class="span4 offset4 alert alert-success">
						<button type="button" class="close" data-dismiss="alert">×</button><?php echo $this->session->flashdata('update') ?>
					</div>
				</div>
				</center>
	  <?php
			}
	  ?>
	  <?php
			if($this->session->flashdata('hapus') != '') {
	  ?>
			    <center>
				<div class="row-fluid">
					<div class="span4 offset4 alert alert-success">
						<button type="button" class="close" data-dismiss="alert">×</button><?php echo $this->session->flashdata('hapus') ?>
					</div>
				</div>
				</center>
	  <?php
			}
	  ?>
      <div class="hero-unit">
		<h3>Data Mapel</h3><br/><br/>
			<!-- <a href="<?php //echo base_url(); ?>mapel/tambah_mapel"><img src="<?php //echo base_url() ?>public/images/add.png" title="Tambah Mapel" />Tambah Mapel</a><br/><br/> -->
			<a class="btn btn-success" href="<?php echo base_url(); ?>mapel/tambah_mapel"><i class="icon-plus"></i> Tambah Mapel</a><br/><br/>
			<table class="table table-striped" >
				<tr>
					<td><b>No</b></td>
					<td><b>Kode Mapel</b></td>
					<td><b>Nama Mapel</b></td>
					<td><b>KKM Mapel</b></td>
					<td><b>Aksi</b></td>
				</tr>
				<?php
					$no = 1;
					foreach($mapel as $pel) {
						$id = $pel->id_mapel;
						$kode = $pel->kode_mapel;
						$nama = $pel->nama_mapel;
						$kkm = $pel->kkm_mapel;
						
				?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $kode ?></td>
							<td><?php echo $nama ?></td>
							<td><?php echo $kkm ?></td>
							<td>
								<a href="<?php echo $url ?>mapel/edit_mapel/<?php echo $id ?>" title="Edit Mapel"><img src="<?php echo $url ?>public/images/update.png" width="40" height="40" /></a>
								<a href="<?php echo $url ?>mapel/hapus_mapel/<?php echo $id ?>" title="Hapus Mapel" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?');" ><img src="<?php echo $url ?>public/images/delete.png" width="40" height="40" /></a>
							</td>
						</tr>
				<?php
						$no++;
					}
				?>
			</table>
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
