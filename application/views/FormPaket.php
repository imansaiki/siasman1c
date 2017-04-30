<body>
<!-- Form tambah akun -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header">Edit Paket</h1>
				</div>
			</div>
			<div id="message" >
				<span>
			<?php 
				if($this->session->flashdata('message')){
					echo $this->session->flashdata('message');
				}
				$i=0;
			?>
				</span>
			</div>
			
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#satu">X</a></li>
    			<li><a data-toggle="tab" href="#dua">XI</a></li>
    			<li><a data-toggle="tab" href="#tiga">XII</a></li>
			</ul>
			<div class="tab-content">
			<div id="satu" class="tab-pane fade in active">
			<div class="form-group">
				<label class="control-label col-md-1" for="tk1">Jurusan</label>
					<div class="col-md-2" >
						<select class="form-control" id="tk1">
							<option value="XIPA">IPA</option>
							<option value="XIPS">IPS</option>
							<option value="XBHS">BHS</option>
						</select>
					</div>
			</div>
			<table class="table" id="XIPA">
				<thead>
					<th>NO</th>
					<th>Mata Pelajaran</th>
					<th>Total Jam</th>
					<th>Menu</th>
				</thead>
				<tbody>
				<form method="post" action="<?php echo base_url('jadwal/paket');?>">
				<input type="hidden" name="url" value="<?php echo current_url();?>">
				<?php 
				foreach ($X_IPA as $key=>$row){?>
					<tr>
						
						<td class="nomer"></td>
						<td><?php echo $row->nama_pelajaran;?></td>
						<td><?php echo $row->kum_jam;?></td>
						<td><button type="button" class="btn btn-danger delete"   data-mapel="<?php echo $row->id_pelajaran;?>" data-jurusan="<?php echo $row->jurusan;?>" data-tingkat="<?php echo $row->tingkat;?>">Hapus</button></td>
					</tr>
				<?php }?>
					<tr>
						<td class="nomer"></td>
						<td>
							<select class="form-control" name="mapel">
							<?php 
							if (isset($daftar_mapel)){
								foreach ($daftar_mapel as $row){
								echo '<option value="'.$row->id_pelajaran.'">'.$row->nama_pelajaran.'</option>';
								}
							}
							?>
							</select>
						</td>
						<td><input class="form-control" type="text" name="kum"></td>
						<input type="hidden" name="submit" value="submit">
						<input type="hidden" name="tingkat" value="1">
						<input type="hidden" name="jurusan" value="IPA">
						<td><button class="btn btn-primary" > Tambah </button></td>
					</tr>
				</form>
				</tbody>
			</table>
			
			<table class="table" id="XIPS" style="display: none">
				<thead>
					<th>NO</th>
					<th>Mata Pelajaran</th>
					<th>Total Jam</th>
					<th>Menu</th>
				</thead>
				<tbody>
				<form method="post" action="<?php echo base_url('jadwal/paket');?>">
				<input type="hidden" name="url" value="<?php echo current_url();?>">
				<?php 
				foreach ($X_IPS as $key=>$row){?>
					<tr>
						
						<td class="nomer"></td>
						<td><?php echo $row->nama_pelajaran;?></td>
						<td><?php echo $row->kum_jam;?></td>
						<td><button type="button" class="btn btn-danger delete"   data-mapel="<?php echo $row->id_pelajaran;?>" data-jurusan="<?php echo $row->jurusan;?>" data-tingkat="<?php echo $row->tingkat;?>">Hapus</button></td>
					</tr>
				<?php }?>
					<tr>
						<td class="nomer"></td>
						<td>
							<select class="form-control" name="mapel">
							<?php 
							if (isset($daftar_mapel)){
								foreach ($daftar_mapel as $row){
								echo '<option value="'.$row->id_pelajaran.'">'.$row->nama_pelajaran.'</option>';
								}
							}
							?>
							</select>
						</td>
						<td><input class="form-control" type="text" name="kum"></td>
						<input type="hidden" name="submit" value="submit">
						<input type="hidden" name="tingkat" value="1">
						<input type="hidden" name="jurusan" value="IPS">
						<td><button class="btn btn-primary" > Tambah </button></td>
					</tr>
				</form>
				</tbody>
			</table>
			
			<table class="table" id="XBHS" style="display: none">
				<thead>
					<th>NO</th>
					<th>Mata Pelajaran</th>
					<th>Total Jam</th>
					<th>Menu</th>
				</thead>
				<tbody>
				<form method="post" action="<?php echo base_url('jadwal/paket');?>">
				<input type="hidden" name="url" value="<?php echo current_url();?>">
				<?php 
				foreach ($X_BHS as $key=>$row){?>
					<tr>
						
						<td class="nomer"></td>
						<td><?php echo $row->nama_pelajaran;?></td>
						<td><?php echo $row->kum_jam;?></td>
						<td><button type="button" class="btn btn-danger delete"   data-mapel="<?php echo $row->id_pelajaran;?>" data-jurusan="<?php echo $row->jurusan;?>" data-tingkat="<?php echo $row->tingkat;?>">Hapus</button></td>
					</tr>
				<?php }?>
					<tr>
						<td class="nomer"></td>
						<td>
							<select class="form-control" name="mapel">
							<?php 
							if (isset($daftar_mapel)){
								foreach ($daftar_mapel as $row){
								echo '<option value="'.$row->id_pelajaran.'">'.$row->nama_pelajaran.'</option>';
								}
							}
							?>
							</select>
						</td>
						<td><input class="form-control" type="text" name="kum"></td>
						<input type="hidden" name="submit" value="submit">
						<input type="hidden" name="tingkat" value="1">
						<input type="hidden" name="jurusan" value="BHS">
						<td><button class="btn btn-primary" > Tambah </button></td>
					</tr>
				</form>
				</tbody>
			</table>
			
			</div>
			
			<div id="dua" class="tab-pane fade">
			<div class="form-group">
				<label class="control-label col-md-1" for="tk2">Jurusan</label>
					<div class="col-md-2" >
						<select class="form-control" id="tk2">
							<option value="XIIPA">IPA</option>
							<option value="XIIPS">IPS</option>
							<option value="XIBHS">BHS</option>
						</select>
					</div>
			</div>
			<table class="table" id="XIIPA">
				<thead>
					<th>NO</th>
					<th>Mata Pelajaran</th>
					<th>Total Jam</th>
					<th>Menu</th>
				</thead>
				<tbody>
				<form method="post" action="<?php echo base_url('jadwal/paket');?>">
				<input type="hidden" name="url" value="<?php echo current_url();?>">
				<?php 
				foreach ($XI_IPA as $key=>$row){?>
					<tr>
						
						<td class="nomer"></td>
						<td><?php echo $row->nama_pelajaran;?></td>
						<td><?php echo $row->kum_jam;?></td>
						<td><button type="button" class="btn btn-danger delete"   data-mapel="<?php echo $row->id_pelajaran;?>" data-jurusan="<?php echo $row->jurusan;?>" data-tingkat="<?php echo $row->tingkat;?>">Hapus</button></td>
					</tr>
				<?php }?>
					<tr>
						<td class="nomer"></td>
						<td>
							<select class="form-control" name="mapel">
							<?php 
							if (isset($daftar_mapel)){
								foreach ($daftar_mapel as $row){
								echo '<option value="'.$row->id_pelajaran.'">'.$row->nama_pelajaran.'</option>';
								}
							}
							?>
							</select>
						</td>
						<td><input class="form-control" type="text" name="kum"></td>
						<input type="hidden" name="submit" value="submit">
						<input type="hidden" name="tingkat" value="2">
						<input type="hidden" name="jurusan" value="IPA">
						<td><button class="btn btn-primary" > Tambah </button></td>
					</tr>
				</form>
				</tbody>
			</table>
			
			<table class="table" class="XIIPS" style="display: none">
				<thead>
					<th>NO</th>
					<th>Mata Pelajaran</th>
					<th>Total Jam</th>
					<th>Menu</th>
				</thead>
				<tbody>
				<form method="post" action="<?php echo base_url('jadwal/paket');?>">
				<input type="hidden" name="url" value="<?php echo current_url();?>">
				<?php 
				foreach ($XI_IPS as $key=>$row){?>
					<tr>
						
						<td class="nomer"></td>
						<td><?php echo $row->nama_pelajaran;?></td>
						<td><?php echo $row->kum_jam;?></td>
						<td><button type="button" class="btn btn-danger delete"   data-mapel="<?php echo $row->id_pelajaran;?>" data-jurusan="<?php echo $row->jurusan;?>" data-tingkat="<?php echo $row->tingkat;?>">Hapus</button></td>
					</tr>
				<?php }?>
					<tr>
						<td class="nomer"></td>
						<td>
							<select class="form-control" name="mapel">
							<?php 
							if (isset($daftar_mapel)){
								foreach ($daftar_mapel as $row){
								echo '<option value="'.$row->id_pelajaran.'">'.$row->nama_pelajaran.'</option>';
								}
							}
							?>
							</select>
						</td>
						<td><input class="form-control" type="text" name="kum"></td>
						<input type="hidden" name="submit" value="submit">
						<input type="hidden" name="tingkat" value="2">
						<input type="hidden" name="jurusan" value="IPS">
						<td><button class="btn btn-primary" > Tambah </button></td>
					</tr>
				</form>
				</tbody>
			</table>
			
			<table class="table" class="XIBHS" style="display: none">
				<thead>
					<th>NO</th>
					<th>Mata Pelajaran</th>
					<th>Total Jam</th>
					<th>Menu</th>
				</thead>
				<tbody>
				<form method="post" action="<?php echo base_url('jadwal/paket');?>">
				<input type="hidden" name="url" value="<?php echo current_url();?>">
				<?php 
				foreach ($XI_BHS as $key=>$row){?>
					<tr>
						
						<td class="nomer"></td>
						<td><?php echo $row->nama_pelajaran;?></td>
						<td><?php echo $row->kum_jam;?></td>
						<td><button type="button" class="btn btn-danger delete"   data-mapel="<?php echo $row->id_pelajaran;?>" data-jurusan="<?php echo $row->jurusan;?>" data-tingkat="<?php echo $row->tingkat;?>">Hapus</button></td>
					</tr>
				<?php }?>
					<tr>
						<td class="nomer"></td>
						<td>
							<select class="form-control" name="mapel">
							<?php 
							if (isset($daftar_mapel)){
								foreach ($daftar_mapel as $row){
								echo '<option value="'.$row->id_pelajaran.'">'.$row->nama_pelajaran.'</option>';
								}
							}
							?>
							</select>
						</td>
						<td><input class="form-control" type="text" name="kum"></td>
						<input type="hidden" name="submit" value="submit">
						<input type="hidden" name="tingkat" value="2">
						<input type="hidden" name="jurusan" value="BHS">
						<td><button class="btn btn-primary" > Tambah </button></td>
					</tr>
				</form>
				</tbody>
			</table>
			
			</div>
			
			<div id="tiga" class="tab-pane fade">
			<div class="form-group">
				<label class="control-label col-md-1" for="tk3">Jurusan</label>
					<div class="col-md-2" >
						<select class="form-control" id="tk3">
							<option value="XIIIPA">IPA</option>
							<option value="XIIIPS">IPS</option>
							<option value="XIIBHS">BHS</option>
						</select>
					</div>
			</div>
			<table class="table" id="XIIIPA">
				<thead>
					<th>NO</th>
					<th>Mata Pelajaran</th>
					<th>Total Jam</th>
					<th>Menu</th>
				</thead>
				<tbody>
				<form method="post" action="<?php echo base_url('jadwal/paket');?>">
				<input type="hidden" name="url" value="<?php echo current_url();?>">
				<?php 
				foreach ($XII_IPA as $key=>$row){?>
					<tr>
						
						<td class="nomer"></td>
						<td><?php echo $row->nama_pelajaran;?></td>
						<td><?php echo $row->kum_jam;?></td>
						<td><button type="button" class="btn btn-danger delete"   data-mapel="<?php echo $row->id_pelajaran;?>" data-jurusan="<?php echo $row->jurusan;?>" data-tingkat="<?php echo $row->tingkat;?>">Hapus</button></td>
					</tr>
				<?php }?>
					<tr>
						<td class="nomer"></td>
						<td>
							<select class="form-control" name="mapel">
							<?php 
							if (isset($daftar_mapel)){
								foreach ($daftar_mapel as $row){
								echo '<option value="'.$row->id_pelajaran.'">'.$row->nama_pelajaran.'</option>';
								}
							}
							?>
							</select>
						</td>
						<td><input class="form-control" type="text" name="kum"></td>
						<input type="hidden" name="submit" value="submit">
						<input type="hidden" name="tingkat" value="3">
						<input type="hidden" name="jurusan" value="IPA">
						<td><button class="btn btn-primary" > Tambah </button></td>
					</tr>
				</form>
				</tbody>
			</table>
			
			<table class="table" id="XIIIPS" style="display: none">
				<thead>
					<th>NO</th>
					<th>Mata Pelajaran</th>
					<th>Total Jam</th>
					<th>Menu</th>
				</thead>
				<tbody>
				<form method="post" action="<?php echo base_url('jadwal/paket');?>">
				<input type="hidden" name="url" value="<?php echo current_url();?>">
				<?php 
				foreach ($XII_IPS as $key=>$row){?>
					<tr>
						
						<td class="nomer"></td>
						<td><?php echo $row->nama_pelajaran;?></td>
						<td><?php echo $row->kum_jam;?></td>
						<td><button type="button" class="btn btn-danger delete"   data-mapel="<?php echo $row->id_pelajaran;?>" data-jurusan="<?php echo $row->jurusan;?>" data-tingkat="<?php echo $row->tingkat;?>">Hapus</button></td>
					</tr>
				<?php }?>
					<tr>
						<td class="nomer"></td>
						<td>
							<select class="form-control" name="mapel">
							<?php 
							if (isset($daftar_mapel)){
								foreach ($daftar_mapel as $row){
								echo '<option value="'.$row->id_pelajaran.'">'.$row->nama_pelajaran.'</option>';
								}
							}
							?>
							</select>
						</td>
						<td><input class="form-control" type="text" name="kum"></td>
						<input type="hidden" name="submit" value="submit">
						<input type="hidden" name="tingkat" value="3">
						<input type="hidden" name="jurusan" value="IPS">
						<td><button class="btn btn-primary"> Tambah </button></td>
					</tr>
				</form>
				</tbody>
			</table>
			
			<table class="table" id="XIIBHS" style="display: none">
				<thead>
					<th>NO</th>
					<th>Mata Pelajaran</th>
					<th>Total Jam</th>
					<th>Menu</th>
				</thead>
				<tbody>
				<form method="post" action="<?php echo base_url('jadwal/paket');?>">
				<input type="hidden" name="url" value="<?php echo current_url();?>">
				<?php 
				foreach ($XII_BHS as $key=>$row){?>
					<tr>
						
						<td class="nomer"></td>
						<td><?php echo $row->nama_pelajaran;?></td>
						<td><?php echo $row->kum_jam;?></td>
						<td><button type="button" class="btn btn-danger delete"   data-mapel="<?php echo $row->id_pelajaran;?>" data-jurusan="<?php echo $row->jurusan;?>" data-tingkat="<?php echo $row->tingkat;?>">Hapus</button></td>
					</tr>
				<?php }?>
					<tr>
						<td class="nomer"></td>
						<td>
							<select class="form-control" name="mapel">
							<?php 
							if (isset($daftar_mapel)){
								foreach ($daftar_mapel as $row){
								echo '<option value="'.$row->id_pelajaran.'">'.$row->nama_pelajaran.'</option>';
								}
							}
							?>
							</select>
						</td>
						<td><input class="form-control" type="text" name="kum"></td>
						<input type="hidden" name="submit" value="submit">
						<input type="hidden" name="tingkat" value="3">
						<input type="hidden" name="jurusan" value="BHS">
						<td><button class="btn btn-primary" > Tambah </button></td>
					</tr>
				</form>
				</tbody>
			</table>
			
			</div>
			</div>
			
		</div>
	</div>
</body>
<script>
function nomer(){
	$('table').each(function(){
		var num=0;
		$('tr',this).each(function(){
			$('.nomer',this).text(num);
			num+=1;
		});
	});
}
$(document).ready(function(){
	nomer();
	$('.delete').click(function(){
		var mapel = $(this).data('mapel');
		var jurusan = $(this).data('jurusan');
		var tingkat = $(this).data('tingkat');
		var row = $(this).closest('tr');
		$.ajax({
	    	  url: "<?php echo base_url('jadwal/deletepaket')?>",
	    	  method: "POST",
	    	  data: { tingkat : tingkat, mapel: mapel, jurusan: jurusan },
	    	  success: function( result ) {
	    		  $('span','#message').html(result);
	    		  row.remove();
	    		  nomer();
	    	  }
	    	});
	});

	$('.delete').click(function(){
		var kode = $(this).data('kode');
		var kode = $(this).data('kode');
		var kode = $(this).data('kode');
		var row = $(this).closest('tr');
		$.ajax({
	    	  url: "<?php echo base_url('jadwal/deletepaket')?>",
	    	  method: "POST",
	    	  data: { kode : kode },
	    	  success: function( result ) {
	    		  $('span','#message').html(result);
	    		  row.remove();
	    		  nomer();
	    	  }
	    	});
	});
	
	$('#tk1').change(function(){
        $('#XIPA').hide();
        $('#XIPS').hide();
        $('#XBHS').hide();
        $('#' + $(this).val()).show();
    });
	$('#k2').change(function(){
		 $('#XIIPA').hide();
	     $('#XIIPS').hide();
	     $('#XIBHS').hide();
        $('#' + $(this).val()).show();
    });
	$('#tk3').change(function(){
		 $('#XIIIPA').hide();
	     $('#XIIIPS').hide();
	     $('#XIIBHS').hide();
        $('#' + $(this).val()).show();
    });
});
</script>
