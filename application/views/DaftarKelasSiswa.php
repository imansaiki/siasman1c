<body>
	<!-- Form tambah siswa -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header">Daftar Siswa</h1>
				</div>
			</div>
			<div class="form-group">
				Pilih Kelas :
				<div class="btn-group">
					<div class="btn-group">
						<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">X <span class="caret"></span></button>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo base_url('siswa/daftarSiswa/XA1');?>">X IPA 1</a></li>
							<li><a href="<?php echo base_url('siswa/daftarSiswa/XA2');?>">X IPA 2</a></li>
							<li><a href="<?php echo base_url('siswa/daftarSiswa/XA3');?>">X IPA 3</a></li>
							<li><a href="<?php echo base_url('siswa/daftarSiswa/XA4');?>">X IPA 4</a></li>
							<li><a href="<?php echo base_url('siswa/daftarSiswa/XA5');?>">X IPA 5</a></li>
							<li><a href="<?php echo base_url('siswa/daftarSiswa/XS1');?>">X IPS 1</a></li>
							<li><a href="<?php echo base_url('siswa/daftarSiswa/XS2');?>">X IPS 2</a></li>
							<li><a href="<?php echo base_url('siswa/daftarSiswa/XS3');?>">X IPS 3</a></li>
							<li><a href="<?php echo base_url('siswa/daftarSiswa/XS4');?>">X IPS 4</a></li>
						</ul>
					</div>
					<div class="btn-group">
						<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">XI <span class="caret"></span></button>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo base_url('siswa/daftarSiswa/XIA1');?>">XI IPA 1</a></li>
							<li><a href="<?php echo base_url('siswa/daftarSiswa/XIA2');?>">XI IPA 2</a></li>
							<li><a href="<?php echo base_url('siswa/daftarSiswa/XIA3');?>">XI IPA 3</a></li>
							<li><a href="<?php echo base_url('siswa/daftarSiswa/XIA4');?>">XI IPA 4</a></li>
							<li><a href="<?php echo base_url('siswa/daftarSiswa/XIA5');?>">XI IPA 5</a></li>
							<li><a href="<?php echo base_url('siswa/daftarSiswa/XIS1');?>">XI IPS 1</a></li>
							<li><a href="<?php echo base_url('siswa/daftarSiswa/XIS2');?>">XI IPS 2</a></li>
							<li><a href="<?php echo base_url('siswa/daftarSiswa/XIS3');?>">XI IPS 3</a></li>
							<li><a href="<?php echo base_url('siswa/daftarSiswa/XIS4');?>">XI IPS 4</a></li>
						</ul>
					</div>
					<div class="btn-group">
						<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">XII <span class="caret"></span></button>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo base_url('siswa/daftarSiswa/XIIA1');?>">XII IPA 1</a></li>
							<li><a href="<?php echo base_url('siswa/daftarSiswa/XIIA2');?>">XII IPA 2</a></li>
							<li><a href="<?php echo base_url('siswa/daftarSiswa/XIIA3');?>">XII IPA 3</a></li>
							<li><a href="<?php echo base_url('siswa/daftarSiswa/XIIA4');?>">XII IPA 4</a></li>
							<li><a href="<?php echo base_url('siswa/daftarSiswa/XIIA5');?>">XII IPA 5</a></li>
							<li><a href="<?php echo base_url('siswa/daftarSiswa/XIIS1');?>">XII IPS 1</a></li>
							<li><a href="<?php echo base_url('siswa/daftarSiswa/XIIS2');?>">XII IPS 2</a></li>
							<li><a href="<?php echo base_url('siswa/daftarSiswa/XIIS3');?>">XII IPS 3</a></li>
							<li><a href="<?php echo base_url('siswa/daftarSiswa/XIIS4');?>">XII IPS 4</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php if (isset($segment)){
echo $segment;
}?>