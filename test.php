<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <!-- bootstrap image gallery 1 -->
<div class="container-fluid">
  <h1 class="text-center"> RANDOM USER</h1>
<form action="#" method="post">
<div class="d-flex flex-wrap justify-content-center">
    <div class="d-flex flex-column">

    <?php

$picMale = array(
  "https://randomuser.me/api/portraits/men/57.jpg",
  "https://randomuser.me/api/portraits/men/39.jpg",
  "https://randomuser.me/api/portraits/men/35.jpg",
  "https://randomuser.me/api/portraits/men/0.jpg"
);
$picFemale = array(
  "https://randomuser.me/api/portraits/women/23.jpg",
  "https://randomuser.me/api/portraits/women/56.jpg",
  "https://randomuser.me/api/portraits/women/91.jpg",
  "https://randomuser.me/api/portraits/women/81.jpg"
);

       shuffle($picMale);
      shuffle($picFemale);

              
    // }
    if(isset($_POST)){
      if($_POST['jk']=="P"){
        foreach ($picFemale as $value){
          echo "<img class='img-fluid' src='$value'>" . "<br>";
          break;
            
        }
      }elseif ($_POST['jk']=="L") {
        # code...
                foreach ($picMale as $value){
            echo "<img class='img-fluid' src='$value'>" . "<br>";
            break;
      }
    }
    }
    ?>
      <select name="jk" class="form-select text-center" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="P" >Perempuan</option>
            <option value="L">Laki-laki</option>
        </select>
      <input type="submit" class="btn btn-primary" name="submit" value ="submit" href="http://localhost/test.php">
    </div>
  </div>
</div>

</form>
if        

</body>
</html>