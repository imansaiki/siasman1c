<body>
<!-- Form tambah siswa -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header">Edit Siswa</h1>
				</div>
			</div>
			<?php 
				if($this->session->flashdata('message')){
					echo $this->session->flashdata('message');
				}
			?>
			<?php 
			if(isset($data_siswa)){?>
			<!-- Single button -->
			<form class="form-horizontal" action="<?php echo base_url('siswa/editsiswa/'.$data_siswa->nis);?>" method="post">
				<div class="form-group">
					<label class="control-label col-md-1" for="nis">NIS</label>
					<div class="col-md-11" >
						<input  class="form-control" placeholder="nis" value="<?php echo $data_siswa->nis;?>" placeholder="nis" name="nis" id="nis" type="text" readonly />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="nama">Nama</label>
					<div class="col-md-11" >
						<input class="form-control" value="<?php echo $data_siswa->nama;?>" placeholder="nama"  name="nama" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="tmptlahir">Tempat Lahir</label>
					<div class="col-md-11" >
						<input class="form-control" value="<?php echo $data_siswa->tempat_lahir;?>" placeholder="Tempat Lahir"  name="tmptlahir" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="tgllahir">Tanggal Lahir</label>
					<div class="col-md-11" >
						<input class="form-control" value="<?php echo $data_siswa->tanggal_lahir;?>" placeholder="Tanggal Lahir"  name="tgllahir" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="jkelamin">Jenis Kelamin</label>
					<div class="col-md-11" >
						<div class="radio">
  							<label><input <?php if($data_siswa->kelamin == 'Pria'){ echo 'checked="checked"';}?> type="radio" name="jkelamin" value="Pria">Pria</label>
						</div>
						<div class="radio">
  							<label><input <?php if($data_siswa->kelamin == 'Wanita'){ echo 'checked="checked"';}?> type="radio" name="jkelamin" value="Wanita">Wanita</label>
						</div>
					</div>
				</div>
			
				<!-- Form tambahan -->
				
				<div class="form-group">
					<label class="control-label col-md-1" for="alamat">Alamat</label>
					<div class="col-md-11" >
						<input class="form-control" value="<?php echo $data_siswa->alamat;?>" placeholder="Alamat"  name="alamat" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="agama">Agama</label>
					<div class="col-md-11" >
						<input class="form-control" value="<?php echo $data_siswa->agama;?>" placeholder="Agama"  name="agama" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="nayah">Nama Ayah</label>
					<div class="col-md-11" >
						<input class="form-control" value="<?php echo $data_siswa->nama_ayah;?>" placeholder="Nama Ayah"  name="nayah" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="nibu">Nama Ibu</label>
					<div class="col-md-11" >
						<input class="form-control" value="<?php echo $data_siswa->nama_ibu;?>" placeholder="Nama Ibu"  name="nibu" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="pdayah">Pendidikan Ayah</label>
					<div class="col-md-11" >
						<input class="form-control" value="<?php echo $data_siswa->pendidikan_ayah;?>" placeholder="Pendidikan Ayah"  name="pdayah" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="pdibu">Pendidikan Ibu</label>
					<div class="col-md-11" >
						<input class="form-control" value="<?php echo $data_siswa->pendidikan_ibu;?>" placeholder="Pendidikan Ibu"  name="pdibu" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="pkayah">Pekerjaan Ayah</label>
					<div class="col-md-11" >
						<input class="form-control" value="<?php echo $data_siswa->pekerjaan_ayah;?>" placeholder="Pekerjaan Ayah"  name="pkayah" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="pkibu">Pekerjaan Ibu</label>
					<div class="col-md-11" >
						<input class="form-control" value="<?php echo $data_siswa->pekerjaan_ibu;?>" placeholder="Pekerjaan Ibu"  name="pkibu" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="asekolah">Asal Sekolah</label>
					<div class="col-md-11" >
						<input class="form-control" value="<?php echo $data_siswa->asal_sekolah;?>" placeholder="Asal Sekolah"  name="asekolah" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="kwnegara">Status Warga Negara</label>
					<div class="col-md-11" >
						<div class="radio">
  							<label><input <?php if($data_siswa->kewarganegaraan == 'WNI'){ echo 'checked="checked"';}?> type="radio" name="kwnegara" value="WNI">WNI</label>
						</div>
						<div class="radio">
  							<label><input <?php if($data_siswa->kewarganegaraan == 'WNA'){ echo 'checked="checked"';}?> type="radio" name="kwnegara" value="WNA">WNA</label>
						</div>
					</div>
				</div>
				<?php }?>
				<!-- /Form tambahan -->
				<div class="form-group">
					<div class="col-md-2 col-md-offset-1">
						<input type="hidden" value="submit" name="submit">
						<button type="submit" id="submit" class="form-control btn-primary"><i class="fa fa-plus "></i> Edit Siswa</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>