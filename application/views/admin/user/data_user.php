<?php $this->load->view('header');?>
<?php $this->load->view('side_menu');?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pengguna</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard">dashboard</a></li>
              <li class="breadcrumb-item active">Pengguna</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Pengguna Aplikasi</h3>
            </div>
            <div class="card-body">
             <p align="left">
                <a href="<?php echo base_url(); ?>user/tambah" class="btn btn-primary"><i class="glyphicon glyphicon-plus glyphicon-white"></i> Tambah</a>
              </p>
                 <?php echo $this->session->userdata('message');?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th width="5%">No</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Terakhir Login</th>
                <th>Level</th>
                <th>Unit</th>
                <th width="10%">actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($data_user as $du) { ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $du->nama_lengkap;?></td>
                        <td><?php echo $du->email;?></td>
                        <td><?php echo $du->terakhir_login;?></td>
                        <td><?php echo $du->level;?></td>
                        <td><?php echo $du->nama_unit;?></td>
                        <td>
                            <a href="<?php echo base_url('user/ubah/' . $du->id_user); ?>" title="Ubah"><button class="btn btn-xs btn-info"><i class="fa fa-share"></i></button>
                          </a>                  
                            <a href="<?php echo base_url('user/edit/' . $du->id_user); ?>" onClick="return confirm('Anda yakin..???');" title="Hapus"><button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                          </a>  
                        </td> 
                      </tr>
                  <?php $no++; } ?>
                </tbody>
                <tfoot>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Terakhir Login</th>
                <th>Level</th>
                <th>Unit</th>
                <th>actions</th>    
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php $this->load->view('footer');?>