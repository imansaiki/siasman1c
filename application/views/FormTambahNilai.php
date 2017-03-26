<body>
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header">Nilai Siswa</h1>
				</div>
			</div>
			<?php 
				if($this->session->flashdata('message')){
					echo $this->session->flashdata('message');
				}
			?>
			<form action="<?php echo base_url('nilai/tambahnilai')?>" method="post">
				<table class="table">
					<tr>
						<th>NIS</th>
						<th>Nama</th>
						<th>Harian</th>
						<th>UTS</th>
						<th>UAS</th>
					</tr>
					<?php if (isset($nilai_kelas)){
						foreach ($nilai_kelas as $row){
					?>
					
					<tr>
						<td><?php echo $row->nis; ?>
						<td><?php echo $row->nama; ?></td>
						<td><input type="number" class="form-control" name="harian[]"  value="<?php echo $row->harian; ?>"></td>
						<td><input type="number" class="form-control" name="uts[]"  value="<?php echo $row->uts; ?>"></td>
						<td><input type="number" class="form-control" name="uas[]"  value="<?php echo $row->uas; ?>"></td>
						<input type="hidden" name="nis[]" value="<?php echo $row->nis; ?>"></td>
						<input type="hidden" name="idpelajaran[]"  value="<?php echo $row->id_pelajaran; ?>">
						<input type="hidden" name="tingkat[]"  value="<?php echo $row->tingkat; ?>">
						<input type="hidden" name="semester[]"  value="<?php echo $row->semester; ?>">
						<input type="hidden" name="tahunajaran[]"  value="<?php echo $row->tahun_ajaran; ?>">
					</tr>
					
					<?php }}?>
				</table>
				<input type="hidden" name="submit" value="submit">
				<input type="hidden" name="uri3" value="<?php echo $this->uri->segment('3'); ?>">
				<input type="hidden" name="uri4" value="<?php echo $this->uri->segment('4'); ?>">
				<button type="submit" class="form-control btn-primary">Submit</button>
			</form>
		</div>
	</div>
</body>