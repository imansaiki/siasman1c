<body>
<link href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
<!-- Tabel akun -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header">Daftar Siswa <?php echo $kelas ;?> <?php if (isset($tahun)){echo $tahun;}?></h1>
				</div>
			</div>
			<?php 
				if($this->session->flashdata('message')){
					echo $this->session->flashdata('message');
				}
			?>
			<form action="">
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th class="col-md-1">NO</th>
						<th class="col-md-1">NIS</th>
						<th class="col-md-5">Nama</th>
						<th class="col-md-1">Kelamin</th>
						<th class="col-md-4">Menu</th>
					</tr>
				</thead>
				<tbody>
				
			<?php 
				foreach ($daftar_siswa as $key=>$row){?>
					<tr>
						<td><?php echo $nis=$key+1;?></td>
						<td><?php echo $nis=$row->nis;?></td>
						<td><?php echo $row->nama;?></td>
						<td><?php echo $row->kelamin;?></td>
						<td>
							<a href="<?php echo base_url('siswa/datasiswa/'.$nis);?>"><button type="button" class="btn btn-primary">Detail</button></a>
							<?php 
							if (($this->session->userdata('level')=='guru') || ($this->session->userdata('level')=='admin')){?>
							<a href="<?php echo base_url('nilai/lihatnilai/'.$nis)?>"><button type="button" class="btn btn-info" >Nilai</button></a>
							<?php 
							}if(($this->session->userdata('level')=='admin')){?>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-nis="<?php echo $row->nis; ?>" data-nama="<?php echo $row->nama; ?>">Delete</button>
									<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#resetModal" data-nis="<?php echo $row->nis; ?>" data-nama="<?php echo $row->nama; ?>">Reset Password</button>
							<?php 
							}?>
						</td>
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


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
      </div>
      <div class="modal-body">
      Apakah anda yakin ingin menghapus data <span class="nama"></span>(<span class="nis"></span>) ?
      Semua data yang berhubungan dengan akun yang bersangkutan juga akan dihapus 
      </div>
      <div class="modal-footer">
      <form action="<?php echo base_url('siswa/deletesiswa'); ?>" method="post">
      	<input type="hidden" class="nis" name="nis"/>
      	<input type="hidden" name="url" value="<?php echo current_url();?>"/>
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-danger">Hapus Data</button>
       </form>
      </div>
    </div>
  </div>
</div>
<!-- /.Modal -->
<!-- Modal -->
<div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Reset Password</h4>
      </div>
      <div class="modal-body">
      Apakah anda yakin ingin mereset password ?
      Password yang direset akan disamakan dengan NIP. Segera ganti password untuk keamanan akun!  
      </div>
      <div class="modal-footer">
      <form action="<?php echo base_url('akun/resetpassword'); ?>" method="post">
      	<input type="hidden" class="nis" name="id"/>
      	<input type="hidden" name="url" value="<?php echo current_url();?>"/>
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-warning">Reset Password</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- /.Modal -->
<!-- jQuery -->


<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>

<script>
$(document).ready( function () {
	$('#dataTables-example').DataTable({
		"searching": false,
		"lengthChange": false
	});
	$('#deleteModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var nip = button.data('nis') // Extract info from data-* attributes
		  var nama = button.data('nama') 
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		  modal.find('.nama').text(nama)
		  modal.find('.nis').text(nip)
		  modal.find('input','.nis').val(nip)
		})
	$('#resetModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var nip = button.data('nis') // Extract info from data-* attributes
		  var nama = button.data('nama') 
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		  modal.find('.nama').text(nama)
		  modal.find('.nis').text(nip)
		  modal.find('input','.nis').val(nip)
		})
} );
</script>

