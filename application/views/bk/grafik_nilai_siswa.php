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
	<script src="<?php echo base_url() ?>public/js/highcharts.js"></script>
	<script src="<?php echo base_url() ?>public/js/modules/exporting.js"></script>
	
	<script>
		//script untuk membuat grafik, perhatikan setiap komentar agar paham
		$(function () {
			var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'grafiknilai', //letakan grafik di div id grafiknilai
				//Type grafik, anda bisa ganti menjadi area,bar,column dan bar
						type: 'line',  
						marginRight: 130,
						marginBottom: 25
					},
					title: {
						text: 'Grafik Nilai Siswa',
						x: -20 //center
					},
					subtitle: {
						text: 
						<?php 
							foreach($siswa as $murid) {
								$nisn = $murid->no_induk_siswa;
								$namasiswa = $murid->nama_siswa; 
							}
						?>
						'<?php echo $namasiswa ?> - <?php echo $nisn ?>',
						x: -20
					},
					xAxis: { //X axis menampilkan data semester 
						categories: ['Semester 1 (Kelas X)', 'Semester 2 (Kelas X)', 'Semester 3 (Kelas XI)','Semester 4 (Kelas XI)','Semester 5 (Kelas XII)']
					},
					yAxis: {
						title: {  //label yAxis
							text: 'Nilai Siswa'
						},
						plotLines: [{
							value: 0,
							width: 1,
							color: '#808080' //warna dari grafik line
						}]
					},
					tooltip: { 
			  //fungsi tooltip, ini opsional, kegunaan dari fungsi ini 
			  //akan menampikan data di titik tertentu di grafik saat mouseover
						formatter: function() {
								return '<b>'+ this.series.name +'</b><br/>'+
								this.x +': '+ this.y ;
						}
					},
					legend: {
						layout: 'vertical',
						align: 'right',
						verticalAlign: 'top',
						x: -10,
						y: 100,
						borderWidth: 0
					},
		  //series adalah data yang akan dibuatkan grafiknya,
			 
					series: [
					<?php 
						foreach($mapel as $mpl) {
							$idmpl = $mpl->id_mapel;
							$namampl = $mpl->nama_mapel;
							
					?>
							{ name: '<?php echo $namampl ?>',
							  data: [
					<?php 
								foreach($nilai as $biji) {
									$idmapel = $biji->id_mapel;
									$bijine = $biji->nilai;
									
									if($idmapel == $idmpl) {
					?>
										<?php echo $bijine ?>,
					<?php
									}
								}
					?>
							  ]
							},
					<?php
						}
					?>
					]
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
			  <li><a href="<?php echo base_url() ?>simn/panel_bk">Home</a></li>
			  <li><a href="<?php echo base_url() ?>simn/logout">Logout</a></li>
			</ul>
		  </div>
		</div>
		
		<div class="container">
			<div class="jumbotron">
				<h3>Grafik Nilai Siswa</h3><br/><br/>
				<div id="grafiknilai" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
				<br/><br/>
				<a href="<?php echo base_url() ?>sms/kirim_sms/<?php echo $id_siswa ?>" class="btn btn-primary">Kirim SMS Ke Ortu Siswa</a>&nbsp;&nbsp;<b>(* Gunakan Untuk Mengirim SMS Perkembangan Nilai Siswa)</b>
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