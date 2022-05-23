<?php $this->load->view('user/header');?> 
<?php $this->load->view('user/side_menu');?>
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

              <form class="form-horizontal" action="<?php echo base_url('u_rkk/update/'.$rkk_info_by_id->id_rkk);?>" method="post" enctype="multipart/form-data">

                <div class="card-body">
                  <div class="form-group">
                    <label>Asuhan</label>
                      <input type="text" class="form-control" name="asuhan" placeholder="Asuhan" id="asuhan" value="<?php echo $rkk_info_by_id->asuhan;?>" required autofocus>
                  </div>
                  <div class="form-group">
                      <label class="control-label" for="textarea2">Kualifikasi</label>
                      <div class="controls">
                          <select name="kualifikasi" class="form-control" id="kualifikasi">
                              <option value="1">Kualifikasi Klinis 1</option>
                              <option value="2">Kualifikasi Klinis 2</option>
                              <option value="3">Kualifikasi Klinis 3</option>
                              <option value="4">Kualifikasi Klinis 4</option>
                              <option value="5">Kualifikasi Klinis 5</option>
                          </select>
                      </div>
                  </div>
                  
                     <div class="form-group">

                      <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <a href="<?php echo base_url('u_rkk')?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus glyphicon-white"></i>Back</a>                         
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
document.getElementById('id_unit').value = <?php echo $rkk_info_by_id->unit;?>;
document.getElementById('kualifikasi').value = <?php echo $rkk_info_by_id->kualifikasi;?>;
</script>

      <?php $this->load->view('user/footer');?> 