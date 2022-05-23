
<?php $this->load->view('user/header');?> 
<?php $this->load->view('user/side_menu');?> 
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Penilaian Karyawan Berdasarkan RKK</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard');?>">dashboard</a></li>
              <li class="breadcrumb-item active">penilaian</li>
            </ol>
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
                    <h3 class="card-title">Custom Filter :</h3>
                  </div>
                  <?php echo form_open_multipart('u_penilaian/set','class="form-horizontal"'); ?>
                      <div class="col-md-12">
                        <div class="box box-danger">
                          <div class="card-body"> 
                          <form class="form-inline">
                          <div class="form-group">
                              <label class="control-label" for="fileInput">Pilih Nama Karyawan</label>
                              <div class="controls">
                                  <select name="nama" class="form-control">
                                      <option hidden>--Pilih Nama Karyawan--</option>
                                      <?php foreach($get_karyawan as $single_karyawan){?>
                                      <option value="<?php echo $single_karyawan->id_karyawan;?>"><?php echo $single_karyawan->nama_karyawan;?></option>
                                      <?php }?>
                                  </select>
                              </div>
                          </div>                    
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="tanggal_awal">Tanggal Supervisi</label>
                                <input class="form-control" type="date" name="tanggal" placeholder="ex. 2010-10-10">                    
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group">
                                <label for="tanggal_awal">Cari</label>
                                <button type="submit" class="btn btn-primary form-control"><i class="glyphicon glyphicon-search"></i>Cari</button>                    
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    <?php echo form_close(); ?>
                  </div>                
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
                    <h3 class="card-title">Tampil Data Supervisi</h3>
                  </div>
                  <form class="form-horizontal" action="<?php echo base_url('u_penilaian/save');?>" method="post" enctype="multipart/form-data">
                   <div class="card-body">
                      <div class="form-group">
                        <?php $i=1; foreach($data_supervisi as $dp) { ?>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group" >
                                        <input type="hidden" class="form-control" name="id_supervisi[]" placeholder="Asuhan" id="asuhan" required value="<?php echo $dp->id_supervisi;?>" readonly><?php echo $i;?>. <?php echo $dp->rkk;?>
                                        <hr>
                                    </div>  
                                </div>
                                <div class="col-md-1">
                                <div class="form-group" >
                                        <input type="number" class="form-control" name="nilai[]" placeholder="nilai" id="nilai" required min="0" max="100">
                                    </div>  
                            </div>
                                &emsp;
                                <div class="col-md-3">
                                <div class="form-group" >
                                        <p><?php echo $dp->nama_karyawan;?></p>
                                    </div>

                            </div>
                             <input type="text" name="id_karyawan[]" id="id_karyawan" hidden value="<?php echo $dp->karyawan;?>">
                            </div>
                            <?php $i++;} ?>
                    </div>
                    <div class="form-actions">
                            <button type="submit" class="btn btn-primary" onClick="return confirm('Nilai di input sudah benar??? Kerena anda tidak dapat mengedit lagi!!!');">Save changes </button>
                            <a href="<?php echo base_url('u_penilaian')?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus glyphicon-white"></i>Back</a>                         
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
  <?php $this->load->view('user/footer');?> 