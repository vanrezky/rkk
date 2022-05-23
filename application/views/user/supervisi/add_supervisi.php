<?php $this->load->view('user/header');?>
<?php $this->load->view('user/side_menu');?>
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
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard">dashboard</a></li>
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
                <?php echo form_open_multipart('u_supervisi/create','class="form-horizontal"', 'id="validateForm()"'); ?>
                  <div class="form-group">
                      <label class="control-label" for="fileInput">Pilih Nama Karyawan</label>
                      <div class="controls">
                          <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" required name="id_karyawan">
                            <option value="">Pilih Karyawan</option>
                            <?php foreach($all_karyawan as $single_karyawan){?>
                            <option value="<?php echo $single_karyawan->id_karyawan;?>"><?php echo $single_karyawan->nama_karyawan;?></option>
                              <?php }?>
                          </select>
                      </div>
                  </div>
                  &emsp;
                    <div class="form-group">
                         <?php echo $this->session->userdata('message');?>
                        <?php $i=1; foreach($tampildata as $dp) { ?>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group" >
                                        <input type="text" class="form-control" name="rkk[]" placeholder="Asuhan" id="asuhan" required value="<?php echo $dp->asuhan;?>" readonly hidden><?php echo $i;?>. <?php echo $dp->asuhan;?>
                                    </div> 
                                    <hr>
                                </div>&emsp;
                                <!-- <div class="col-md-3">
                                <select name="supervisi[]" class="form-control" required autofocus>
                                    <option value="" hidden>--Pilih--</option>
                                    <option value="1">Mandiri</option>
                                    <option value="0">Supervisi</option>
                                </select>
                                <span class="help-block"></span>
                            </div> -->
                                <div class="col-2">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="customCheckboxa<?php echo $dp->id_rkk;?>" value="1" name="kualifikasi[]"> 
                                        <label for="customCheckboxa<?php echo $dp->id_rkk;?>" class="custom-control-label">Mandiri</label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="customCheckboxb<?php echo $dp->id_rkk;?>" value="0" name="kualifikasi[]">
                                        <label for="customCheckboxb<?php echo $dp->id_rkk;?>" class="custom-control-label">Supervisi</label>
                                     </div>
                                </div>
                                <div class="col-1.5">
                                  <div class="custom-control custom-checkbox">
                                    <input class="form-control" placeholder="nilai"  type="number" name="nilai[]" id="dependent-box<?php echo $dp->id_rkk;?>" min="0" max="100">
                                  </div>
                                </div>
                            </div>  

                      <?php $i++;}?>
                    </div>
                      <div style="margin-top: 10px">
                        <button style="margin-left: 10px" type="submit" class="btn btn-success" onClick="return confirm('Nilai di input sudah benar??? Kerena anda tidak dapat mengedit lagi!!!');">Save changes </button>
                        <a href="<?php echo base_url('u_supervisi')?>" class="btn btn-primary float-left"><i class="glyphicon glyphicon-plus glyphicon-white"></i>Back</a>
                      </div>
                </form>
          </div>
        </div>
      </div>
    </section>
  </div>

<!-- <script src="<?=base_url().'assets/' ?>plugins/jquery/jquery.min.js"></script> -->
<!-- <script type="text/javascript">
  checker()
  function checker() {
    $('input[type="checkbox').map(function() {
      return $(this).prop("checked") ? $(this).attr('customCheckbox<?php echo $dp->id_rkk;?>'):null //ternari do on lae
    })
  }
</script>-->
<script>
document.getElementById('asuhan').value = <?php echo $dp->asuhan;?>;
</script>
<script src="<?=base_url().'assets/' ?>plugins/jquery/jquery.min.js"></script>
<!-- <script type="text/javascript" src="<?=base_url().'assets/' ?>/jquery.min.js"></script> -->
<!-- <script type="text/javascript">
      function cek_data()
      {
        sel_karyawan = $('[name="id_karyawan"]');
        $.ajax({
          type : 'POST',
          data: "cari="+1+"&id_karyawan="+sel_karyawan.val(),
          url  : 'view_data',
          cache: false,
          beforeSend: function() {
            sel_karyawan.attr('disabled', true);
            $('.loading').html('Loading.....');
          },
          success: function(data){
            sel_karyawan.attr('disabled', false);
            $('.loading').html('');
            $('.tampilkan_data').html(data);
          }
        });
       return false;
      }
    </script> -->
    <?php $i=1; foreach($tampildata as $dp) { ?>
    <script type="text/javascript">
       $(document).ready(function () {
            var checkbox = $('#customCheckboxa<?php echo $dp->id_rkk;?>');
            var dependent = $('#dependent-box<?php echo $dp->id_rkk;?>');
            if (checkbox.attr('checked') !== undefined){
               dependent.show();
            } else {
                dependent.hide();
            }
            
            checkbox.change(function(e){
               dependent.toggle(); 
            });
        }); 
    </script>

    <script type="text/javascript">
       $(document).ready(function () {
            var checkbox = $('#customCheckboxb<?php echo $dp->id_rkk;?>');
            var dependent = $('#dependent-box<?php echo $dp->id_rkk;?>');
            if (checkbox.attr('checked') !== undefined){
               dependent.show();
            } else {
                dependent.hide();
            }
            
            checkbox.change(function(e){
               dependent.toggle(); 
            });
        }); 
        
    </script>

    <?php $i++;}?>

<?php $this->load->view('user/footer');?>