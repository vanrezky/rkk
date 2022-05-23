<?php $this->load->view('header');?>
<?php $this->load->view('side_menu');?>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Halaman Jenis Dokumen</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>u_dashboard">Home</a></li>
              <li class="breadcrumb-item active">Data Dokumen</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
</section>
<section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Jenis Dokumen</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <p align="left">
                <a href="<?php echo base_url(); ?>dokumen/add" class="btn btn-primary"><i class="glyphicon glyphicon-plus glyphicon-white"></i> Tambah</a>
              </p>
                <?php echo $this->session->userdata('message');?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Jenis Dokumen</th>
                  <th>Dibuat Tanggal</th>
                  <th>Update Tanggal</th>
                  <th width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                        $i=0;
                        foreach($get_all as $single_dokumen){
                            $i++;
                        ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $single_dokumen->jenis_dokumen;?></td>
                        <td><?php echo format_hari_tanggal(date($single_dokumen->create_at));?></td>
                        <td><?php echo format_hari_tanggal(date($single_dokumen->update_at));?></td>
                        <td class="center">
                            <a class="btn btn-info" href="<?php echo base_url('dokumen/edit/' . $single_dokumen->id_jenis_dokumen); ?>"><div style="font-size: 0.5rem;">
                                <i class="fa fa-share"></i>  </div>
                            </a>
                            <a class="btn btn-danger" href="<?php echo base_url('dokumen/delete/' . $single_dokumen->id_jenis_dokumen); ?>" onClick="return confirm('Anda yakin..???');" title="Hapus"><div style="font-size: 0.5rem;">
                                <i class="fa fa-trash"></i></div>
                            </a>
                      </td>
                        
                    </tr>
                <?php }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Jenis Dokumen</th>
                  <th>Dibuat Tanggal</th>
                  <th>Update Tanggal</th>
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
<?php $this->load->view('footer');?>