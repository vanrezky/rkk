<!DOCTYPE html>
<html>
<head>
  <!-- <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/adminlte.min.css"> -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/style.css" />
</head>
<body>
<div class="wrapper">
  <section class="invoice">
    <div class="row">
      <div class="col-12">
        <h2  class="page-header" style="text-align:center"> Rincian Kewenangan Klinis</h2>
      </br>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-6 invoice-col">
        <address>
          <table>
              <tr>
                  <td>Nama Karyawan &nbsp;</td>
                  <td><b> : <?php echo $karyawan_info->nama_karyawan; ?></b></td>
              </tr>
              <tr>
                  <td>Unit </td>
                  <td> : <?php echo $karyawan_info->nama_unit; ?></td>
              </tr>
              <tr>
                  <td>Kepala Unit </td>
                  <td> : <?php echo $karyawan_info->nama_lengkap; ?></td>
              </tr>
              <tr>
                  <td>Tanggal Supervisi </td>
                  <td> : <?php echo format_hari_tanggal(date($supervisi_info->tanggal_supervisi)); ?></td>
              </tr>
          </table>
        </address>
      </div>
    </div>
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table1">
          <thead>
          <tr>
            <th>No.</th>
            <th>Asuhan Kewenangan Klinis</th>
            <th>Penilaian</th>
          </tr>
          </thead>
          <tbody>
            <?php
              $i = 0;
              foreach ($supervisi_details_info as $single_supervisi_details) {
              $i++;
              ?>
              <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $single_supervisi_details->rkk ?></td>
                  <td><?php echo $single_supervisi_details->nilai ?></td>
                  <!-- <td><?php echo kualifikasi_excel($single_supervisi_details->kualifikasi) ?></td> -->
              </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
</body>
</html>
