<body>
<link href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
<!-- Tabel akun -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header">Daftar Siswa <?php echo $kelas ;?></h1>
				</div>
			</div>
			<?php 
				if($this->session->flashdata('message')){
					echo $this->session->flashdata('message');
				}
			?>
			<form action="">
			<table class="table table-striped table-bordered table-hover" >
				<thead>
					<tr>
						<th class="col-md-1">NO</th>
						<th class="col-md-1">NIS</th>
						<th class="col-md-4">Nama</th>
						<th class="col-md-1">Kelamin</th>
						<th class="col-md-1">Pilihan</th>
						<th class="col-md-1">Kelas</th>
						<th class="col-md-1">menu</th>
						<th class="col-md-2">Status</th>
					</tr>
				</thead>
				<tbody>
				
			<?php 
				foreach ($daftar_siswa as $key=>$row){?>
					<tr>
						<td><?php echo $nis=$key+1;?></td>
						<td><span class="nis"><?php echo $nis=$row->nis;?></span></td>
						<td><?php echo $row->nama;?></td>
						<td><?php echo $row->kelamin;?></td>
						<td>
							<div class="radio">
  								<label><input type="radio" name="status<?php echo $key;?>" class="naik">Naik</label>
							</div>
							<div class="radio">
  								<label><input type="radio" name="status<?php echo $key;?>" class="tinggal" >Tinggal</label>
							</div>
						</td>
						<td>
							<div>
							
							<select class="form-control" id="kelas">
								<option value="0"></option>
								<optgroup id="kelasnaik" label="naik" style="display: none">
									<?php echo $naik;?>
								</optgroup>
								<optgroup id="kelastinggal" label="tinggal" style="display: none">
									<?php echo $tinggal;?>
								</optgroup>
							</select>
							<div class="btn-group">
  								<button type="button" style="display: none"  id="cekkelas" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    								Cek kelas <span class="caret"></span>
  								</button>
  								<ul class="dropdown-menu">
    								<li><a>Total : <span id="kelascek"></span></a></li>
    								<li><a>Pria : <span id="pria"></span></a></li>
    								<li><a>Wanita : <span id="wanita"></span></a></li>
 								 </ul>
							</div>
							
							</div>
						</td>
						<td><button type="button" class="btn btn-primary konfirmasi">Konfirmasi</td>
						<td><span class="status">Status</td>
					</tr>
			<?php }?>
			
				</tbody>
			</table>
			<input type="hidden" value="<?php echo current_url() ;?>" name="url">
			</form>
		</div>
	</div>
</body>
<!-- /.Tabel akun -->


<!-- jQuery -->



<script>


$(document).ready(function(){
	 //iterate through each row in the table
    $('tr').each(function () {
        var nis = $(this).find('.nis').text();
        var status =$(this).find('.status');
        if (nis){
        	$.ajax({
            	  url: "<?php echo base_url('kelas/cekkelasdepan')?>",
            	  method: "POST",
            	  data: { nis : nis },
            	  success: function( result ) {
            			status.html(result);
            	  }
         	});
        }
    });
	//$('#cekkelas').popover(options);
    $(".naik").click(function(){
    	var row = $(this).closest('tr');
    	row.find("#cekkelas").show("slow");
    	row.find("#cekkelas").show("slow");
    	row.find("#kelasnaik").show();
    	row.find("#kelastinggal").hide();
    	row.find('#kelas').val('0');
    	

    });
    $(".tinggal").click(function(){
    	var row = $(this).closest('tr');
    	row.find("#cekkelas").show("slow");
    	row.find("#kelastinggal").show();
    	row.find("#kelasnaik").hide();
    	row.find('#kelas').val('0');
    	

    });
    $(".konfirmasi").click(function(){
    	var row = $(this).closest('tr');
    	var kelas = row.find(':selected').data('kelas');
    	var tingkat = row.find(':selected').data('tingkat');
    	var jurusan = row.find(':selected').data('jurusan');
    	var nis = row.find('.nis').text();
    	if (jurusan){
    		$(this).button('loading');
    		$.ajax({
	        	  url: "<?php echo base_url('kelas/siswanaikkelas')?>",
	        	  method: "POST",
	        	  data: { nis : nis , kelas: kelas , tingkat: tingkat, jurusan:jurusan},
	        	  success: function( result ) {
		        	  row.find('.status').html(result);
	        	  }
	     	});
    		 $(this).button('reset');
 	     	
    	}

    });
    $("#cekkelas").click(function(){
    	var row = $(this).closest('tr');
        var kelas = row.find(':selected').data('kelas')
  		if (kelas){
  	     	$.ajax({
  		        	  url: "<?php echo base_url('kelas/getisikelas')?>",
  		        	  method: "POST",
  		        	  data: { id : kelas },
  		        	  success: function( result ) {
  		        		  response = jQuery.parseJSON(result);
  		        		  $("#kelascek").text( response.jumlah);
  		        		  $("#pria").text( response.pria);
  		        		  $("#wanita").text( response.wanita);
  		        	  }
  		     });
  		}
   
    });
});
</script>

