<?php
require_once 'connection.php'; // подключаем скрипт
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Ошибка подключения к базе данных" . mysqli_error());

echo "Вы подключились!<br>";
 

$sql = 'CREATE TABLE abitur (
  fio_abit varchar (250) NOT NULL,
  passport int(11) NOT NULL,
  id_abit int(10) NOT NULL AUTO_INCREMENT,
  forrm varchar(250) NOT NULL,
  school varchar(250) NOT NULL,
  medal varchar(250) DEFAULT NULL,
  speciality varchar(250) NOT NULL,
  form varchar(250) NOT NULL,
  average_point int(10) NOT NULL,
  exemption varchar(250) DEFAULT NULL,
  ege_points varchar(250) NOT NULL,
  PRIMARY KEY (id_abit)
) ENGINE=MyISAM';
if (mysqli_query($link, $sql)) {
echo "Table
created successfully";
} else {
echo "Error 
creating table: <br>" . mysqli_error($link);
}

$sql = "INSERT INTO abitur (fio_abit, passport, id_abit, forrm, school, medal, speciality, form, average_point, exemption, ege_points) VALUES 
('Катева Катя', '83752637', '1', 'ochnaya', '276', 'yes', 'Maths', 'budget', '5', 'yes', '300'), 
('Солнцева Соня', '83756352', '2', 'ochnaya', '287', 'yes', 'English', 'budget', '5', 'yes', '298'), 
('Олегов Олег', '8367877', '3', 'ochnaya', '918', 'yes', 'Physics', 'budget', '4', 'yes', '276'), 
('Петев Петя', '92352637', '4', 'ochnaya', '256', 'yes', 'Maths', 'budget', '4', 'no', '280'), 
('Романов Рома', '13245337', '5', 'ochnaya', '196', 'yes', 'Maths', 'budget', '3', 'no', '190')";
if (mysqli_query($link, $sql)) {
  echo "Created successfully<br>";
} else {
  echo "Error creating <br>" . mysqli_error($link);
}


$sql ="CREATE TABLE workers(
  id_worker int(10) NOT NULL AUTO_INCREMENT,
  fio varchar(100) NOT NULL,
  rate int(10) NOT NULL,
  id_admin int(10) NOT NULL,
  PRIMARY KEY (id_worker)) ENGINE=MyISAM";
if (mysqli_query($link, $sql)) {
echo "Table
created successfully";
} else {
echo "Error 
creating table: " . mysqli_error($link);
}

$sql = "INSERT INTO workers VALUES ('101', 'Темов Тема', '1', '1031'), ('102', 'Костев Костя', '1', '1032'), ('103', 'Хомов Хома', '3', '1033')";
if (mysqli_query($link, $sql)) {
  echo "Created successfully<br>";
} else {
  echo "Error creating <br>" . mysqli_error($link);
}


$sql = "CREATE TABLE admin (
id_admin int(10) NOT NULL,
cathedra varchar(250) NOT NULL,
faculty varchar(250) NOT NULL,
speciality varchar(250) NOT NULL,
amount int(10) NOT NULL,
id_fac int(10) NOT NULL,
id_worker int(10) NOT NULL,
PRIMARY KEY (id_admin)
) ENGINE=MyISAM";

if (mysqli_query($link, $sql)) {
echo "Table
created successfully";
} else {
echo "Error 
creating table: " . mysqli_error($link);

}

$sql = "INSERT INTO admin VALUES ('1031', 'Maths', 'Maths', 'Maths', '100', '1', '101'), ('1032', 'Physics', 'Physics', 'Physics', '10', '3', '1'), ('1033', 'English', 'English', 'English', '100', '4', '2')";
if (mysqli_query($link, $sql)) {
  echo "Created successfully<br>";
} else {
  echo "Error creating <br>" . mysqli_error($link);
}


$sql ="CREATE TABLE cathedra (
  id_cath int(10) NOT NULL,
  cathedra varchar(250) NOT NULL,
  faculty varchar(250) NOT NULL,
  speciality varchar(250) NOT NULL,
  PRIMARY KEY (id_cath)) ENGINE=MyISAM";
if (mysqli_query($link, $sql)) {
echo "Table
created successfully";
} else {
echo "Error 
creating table: " . mysqli_error($link);
}

$sql = "INSERT INTO cathedra VALUES ('1', 'Maths', 'Maths', 'Maths')";
if (mysqli_query($link, $sql)) {
  echo "Created successfully<br>";
} else {
  echo "Error creating <br>" . mysqli_error($link);
}


$sql ="CREATE TABLE ege (
  id_ege int(30) NOT NULL,
  points_first int(10) NOT NULL,
  average_points int(10) NOT NULL,
  points_second int(10) NOT NULL,
  PRIMARY KEY (id_ege)) ENGINE=MyISAM";
if (mysqli_query($link, $sql)) {
echo "Table
created successfully";
} else {
echo "Error 
creating table: " . mysqli_error($link);
}

$sql = "INSERT INTO ege VALUES ('1234', '100', '300', '100')";
if (mysqli_query($link, $sql)) {
  echo "Created successfully<br>";
} else {
  echo "Error creating <br>" . mysqli_error($link);
}


$sql="CREATE TABLE faculty (
  id_fac int(10) NOT NULL,
  cathedra varchar(250) NOT NULL,
  faculty varchar(250) NOT NULL,
  speciality varchar(250) NOT NULL,
  amount int(10) NOT NULL,
  id_cath int(10) NOT NULL,
  PRIMARY KEY (id_fac)) ENGINE=MyISAM";
if (mysqli_query($link, $sql)) {
echo "Table
created successfully";
} else {
echo "Error 
creating table: " . mysqli_error($link);
}

$sql = "INSERT INTO faculty VALUES ('1', 'Maths', 'Maths', 'Maths', '100', '1')";
if (mysqli_query($link, $sql)) {
  echo "Created successfully<br>";
} else {
  echo "Error creating <br>" . mysqli_error($link);
}


$sql ="CREATE TABLE points (
  id_points int(30) NOT NULL,
  leading_points int(10) NOT NULL,
  average int(10) NOT NULL,
  PRIMARY KEY (id_points)) ENGINE=MyISAM";
if (mysqli_query($link, $sql)) {
echo "Table
created successfully";
} else {
echo "Error 
creating table: " . mysqli_error($link);
}

$sql = "INSERT INTO points VALUES ('1', '5', '5')";
if (mysqli_query($link, $sql)) {
  echo "Created successfully<br>";
} else {
  echo "Error creating <br>" . mysqli_error($link);
}


$sql ="CREATE TABLE registration (
  id_reg int(10) NOT NULL AUTO_INCREMENT,
  id_worker int(10) NOT NULL,
  fio_abit varchar(250) NOT NULL,
  passport int(11) NOT NULL,
  id_abit int(10) NOT NULL,
  form varchar(250) NOT NULL,
  school varchar(250) NOT NULL,
  speciality varchar(250) NOT NULL,
  average_point int(10) NOT NULL,
  ege_points varchar(250) NOT NULL,
  amount int(10) NOT NULL,
  id_fac int(10) NOT NULL,
  id_admin int(10) NOT NULL,
  id_points int(10) NOT NULL,
  id_ege int(10) NOT NULL,
  PRIMARY KEY (id_reg)) ENGINE=MyISAM";
if (mysqli_query($link, $sql)) {
echo "Table
created successfully";
} else {
echo "Error 
creating table: " . mysqli_error($link);
}

$sql = "INSERT INTO registration VALUES ('1', '101', 'Катева Катя', '83752637', '1', 'budget', '276', 'Maths', '5', '300', '100', '1', '1031', '1', '1'), ('2', '102', 'Солнцева Соня', '83756352', '2', 'budget', '287','English', '5', '298', '100', '1', '1033', '1', '1'), ('3', '103', 'Олегов Олег', '8367877', '3', 'budget', '918', 'Physics', '4', '276', '100', '1', '1032', '1', '1'), ('4', '101', 'Петев Петя', '92352637', '4', 'budget', '256', 'Maths', '4', '280', '100', '1', '1031', '1', '1'), ('5', '102', 'Романов Рома', '13245337', '5', 'budget', '196', 'Maths', '3', '190', '100', '1', '1031', '1', '1') ";
if (mysqli_query($link, $sql)) {
  echo "Created successfully<br>";
} else {
  echo "Error creating <br>" . mysqli_error($link);
}



mysqli_close($link);
?>