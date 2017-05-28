<body>
<!-- Tabel akun -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header" >Edit Jadwal Pelajaran</h1>
				</div>
			</div>
			<div id="message">
				<span></span>
			<?php 
				$message=$this->session->flashdata('message');
				if (!empty($message)){
					echo $message;
				}
			?>
			</div>
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<?php 
			foreach ($daftar_hari as $panel){
				$b=8;
				if($panel=='Jumat'){
					$b=6;
				}
			?>
			
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="heading<?php echo $panel;?>">
					<h4 class="panel-title">
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $panel;?>" aria-expanded="true" aria-controls="collapse<?php echo $panel;?>">
							<?php echo $panel;?>
        				</a>
        			</h4>
        			</div>
        			<div id="collapse<?php echo $panel;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        				<!-- panel body -->
        				<div class="panel-body">
        					<!-- tab nav -->
        					<ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#satu<?php echo $panel;?>">X</a></li>
    							<li><a data-toggle="tab" href="#dua<?php echo $panel;?>">XI</a></li>
    							<li><a data-toggle="tab" href="#tiga<?php echo $panel;?>">XII</a></li>
							</ul>
							<!-- /tab nav -->
							<!-- tab content -->
							<div class="tab-content">
							<div id="satu<?php echo $panel;?>" class="tab-pane fade in active">
							<table id="1" class="table">
								<thead>
									<th>Jam</th>
									<?php 
									foreach ($satu as $key=>$n){?>
									<th><?php echo $n->nama_kelas;?></th>
									<?php }?>
								</thead>
								<tbody>
								<?php 
									for ($i=1;$i<=$b;$i++){ ?>
									<tr>
										<td><?php echo $i;?></td>
										<?php 
										foreach ($satu as $key=>$n){?>
										<td>
											<select class="form-control" id="<?php echo $i.$panel.$n->nama_kelas;?>" data-jam="<?php echo $i;?>" data-kelas="<?php echo $n->nama_kelas;;?>" data-hari="<?php echo $panel;?>">
												
											<?php
											echo $kode_guru;
											?>
											</select>
										</td>
										<?php }?>
										
									</tr>
								<?php 	
									} ?>
								</tbody>
							</table>
							</div>
							
							<div id="dua<?php echo $panel;?>" class="tab-pane fade in">
							<table id="2" class="table">
								<thead>
									<th>Jam</th>
									<?php 
									foreach ($dua as $key=>$n){?>
									<th><?php echo $n->nama_kelas;?></th>
									<?php }?>
								</thead>
								<tbody>
								<?php 
									for ($i=1;$i<=$b;$i++){ ?>
									<tr>
										<td><?php echo $i;?></td>
										<?php 
										foreach ($dua as $key=>$n){?>
										<td>
											<select class="form-control" id="<?php echo $i.$panel.$n->nama_kelas;?>" data-jam="<?php echo $i;?>" data-kelas="<?php echo $n->nama_kelas;?>" data-hari="<?php echo $panel;?>">
												
											<?php
											echo $kode_guru;
											?>
											</select>
										</td>
										<?php }?>
										
									</tr>
								<?php 	
									} ?>
								</tbody>
							</table>
							</div>
							
							<div id="tiga<?php echo $panel;?>" class="tab-pane fade in">
							<table id="3" class="table">
								<thead>
									<th>Jam</th>
									<?php 
									foreach ($tiga as $key=>$n){?>
									<th><?php echo $n->nama_kelas;?></th>
									<?php }?>
								</thead>
								<tbody>
								<?php 
									for ($i=1;$i<=$b;$i++){ ?>
									<tr>
										<td><?php echo $i;?></td>
										<?php 
										foreach ($tiga as $key=>$n){?>
										<td>
											<select class="form-control" id="<?php echo $i.$panel.$n->nama_kelas;?>" data-jam="<?php echo $i;?>" data-kelas="<?php echo $n->nama_kelas;?>" data-hari="<?php echo $panel;?>">
												
											<?php
											echo $kode_guru;
											?>
											</select>
										</td>
										<?php }?>
										
									</tr>
								<?php 	
									} ?>
								</tbody>
							</table>
							</div>
							</div>
							<!-- /tab content -->
        				</div>
        				<!-- /panel body -->
        			</div>
        		</div>
        	<?php }?>
        		
			</div>
		</div>
	</div>
</body>
<script>
function initJadwal(){
	$("select").val("");
	$.ajax({
  	  url: "<?php echo base_url('jadwal/refreshJadwal')?>",
  	  success: function( result ) {
  		 response = jQuery.parseJSON(result);
  		 $.each(response, function( index, value ) {
  	  		
  		  $("#"+value.jam+value.hari+value.nama_kelas).val(value.kode_guru);
  		  
  		});
  	  }
  	});
};

$(document).ready(function(){

	initJadwal();
	$( "select" ).change(function() {
		$('select').attr('disabled', true);
		var bomb = setTimeout(function(){
			 $('select').attr('disabled',false);
			 alert('Terjadi kesalahan, Coba Beberapa saat lagi atau hubungi admin');
		}, 3000);
		var kelas= $(this).data("kelas");
		var jam= $(this).data("jam");
		var hari= $(this).data("hari");
		var kode= $(this).val();
		$.ajax({
	    	  url: "<?php echo base_url('jadwal/updateJadwal')?>",
	    	  method: "POST",
	    	  data: { kelas: kelas, jam: jam, hari: hari,kode: kode },
	    	  success: function( result ) {
	    		  initJadwal();
	    		  $("span","#message").html(result);
	    		  $('select').attr('disabled', false);
	    		  clearTimeout(bomb);
	    		  
	    	  }
	    	});
		});
});

</script>