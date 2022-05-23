<?php $this->load->view('user/header');?>
    <!-- <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet"> -->
<?php $this->load->view('user/side_menu');?>

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Halaman Anggota</h1>
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
</section>
<section class="content">
   <?php echo $this->session->userdata('message');?>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Anggota </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <p align="left">
                <a href="<?php echo base_url(); ?>u_karyawan/add" class="btn btn-primary"><i class="glyphicon glyphicon-plus glyphicon-white"></i> Tambah</a>
              </p>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>Unit</th>
                  <th width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                        $i=0;
                        foreach($get_all_karyawan as $single_karyawan){
                            $i++;
                        ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $single_karyawan->nama_karyawan;?></td>
                        <td><?php echo $single_karyawan->tempat_lahir;?></td>
                        <td><?php echo $single_karyawan->tanggal_lahir;?></td>
                        <td><?php echo $single_karyawan->jenis_kelamin;?></td>
                        <td><?php echo $single_karyawan->nama_unit;?></td>
                        <td class="center">
                                    <a class="btn btn-info" href="<?php echo base_url('u_karyawan/edit/' . $single_karyawan->id_karyawan); ?>"><div style="font-size: 0.5rem;">
                                        <i class="fa fa-share"></i></div>  
                                    </a>
                                    <a class="btn btn-danger" href="<?php echo base_url('u_karyawan/delete/' . $single_karyawan->id_karyawan); ?>"><div style="font-size: 0.5rem;"><i class="fa fa-trash"></i></div> 
                                    </a>
                                </td>
                        
                    </tr>
                <?php }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>Unit</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
</div>
<?php $this->load->view('user/footer');?>