<body>
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header">Nilai <?php echo $nama_mapel->nama_pelajaran;?> Siswa Kelas <?php echo $this->uri->segment('3'); ?></h1>
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
						<th>Nilai Akhir</th>
						<th>Predikat</th>
					</tr>
					<?php if (isset($nilai_kelas)){
						foreach ($nilai_kelas as $row){
					?>
					
					<tr>
						<td><?php echo $row->nis; ?>
						<td><?php echo $row->nama; ?></td>
						<td><input type="number" class="form-control harian" name="harian[]"  value="<?php echo $row->harian; ?>"></td>
						<td><input type="number" class="form-control uts" name="uts[]"  value="<?php echo $row->uts; ?>"></td>
						<td><input type="number" class="form-control uas" name="uas[]"  value="<?php echo $row->uas; ?>"></td>
						<td class="total"><?php echo ($row->harian*20/100)+($row->uts*40/100)+($row->uas*40/100);?></td>
						<td class="predikat"></td>
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
				<button type="submit" class="form-control btn-primary">Simpan</button>
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