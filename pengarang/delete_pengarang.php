<?php
     require('../connect.php');
     $id_pengarang=$_GET['id'];

     $delete ="delete from perpus.pengarang where id_pengarang ='$id_pengarang'";


        if ($conn->query($delete) === TRUE ) {
            echo "<script type='text/javascript'>
                   alert('Data Pengarang berhasil dihapus ');
                    window.location='http://localhost/Dashboard-buku/index.php';
                     </script>";
            // header('location:');
    
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            //echo "<script type='text/javascript'>alert('User Exists')</script>";
        }
    
 


?>
