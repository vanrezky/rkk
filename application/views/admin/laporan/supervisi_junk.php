<!-- <?php $this->load->view('header');?> 
<?php $this->load->view('side_menu');?> 
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Laporan Data Supervisi Pertanggal</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard');?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Laporan Supervisi</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">

          <div class="container-fluid">
            <div class="row">
            
              <div class="col-md-12">
            
                 <div class="card card-danger">
                    <div class="card-header">
                      <h3 class="card-title">Custom Filter</h3>
                    </div>
                    <?php echo form_open_multipart('laporan/set_supervisi','class="form-horizontal"'); ?>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-4">
                          <select name="nama" class="form-control">
                            <option hidden>--Pilih Nama Karyawan--</option>
                            <?php foreach($get_karyawan as $single_karyawan){?>
                            <option value="<?php echo $single_karyawan->id_karyawan;?>"><?php echo $single_karyawan->nama_karyawan;?></option>
                                      <?php }?>
                            </select>
                        </div>
                        <div class="col-3">
                          <input class="form-control" type="date" name="tanggal_awal" placeholder="ex. 2010-10-10">
                        </div>
                        <div class="col-3">
                          <input class="form-control" type="date" name="tanggal_akhir" placeholder="ex. 2010-10-10">
                        </div>
                        <div class="col-2">
                          <button type="submit" class="btn btn-primary form-control"><i class="glyphicon glyphicon-search"></i>Filter</button>
                        </div>
                      </div>
                    </div>
                  <?php echo form_close(); ?>
                </div>
              </div>
            </div>
          </div>
        </section>
          <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title"></h3>
                  </div>
                        <div class="card-body">
                          <p align="left">
                            <a href="<?php echo base_url(); ?>laporan/cetak_excel" class="btn btn-danger"><i class="glyphicon glyphicon-plus glyphicon-white" target="_blank"></i>Excel</a>
                            <a href="<?php echo base_url(); ?>laporan/cetak_excel" class="btn btn-info"><i class="glyphicon glyphicon-plus glyphicon-white" target="_blank"></i>Docs</a>
                            <a href="<?php echo base_url(); ?>laporan/cetak_excel" class="btn btn-primary"><i class="glyphicon glyphicon-plus glyphicon-white" target="_blank"></i>PDF</a>
                          </p>
                          <div class="box-body">
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
                            <table id="table2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Rincian Kewenangan Klinis</th>
                                    <th>Kualifikasi</th>
                                    <th width="21%">Tanggal Supervisi</th>
                                    <th>Nama Karyawan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no=1;
                                    foreach($data_supervisi as $dp)
                                    {
                                ?>
                                <tr>
                                    <td><?php echo $no;?></td>
                                    <td><?php echo $dp->rkk;?></td>
                                    <td><?php echo kualifikasi($dp->kualifikasi);?></td>
                                    <td><?php echo format_hari_tanggal(date($dp->tanggal_supervisi));?></td>
                                    <td><?php echo $dp->nama_karyawan;?></td>   
                                </tr>
                                <?php
                                    $no++;
                                }
                                ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
<script>
  $(function () {
    $('#table1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      
    });
  });
</script>
  <?php $this->load->view('footer');?>  -->