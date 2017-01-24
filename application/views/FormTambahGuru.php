<body>
<!-- Form tambah akun -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header">Tambah Siswa</h1>
				</div>
			</div>
			<?php 
				$message=$this->session->flashdata('message');
				if (!empty($message)){
					echo $message;
				}
			?>
			<form class="form-horizontal" action="<?php echo base_url('guru/tambahguru');?>" method="post">
				<div class="form-group">
					<label class="control-label col-md-1" for="nip">NIP</label>
					<div class="col-md-11" >
						<input class="form-control" placeholder="nip"  name="nip" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="nama">Nama</label>
					<div class="col-md-11" >
						<input class="form-control" placeholder="nama"  name="nama" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="tempatlahir">Tempat Lahir</label>
					<div class="col-md-11" >
						<input class="form-control" placeholder="Tempat Lahir"  name="tempatlahir" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="tanggallahir">Tanggal Lahir</label>
					<div class="col-md-11" >
						<input class="form-control" placeholder="Tanggal Lahir"  name="tanggallahir" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="jeniskelamin">Jenis Kelamin</label>
					<div class="col-md-11" >
						<div class="radio">
  							<label><input type="radio" name="jeniskelamin" value="Pria">Pria</label>
						</div>
						<div class="radio">
  							<label><input type="radio" name="jeniskelamin" value="Wanita">Wanita</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="alamat">Alamat</label>
					<div class="col-md-11" >
						<input class="form-control" placeholder="Alamat"  name="alamat" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="agama">Agama</label>
					<div class="col-md-11" >
						<input class="form-control" placeholder="Agama"  name="agama" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="telepon">Telepon</label>
					<div class="col-md-11" >
						<input class="form-control" placeholder="Telepon"  name="telepon" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="email">Email</label>
					<div class="col-md-11" >
						<input class="form-control" placeholder="Email"  name="email" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="tgktpendidikan">Tingkat Pendidikan</label>
					<div class="col-md-11" >
						<input class="form-control" placeholder="Tingkat Pendidikan"  name="tgkatpendidikan" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="jurpendidikan">Jurusan</label>
					<div class="col-md-11" >
						<input class="form-control" placeholder="Jurusan"  name="jurpendidikan" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="kwnegara">Kewarganegaraan</label>
					<div class="col-md-11" >
						<div class="radio">
  							<label><input type="radio" name="kwnegara" value="WNI">WNI</label>
						</div>
						<div class="radio">
  							<label><input type="radio" name="kwnegara" value="WNA">WNA</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2">
						<input type="submit" value="kirim" class="form-control btn-primary">
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
