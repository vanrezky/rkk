<?php $this->load->view('header');?> 
<?php $this->load->view('side_menu');?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Pengguna</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>user">User</a></li>
              <li class="breadcrumb-item active">Add</li>
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
                <h3 class="card-title">Edit Pengguna</h3>
              </div>
              <?php echo form_open_multipart('user/simpan','class="form-horizontal"'); ?>
                <div class="card-body">
                  <div class="form-group">
                   <label>Username</label>
                  <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" placeholder="Username" id="username"required autofocus>
                  <div id="msg"></div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" value="<?php echo $password; ?>" placeholder="Kata Sandi" required autofocus>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Lengkap</label>
                     <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $nama_lengkap; ?>" placeholder="Nama Lengkap">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                     <input type="email" class="form-control" name="email" placeholder="email" value="<?php echo $email; ?>">
                  </div>
                   <div class="form-group">
                            <label for="varchar">Level</label>
                            <select data-placeholder="id_level" class="form-control" name="id_level" id="id_level" required autofocus>
                                    <option value="<?php echo $id_level; ?>">--Pilih--</option>
                                    <?php
                                        foreach($mst_level->result_array() as $mg)
                                        {
                                        if($id_jenis==$mg['id_level'])
                                        {
                                    ?>
                                        <option value="<?php echo $mg['id_level']; ?>" selected="selected"><?php echo $mg['level']; ?></option>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>
                                        <option value="<?php echo $mg['id_level']; ?>"><?php echo $mg['level']; ?></option>
                                    <?php
                                          }
                                        }
                                    ?>
                            </select>
                      </div>
                      <div class="form-group">
                            <label for="varchar">Unit</label>
                            <select data-placeholder="id_unit" class="form-control" name="id_unit" id="id_unit" required autofocus>
                                    <option value="<?php echo $id_unit; ?>">--Pilih--</option>
                                    <?php
                                        foreach($mst_unit->result_array() as $mg)
                                        {
                                        if($id_unit==$mg['id_unit'])
                                        {
                                    ?>
                                        <option value="<?php echo $mg['id_unit']; ?>" selected="selected"><?php echo $mg['nama_unit']; ?></option>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>
                                        <option value="<?php echo $mg['id_unit']; ?>"><?php echo $mg['nama_unit']; ?></option>
                                    <?php
                                          }
                                        }
                                    ?>
                            </select>
                      </div>
                     <div class="form-group">
                    <div class="box-footer">
                          <button type="submit" class="btn btn-success">Simpan</button>
                          <a href="<?php echo site_url('user') ?>" class="btn btn-warning">Batal</a>
                          <input type="hidden" name="id_param" value="<?php echo $id_param; ?>">
                          <input type="hidden" name="st" value="<?php echo $st; ?>">
                      </div>
                    </div>
                    <?php echo form_close(); ?>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</section>
</div>

      <?php $this->load->view('footer');?> 