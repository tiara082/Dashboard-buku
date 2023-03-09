<?php
 
 require('../connect.php');

// DB table to use
$table = 'view_buku';
 
// Table's primary key
$primaryKey = 'isbn';
 

// Array kolom basisdata akan dikirim kembali ke DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// 'db' mewakili parameter kolom database
// 'dt' adalah parameter yang akan ditampilkan di database pada index.php


$columns = array(
    array(  'db' => 'isbn', 'dt' => 'isbn' ),
    array(  'db' => 'judul', 'dt' => 'judul' ),
    array(  'db' => 'tahun',  'dt' => 'tahun' ),
    array(  'db' => 'nama_penerbit',   'dt' => 'penerbit' ),
    array(  'db' => 'nama_pengarang',   'dt' => 'pengarang' ),
    array(  'db' => 'nama_katalog',   'dt' => 'katalog' ),
    array(  'db' => 'qty_stok',   'dt' => 'stok' ),    
    array(  'db' => 'isbn',
            'dt' => 'aksi',

            // kalo kalian mau bikin tombol edit pake 'formatter' => function($d, $row) {return ....}
            // kalian bisa custom dengan menggunakan class bootstrap untuk mempercantik tampilan
            'formatter' => function($d, $row) {

                return '
                <td class="text-center">
                    <a href="./see_book.php?isbn='.$d.'" class="btn btn-sm btn-light rounded-pill"><i
                            class="fas fa-eye"></i></a>
                    <a href="./edit_book.php?isbn='.$d.'" class="btn btn-sm btn-info rounded-pill"><i
                            class="fas fa-edit"></i></a>
                    <a href="./delete_book.php?isbn='.$d.'" class="btn btn-sm btn-danger rounded-pill"><i
                            class="fas fa-trash"></i></a>
                </td>';
                // <a href="edit?id='.$d.'">EDIT</a>';
            }
         ),
);
 


//melakukan koneksi ke database
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'perpus',
    'host' => 'localhost'
);

//code di bawah tidak perlu diedit

require( '../ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);