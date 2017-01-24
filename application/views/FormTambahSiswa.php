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
			<form class="form-horizontal" action="<?php echo base_url('siswa/tambahsiswa');?>" method="post">
				<div class="form-group">
					<label class="control-label col-md-1" for="nis">NIS</label>
					<div class="col-md-11" >
						<input class="form-control" placeholder="nis"  name="nis" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="nama">Nama</label>
					<div class="col-md-11" >
						<input class="form-control" placeholder="nama"  name="nama" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="tmptlahir">Tempat Lahir</label>
					<div class="col-md-11" >
						<input class="form-control" placeholder="Tempat Lahir"  name="tmptlahir" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="tgllahir">Tanggal Lahir</label>
					<div class="col-md-11" >
						<input class="form-control" placeholder="Tanggal Lahir"  name="tgllahir" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="jkelamin">Jenis Kelamin</label>
					<div class="col-md-11" >
						<div class="radio">
  							<label><input type="radio" name="jkelamin" value="Pria">Pria</label>
						</div>
						<div class="radio">
  							<label><input type="radio" name="jkelamin" value="Wanita">Wanita</label>
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
					<label class="control-label col-md-1" for="nayah">Nama Ayah</label>
					<div class="col-md-11" >
						<input class="form-control" placeholder="Nama Ayah"  name="nayah" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="nibu">Nama Ibu</label>
					<div class="col-md-11" >
						<input class="form-control" placeholder="Nama Ibu"  name="nibu" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="pdayah">Pendidikan Ayah</label>
					<div class="col-md-11" >
						<input class="form-control" placeholder="Pendidikan Ayah"  name="pdayah" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="pdibu">Pendidikan Ibu</label>
					<div class="col-md-11" >
						<input class="form-control" placeholder="Pendidikan Ibu"  name="pdibu" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="pkayah">Pekerjaan Ayah</label>
					<div class="col-md-11" >
						<input class="form-control" placeholder="Pekerjaan Ayah"  name="pkayah" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="pkibu">Pekerjaan Ibu</label>
					<div class="col-md-11" >
						<input class="form-control" placeholder="Pekerjaan Ibu"  name="pkibu" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="asekolah">Asal Sekolah</label>
					<div class="col-md-11" >
						<input class="form-control" placeholder="Asal Sekolah"  name="asekolah" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="thnmasuk">Tahun Masuk</label>
					<div class="col-md-11" >
						<input class="form-control" placeholder="Tahun Masuk"  name="thnmasuk" type="text" />
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
					<div class="col-md-2 col-md-offset-1">
						<input type="hidden" value="submit" name="submit">
						<input type="submit" value="kirim" class="form-control btn-primary">
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
