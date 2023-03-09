<?php
 
// DB table to use
$table = 'katalog';
 
$primaryKey = 'id_katalog';
 
$columns = array(
    array(  'db' => 'id_katalog', 'dt' => 'no' ),
    array(  'db' => 'nama', 'dt' => 'nama' ),
    array(  'db' => 'id_katalog',
            'dt' => 'aksi',

            'formatter' => function($d, $row) {

                return '
                <center>
                    <td class="text-center">
                        <a href="../katalog/see_katalog.php?id='.$d.'" class="btn btn-sm btn-light rounded-pill"><i
                                class="fas fa-eye"></i></a>
                        <a href="../katalog/edit_katalog.php?id='.$d.'" class="btn btn-sm btn-info rounded-pill"><i
                                class="fas fa-edit"></i></a>
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