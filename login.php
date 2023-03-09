<?php
 require('./connect.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Alef:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    

    <link rel="stylesheet" href="resources/css/styles.css">
    <link rel="stylesheet" href="resources/datatables/datatables.min.css">
    <link rel="stylesheet" href="resources/fonts/stylesheet.css">
    <link rel="stylesheet" href="resources/css/bootstrap.min.css">

    <link rel="stylesheet" href="style.css">
  
      <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
      <style>
       body{
              font-family: 'Roboto', sans-serif;
      } section{
        margin-top : 150px;
        margin-bottom : auto;

      }
      
      </style>
    <title>Dashboard Buku</title>
</head>

<body>

<ul class="background">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>

      
     
    <section class="w-100 p-4 d-flex justify-content-center pb-4">
   

    <form style="width: 22rem;" action="#" method="post">
    <h1 class="text-center " style="color :white;">LOGIN</h1>
        <!-- Email input -->
        <div class="form-outline mb-4">          
              <label class="form-label" style="margin-left: 0px; margin-top:30px; color :white;">Username</label>

            <input type="text" class="form-control" required name="username" placeholder="Username">
      </div>
        <!-- Password input -->
        <div class="form-outline mb-4">          
            <label class="form-label" style="margin-left: 0px;  margin-top:15px; color :white;">Password</label>

          <input type="password" class="form-control" required name="password" placeholder="Password">
    </div>

        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
          <div class="col d-flex justify-content-center">
            <!-- Checkbox -->
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" checked="" required>
              <label class="form-check-label" style="color :white;"> Remember me </label>
            </div>
          </div>

        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-success  btn-block mb-4 submit" name="login" href ="http://localhost/Dashboard-buku/index.php">login</button>

      </form>
    </section>
    </ul>
    <?php
      if(isset($_POST['login'])){

        $password = $_POST['password'];
        $username=$_POST['username'];

        
        $sql="select * from perpus.anggota where password = '$password' AND username ='$username'";

        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            echo "<script type='text/javascript'>
            alert('Login berhasil ');
            window.location='http://localhost/Dashboard-buku/index.php';
         </script>";
          } else {
            echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
        }

      
      }

?>

</body>