<body>
<!-- Form tambah siswa -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header">Tambah Siswa</h1>
				</div>
			</div>
			<?php 
				if($this->session->flashdata('message')){
					echo $this->session->flashdata('message');
				}
			?>
			<form class="form-horizontal" action="<?php echo base_url('Siswa/tambahSiswa');?>" method="post">
				<div class="form-group">
					<label class="control-label col-md-1" for="nis">NIS</label>
					<div class="col-md-11" >
						<input <?php if ($this->session->flashdata('nis'))?> class="form-control" placeholder="nis" value="<?php { echo $this->session->flashdata('nis'); }?>" placeholder="nis" name="nis" id="nis" type="text" />
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
					<label class="control-label col-md-1" for="stmasuk">Status masuk</label>
					<div class="col-md-2" >
						<div class="radio">
  							<label><input type="radio" id="stbaru" name="stmasuk" value="baru">Baru</label>
						</div>
						<div class="radio">
  							<label><input type="radio" id="stpindah" name="stmasuk" value="pindah">Pindah</label>
						</div>
					</div>
					<div class="col-md-2" >
						<label class="control-label" for="kelas">Kelas</label>
						<div>
							<select name="kelas" id="kelas" class="form-control" style="display: none">
									<option selected> </option>
								<optgroup id="kX" label="X">
							<?php 
							foreach ($satu as $row){
								echo '<option value="'.$row->nama_kelas.'">'.$row->nama_kelas.'</option>' ;
							}
							?>
								</optgroup>
								<optgroup id="kXI" label="XI">
							<?php 
							foreach ($dua as $row){
								echo '<option value="'.$row->nama_kelas.'">'.$row->nama_kelas.'</option>' ;
							}
							?>
								</optgroup>
								<optgroup id="kXII" label="XII">
							<?php 
							foreach ($tiga as $row){
								echo '<option value="'.$row->nama_kelas.'">'.$row->nama_kelas.'</option>' ;
							}
							?>
								</optgroup>
							</select>
							<button type="button" id="cekkelas" style="display: none">cek kelas</button>
						</div>
					</div>
					<div class="col-md-2" >
						<label class="control-label" for="kelas">Kelas</label>
						<input type="hidden" name="semester" value="1" id="semesteralt">
						<select class="form-control" name="semester" id="semester" style="display: none">
							<option value="1">1</option>
							<option value="2">2</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="tambahan">Data tambahan</label>
					<div class="col-md-11" >
						<div class="checkbox">
							<label data-toggle="collapse" data-target="#collapseExample">
								<input type="checkbox"/> Gunakan Data Tambahan
							</label>
						</div>
					</div>
				</div>
				<!-- Form tambahan -->
				<div class="collapse" id="collapseExample">
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
						<input <?php if ($this->session->flashdata('thn_masuk'))?> class="form-control" value="<?php { echo $this->session->flashdata('thn_masuk'); }?>" placeholder="Tahun Masuk" name="thnmasuk" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="kwnegara">Status Warga Negara</label>
					<div class="col-md-11" >
						<div class="radio">
  							<label><input type="radio" name="kwnegara" value="WNI">WNI</label>
						</div>
						<div class="radio">
  							<label><input type="radio" name="kwnegara" value="WNA">WNA</label>
						</div>
					</div>
				</div>
				</div>
				<!-- /Form tambahan -->
				<div class="form-group">
					<div class="col-md-2 col-md-offset-1">
						<input type="hidden" value="submit" name="submit">
						<button type="submit" id="submit" class="form-control btn-primary"><i class="fa fa-plus "></i> Tambah Siswa</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
<script>
$('#submit').on('click', function () {
    $(this).button('loading')
   
  })
</script>
<script>
$(document).ready(function(){
    $("#stbaru").click(function(){
    	$("#cekkelas").show("slow");
    	$("#kelas").show("slow");
    	$("#semester").show("slow");
    	$("#semester").val("1");
    	$('#semester').attr('disabled', true);
    	$('#semesteralt').attr('disabled', false);
    	$('#kXI').hide();
    	$('#kXII').hide();
    });
    $("#stpindah").click(function(){
    	$("#cekkelas").show("slow");
    	$("#kelas").show("slow");
    	$("#semester").show("slow");
    	$('#semester').attr('disabled', false);
    	$('#semesteralt').attr('disabled', true);
    	$('#kXI').show();
    	$('#kXII').show();
    });
    $("#cekkelas").click(function(){
        var kelas = $("#kelas").val();
        $.ajax({
        	  url: "<?php echo base_url('kelas/getisikelas')?>",
        	  method: "POST",
        	  data: { id : kelas },
        	  success: function( result ) {
        	    $( "body" ).html( "<strong>" + result + "</strong> degrees" );
        	  }
        	});
    });
});
</script>
