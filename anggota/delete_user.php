<?php
     require('../connect.php');
     $id_anggota=$_GET['id'];

     $delete ="delete from perpus.anggota where id_anggota ='$id_anggota'";


        if ($conn->query($delete) === TRUE ) {
            echo "<script type='text/javascript'>
                   alert('Data Anggota berhasil dihapus ');
                    window.location='http://localhost/Dashboard-buku/index.php';
                     </script>";
            // header('location:');
    
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            //echo "<script type='text/javascript'>alert('User Exists')</script>";
        }
    
 


?>
