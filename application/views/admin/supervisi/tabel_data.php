<?php
	$no=1;
	foreach ($v_data->result() as $baris): ?>
	 <input type="text" name="ka_unit" hidden value="<?php echo $baris->kepala_unit; ?>">
	<div class="col-12 col-sm-6">
		<div class="form-group">
			<label>Kepala Unit</label>
			<input type="text" class="form-control" value="<?php echo $baris->nama_lengkap; ?>" readonly autofocus>
		</div>
		<div class="form-group">
			<label>Unit</label>
			<input type="text" class="form-control" value="<?php echo $baris->nama_unit; ?>" readonly autofocus>
		</div>
	</div>

	<?php
	endforeach;
?>
