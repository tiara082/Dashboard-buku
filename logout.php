
<?php

session_start();
session_destroy();
echo "<script>
        window.location='http://localhost/Dashboard-buku/login.php';
    </script>";
exit;
?>

