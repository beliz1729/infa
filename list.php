<?php
require_once 'connection.php';
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Ошибка подключения к базе данных" . mysqli_error());

echo "Вы подключились!<br>";

$sql ="SELECT fio_abit, school, id_abit FROM abitur";

if (mysqli_query($link, $sql)) {
  echo "Молодец. Все получилось";
} else {
  echo "Ты дебил. Делай заново: " . mysqli_error($link);
}


$result = mysqli_query($link, $sql);

echo "<table border='1'>
<tr> 
<th>fio_abit</th>
<th>school</th>
<th>id_abit</th>
<th>edition</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
    $fio = $row['fio_abit'];
    $school = $row['school'];
    $id = $row['id_abit'];
echo "<tr>";
echo "<td>" . $fio . "</td>";
echo "<td>" . $school . "</td>";
echo "<td>" . $id . "</td>";
echo "<td><a href='edit.php?fio=$fio&school=$school&id=$id'>edit</a><br></td>";
echo "</tr>";
}

echo "</table>";

mysqli_close($link);

?>