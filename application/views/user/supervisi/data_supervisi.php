<?php $this->load->view('user/header');?>
<?php $this->load->view('user/side_menu');?>
<div class="content-wrapper">
  <section class="content">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Halaman Supervisi Karyawan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">supervisi</li>
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
              <h3 class="card-title">Halaman Supervisi Karyawan</h3>
            </div>
            <div class="card-body">
              <p align="left">
                <a href="<?php echo base_url(); ?>u_supervisi/add" class="btn btn-primary"><i class="glyphicon glyphicon-plus glyphicon-white"></i> Tambah</a>
              </p>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Tanggal Supervisi</th>
                  <th>Kepala Unit</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                        $i=0;
                        foreach($get_all_supervisi as $single_supervisi){
                            $i++;
                        ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $single_supervisi->nama_karyawan;?></td>
                        <td><?php echo format_hari_tanggal(date($single_supervisi->tanggal_supervisi));?></td>
                        <td><?php echo $single_supervisi->nama_lengkap;?></td>
                        <td class="center">
                                    <a class="btn btn-success" href="<?php echo base_url('u_supervisi/details/' . $single_supervisi->id_supervisi); ?>" title="view"><div style="font-size: 0.5rem;">
                                        <i class="fa fa-eye"></i>
                                      </div>
                                    </a>
                                    <!-- <a class="btn btn-info" href="<?php echo base_url('supervisi/edit/' . $single_supervisi->id_supervisi); ?>" title="Edit"><div style="font-size: 0.5rem;">
                                        <i class="fa fa-share"></i>
                                      </div>
                                    </a> -->
                                    <a class="btn btn-danger" href="<?php echo base_url('u_supervisi/delete/' . $single_supervisi->id_supervisi); ?>" onClick="return confirm('Anda yakin menghapus data Supervisi <?php echo $single_supervisi->nama_karyawan;?> ?');" title="Hapus"><div style="font-size: 0.5rem;">
                                        <i class="fa fa-trash"></i>
                                      </div>
                                    </a>
                                    <!-- <a class="btn btn-warning" href="<?php echo base_url('supervisi/print/' . $single_supervisi->id_supervisi); ?>" title="Print" target="_blank"><div style="font-size: 0.5rem;">
                                        <i class="fa fa-print"></i>
                                      </div>
                                    </a> -->
                                </td>
                    </tr>
                <?php }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Tanggal Supervisi</th>
                  <th>Kepala Unit</th>
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