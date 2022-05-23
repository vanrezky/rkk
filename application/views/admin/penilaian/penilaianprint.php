<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tools Efarina</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2  class="page-header" style="text-align:center"> Rincian Penilaian Karyawan</h2>
      </br>
      </br>
      </div >
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-6 invoice-col">
        <address>
          <table class="">
              <tr>
                  <td style="font-size: 20px">Nama Karyawan &nbsp;</td>
                  <td style="font-size: 20px"><b> : <?php echo $karyawan_info->nama_karyawan; ?></b></td>
              </tr>
              <tr>
                  <td style="font-size: 20px">Unit </td>
                  <td style="font-size: 20px"> : <?php echo $karyawan_info->nama_unit; ?></td>
              </tr>
              <tr>
                  <td style="font-size: 20px">Kepala Unit </td>
                  <td style="font-size: 20px"> : <?php echo $karyawan_info->nama_lengkap; ?></td>
              </tr>
              <tr>
                  <td style="font-size: 20px">Tanggal Supervisi </td>
                  <td style="font-size: 20px"> : <?php echo format_hari_tanggal(date($supervisi_info->tanggal_supervisi)); ?></td>
              </tr>
          </table>
        </address>
      </div>
    </div>
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped table-bordered">
          <thead>
          <tr>
            <th style="font-size: 20px">No.</th>
            <th style="font-size: 20px">Asuhan Kewenangan Klinis</th>
            <th style="font-size: 20px">Nilai</th>
          </tr>
          </thead>
          <tbody>
            <?php
              $i = 0;
              foreach ($supervisi_details_info as $single_supervisi_details) {
              $i++;
              ?>
              <tr>
                  <td style="font-size: 20px"><?php echo $i; ?></td>
                  <td style="font-size: 20px"><?php echo $single_supervisi_details->rkk ?></td>
                  <td style="font-size: 20px"><?php echo $single_supervisi_details->nilai ?></td>
                  <!-- <td style="font-size: 20px"><?php echo kualifikasi_excel($single_supervisi_details->kualifikasi) ?></td> -->
              </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
