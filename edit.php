<?php
   require_once 'connection.php'; // подключаем скрипт
 
    $link = mysqli_connect($host, $user, $password, $database) 
    or die ("Ошибка подключения к базе данных" . mysqli_error());
    $query = "SELECT ege_points FROM abitur";
    $result = mysqli_query($link, $query);
    
?>
<!DOCTYPE html>
<html>
<body>
<form method='GET' action='rez.php'>
<input type='hidden' name='id' value='<?=@$_GET['id']?>'>
<table border='1'>
<tr>
<th>fio</th>
<th>school</th>
<th>ege</th>
</tr>
<tr>
<td><input type='text' name='fio' value='<?=@$_GET['fio']?>'></td>
<td><input type='text' name='school' value='<?=@$_GET['school']?>'></td>
<td><select name='ege'>
            <?php
            while($row = mysqli_fetch_assoc($result)) {
                if ($row['ege_points'] == $_GET['abitur'])
                    echo "<option selected value='" . $row['ege_points'] . "'>" . $row['ege_points'] . "</option>";
                else
                    echo "<option value='" . $row['ege_points'] . "'>" . $row['ege_points'] . "</option>";
            }
            ?>
        </select></td>
</tr>
</table>
<p><input type='submit' name='enter' value='submit changes'></p>
</form>
</body>
</html>
