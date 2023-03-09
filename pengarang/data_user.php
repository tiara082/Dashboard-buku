<?php
 
// DB table to use
$table = 'pengarang';
 
// Table's primary key
$primaryKey = 'id_pengarang';
 

// Array kolom basisdata akan dikirim kembali ke DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// 'db' mewakili parameter kolom database
// 'dt' adalah parameter yang akan ditampilkan di database pada index.php

$columns = array(
    array(  'db' => 'id_pengarang', 'dt' => 'no' ),
    array(  'db' => 'nama_pengarang', 'dt' => 'nama' ),
    array(  'db' => 'email',  'dt' => 'email' ),
    array(  'db' => 'telp',   'dt' => 'telp' ),
    array(  'db' => 'alamat',   'dt' => 'alamat' ),
    array(  'db' => 'id_pengarang',
            'dt' => 'aksi',

            // kalo kalian mau bikin tombol edit pake 'formatter' => function($d, $row) {return ....}
            // kalian bisa custom dengan menggunakan class bootstrap untuk mempercantik tampilan
            'formatter' => function($d, $row) {

                return '
            <center>
                <td class="text-center">
                    <a href="see_pengarang.php?id='.$d.'" class="btn btn-sm btn-light rounded-pill"><i
                            class="fas fa-eye"></i></a>
                    <a href="edit_pengarang.php?id='.$d.'" class="btn btn-sm btn-info rounded-pill"><i
                            class="fas fa-edit"></i></a>
                    <a href="delete_pengarang.php?id='.$d.'" class="btn btn-sm btn-info rounded-pill"><i
                            class="fas fa-trash"></i></a>
                </td>
            </center>';
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