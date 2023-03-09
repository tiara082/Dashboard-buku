<?php
     require('../connect.php');
     $id_penerbit=$_GET['id'];

     $delete ="delete from perpus.penerbit where id_penerbit ='$id_penerbit'";


        if ($conn->query($delete) === TRUE ) {
            echo "<script type='text/javascript'>
                   alert('Data Penerbit berhasil dihapus ');
                    window.location='http://localhost/Dashboard-buku/index.php';
                     </script>";
            // header('location:');
    
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            //echo "<script type='text/javascript'>alert('User Exists')</script>";
        }
    
 


?>
