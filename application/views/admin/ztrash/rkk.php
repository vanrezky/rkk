<?php $this->load->view('header');?>
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">

    <?php $this->load->view('side_menu');?>

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rincian Kewenangan Klinis</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard">dashboard</a></li>
              <li class="breadcrumb-item active">RKK</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

          <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Custom Filter :</h3>
              </div>
            
                <div class="card-body">
                 <form id="form-filter" class="form-inline">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <?php echo $form_kualifikasi; ?>
                        </div>
                    </div>
                    <div class="form-group" >
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="asuhan" placeholder="Asuhan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="LastName" class="col-sm-12 control-label"></label>
                        <div class="col-sm-12">
                            <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
                            <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Rincian Kewenangan Klinis</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
             <p align="left">
                <button class="btn btn-success" onclick="add_rkk()"><i class="glyphicon glyphicon-plus"></i> Add RKK</button>
                <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
              </p>
                 <?php echo $this->session->userdata('message');?>
              <table id="table" class="table table-bordered table-striped" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th width="50%">Asuhan Keperawatan Klinis</th>
                    <th>Kualifikasi</th>
                    <th style="width:125px;">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

            <tfoot>
            <tr>
                <th>Asuhan Keperawatan Klinis</th>
                <th>Kualifikasi</th>
                <th>Action</th>
            </tr>
            </tfoot>
        </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>

<script type="text/javascript">

var save_method; //for save method string
var table;

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 


        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        //"order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('rkk/ajax_list')?>",
            "type": "POST",
            "data": function ( data ) {
                data.kualifikasi = $('#kualifikasi').val();
                data.asuhan = $('#asuhan').val();
            }
            
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });

    $('#btn-filter').click(function(){ //button filter event click
        table.ajax.reload();  //just reload table
    });
    $('#btn-reset').click(function(){ //button reset event click
        $('#form-filter')[0].reset();
        table.ajax.reload();  //just reload table
    });
});



function add_rkk()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add RKK'); // Set Title to Bootstrap modal title
}

function edit_rkk(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('rkk/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id_rkk"]').val(data.id_rkk);
            $('[name="asuhan"]').val(data.asuhan);
            $('[name="kualifikasi"]').val(data.kualifikasi);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit RKK'); // Set title to Bootstrap modal title

        },

         "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });

    $('#btn-filter').click(function(){ //button filter event click
        table.ajax.reload();  //just reload table
    });
    $('#btn-reset').click(function(){ //button reset event click
        $('#form-filter')[0].reset();
        table.ajax.reload();  //just reload table
    });
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('rkk/ajax_add')?>";
    } else {
        url = "<?php echo site_url('rkk/ajax_update')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }

            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function delete_rkk(id)
{
    if(confirm('Yakin menghapus data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('rkk/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

</script>



<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Rincian Kewenangan Klinis Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_rkk"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-6">Asuhan</label>
                            <div class="col-md-9">
                                <input name="asuhan" placeholder="Asuhan" class="form-control" type="text" required autofocus>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Kualifikasi</label>
                        <div class="col-md-9">
                                <select name="kualifikasi" class="form-control" required autofocus>
                                    <option value="">--Pilih Kualifikasi--</option>
                                    <option value="perawat klinis 1">Perawat Klinis 1</option>
                                    <option value="perawat klinis 2">Perawat Klinis 2</option>
                                    <option value="perawat klinis 3">Perawat Klinis 3</option>
                                    <option value="perawat klinis 4">Perawat Klinis 4</option>
                                    <option value="perawat klinis 5">Perawat Klinis 5</option>
                                    
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                       <!-- <div class="form-group">
                            <label class="control-label col-md-3">Unit</label>
                            <div class="col-md-9">
                                <textarea name="id_unit" placeholder="Kualifikasi" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>-->
                        
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>




<?php $this->load->view('footer');?>