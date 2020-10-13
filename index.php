<?php

  include_once 'includes/dbh.inc.php';

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>

    </head>
    <body>

    <form method="post">
    <input type="submit" name="hae" id="hae" value="Hae tietoa" /><br/>
</form>

<form action="includes/add.inc.php" method="POST">
 <input type="text" name="artisti" placeholder="Add Artist">
 <input type="text" name="labeli" placeholder="Add Label">
 <button type="submit" name="submit">Lisää</button>
</form>

    
<?php

function info() {

    global $conn;
    $sql = "SELECT artists.Artisti, label.Label, jakelija.Jakelija, keikkamyynti.Keikkamyynti FROM artists JOIN label ON artists.label_id = label.label_id JOIN jakelija ON label.jako_id = jakelija.jako_id
    JOIN keikkamyynti ON label.keikka_id = keikkamyynti.keikka_id ORDER BY label.label;
    ;";
    $result = mysqli_query($conn, $sql );
    $resultCheck = mysqli_num_rows($result);

    echo "<table>";

    if ($resultCheck > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row['Artisti'] . "</td><td>" . $row['Label'] . "</td><td>" . $row['Jakelija'] . "</td><td>" . $row['Keikkamyynti'] .  "</td></tr>";
      }
    }

    echo "</table>";
  }
  
  if(array_key_exists('hae',$_POST)){
    info();
 }

 
    ?>

        
    </body>
</html>