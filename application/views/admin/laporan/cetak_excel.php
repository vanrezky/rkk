<?php
ob_end_clean();
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=$title.xls");
header("Content-Transfer-Encoding: binary ");

?>

<table border="1" width="100%">

<thead>
<th width="10%">Data Supervisi Karyawan</th>
<tr>

 <th>No</th>
 <th>Rincian Kewenangan Klinis</th>
 <th>Kualifikasi</th>
 <th>Tanggal Supervisi</th>

 </tr>

</thead>

<tbody>

<?php
   $no=1;
    foreach($data_supervisi as $dp) { ?>

<tr>

<td><?php echo $no;?></td>
<td><?php echo $dp->rkk;?></td>
<td><?php echo kualifikasi($dp->supervisi);?></td>
<td><?php echo format_hari_tanggal(date($dp->tanggal_supervisi));?></td>  
</tr>
<?php $no++; } ?>
</tbody>

</table>