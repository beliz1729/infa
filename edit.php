<?php
   require_once 'connection.php'; // подключаем скрипт
 
    $link = mysqli_connect($host, $user, $password, $database) 
    or die ("Ошибка подключения к базе данных" . mysqli_error());
    $fio = $_GET['fio'];
	$school = $_GET['school'];
    $id = (int)$_GET['id'];
echo "<form method='GET' action='edit.php'>
<input type='hidden' name='id' value='$id'>
<table border='1'>
<tr>
<th>fio</th>
<th>school</th>
</tr>
<tr>
<td><input type='text' name='fio' value='$fio'></td>
<td><input type='text' name='school' value='$school'></td>
</tr>
</table>
<p><input type='submit' name='enter' value='submit changes'></p>
</form>";


if (isset($_GET['enter'])) {
	$update="UPDATE abitur
    SET fio_abit='$fio', school='$school'
    WHERE id_abit = $id";
    $result= mysqli_query($link, $update);
}

echo "<p><a href='list.php?'>back to list.php</a></p>"
 

?>