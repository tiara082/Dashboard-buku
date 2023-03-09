<?php

//kita butuh config untuk query ke databasee
include "lib/config.php";

//simpan request post id_kabupaten di variable
$id_pengarang = $_POST['id_pengarang'];

//prepared statement untuk keamanan dari sql injection
$data_where = array(
			'id_pengarang' => $id_pengarang
			);
//ambil data kabupaten dari kabupaten berdasarkan id provinsi yang di kirim
$data = $db->custom_query("select * from pengarang where id_pengarang=?",$data_where);

echo '<option value="all" selected>Semua</option>';
//lakukan looping untuk menampilkan hasil data query
foreach ($data as $isi) {
	echo "<option value='$isi->id_pengarang'>$isi->nama_pengarang</option>";
}

?>
