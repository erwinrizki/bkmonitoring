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
	<script type="text/javascript">
		$(document).ready(function(){
			$("#mapel").change(function(){
			var mapel = $("#mapel").val();
			$.ajax({
				type: "POST",
				url : "<?php echo base_url(); ?>nilai/pilih_kelas",
				data: "mapel=" + mapel,
				beforeSend: function (){
					$("#kelasku").html('Loading...');
				},
				success : function(data) { 
					$("#kelas").html(data);
					$("#kelasku").html('');
				}
			});
			});
		});
	</script>
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
			  <li><a href="<?php echo base_url() ?>simn/panel_guru">Home</a></li>
			  <li><a href="<?php echo base_url() ?>simn/logout">Logout</a></li>
			</ul>
		  </div>
		</div>
		
		<div class="container">
			<div class="jumbotron">
				<h2>Input Nilai Siswa</h2><br/><br/>
				<p>Mata Pelajaran:
				<?php 
					foreach($mapel as $mpl) {
						$idmapel = $mpl->id_mapel;
						$namamapel = $mpl->nama_mapel;
					}
					echo $namamapel;
				?>
				</p>
				<p>
				Kelas:
				<?php 
					foreach($kelas as $kls) {
						$idkelas = $kls->id_kelas;
						$namakelas = $kls->nama_kelas;
					}
					echo $namakelas;
				?>	
				</p>
				<p>Semester: <?php echo $semester; ?></p>
				<br/><br/>
				<?php 		
					$form = array(
						'method' => 'post',
						'class' => 'form-horizontal'
					);
					
					echo form_open('nilai/simpan_nilai', $form);
				?>
				
				<input type="hidden" name="mapel" value="<?php echo $idmapel ?>" />
				<input type="hidden" name="kelas" value="<?php echo $idkelas ?>" />
				<input type="hidden" name="semester" value="<?php echo $semester ?>" />
				<table class="table">
					<thead>
						<tr>
						  <th>#</th>
						  <th>Nama Siswa</th>
						  <th>Nilai</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$no = 1;
							foreach($siswa as $sis) {
								$idsiswa = $sis->id_siswa;
								$namasiswa = $sis->nama_siswa;
								
						?>
								<tr>
								<th><?php echo $no ?></th>
								<th><?php echo $namasiswa ?></th>
								<th>
									<div class="col-lg-3">
										<input type="number" max="100" min="0" class="form-control" name="nilai[<?php echo $idsiswa ?>]" value="0" required="required" />
									</div>
								</th>
								</tr>
						<?php
								$no++;
							}
						?>
					</tbody>
				</table>
				<div class="form-group">
				  <div class="col-lg-10 col-lg-offset-2">
					<button type="submit" class="btn btn-primary">Submit</button>
				  </div>
				</div>
				<?php echo form_close(); ?>
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