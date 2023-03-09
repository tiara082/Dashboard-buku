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
      <style> body{
              font-family: 'Roboto', sans-serif;

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
                <li>
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

                <li class="active">
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
                        <a class="dropdown-item" href="http://localhost/Dashboard-buku/anggota/see_user.php"><i class="fas fa-user fa-fw"></i> Profile</a>
                        <a class="dropdown-item" href="http://localhost/Dashboard-buku/logout.php"><i class="fas fa-sign-out-alt fa-fw"></i> Logout</a>
                    </div>
                </li>
            </ul>

        </div>
    </nav>

    <section class="content">

        <h1>Dashboard</h1>
<!-- 
        <div class="row mt-4">
            <div class="col-sm-3">
                <div class="row no-gutters shadow shadow">
                    <div class="col-auto bg-primary text-white p-4 d-flex align-items-center">
                        <i class="fas fa-user fa-2x"></i>
                    </div>
                    <div class="col bg-white p-3">
                        <span>Users</span>
                        <h4>12345</h4>
                    </div>
                </div>
            </div> -->
       
            <div class="row align-items-center">
                    <div class="col-auto">
                        <a href="../penerbit/add_penerbit.php" class="btn btn-primary rounded-0 px-3">
                            <span class="rounded-pill">
                                <i class="fas fa-plus fa-fw"></i>
                            </span>
                            Tambahkan Penerbit baru
                        </a>
                    </div>
                </div>

                <br> 
            <table id="example" class="display table table-hover table-bordered " style="width:100%">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Penerbit</th>
                        <th>Email</th>
                        <th>No telpon</th> 
                        <th>Alamat</th>
                        <th>action</th>
                    </tr>
                </thead>
            </table>

            <!-- <div class="col-sm-3">
                <div class="row no-gutters shadow">
                    <div class="col-auto bg-info text-white p-4 d-flex align-items-center">
                        <i class="fas fa-paste fa-2x"></i>
                    </div>
                    <div class="col bg-white p-3">
                        <span>Posts</span>
                        <h4>12484</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="row no-gutters shadow">
                    <div class="col-auto bg-warning text-white p-4 d-flex align-items-center">
                        <i class="fas fa-comment fa-2x"></i>
                    </div>
                    <div class="col bg-white p-3">
                        <span>Comments</span>
                        <h4>12484</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="row no-gutters shadow">
                    <div class="col-auto bg-primary text-white p-4 d-flex align-items-center">
                        <a href="#" class="text-white">
                            <i class="fas fa-plus fa-2x"></i>
                        </a>
                    </div>
                    <a href="#" class="col bg-dark text-white btn rounded-0 pt-4">
                        <span class="lead">
                            New Post
                        </span>
                    </a>
                </div>
            </div>
        </div> -->



    </section>



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <script src="../js/custom.js"></script>

    

<!-- import jquery -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<!-- import jquery datatable -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

<!-- script javascript untuk datatable -->
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "../penerbit/data_user.php",
        "order": [[ 0, 'asc' ]],

        // membuat kolom
        "columns": [

            //untuk membuat data index
            { data: 'no', name:'id', render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }},

              //samakan data kolom sesuai dt di data.php
            { "data": 'nama' },
            { "data": 'email' },
            { "data": 'telp' },
            { "data": 'alamat' },
 
            { "data": 'aksi' },
        ]
    } );
} );
</script>

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
