<style>
table {
    width:100%;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
th	{
	background-color: #eee;
}
</style>
<table style="width: 100%">
	<thead>
		<tr>
			<th>Mata Pelajaran</th>
			<th>Harian</th>
			<th>UTS</th>
			<th>UAS</th>
			<th>Nilai Akhir</th>
			<th>Predikat</th>
		</tr>
	</thead>
	<tbody>
				<?php if (isset($X_1)){
				foreach ($nilai as $key=>$n){
				?>
		<tr>
			<td><?php echo $n->nama_pelajaran; ?></td>
			<td  class="harian"><?php echo $n->harian; ?></td>
			<td class="uts"><?php echo $n->uts; ?></td>
			<td class="uas"><?php echo $n->uas; ?></td>
			<td class="total"><?php echo ($n->uas*40/100)+($n->uts*40/100)+($n->harian*20/100); ?></td>
			<td class="predikat"></td>
		</tr>
				<?php }} ?>
	</tbody>
</table>
