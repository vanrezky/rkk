<?php $this->load->view('header');?>
<?php $this->load->view('side_menu');?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>u_dashboard">dashboard</a></li>
              <li class="breadcrumb-item active">Supervisi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="form-group">

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
                <div class="card-body">
                <?php echo form_open_multipart('supervisi/create','class="form-horizontal"', 'id="validateForm()"'); ?>
                    <div class="form-group" >
                        <label for="varchar">Nama Karyawan</label>
                        <select data-placeholder="id_karyawan"  name="id_karyawan" id="id_karyawan" required class="form-control select2" style="width: 100%;">
                                <option value=""></option>
                                <?php
                                    foreach($mst_karyawan->result_array() as $mg)
                                    {
                                    if($id_karyawan==$mg['id_karyawan'])
                                    {
                                ?>
                                    <option value="<?php echo $mg['id_karyawan']; ?>" selected="selected"><?php echo $mg['nama_karyawan']; ?></option>
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                    <option value="<?php echo $mg['id_karyawan']; ?>"><?php echo $mg['nama_karyawan']; ?></option>
                                <?php
                                      }
                                    }
                                ?>
                        </select>
                    </div>
               
                    <div class="form-group">
                         <?php echo $this->session->userdata('message');?>
                        <?php foreach($tampildata as $dp) { ?>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group" >
                                        <input type="text" class="form-control" name="rkk[]" placeholder="Asuhan" id="rkk" required value="<?php echo $dp->asuhan;?>" readonly>
                                    </div>  
                                </div>&emsp;
                                <div class="col-md-3">
                                <select name="supervisi[]" class="form-control" required autofocus>
                                    <option value="">--Pilih--</option>
                                    <option value="1">Mandiri</option>
                                    <option value="0">Supervisi</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
<!--                                 <div class="col-2">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="customCheckboxa<?php echo $dp->id_rkk;?>" value="1" name="supervisi[]"> 
                                        <label for="customCheckboxa<?php echo $dp->id_rkk;?>" class="custom-control-label">Mandiri</label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="customCheckboxb<?php echo $dp->id_rkk;?>" value="0" name="supervisi[]">
                                        <label for="customCheckboxb<?php echo $dp->id_rkk;?>" class="custom-control-label">Supervisi</label>
                                     </div>
                                </div> -->
                            </div>  

                      <?php } ?>
                    </div>

                    <input type="submit" name="submit" value="Save">
                </form>
          </div>
        </div>
      </div>
    </section>
   

  </div>

<!-- <script src="<?=base_url().'assets/' ?>plugins/jquery/jquery.min.js"></script> -->
<script type="text/javascript">
  checker()
  function checker() {
    $('input[type="checkbox').map(function() {
      return $(this).prop("checked") ? $(this).attr('customCheckbox<?php echo $dp->id_rkk;?>'):null //ternari do on lae
    })
  }
</script>-->
<?php $this->load->view('footer');?>