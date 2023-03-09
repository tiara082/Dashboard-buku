<?php

//kita butuh config untuk query ke databasee
include "lib/config.php";

//simpan request post id_provinsi di variable
$id_penerbit = $_POST['id_penerbit'];

//prepared statement untuk keamanan dari sql injection
$data_where = array(
			'id_penerbit' => $id_penerbit
			);
//ambil data kabupaten dari kabupaten berdasarkan id provinsi yang di kirim
$data = $db->custom_query("select * from penerbit where id_penerbit=?",$data_where);

echo '<option value="all" selected>Semua</option>';
//lakukan looping untuk menampilkan hasil data query
foreach ($data as $isi) {
	echo "<option value='$isi->id_penerbit'>$isi->nama_penerbit</option>";
}

?>
