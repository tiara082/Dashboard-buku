<?php
session_start();
include "lib/config.php";

//kolom apa saja yang akan ditampilkan
$columns = array(
	'buku.isbn',
	'buku.judul',
	'nama_penerbit',
	'nama_pengarang',
	);


//jika ingin langsung menambahkan kondisi where dengan parameter terentu query seperti ini 
	//misal kita akan langsung menambahkan kondisi langsung hanya menampilkan provinsi jawabarat saja, 
//prepared statement untuk keamanan data
/*$array_id_provinsi = array('provinsi.id_prov' => 32); //32 adalah id untuk jawabarat
	$query = $datatable->get_custom("select provinsi.nama_prov,kabupaten.nama_kab, kecamatan.nama_kec,id_kec
from provinsi inner join kabupaten 
on provinsi.id_prov=kabupaten.id_prov
inner join kecamatan on kabupaten.id_kab=kecamatan.id_kab where provinsi.id_prov=?",$columns,$array_id_provinsi);*/

//untuk mencobanya uncomment query diatas dan comment query dibawah

//lakukan query data dari 3 table dengan inner join
	$query = $datatable->get_custom("select buku.isbn,buku.judul, penerbit.nama_penerbit,pengarang.nama_pengarang
from buku inner join penerbit 
on buku.id_penerbit=penerbit.id_penerbit
inner join pengarang on buku.id_pengarang=pengarang.id_pengarang ",$columns);


	//buat inisialisasi array data
	$data = array();

	foreach ($query	as $value) {

	//array sementara data
	$ResultData = array();
	
	//masukan data ke array sesuai kolom table
	$ResultData[] = $value->isbn;
	$ResultData[] = $value->judul;
	$ResultData[] = $value->nama_penerbit;
	$ResultData[] = $value->nama_pengarang;

	//bisa juga pake logic misal jika value tertentu maka outputnya

	//kita bisa buat tombol untuk keperluan edit, delete, dll, 
	$ResultData[] = '
	<center>
	<td class="text-center">
	<a href="./see_book.php?isbn='.$value->isbn.'" class="btn btn-sm btn-light rounded-pill"><i
			class="fas fa-eye"></i></a>
	<a href="./edit_book.php?isbn='.$value->isbn.'" class="btn btn-sm btn-info rounded-pill"><i
			class="fas fa-edit"></i></a>
	<a href="./delete_book.php?isbn='.$value->isbn.'" class="btn btn-sm btn-danger rounded-pill"><i
			class="fas fa-trash"></i></a>
</td> </center>';

	//memasukan array ke variable $data

	$data[] = $ResultData;
}

//set data
$datatable->set_data($data);
//create our json
$datatable->create_data();
