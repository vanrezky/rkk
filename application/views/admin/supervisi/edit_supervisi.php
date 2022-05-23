<?php $this->load->view('header');?>
<?php $this->load->view('side_menu');?>
<div class="content-wrapper">
  <section class="content">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Halaman Supervisi Karyawan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">supervisi</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
</section>
<section class="content">
    <?php echo $this->session->userdata('message');?>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <a href="<?php echo base_url('supervisi/print/' . $supervisi_info->id_supervisi); ?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>

                <a href="<?php echo base_url('supervisi/pdf/' . $supervisi_info->id_supervisi); ?>" target="_blank" class="btn btn-primary"><i class="fas fa-download"></i> Generate PDF</a>
                <a style="margin-left: 5px;" href="<?php echo base_url('supervisi'); ?>" class="btn btn-warning"><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
                </h3>
                </div>
                <?php echo form_open_multipart('supervisi/update','class="form-horizontal"', 'id="validateForm()"'); ?>
                    <div class="card-body">
                        <div class="span4 text-left">
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <td>Nama Karyawan </td>
                                    <td><b><?php echo $karyawan_info->nama_karyawan; ?></b></td>
                                </tr>
                                <tr>
                                    <td>Unit </td>
                                    <td><?php echo $karyawan_info->nama_unit; ?></td>
                                </tr>
                                <tr>
                                    <td>Kepala Unit </td>
                                    <td><?php echo $karyawan_info->nama_lengkap; ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Supervisi </td>
                                    <td><?php echo format_hari_tanggal(date($supervisi_info->tanggal_supervisi)); ?></td>
                                </tr>
                            </table>
                        </div>
                        <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th width="3%">No.</th>
                            <th>Asuhan Kewenangan Klinis</th>
                            <th width="15%">Kualifikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($supervisi_details_info as $single_supervisi_details) {
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><input type="text" name="rkk[]" class="form-control" value="<?php echo $single_supervisi_details->rkk ?>" required>
                                  </td>

                                <td><select name="kualifikasi[]" class="form-control" id="kualifikasi<?php echo $i; ?>"required>
                                    <option value="" hidden>--Pilih--</option>
                                    <option value="1">Mandiri</option>
                                    <option value="0">Supervisi</option>
                                </select>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    &emsp;
                <div class="row no-print">
                    <div class="col-12">
                          <div class="form-group">
                            <a href="<?php echo base_url('supervisi'); ?>" class="btn btn-warning float-sm-right"><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
                            <div class="form-actions">
                            <button type="submit" class="btn btn-primary float-sm-right" style="margin-right: 5px"><li class="fas fa-save"></li> Save changes</button>                         
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
              </form>
            </div>
        </div>
    </div>
</section>
</div>
<script>
<?php  $i = 0; foreach ($supervisi_details_info as $single_supervisi_details) { $i++;?>
document.getElementById('kualifikasi<?php echo $i; ?>').value = <?php echo $single_supervisi_details->kualifikasi;?>;
<?php } ?>
</script>
<?php $this->load->view('footer');?>