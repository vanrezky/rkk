<?php $this->load->view('user/header');?>
<?php $this->load->view('user/side_menu');?>
<div class="content-wrapper">
  <section class="content">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Laporan Supervisi Karyawan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">supervisi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
</section>
<section class="content">
    <?php echo $this->session->userdata('message');?>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <a href="<?php echo base_url('u_laporan/print/' . $supervisi_info->id_supervisi); ?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>

                <a href="<?php echo base_url('u_laporan/pdf/' . $supervisi_info->id_supervisi); ?>" target="_blank" class="btn btn-primary"><i class="fas fa-download"></i> Generate PDF</a>

                <a style="margin-left: 5px;" href="<?php echo base_url('u_laporan/supervisi'); ?>" class="btn btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i></i> Back</a>
                </h3>
                </div>
                    <div class="card-body">
                        <div class="span4 text-left">
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <td>Nama Karyawan </td>
                                    <td><b><?php echo $karyawan_info->nama_karyawan; ?></b></td>
                                </tr>
                                <tr>
                                    <td>Unit </td>
                                    <td><?php echo $karyawan_info->nama_unit; ?></td>
                                </tr>
                                <tr>
                                    <td>Kepala Unit </td>
                                    <td><?php echo $karyawan_info->nama_lengkap; ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Supervisi </td>
                                    <td><?php echo format_hari_tanggal(date($supervisi_info->tanggal_supervisi)); ?></td>
                                </tr>
                            </table>
                        </div>
                        <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th>No.</th>
                            <th>Asuhan Kewenangan Klinis</th>
                            <th>Kualifikasi</th>
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
                                <td><?php echo kualifikasi($single_supervisi_details->kualifikasi) ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                <div class="row no-print">
                    <div class="col-12">
                            <a href="<?php echo base_url('u_laporan/print/' . $supervisi_info->id_supervisi); ?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>

                            <a href="<?php echo base_url('u_laporan/pdf/' . $supervisi_info->id_supervisi); ?>" target="_blank" class="btn btn-primary float-right"><i class="fas fa-download"></i> Generate PDF</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<?php $this->load->view('user/footer');?>