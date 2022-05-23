<?php $this->load->view('header');?> 
<?php $this->load->view('side_menu');?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

            <h1>Edit Karyawan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>user">Karyawan</a></li>
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
                <h3 class="card-title">Edit Karyawan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form class="form-horizontal" action="<?php echo base_url('karyawan/update/'.$karyawan_info_by_id->id_karyawan);?>" method="post" enctype="multipart/form-data">

                <div class="card-body">
                  <div class="form-group">
                    <label>Nama Karyawan</label>
                      <input type="text" class="form-control" name="nama_karyawan" placeholder="Nama Karyawan" id="nama_karyawan" value="<?php echo $karyawan_info_by_id->nama_karyawan;?>" required autofocus>
                  </div>
                  <div class="form-group">
                      <label class="control-label" for="textarea2">Jenis Kelamin</label>
                      <div class="controls">
                          <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                              <option value="laki-laki">Laki laki</option>
                              <option value="perempuan">Perempuan</option>
                          </select>
                  </div>
                </div>
                  <div class="form-group">
                    <label>Tempat Lahir</label>
                      <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" id="tempat_lahir"required value="<?php echo $karyawan_info_by_id->tempat_lahir;?>" autofocus>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Lahir</label>
                      <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" id="tanggal_lahir"required value="<?php echo $karyawan_info_by_id->tanggal_lahir;?>" autofocus>
                  </div>
                  <div class="form-group">
                    <div class="col-md-6">
                      <label class="control-label" for="fileInput">Unit</label>
                      <div class="controls">
                          <select name="unit" id="id_unit" class="form-control">
                              <?php foreach($all_unit as $single_unit){?>
                              <option value="<?php echo $single_unit->id_unit;?>"><?php echo $single_unit->nama_unit;?></option>
                              <?php }?>
                          </select>
                      </div>
                  </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-6">
                      <label class="control-label" for="fileInput">Kepala Unit</label>
                      <div class="controls">
                          <select name="kepala_unit" id="kepala_unit" class="form-control">
                              <?php foreach($all_kaunit as $single_kaunit){?>
                              <option value="<?php echo $single_kaunit->id_user;?>"><?php echo $single_kaunit->nama_lengkap;?></option>
                              <?php }?>
                          </select>
                      </div>
                  </div>
                  </div> 
                  <div class="form-group">
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <a href="<?php echo base_url('karyawan')?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus glyphicon-white"></i>Back</a>                         
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
document.getElementById('kepala_unit').value = <?php echo $karyawan_info_by_id->kepala_unit;?>;
document.getElementById('id_unit').value = <?php echo $karyawan_info_by_id->unit;?>;
document.getElementById('jenis_kelamin').value = <?php echo $karyawan_info_by_id->jenis_kelamin;?>;
</script>

      <?php $this->load->view('footer');?>