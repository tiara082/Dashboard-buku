<?php
     require('../connect.php');

    ?>

<?php 
if (!empty($_SESSION['username']) ) {
    $username = $_SESSION['username'];
    $sql="select * from perpus.anggota where username='$username'";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc(); 

    if($row['sex']=='P'){
        $value = "https://randomuser.me/api/portraits/women/43.jpg";  
   }else {
         $value = "https://randomuser.me/api/portraits/men/57.jpg";
   }
    ?>


 
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Alef:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    

    <link rel="stylesheet" href="../resources/css/styles.css">
    <link rel="stylesheet" href="../resources/datatables/datatables.min.css">
    <link rel="stylesheet" href="../resources/fonts/stylesheet.css">
    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
  
      <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
      <style> 
      body{
              font-family: 'Roboto', sans-serif;

      }
      .submit{
        margin-right:20px;

      }{
        margin-top:40px;


      } </style>
    <title>Dashboard Buku</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-0 fixed-top">
        <a class="navbar-brand" href="index.html">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="side-bar">
                <li >
                    <a href="http://localhost/Dashboard-buku/index.php">
                        <!-- <i class="fas fa-tachometer-alt fa-fw"></i> -->
                        <i class="fas fa-solid fa-user fa-fw"></i>
                        Anggota
                    </a>
                </li>
                <li class="active">
                    <a href="http://localhost/Dashboard-buku/buku/index.php">
                        <!-- <i class="fas fa-paste fa-fw"></i> -->
                        <i class="fas fa-solid fa-book fa-fw"></i>
                        Buku
                    </a>
                </li>
                <li>
                    <a href="http://localhost/Dashboard-buku/katalog/index.php">
                    <i class="fas fa-solid fa-folder-open fa-fw"></i>
                    <!-- <i class="fas fa-columns fa-fw"></i> -->
                        Katalog
                    </a>
                </li>

                <li >
                    <a href="http://localhost/Dashboard-buku/penerbit/index.php">
                        <!-- <i class="fas fa-table fa-fw"></i> -->
                        <i class="fas fa-solid fa-paper-plane fa-fw"></i>
                        Penerbit
                    </a>
                </li>

                <li>
                    <a href="http://localhost/Dashboard-buku/pengarang/index.php">
                        <!-- <i class="fas fa-file fa-fw"></i> -->
                        <i class="fas fa-solid fa-pen-nib fa-fw"></i>
                        Pengarang
                    </a>
                </li>
            </ul>



            <ul class="navbar-nav ml-auto">
                

            <ul class="navbar-nav ml-5">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                            <img src="<?=$value?>" width="40"
                                class="border mp-1 rounded-circle">
                                <?php  echo $row['nama'];  ?>                   
                            </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#"><i class="fas fa-user fa-fw"></i> Profile</a>
                        <a class="dropdown-item" href="http://localhost/Dashboard-buku/logout.php"><i class="fas fa-sign-out-alt fa-fw"></i> Logout</a>
                    </div>
                </li>
            </ul>

        </div>
    </nav>

    <section class="content">

        <h1>Tambah Buku</h1>
      <hr>
      <?php 
        $array_penerbit = mysqli_query($conn, "select * from perpus.penerbit");
        $array_pengarang = mysqli_query($conn, "select * from perpus.pengarang");

        $array_katalog = mysqli_query($conn, "select * from perpus.katalog");
        
        
        ?>
      <form action="#" method="post" >
                    <table width="100%" class="table table-borderless" cellpadding ='10'>
                        <tr>
                            <th>ISBN</th>
                            <td><input type="text" name="isbn" class="form-control" required></td>
                        </tr>
                        <tr>
                            <th>Judul</th>
                            <td><input type="text" name="judul" class="form-control" required></td>
                        </tr>
                        <tr>
                            <th>Tahun</th>
                            <td><input type="text" name="tahun" class="form-control" required></td>
                        </tr>
                        <tr>
                            <th>Penerbit</th>
                            <td>

                                <select class="form-control" name="id_penerbit" required>
                                 <?php 
                                 while ($penerbit = mysqli_fetch_array($array_penerbit)) {
                                     echo" 
                                        <option value =".$penerbit['id_penerbit'].">".$penerbit['nama_penerbit']. "</option>";
                                 }; 
                                ?>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Pengarang</th>
                            <td>
                            <select class="form-control" name="id_pengarang" required>
                            <?php 
                                 while ($pengarang = mysqli_fetch_array($array_pengarang)) {
                                     echo" 
                                        <option value =".$pengarang['id_pengarang'].">".$pengarang['nama_pengarang']. "</option>";
                                 }; 
                                ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Katalog</th>
                            <td>
                            <select class="form-control" name="id_katalog" required>
                            <?php 
                                 while ($katalog = mysqli_fetch_array($array_katalog)) {
                                     echo" 
                                        <option value =".$katalog['id_katalog'].">".$katalog['nama']. "</option>";
                                 }; 
                                ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Stok Buku</th>
                            <td><input type="text" name="qty_stok" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td  colspan="2"><input type="submit" class="btn btn-primary submit" value="Tambah" name="submit" required>
                            <a href="./index.php" class="btn btn-secondary rounded-0 px-4">Kembali </a>
                            </td>
                        </tr>
                    </table>

                </form>
    </section>



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <script src="../js/custom.js"></script>
    <?php

if (isset($_POST['submit'])) {
    # code...
    $isbn = $_POST['isbn'];
    $judul = $_POST['judul'];
    $tahun = $_POST['tahun'];
    $id_penerbit = $_POST['id_penerbit'];
    $id_pengarang = $_POST['id_pengarang'];
    $id_katalog = $_POST['id_katalog'];
    $qty_stok = $_POST['qty_stok'];


$sql="insert into perpus.buku (isbn,judul,tahun,id_penerbit,id_pengarang,id_katalog,qty_stok) values ('$isbn','$judul','$tahun','$id_penerbit','$id_pengarang','$id_katalog','$qty_stok')";

if (!empty($isbn) && !empty($qty_stok)) {
    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>alert('Buku berhasil ditambahkan');
                    window.location ='index.php';
             </script>";
        } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
        echo "<script type='text/javascript'>alert('Buku telah ditambahkan')</script>";
        }
}else {
    # code...
    echo "<script type='text/javascript'>alert('Silahkan isi data buku secara lengkap')</script>";

}

}

?>
    

</body>

</html>

<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
    // header('location :http://localhost/Dashboard-buku/login.php');
    echo "<script>
        window.location='http://localhost/Dashboard-buku/login.php';
    </script>";
} ?>