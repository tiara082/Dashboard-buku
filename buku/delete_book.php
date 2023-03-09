
<?php
     require('../connect.php');
     $isbn=$_GET['isbn'];

     $delete ="delete from perpus.buku where isbn ='$isbn'";


        if ($conn->query($delete) === TRUE ) {
            echo "<script type='text/javascript'>
                   alert('Data Buku berhasil dihapus ');
                    window.location='http://localhost/Dashboard-buku/buku/index.php';
                     </script>";
            // header('location:');
    
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            //echo "<script type='text/javascript'>alert('User Exists')</script>";
        }
    
 


?>