<body>
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header">Tambah Nilai</h1>
				</div>
			</div>
			<?php 
				if($this->session->flashdata('message')){
					echo $this->session->flashdata('message');
				}
			?>
			<!-- Single button -->
			<form method="post" action="<?php echo base_url('kelas/naikkelas');?>">
				<table class="table">
					<thead>
						<tr>
							<th>NO</th>
							<th>nis</th>
							<th>nama</th>
							<th>status</th>
							<th>kelas</th>
							<th>pilihan</th>
						</tr>
					</thead>
					<tfoot>
			<?php 
			$daftar[1]=$satu;
			$daftar[2]=$dua;
			$daftar[3]=$tiga;
			$daftar[4]=array('lulus');
			if(isset($daftar_siswa)){
				foreach ($daftar_siswa as $key=>$n){
					$no=1+$key;?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $n['nis'];?></td>
						<td><?php echo $n['nama'];?></td>
					<?php 
					if ($n['eval']>=5){?>
						<td> Tinggal Kelas </td>
						<td><select name="kelas[]" class="form-control">
							<?php 
							foreach ($daftar[intval($detail_kelas->tingkat)] as $row){?>
							<option value="<?php echo $row->nama_kelas;?>"><?php echo $row->nama_kelas;?></option>
							<?php } ?>
							</select>
						</td>
						<td>
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Cek Kelas <span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a>Total : <span id="kelascek"></span></a></li>
    								<li><a>Pria : <span id="pria"></span></a></li>
    								<li><a>Wanita : <span id="wanita"></span></a></li>
								</ul>
							</div>
						</td>
					<?php 
					}else {?>
						<td> Naik Kelas </td>
						<td><select name="kelas[]" class="form-control">
							<?php 
							foreach ($daftar[intval($detail_kelas->tingkat)+1] as $row){?>
							<option value="<?php echo $row->nama_kelas;?>"><?php echo $row->nama_kelas;?></option>';
							<?php } ?>
							</select>
						</td>	
					<?php } ?>
					</tr>
				<?php }}?>
					</tfoot>
				</table>
			</form>
		</div>
	</div>
</body>
<script>
$("button").click(function(){
    var row = $(this).closest("tr");
    var select = row.find("select");
    var kelas = select.val();
    $.ajax({
    	  url: "<?php echo base_url('kelas/getisikelas')?>",
    	  method: "POST",
    	  data: { id : kelas },
    	  success: function( result ) {
    		  response = jQuery.parseJSON(result);
    		  $("span#kelascek").text( response.jumlah);
    		  $("span#pria").text( response.pria);
    		  $("span#wanita").text( response.wanita);
    	  }
    	});
});
</script>