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
				<li class="active"><a data-toggle="tab" href="#1">X</a></li>
    			<li><a data-toggle="tab" href="#2">XI</a></li>
    			<li><a data-toggle="tab" href="#3">XII</a></li>
			</ul>
			<form method="post" action="<?php echo base_url('nilai/tambahnilai'); ?>">
			<div class="tab-content">
			<div id="1" class="tab-pane fade in active">
			<div class="form-group">
				<label class="control-label col-md-1" for="semestertk1">Semester</label>
					<div class="col-md-2" >
						<select class="form-control" id="semestertk1">
							<option value="X1">1</option>
							<option value="X2">2</option>
						</select>
					</div>
			</div>
				<table class="table" id="X1">
					<thead>
						<tr>
							<th class="col-md-3">Mata Pelajaran</th>
							<th class="col-md-2">Harian</th>
							<th class="col-md-2">UTS</th>
							<th class="col-md-2">UAS</th>
							<th class="col-md-2">Nilai Akhir</th>
							<th class="col-md-1">Predikat</th>
						</tr>
					</thead>
					<tbody>
					<?php if (isset($X_1)){
					foreach ($X_1 as $key=>$n){
					?>
						<tr>
							<td><?php echo $n->nama_pelajaran; ?></td>
							<td><input type="number" class="form-control harian" name="harian[]" value="<?php echo $n->harian; ?>"></td>
							<td><input type="number"class="form-control uts" name="uts[]" value="<?php echo $n->uts; ?>"></td>
							<td><input type="number" class="form-control uas" name="uas[]" value="<?php echo $n->uas; ?>"></td>
							<td class="total"><?php echo ($n->harian*20/100)+($n->uts*40/100)+($n->uas*40/100);?></td>
							<td class="predikat"></td>
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
							<th class="col-md-3">Mata Pelajaran</th>
							<th class="col-md-2">Harian</th>
							<th class="col-md-2">UTS</th>
							<th class="col-md-2">UAS</th>
							<th class="col-md-2">Nilai Akhir</th>
							<th class="col-md-1">Predikat</th>
						</tr>
					</thead>
					<tbody>
					<?php if (isset($X_2)){
					foreach ($X_2 as $key=>$n){
					?>
						<tr>
							<td><?php echo $n->nama_pelajaran; ?></td>
							<td><input type="number" class="form-control harian" name="harian[]" value="<?php echo $n->harian; ?>"></td>
							<td><input type="number"class="form-control uts" name="uts[]" value="<?php echo $n->uts; ?>"></td>
							<td><input type="number" class="form-control uas" name="uas[]" value="<?php echo $n->uas; ?>"></td>
							<td class="total"><?php echo ($n->harian*20/100)+($n->uts*40/100)+($n->uas*40/100);?></td>
							<td class="predikat"></td>
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
			<div class="form-group">
				<label class="control-label col-md-1" for="semestertk2">Semester</label>
					<div class="col-md-2" >
						<select class="form-control" id="semestertk2">
							<option value="XI1">1</option>
							<option value="XI2">2</option>
						</select>
					</div>
			</div>
				<table class="table" id="XI1">
					<thead>
						<tr>
							<th class="col-md-3">Mata Pelajaran</th>
							<th class="col-md-2">Harian</th>
							<th class="col-md-2">UTS</th>
							<th class="col-md-2">UAS</th>
							<th class="col-md-2">Nilai Akhir</th>
							<th class="col-md-1">Predikat</th>
						</tr>
					</thead>
					<tbody>
					<?php if (isset($XI_1)){
					foreach ($XI_1 as $key=>$n){
					?>
						<tr>
							<td><?php echo $n->nama_pelajaran; ?></td>
							<td><input type="number" class="form-control harian" name="harian[]" value="<?php echo $n->harian; ?>"></td>
							<td><input type="number"class="form-control uts" name="uts[]" value="<?php echo $n->uts; ?>"></td>
							<td><input type="number" class="form-control uas" name="uas[]" value="<?php echo $n->uas; ?>"></td>
							<td class="total"><?php echo ($n->harian*20/100)+($n->uts*40/100)+($n->uas*40/100);?></td>
							<td class="predikat"></td>
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
							<th class="col-md-3">Mata Pelajaran</th>
							<th class="col-md-2">Harian</th>
							<th class="col-md-2">UTS</th>
							<th class="col-md-2">UAS</th>
							<th class="col-md-2">Nilai Akhir</th>
							<th class="col-md-1">Predikat</th>
						</tr>
					</thead>
					<tbody>
					<?php if (isset($XI_2)){
					foreach ($XI_2 as $key=>$n){
					?>
						<tr>
							<td><?php echo $n->nama_pelajaran; ?></td>
							<td><input type="number" class="form-control harian" name="harian[]" value="<?php echo $n->harian; ?>"></td>
							<td><input type="number"class="form-control uts" name="uts[]" value="<?php echo $n->uts; ?>"></td>
							<td><input type="number" class="form-control uas" name="uas[]" value="<?php echo $n->uas; ?>"></td>
							<td class="total"><?php echo ($n->harian*20/100)+($n->uts*40/100)+($n->uas*40/100);?></td>
							<td class="predikat"></td>
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
			<div class="form-group">
				<label class="control-label col-md-1" for="semestertk3">Semester</label>
					<div class="col-md-2" >
						<select class="form-control" id="semestertk3">
							<option value="XII1">1</option>
							<option value="XII2">2</option>
						</select>
					</div>
			</div>
				<table class="table" id="XII1">
					<thead>
						<tr>
							<th class="col-md-3">Mata Pelajaran</th>
							<th class="col-md-2">Harian</th>
							<th class="col-md-2">UTS</th>
							<th class="col-md-2">UAS</th>
							<th class="col-md-2">Nilai Akhir</th>
							<th class="col-md-1">Predikat</th>
						</tr>
					</thead>
					<tbody>
					<?php if (isset($XII_1)){
					foreach ($XII_1 as $key=>$n){
					?>
						<tr>
							<td><?php echo $n->nama_pelajaran; ?></td>
							<td><input type="number" class="form-control harian" name="harian[]" value="<?php echo $n->harian; ?>"></td>
							<td><input type="number"class="form-control uts" name="uts[]" value="<?php echo $n->uts; ?>"></td>
							<td><input type="number" class="form-control uas" name="uas[]" value="<?php echo $n->uas; ?>"></td>
							<td class="total"><?php echo ($n->harian*20/100)+($n->uts*40/100)+($n->uas*40/100);?></td>
							<td class="predikat"></td>
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
							<th class="col-md-3">Mata Pelajaran</th>
							<th class="col-md-2">Harian</th>
							<th class="col-md-2">UTS</th>
							<th class="col-md-2">UAS</th>
							<th class="col-md-2">Nilai Akhir</th>
							<th class="col-md-1">Predikat</th>
						</tr>
					</thead>
					<tbody>
					<?php if (isset($XII_2)){
					foreach ($XII_2 as $key=>$n){
					?>
						<tr>
							<td><?php echo $n->nama_pelajaran; ?></td>
							<td><input type="number" class="form-control harian" name="harian[]" value="<?php echo $n->harian; ?>"></td>
							<td><input type="number"class="form-control uts" name="uts[]" value="<?php echo $n->uts; ?>"></td>
							<td><input type="number" class="form-control uas" name="uas[]" value="<?php echo $n->uas; ?>"></td>
							<td class="total"><?php echo ($n->harian*20/100)+($n->uts*40/100)+($n->uas*40/100);?></td>
							<td class="predikat"></td>
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
    $('tr').each(function () {
        //the value of sum needs to be reset for each row, so it has to be set inside the row loop
        //find the combat elements in the current row and sum it 
        var predikat='E';
     	var nilai = parseFloat($(this).find('.total').text());
		if (nilai>=80){
			predikat="A";
		}else if (70<=nilai){
			predikat="B";
		}else if (60<=nilai){
			predikat="C";
		}else if (50<=nilai){
			predikat="D";
		}else {
			predikat="E";
		};
        //set the value of currents rows sum to the total-combat element in the current row
        $('.predikat', this).html(predikat);
    });
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
    $('input').change(function(){
    	var pre='E';
    	var row = $(this).closest("tr");
    	var predikat = row.find(".predikat");
        var harian = row.find(".harian");
        var uts = row.find(".uts");
        var uas = row.find(".uas"); 
        var total = row.find(".total");
        var hasil = (harian.val()*20/100)+(uts.val()*40/100)+(uas.val()*40/100);
        if (hasil>=80){
			pre="A";
		}else if (70<=hasil){
			pre="B";
		}else if (60<=hasil){
			pre="C";
		}else if (50<=hasil){
			pre="D";
		}else {
			pre="E";
		};
        total.html(hasil);
        predikat.html(pre);
    });
});
</script>