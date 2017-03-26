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
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#1">Menu 1</a></li>
    			<li><a data-toggle="tab" href="#2">Menu 2</a></li>
    			<li><a data-toggle="tab" href="#3">Menu 3</a></li>
			</ul>
			<form method="post" action="<?php echo base_url('nilai/tambahnilai'); ?>">
			<div class="tab-content">
			<div id="1" class="tab-pane fade in active">
			<select id="semestertk1">
				<option value="X1">1</option>
				<option value="X2">2</option>
			</select>
				<table class="table" id="X1">
					<thead>
						<tr>
							<th>Mata Pelajaran</th>
							<th>Harian</th>
							<th>UTS</th>
							<th>UAS</th>
							<th>Nilai Akhir</th>
						</tr>
					</thead>
					<tbody>
					<?php if (isset($X_1)){
					foreach ($X_1 as $key=>$n){
					?>
						<tr>
							<td><?php echo $n->nama_pelajaran; ?></td>
							<td><input type="number" class="form-control" name="harian[]" value="<?php echo $n->harian; ?>"></td>
							<td><input type="number"class="form-control" name="uts[]" value="<?php echo $n->uts; ?>"></td>
							<td><input type="number" class="form-control" name="uas[]" value="<?php echo $n->uas; ?>"></td>
							<td><?php echo $n->uas; ?></td>
							<input type="hidden" name="nis[]" value="<?php echo $n->nis; ?>">
							<input type="hidden" name="idpelajaran[]" value="<?php echo $n->id_pelajaran; ?>">
							<input type="hidden" name="tingkat[]" value="<?php echo $n->tingkat; ?>">
							<input type="hidden" name="semester[]" value="<?php echo $n->semester; ?>">
							<input type="hidden" name="tahunajaran[]" value="<?php echo $n->tahun_ajaran; ?>">
						</tr>
					<?php }} ?>
					</tbody>
				</table>
				
				<table class="table" id="X2" style="display: none">
					<thead>
						<tr>
							<th>Mata Pelajaran</th>
							<th>Harian</th>
							<th>UTS</th>
							<th>UAS</th>
							<th>Nilai Akhir</th>
						</tr>
					</thead>
					<tbody>
					<?php if (isset($X_2)){
					foreach ($X_2 as $key=>$n){
					?>
						<tr>
							<td><?php echo $n->nama_pelajaran; ?></td>
							<td><input type="number" class="form-control" name="harian[]" value="<?php echo $n->harian; ?>"></td>
							<td><input type="number"class="form-control" name="uts[]" value="<?php echo $n->uts; ?>"></td>
							<td><input type="number" class="form-control" name="uas[]" value="<?php echo $n->uas; ?>"></td>
							<td><?php echo $n->uas; ?></td>
							<input type="hidden" name="nis[]" value="<?php echo $n->nis; ?>">
							<input type="hidden" name="idpelajaran[]" value="<?php echo $n->id_pelajaran; ?>">
							<input type="hidden" name="tingkat[]" value="<?php echo $n->tingkat; ?>">
							<input type="hidden" name="semester[]" value="<?php echo $n->semester; ?>">
							<input type="hidden" name="tahunajaran[]" value="<?php echo $n->tahun_ajaran; ?>">
						</tr>
					<?php }} ?>
					</tbody>
				</table>
			</div>
			<div id="2" class="tab-pane fade">
			<select id="semestertk2">
				<option value="XI1">1</option>
				<option value="XI2">2</option>
			</select>
				<table class="table" id="XI1">
					<thead>
						<tr>
							<th>Mata Pelajaran</th>
							<th>Harian</th>
							<th>UTS</th>
							<th>UAS</th>
							<th>Nilai Akhir</th>
						</tr>
					</thead>
					<tbody>
					<?php if (isset($XI_1)){
					foreach ($XI_1 as $key=>$n){
					?>
						<tr>
							<td><?php echo $n->nama_pelajaran; ?></td>
							<td><input type="number" class="form-control" name="harian[]" value="<?php echo $n->harian; ?>"></td>
							<td><input type="number"class="form-control" name="uts[]" value="<?php echo $n->uts; ?>"></td>
							<td><input type="number" class="form-control" name="uas[]" value="<?php echo $n->uas; ?>"></td>
							<td><?php echo $n->uas; ?></td>
							<input type="hidden" name="nis[]" value="<?php echo $n->nis; ?>">
							<input type="hidden" name="idpelajaran[]" value="<?php echo $n->id_pelajaran; ?>">
							<input type="hidden" name="tingkat[]" value="<?php echo $n->tingkat; ?>">
							<input type="hidden" name="semester[]" value="<?php echo $n->semester; ?>">
							<input type="hidden" name="tahunajaran[]" value="<?php echo $n->tahun_ajaran; ?>">
						</tr>
					<?php }} ?>
					</tbody>
				</table>
				
				<table class="table" id="XI2" style="display: none">
					<thead>
						<tr>
							<th>Mata Pelajaran</th>
							<th>Harian</th>
							<th>UTS</th>
							<th>UAS</th>
							<th>Nilai Akhir</th>
						</tr>
					</thead>
					<tbody>
					<?php if (isset($XI_2)){
					foreach ($XI_2 as $key=>$n){
					?>
						<tr>
							<td><?php echo $n->nama_pelajaran; ?></td>
							<td><input type="number" class="form-control" name="harian[]" value="<?php echo $n->harian; ?>"></td>
							<td><input type="number"class="form-control" name="uts[]" value="<?php echo $n->uts; ?>"></td>
							<td><input type="number" class="form-control" name="uas[]" value="<?php echo $n->uas; ?>"></td>
							<td><?php echo $n->uas; ?></td>
							<input type="hidden" name="nis[]" value="<?php echo $n->nis; ?>">
							<input type="hidden" name="idpelajaran[]" value="<?php echo $n->id_pelajaran; ?>">
							<input type="hidden" name="tingkat[]" value="<?php echo $n->tingkat; ?>">
							<input type="hidden" name="semester[]" value="<?php echo $n->semester; ?>">
							<input type="hidden" name="tahunajaran[]" value="<?php echo $n->tahun_ajaran; ?>">
						</tr>
					<?php }} ?>
					</tbody>
				</table>
			</div>
			<div id="3" class="tab-pane fade">
			<select id="semestertk3">
				<option value="XII1">1</option>
				<option value="XII2">2</option>
			</select>
				<table class="table" id="XII1">
					<thead>
						<tr>
							<th>Mata Pelajaran</th>
							<th>Harian</th>
							<th>UTS</th>
							<th>UAS</th>
							<th>Nilai Akhir</th>
						</tr>
					</thead>
					<tbody>
					<?php if (isset($XII_1)){
					foreach ($XII_1 as $key=>$n){
					?>
						<tr>
							<td><?php echo $n->nama_pelajaran; ?></td>
							<td><input type="number" class="form-control" name="harian[]" value="<?php echo $n->harian; ?>"></td>
							<td><input type="number"class="form-control" name="uts[]" value="<?php echo $n->uts; ?>"></td>
							<td><input type="number" class="form-control" name="uas[]" value="<?php echo $n->uas; ?>"></td>
							<td><?php echo $n->uas; ?></td>
							<input type="hidden" name="nis[]" value="<?php echo $n->nis; ?>">
							<input type="hidden" name="idpelajaran[]" value="<?php echo $n->id_pelajaran; ?>">
							<input type="hidden" name="tingkat[]" value="<?php echo $n->tingkat; ?>">
							<input type="hidden" name="semester[]" value="<?php echo $n->semester; ?>">
							<input type="hidden" name="tahunajaran[]" value="<?php echo $n->tahun_ajaran; ?>">
						</tr>
					<?php }} ?>
					</tbody>
				</table>
				<table class="table" id="XII2" style="display: none">
					<thead>
						<tr>
							<th>Mata Pelajaran</th>
							<th>Harian</th>
							<th>UTS</th>
							<th>UAS</th>
							<th>Nilai Akhir</th>
						</tr>
					</thead>
					<tbody>
					<?php if (isset($XII_2)){
					foreach ($XII_2 as $key=>$n){
					?>
						<tr>
							<td><?php echo $n->nama_pelajaran; ?></td>
							<td><input type="number" class="form-control" name="harian[]" value="<?php echo $n->harian; ?>"></td>
							<td><input type="number"class="form-control" name="uts[]" value="<?php echo $n->uts; ?>"></td>
							<td><input type="number" class="form-control" name="uas[]" value="<?php echo $n->uas; ?>"></td>
							<td><?php echo $n->uas; ?></td>
							<input type="hidden" name="nis[]" value="<?php echo $n->nis; ?>">
							<input type="hidden" name="idpelajaran[]" value="<?php echo $n->id_pelajaran; ?>">
							<input type="hidden" name="tingkat[]" value="<?php echo $n->tingkat; ?>">
							<input type="hidden" name="semester[]" value="<?php echo $n->semester; ?>">
							<input type="hidden" name="tahunajaran[]" value="<?php echo $n->tahun_ajaran; ?>">
						</tr>
					<?php }} ?>
					</tbody>
				</table>
			</div>
			</div>
				<input type="hidden" name="submit" value="submit">
				<input type="hidden" name="uri3" value="<?php echo $this->uri->segment('3'); ?>">
				<button type="submit" class="form-control btn-primary">Submit</button>
			</form>
		</div>
	</div>
</body>
<script>
$( document ).ready(function() {
	$('#semestertk1').change(function(){
        $('#X1').hide();
        $('#X2').hide();
        $('#' + $(this).val()).show();
    });
	$('#semestertk2').change(function(){
        $('#XI1').hide();
        $('#XI2').hide();
        $('#' + $(this).val()).show();
    });
	$('#semestertk3').change(function(){
        $('#XII1').hide();
        $('#XII2').hide();
        $('#' + $(this).val()).show();
    });
});
</script>