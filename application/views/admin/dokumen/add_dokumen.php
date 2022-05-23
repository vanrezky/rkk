<?php $this->load->view('header');?> 
<?php $this->load->view('side_menu');?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Jenis Dokumen</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>rkk">dokumen</a></li>
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
                <h3 class="card-title">Tambah Dokumen</h3>
              </div>
              <form class="form-horizontal" action="<?php echo base_url('dokumen/save');?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label>Jenis Dokumen</label>
                      <input type="text" class="form-control" name="jenis_dokumen" placeholder="Jenis dokumen" required autofocus>
                  </div>
                     <div class="form-group">
                      <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <a href="<?php echo base_url('dokumen')?>" class="btn btn-warning"><i class="glyphicon glyphicon-plus glyphicon-white"></i>Back</a>                       
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