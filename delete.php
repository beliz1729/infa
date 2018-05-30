<?php
require_once 'connection.php';

$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Ошибка подключения к базе данных" . mysqli_error());

$id = $_GET['id'];

$sql = "SET foreign_key_checks = 0";
$result = mysqli_query($link, $sql);

$query = "DELETE FROM abitur
	WHERE id_abit ='$id'";
$result = mysqli_query($link, $query);

// header('location: ./list.php');

?>

<html>
<body>
<script type='text/javascript'>
    window.location = 'list.php'
</script>
</body>
</html>