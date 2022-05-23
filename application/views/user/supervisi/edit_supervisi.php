<?php $this->load->view('header');?> 
<?php $this->load->view('side_menu');?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

            <h1>Edit Asuhan Rincian Kewenangan Klinis</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>u_rkk">Asuhan</a></li>
              <li class="breadcrumb-item active">edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-7">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Asuhan Rincian Kewenangan Klinis</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form class="form-horizontal" action="<?php echo base_url('u_supervisi/update/'.$supervisi_info_by_id->id_supervisi);?>" method="post" enctype="multipart/form-data">

                <div class="card-body">
                  <div class="form-group">
                    <label>Nama Lengkap</label>
                      <input type="text" class="form-control" placeholder="Karyawan" id="karyawan" value="<?php echo $supervisi_info_by_id->nama_karyawan;?>" required autofocus readonly>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Supervisi</label>
                      <input type="text" class="form-control" name="tanggal_supervisi" placeholder="Tanggal Supervisi" id="tanggal_supervisi" value="<?php echo $supervisi_info_by_id->tanggal_supervisi;?>" required autofocus readonly>
                  </div>
                  <div class="form-group">
                    <label>Kepala Unit</label>
                      <input type="text" class="form-control" placeholder="Kepala unit" id="ka_unit" value="<?php echo $supervisi_info_by_id->nama_lengkap;?>" required autofocus readonly>
                  </div>                  
                  <div class="form-group">
                    <label>Asuhan Keperawatan</label>
                      <input type="text" class="form-control" name="rkk" placeholder="Asuhan Keperawatan" id="rkk" value="<?php echo $supervisi_info_by_id->rkk;?>" required autofocus>
                  </div>
                  <div class="form-group">
                      <label class="control-label" for="textarea2">Kualifikasi</label>
                      <div class="controls">
                          <select name="supervisi" class="form-control" id="supervisi">
                              <option value="0">Supervisi</option>
                              <option value="1">Mandiri</option>
                          </select>
                      </div>
                  </div>

                  <input type="hidden" name="ka_unit" placeholder="Kepala unit" id="ka_unit" value="<?php echo $supervisi_info_by_id->ka_unit;?>" required autofocus readonly hide>
                  <input type="hidden" name="karyawan" placeholder="Karyawan" id="karyawan" value="<?php echo $supervisi_info_by_id->karyawan;?>" required autofocus readonly hide> 
                     <div class="form-group">
                      <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <a href="<?php echo base_url('u_supervisi')?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus glyphicon-white"></i>Back</a>                         
                        </div> 
                    </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </section>
  </div>
<!-- below jquery things triggered on on input event and checks the username availability in the database -->

<script>
document.getElementById('supervisi').value = <?php echo $supervisi_info_by_id->supervisi;?>;
</script>

<?php $this->load->view('user/footer');?> 