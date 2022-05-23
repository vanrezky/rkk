<?php $this->load->view('header');?> 
<?php $this->load->view('side_menu');?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Rincian Kewenangan Klinis</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>rkk">Asuhan</a></li>
              <li class="breadcrumb-item active">Add</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-7">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Asuhan</h3>
              </div>
              <form class="form-horizontal" action="<?php echo base_url('rkk/save');?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label>Asuhan</label>
                      <input type="text" class="form-control" name="asuhan" placeholder="Asuhan" id="asuhan"required autofocus>
                  </div>
                  <div class="form-group">
                      <label class="control-label" for="textarea2">Kualifikasi</label>
                      <div class="controls">
                          <select name="kualifikasi" class="form-control">
                              <option value="" hidden>--Pilih--</option>
                              <option value="1">Kualifikasi Klinis 1</option>
                              <option value="2">Kualifikasi Klinis 2</option>
                              <option value="3">Kualifikasi Klinis 3</option>
                              <option value="4">Kualifikasi Klinis 4</option>
                              <option value="5">Kualifikasi Klinis 5</option>
                          </select>
                      </div>
                </div>
                <div class="form-group">
                      <label class="control-label" for="fileInput">Unit</label>
                      <div class="controls">
                          <select name="unit" class="form-control">
                              <?php foreach($all_unit as $single_unit){?>
                              <option value="" hidden>--Pilih--</option>
                              <option value="<?php echo $single_unit->id_unit;?>"><?php echo $single_unit->nama_unit;?></option>
                              <?php }?>
                          </select>
                      </div>
                  </div>
                     <div class="form-group">
                      <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <a href="<?php echo base_url('rkk')?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus glyphicon-white"></i>Back</a>                       
                        </div>
                    </div>
                  </div>
                </form>
                </div>
              </div>
            </div>
          </section>
        </div>

      <?php $this->load->view('footer');?> 