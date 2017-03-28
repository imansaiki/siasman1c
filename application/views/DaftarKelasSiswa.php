<body>
	<!-- Form tambah siswa -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header">Daftar Siswa</h1>
				</div>
			</div>
			<?php 
				if($this->session->flashdata('message')){
					echo $this->session->flashdata('message');
				}
			?>
			<div class="form-group">
				Pilih Kelas :
				<div class="btn-group">
					<div class="btn-group">
						<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">X <span class="caret"></span></button>
						<ul class="dropdown-menu" role="menu">
						<?php 
						foreach ($satu as $row){
							echo '<li><a href="'.base_url('siswa/daftarsiswa/'.$row->nama_kelas).'">'.$row->nama_kelas.'</a></li>';
						}
						?>
						</ul>
					</div>
					<div class="btn-group">
						<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">XI <span class="caret"></span></button>
						<ul class="dropdown-menu" role="menu">
						<?php 
						foreach ($dua as $row){
							echo '<li><a href="'.base_url('siswa/daftarsiswa/'.$row->nama_kelas).'">'.$row->nama_kelas.'</a></li>';
						}
						?>
						</ul>
					</div>
					<div class="btn-group">
						<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">XII <span class="caret"></span></button>
						<ul class="dropdown-menu" role="menu">
						<?php 
						foreach ($tiga as $row){
							echo '<li><a href="'.base_url('siswa/daftarsiswa/'.$row->nama_kelas).'">'.$row->nama_kelas.'</a></li>';
						}
						?>
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