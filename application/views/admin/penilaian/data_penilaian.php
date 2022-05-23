<?php $this->load->view('header');?>
<?php $this->load->view('side_menu');?>

<div class="content-wrapper">
  <section class="content">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Halaman Penilaian</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Halaman Penilaian</li>
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
              <!-- <p align="left">
                <a href="<?php echo base_url(); ?>penilaian/add" class="btn btn-primary"><i class="glyphicon glyphicon-plus glyphicon-white"></i> Tambah</a>
              </p> -->
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5%">No</th>
                  <th>Nama</th>
                  <th>Tanggal Penilaian</th>
                  <th>Skor</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($tampil_data->result_array() as $l){?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $l['nama_karyawan'];?></td>
                        <td><?php echo format_hari_tanggal(date($l['tanggal_supervisi']));?></td>
                        <td><?php echo number_format($l['total'],2);?></td>
                        <td class="center">
                              <a class="btn btn-success" href="<?php echo base_url(); ?>penilaian/details/<?php echo $l['id_supervisi']; ?>" title="view"><div style="font-size: 0.5rem;">
                                  <i class="fa fa-eye"></i>
                                </div>
                              </a>
                             <!--  <a class="btn btn-danger" href="<?php echo base_url('supervisi/delete/' . $l->id_penilaian); ?>" onClick="return confirm('Anda yakin..???');" title="Hapus"><div style="font-size: 0.5rem;">
                                  <i class="fa fa-trash"></i>
                                </div>
                              </a>
                              <a class="btn btn-warning" href="<?php echo base_url('supervisi/print/' . $l->id_penilaian); ?>" title="Print" target="_blank"><div style="font-size: 0.5rem;">
                                  <i class="fa fa-print"></i>
                                </div>
                              </a> -->
                          </td>                        
                        </tr>
                     <?php $no++; }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Tanggal Penilaian</th>
                  <th>Skor</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div> 
          </div>
        </div>
      </div>
    </section>
</div>
<?php $this->load->view('footer');?>