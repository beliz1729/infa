<?php
require_once 'connection.php';

$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Ошибка подключения к базе данных" . mysqli_error());
    

    $fio = $_GET['fio'];
	$school = $_GET['school'];
    $id = (int)$_GET['id'];
    $ege= $_GET['ege_points'];

    $update1="UPDATE abitur
    SET fio_abit='$fio', school='$school'
    WHERE id_abit = $id";
    $result1= mysqli_query($link, $update1);
    $update2="UPDATE ege
    SET ege_points='$ege'
    WHERE id_abit = $id";
    $result2= mysqli_query($link, $update2);

?>

<html>
<body>
<script type='text/javascript'>
    window.location = 'list.php'
</script>
</body>
</html>