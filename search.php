   <?php
   require_once 'connection.php'; // подключаем скрипт
 
    $link = mysqli_connect($host, $user, $password, $database) 
    or die ("Ошибка подключения к базе данных" . mysqli_error());

    $name = strtr($_GET['name'], '*', '%');
    $fio = strtr($_GET['fio'], '*', '%');

    $name1 = strtr($_GET['name'], '*', '*');
    $fio1 = strtr($_GET['fio'], '*', '*');

    echo "<form method='GET' action='search.php'>
    <p>Введите что-нибудь абитуриента: <input type='text' name='name' value='$name1'></p>
    <p>Введите что-нибудь работника: <input type='text' name='fio' value='$fio1'></p>
    <p><input type='submit' name='enter' value='Поиск'></p>
    </form>";

    if (isset($_GET['enter']))
    {
      $sql="SELECT workers.fio, registration.fio_abit
    FROM workers, registration
    WHERE workers.id_worker=registration.id_worker 
    AND fio_abit LIKE '%$name%' AND fio LIKE '%$fio%'";

$result = mysqli_query($link, $sql);
echo "<table border='1'>
<tr> 
<th>fio_worker</th>
<th>fio_abit</th>
</tr>";
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['fio'] . "</td>";
echo "<td>" . $row['fio_abit'] . "</td>";
echo "</tr>";
}

echo "</table>"; 

if(mysqli_num_rows($result) == 0)
{
     echo 'Ошибка';
}

}




mysqli_close($link);
?>

