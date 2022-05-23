<?php $this->load->view('header');?>
<?php $this->load->view('side_menu');?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Level</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard">dashboard</a></li>
              <li class="breadcrumb-item active">Level</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <?php echo $this->session->userdata('message');?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Tambah Level</h3>
              </div> 
                <?php echo form_open_multipart('user/simpan_level','class="form-horizontal"'); ?>
                <div class="card-body">
                   <div class="form-group">
                   <label>Username</label>
                  <input type="text" class="form-control" name="level" placeholder="Level Admin" id="level"required autofocus>
                  </div>
                  <div class="form-group">
                        
                      <div class="box-footer">
                          <button type="submit" class="btn btn-success">Simpan</button>

                          <input type="hidden" name="id_param" value="<?php echo $id_param; ?>">
                          <input type="hidden" name="st" value="<?php echo $st; ?>">
                      </div>
                    </div>
                  
                    <?php echo form_close(); ?>
              </div>    
            </div>
          </div>

          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Level</h3>
              </div>
                <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th width="5%">No</th>
                <th width="40%">Level</th>
                <th width="10%">actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                        $no=1;
                        foreach($level->result_array() as $dp)
                        {
                    ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $dp['level'];?></td>
                        <td>                       
                          <a href="<?php echo base_url(); ?>user/hapus_level/<?php echo $dp['id_level']; ?>" onClick="return confirm('Anda yakin..???');" title="Hapus">
                          <button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>
                          </a>  </td>
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
    </section>
 </div>



<?php $this->load->view('footer');?>