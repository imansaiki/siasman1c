<body>
<!-- Form tambah akun -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header">Edit Ampuhan</h1>
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
			<div class="row">
				<div class="col-md-1"><strong>Nama</div>
				<div class="col-md-2">: <?php echo $data_guru->nama;?></div></strong>
			</div>
			<div class="row">
				<div class="col-md-1"><strong>NIP</div>
				<div class="col-md-2">: <?php echo $data_guru->nip;?></div></strong>
			</div>
			
			<table class="table">
				<thead>
					<th>NO</th>
					<th>Kode</th>
					<th>Mata Pelajaran</th>
					<th>Menu</th>
				</thead>
				<tbody>
				<form>
				<input type="hidden" name="url" value="<?php echo current_url();?>">
				<?php 
				foreach ($data_ampuhan as $key=>$row){?>
					<tr>
						
						<td class="nomer"></td>
						<td><?php echo $row->kode_guru;?></td>
						<td><?php echo $row->nama_pelajaran;?></td>
						<td><button type="button" class="btn btn-danger delete"   data-kode="<?php echo $row->kode_guru;?>">Hapus</button></td>
					</tr>
				<?php }?>
					<tr>
						<td class="nomer"></td>
						<td><input class="form-control" type="text" name="kodeguru"></td>
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
						<input type="hidden" name="submit" value="submit">
						<input type="hidden" name="nip" value="<?php echo $data_guru->nip;?>">
						<td><button class="btn btn-primary" formmethod="post" formaction="<?php echo base_url('guru/editampuhan/'.$data_guru->nip)?>"> Tambah </button></td>
					</tr>
				</form>
				</tbody>
			</table>
		</div>
	</div>
</body>
<script>
function nomer(){
	var num=0;
	$('tr').each(function(){
		$('.nomer',this).text(num);
		num+=1;
	});
}
$(document).ready(function(){
	nomer();
	$('.delete').click(function(){
		var kode = $(this).data('kode');
		var row = $(this).closest('tr');
		$.ajax({
	    	  url: "<?php echo base_url('guru/deleteampuhan')?>",
	    	  method: "POST",
	    	  data: { kode : kode },
	    	  success: function( result ) {
	    		  $('span','#message').html(result);
	    		  row.remove();
	    		  nomer();
	    	  }
	    	});
	});
});
</script>
