<?php $this->load->view('user/header');?>
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
<?php $this->load->view('user/side_menu');?> <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">SELAMAT DATANG DI RUMAH SAKIT EFARINA</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Halaman Beranda</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- <section class="content">
      <div class="container-fluid">
        <div class="row">
          <?php foreach($dashboard1->result_array() as $l){?>
          <div class="col-lg-3 col-6">
            
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $l['jml_karyawan'];?></h3>

                <p>Data Karyawan</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="<?php echo base_url()?>karyawan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php } ?>

          <?php foreach($dashboard2->result_array() as $l){?>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $l['jml_asuhan'];?></h3>
                <p>Data Asuhan</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo base_url()?>rkk" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php } ?>
      
          <?php foreach($dashboard3->result_array() as $l){?>
          <div class="col-lg-3 col-6">
           
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $l['jml_user'];?></h3>
                <p>User Terdaftar</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url()?>user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php } ?>

          <?php foreach($dashboard4->result_array() as $l){?>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $l['jml_supervisi'];?></h3>
                <p>Data Supervisi</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?php echo base_url()?>data_supervisi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <?php } ?>
        </div>
        <div class="row">
        </div>
      </div>
    </section> -->

        <section class="content">

        <div class="row">
          <!-- left column -->
          <div class="col-sm-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Menu Akses :</h3>
              </div>
                <div class="card-body" align="center">
                  <div class="row" align="center">
                    <div class="col-sm-3 col-md-2">
                      <h4 class="text-center"><span class="info-box-text">Karyawan</span></h4>
                     
                      <div class="color-palette-set">
                      <a href="<?php echo site_url('u_karyawan') ?>"><center><i class="fa fa-user" style="font-size:48px;color:#20b2aa"></i><center></a>          
                      </div>
                    </div>
                    <div class="col-sm-3 col-md-2">
                      <h4 class="text-center"><span class="info-box-text">Ashuan</span></h4>
                     
                      <div class="color-palette-set">
                      <a href="<?php echo site_url('u_rkk') ?>"><center><i class="fa fa-print" style="font-size:48px;color:#20b2aa"></i><center></a>          
                      </div>
                    </div>
                    <div class="col-sm-3 col-md-2">
                      <h4 class="text-center"><span class="info-box-text">Supervisi</span></h4>
                     
                      <div class="color-palette-set">
                      <a href="<?php echo site_url('u_supervisi') ?>"><center><i class="fa fa-users" style="font-size:48px;color:#20b2aa"></i><center></a>          
                      </div>
                    </div>        
                    <!-- /.col -->
                    <div class="col-sm-3 col-md-2">
                      <h4 class="text-center"><span class="info-box-text">Penilaian</span></h4>
                      <div class="color-palette-set">
                      <a href="<?php echo site_url('u_penilaian') ?>"><center><i class="fa  fa-question-circle" style="font-size:48px;color:#20b2aa"></i><center></a>  
                      </div>
                    </div>    
                    <div class="col-sm-3 col-md-2">
                      <h4 class="text-center"><span class="info-box-text">Laporan</span></h4>
                      <div class="color-palette-set">
                      <a href="<?php echo site_url('u_laporan') ?>"><center><i class="fa  fa-paste" style="font-size:48px;color:#20b2aa"></i><center></a>  
                      </div>
                    </div>      
                      </div>
                      &emsp;
                      <div class="box-footer">
                           <center>Sistem Informasi Rincian Kewenangan Klinis RS Efarina - <a href="https://www.efarina.co.id/"> Efarina.co.id</a></center>
                          </div>
                    </div>
                  </section>
                </div>
 
<?php $this->load->view('user/footer');?>