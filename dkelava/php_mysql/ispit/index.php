<?php

require "helper.php";
require "db_connection.php";

$q = "SELECT * FROM dvorana ORDER BY oznDvorana ASC";
$result = $mysqli->query($q);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Dvorane</title>
</head>
<body>
    <h1>Dvorane</h1>
    <table>
      <tr>
        <th>Oznake dvorana</th>
      </tr>
      <?php
      if($result){
        while($row = $result->fetch_assoc()){
            $ispis = "";
            $ispis .= "<tr>";
            $ispis .= "<td><a href='rezervacija.php?oznDvorana=" . $row['oznDvorana'] . "'>" . $row['oznDvorana'] . "</a></td>";
            $ispis .= "</tr>";
            htmlout($ispis);
        }
      }
      ?>
    </table>
</body>
</html>