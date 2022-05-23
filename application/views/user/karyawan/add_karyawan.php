<?php $this->load->view('user/header');?> 
<?php $this->load->view('user/side_menu');?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

            <h1>Tambah Karyawan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>user">User</a></li>
              <li class="breadcrumb-item active">Add</li>
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
              <h3 class="card-title">Tambah Karyawan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form class="form-horizontal" action="<?php echo base_url('u_karyawan/save');?>" method="post" enctype="multipart/form-data">

              <div class="card-body">
                <div class="form-group">
                  <label>Nama Karyawan</label>
                    <input type="text" class="form-control" name="nama_karyawan" placeholder="Nama Karyawan" id="nama_karyawan"required autofocus>
                </div>
                <div class="form-group" class="form-control">
                    <label class="control-label" for="textarea2">Jenis Kelamin</label>
                    <div class="controls">
                        <select name="jenis_kelamin" class="form-control">
                            <option value="laki-laki">Laki Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
              </div>
                <div class="form-group">
                  <label>Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" id="tempat_lahir"required autofocus>
                </div>
                <div class="form-group">
                  <label>Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" id="tanggal_lahir"required autofocus>
                </div>
                
                   <div class="form-group">

                    <div class="form-actions">
                          <button type="submit" class="btn btn-primary">Save changes</button>
                          <a href="<?php echo base_url('u_karyawan')?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus glyphicon-white"></i>Back</a>                         
                      </div>
                      
                  </div>
                  
                  
             
            </div>
          </form>
          </div>
        </div>
      </div>
    </section>
<!-- below jquery things triggered on on input event and checks the username availability in the database -->

      <?php $this->load->view('user/footer');?> 