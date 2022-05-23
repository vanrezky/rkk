<?php

function cmb_dinamis($name,$table,$field,$pk,$selected){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control chzn-select'>";
    $data = $ci->db->get($table)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}

 /***********HELPER misalkan nama helpernya mm_helper.php > simpan di folder helper **********************/
function loadjumlah($id , $tanggal){
    $ci =& get_instance();
    $ci->db->where('id_penilaian', $id);
    $ci->db->where('tanggal_penilaian', $tanggal);
    $empl = $this->db->select(' sum(nilai) as summary_ct ')->from('penilaian')->row();
    return $empl->summary_ct;
    }

function cmb_dinamistp($name,$table,$field1,$field2,$pk,$selected){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control chzn-select'>";
    $data = $ci->db->get($table)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field1)." - ".  strtoupper($d->$field2)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}

date_default_timezone_set('Asia/Jakarta');

// Konversi waktu ke : Senin, 4 Januari 2014

function format_hari_tanggal($waktu)

{

    // Senin, Selasa dst.

    $hari_array = array(

        'Minggu',

        'Senin',

        'Selasa',

        'Rabu',

        'Kamis',

        'Jumat',

        'Sabtu'

    );

    $hr = date('w', strtotime($waktu));

    $hari = $hari_array[$hr];



    // Tanggal: 1-31 dst, tanpa leading zero.

    $tanggal = date('j', strtotime($waktu));



    // Bulan: Januari, Maret dst.

    $bulan_array = array(

        1 => 'Januari',

        2 => 'Februari',

        3 => 'Maret',

        4 => 'April',

        5 => 'Mei',

        6 => 'Juni',

        7 => 'Juli',

        8 => 'Agustus',

        9 => 'September',

        10 => 'Oktober',

        11 => 'November',

        12 => 'Desember',

    );

    $bl = date('n', strtotime($waktu));

    $bulan = $bulan_array[$bl];


    // Tahun, 4 digit.

    $tahun = date('Y', strtotime($waktu));


    // Hasil akhir: Senin, 1 Oktober 2014

    return "$hari, $tanggal $bulan $tahun";

}



// Format tangal ke 1 Januari 1990

function format_tanggal($waktu)

{

    // Tanggal, 1-31 dst, tanpa leading zero.

    $tanggal = date('j', strtotime($waktu));



    // Bulan, Januari, Maret dst

    $bulan_array = array(

        1 => 'Januari',

        2 => 'Februari',

        3 => 'Maret',

        4 => 'April',

        5 => 'Mei',

        6 => 'Juni',

        7 => 'Juli',

        8 => 'Agustus',

        9 => 'September',

        10 => 'Oktober',

        11 => 'November',

        12 => 'Desember',

    );

    $bl = date('n', strtotime($waktu));

    $bulan = $bulan_array[$bl];



    // Tahun

    $tahun = date('Y', strtotime($waktu));



    // Senin, 12 Oktober 2014

    return "$tanggal $bulan $tahun";

}



// Format tangal ke yyyy-mm-dd

function date_to_en($tanggal)

{

    $tgl = date('Y-m-d', strtotime($tanggal));

    if ($tgl == '1970-01-01') {

        return '';

    } else {

        return $tgl;

    }

}



// Format tangal ke dd-mm-yyyy

function date_to_id($tanggal)

{

    $tgl = date('d-m-Y', strtotime($tanggal));

    if ($tgl == '01-01-1970') {        

        return '';

    } else {

        return $tgl;

    }

}

function konfirmasi($konfirmasi)

{

    if ($konfirmasi == 0) {

        echo "<button class='btn btn-danger btn-xs'>Belum";

    } else {

        echo "<button class='btn btn-success btn-xs'>Sudah";

    }

}


function status_surat($tgl_suratkeluar)

{

    if ($tgl_suratkeluar == '') {

        echo "<button class='btn btn-warning btn-xs'>Sedang diproses";

    } else {

        echo "<button class='btn btn-success btn-xs'>Sudah diproses";

    }

}



function warna_tgl($tanggal_update)

{
	//$bln = date("m");
	$saring=substr($tanggal_update,5,2);
    if ($saring == date('m')) {

        echo "<font color='black'>".$tanggal_update."</b>";

    } else {

        echo "<font color='red'>".$tanggal_update."</b>";

    }

}

function warna_update($tanggal_update)

{
    //$bln = date("m");
    $saring=substr($tanggal_update,5,2);
    if ($saring == date('m')) {

        echo "<font color='green'>".$tanggal_update."-SUDAH UPDATE</b>";

    } else {

        echo "<font color='red'>".$tanggal_update."-BELUM UPDATE</b>";

    }

}

function Kualifikasiklinis($status)

{

    if ($status == '') {

        echo "Belum ada unit";

    } else if ($status == "1") {

        echo "<button class='btn btn-info btn-xs'>Kualifikasi 1";
    } else if ($status == "2") {

        echo "<button class='btn btn-info btn-xs'>Kualifikasi 2";
    } else if ($status == "3") {

        echo "<button class='btn btn-info btn-xs'>Kualifikasi 3";
    } else if ($status == "4") {

        echo "<button class='btn btn-info btn-xs'>Kualifikasi 4";

    } else if ($status == "5") {
        echo "<button class='btn btn-info btn-xs'>Kualifikasi 5";
    }

}

function kualifikasi($status)

{

    if ($status == '') {

        echo "Belum ada level";

    } else if ($status == "0") {

        echo "<button class='btn btn-success btn-xs'>Supervisi";

    } else if ($status == "1") {
        echo "<button class='btn btn-success btn-xs'>Mandiri";
    }

}

function kualifikasi_excel($status)

{

    if ($status == '') {

        echo "Belum ada level";

    } else if ($status == "0") {

        echo "Supervisi";

    } else if ($status == "1") {
        echo "Mandiri";
    }

}

function status_proses($status)

{

    if ($status == '') {

        echo "<button class='btn btn-danger btn-xs'>belum proses";

    } else if ($status == "s") {

        echo "<button class='btn btn-success btn-xs'>Selesai";

    } else if ($status == "p") {
        echo "<button class='btn btn-warning btn-xs'>sedang diproses";
    }

}
