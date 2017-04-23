<body>
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header">Jadwal Pelajaran</h1>
				</div>
			</div>
			<?php 
				if($this->session->flashdata('message')){
					echo $this->session->flashdata('message');
				}
			?>
			<table id="jadwal" class="table">
				<thead>
					<th>Jam</th>
					<th>Senin</th>
					<th>Selasa</th>
					<th>Rabu</th>
					<th>Kamis</th>
					<th>Jumat</th>	
				</thead>
					<?php 
					for ($i=1;$i<=8;$i++){?>
					<tr>
						<td><?php echo $i;?></td>
						<?php 
						foreach ($hari as $key=>$n){?>
						<td><span id="<?php echo $i.$n?>"></span></td>
						<?php }?>
					</tr>
					<?php }?>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
</body>
<input type="hidden" id="kelas" value="<?php echo $kelas->nama_kelas;?>">
<script>
$(document).ready(function(){
	var kelas=$("#kelas").val();
	
	$.ajax({
	  	  url: "<?php echo base_url('jadwal/getJadwalKelas/')?>"+kelas,
	  	  success: function( result ) {
	  		 response = jQuery.parseJSON(result);
	  		 $.each(response, function( index, value ) {
	  	  		
	  		  $("#"+value.jam+value.hari).text(value.kode_guru);
	  		  
	  		  
	  		});
	  	  }
	  	});
});
</script>