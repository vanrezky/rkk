<?php $this->load->view('header');?>
    <!-- <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet"> -->
<?php $this->load->view('side_menu');?> <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Laporan RKK</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Laporan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      <section class="content">
        <div class="row">
          <!-- left column -->
          <div class="col-sm-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Menu Akses Laporan :</h3>
              </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3 col-md-2">
                      <h4 class="text-center"><span class="info-box-text">Supervisi</span></h4>
                     
                      <div class="color-palette-set">
                      <a href="<?php echo site_url('laporan/supervisi') ?>"><center><i class="fas fa-calendar" style="font-size:48px;color:#20b2aa"></i><center></a>          
                      </div>
                    </div>
                    <div class="col-sm-3 col-md-2">
                      <h4 class="text-center"><span class="info-box-text">Penilaian</span></h4>
                     
                      <div class="color-palette-set">
                      <a href="<?php echo site_url('laporan/penilaian') ?>"><center><i class="fa fa-check" style="font-size:48px;color:#20b2aa"></i><center></a>          
                      </div>
                    </div>              
                  </div>
                      &emsp;
                <div class="box-footer">
                  <center>Sistem Informasi Rincian Kewenangan Klinis RS Efarina - <a href="https://www.efarina.co.id/"> efarina.co.id</a></center>
              </div>
            </div>
          </section>
        </div>
 
<?php $this->load->view('footer');?>