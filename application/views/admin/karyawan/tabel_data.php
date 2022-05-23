<?php
	$no=1;
	foreach ($v_data->result() as $baris): ?>
	<div class="col-12 col-sm-6">
		<div>
			
		</div>
		<div class="form-group">
			<label>Unit</label>
			<input type="text" name="unit" class="form-control" value="<?php echo $baris->id_unit; ?>" readonly autofocus hidden>
			<input type="text" class="form-control" value="<?php echo $baris->nama_unit; ?>" readonly autofocus>
		</div>
	</div>

	<?php
	endforeach;
?>
