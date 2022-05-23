<?php $this->load->view('user/header');?>
    <!-- <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet"> -->
<?php $this->load->view('user/side_menu');?>
<div class="content-wrapper">
  <section class="content">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Halaman Laporan Penilaian</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Laporan Penilaian</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
</section>
<section class="content">
   <?php echo $this->session->userdata('message');?>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Penilaian </h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5%">No</th>
                  <th>Nama</th>
                  <th>Tanggal Penilaian</th>
                  <th>Skor</th>
                </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($tampil_data->result_array() as $l){?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $l['nama_karyawan'];?></td>
                        <td><?php echo format_hari_tanggal(date($l['tanggal_penilaian']));?></td>
                        <td><?php echo number_format($l['total']);?></td>
                    </tr>
                     <?php $no++; }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Tanggal Penilaian</th>
                  <th>Skor</th>
                </tr>
                </tfoot>
              </table>
            </div> 
          </div>
        </div>
      </div>
    </section>
</div>
<?php $this->load->view('user/footer');?>