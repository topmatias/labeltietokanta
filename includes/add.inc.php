<?php

include_once 'dbh.inc.php';

//$PME = 2;
//$RAIDE = 1;
//$RAHINA = 3; 

$first = $_POST['artisti'];
$second = $_POST['labeli'];

if ($second == "PME") {
    $second = 2;
}
else if ($second == "Rähinä Records") {
    $second = 3;
}
else if ($second == "3rd Rail Music") {
    $second = 1;
}

else {
    $sql = "INSERT INTO label VALUES(NULL, '$second', NULL, NULL, NULL);";
    $sql = "INSERT INTO artists VALUES(NULL, '$first', '$second');";
}


$sql = "INSERT INTO artists VALUES(NULL, '$first', '$second');";

mysqli_query($conn, $sql);

header("Location: ../index.php?add=success");

?>