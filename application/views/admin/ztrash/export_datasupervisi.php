<?php
$nama_file = date('Y-m-d')."_lap_data_supervisi.xls";    
header("Pragma: public");   
header("Expires: 0");   
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");     
header("Content-Type: application/force-download");     
header("Content-Type: application/octet-stream");   
header("Content-Type: application/download");   
header("Content-Disposition: attachment;filename=".$nama_file."");  
header("Content-Transfer-Encoding: binary ");
?>
<table>
<tr>
<td align="center"><h1>Laporan Data Supervisi</h1></td>
</tr>
<tr></tr>
<tr>
<td>
    <table cellpadding="8" style="border-collapse:collapse;" border="1">
        <thead>
            <tr>               
                <th>No</th>
                <th>NAMA</th>
                <th>SIFAT DOKUMEN</th>
                <th>NAMA BIDANG</th>
                <th>TANGGAL UPDATE</th>
                <th>FOTO</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                <?php
                  $no=1;
                  foreach($data_supervisi->result_array() as $dp)
                  {
                ?>
              <tr>     
              <td>
                <?php echo $no;?></td>
                <td><?php echo $dp['nama_karyawan'];?></td>
                <td><?php echo $dp['rkk'];?></td>
                <td><?php echo $dp['unit'];?></td>
                <td><?php echo $dp['ta'];?></td>  
                <td><?php echo date_to_id($dp['tanggal_supervisi']); ?></td>    
              <?php
                $no++;
                }
              ?>
        </tbody>
    </table>
</td>
</tr>
</table>