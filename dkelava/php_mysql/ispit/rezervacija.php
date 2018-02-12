<?php

if(!isset($_GET['oznDvorana'])){
    die("ERROR");
}

require "helper.php";
require "db_connection.php";

$q = "SELECT 
rezervacija.oznDvorana, 
rezervacija.oznVrstaDan,
rezervacija.sat AS termin, 
rezervacija.sifPred, 
pred.nazPred AS predmet
FROM rezervacija
inner join pred on rezervacija.sifPred = pred.sifPred
where oznDvorana=?";

$stmt = $mysqli->prepare($q);
$oznDvorana = $_GET['oznDvorana'];

$stmt->bind_param("s",$oznDvorana);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.css">
	<title>Rezervacije</title>
</head>
<body>
    <header class="container">
        <nav>
            <ul class="nav">
                <li class="nav-item">
                   <a class="nav-link" href="index.php">Natrag</a> 
                </li>
            </ul>      
        </nav>  
    </header>
    
    <div class="container">
        <h1>Rezervacije za dvoranu: <?php echo $_GET['oznDvorana']; ?></h1>
    </div>
    
    <div class="container">
      <?php
      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $ispis = "";
            $ispis .= "<p>" . dayFormat($row['oznVrstaDan']) . ", " 
                            . timeFormat($row['termin']) . ", " 
                            . $row['predmet'] . "</p>";
            htmlout($ispis);
        }
      }else{
            $ispis = "<tr>Nema rezervacija za trazenu dvoranu</tr>";
            htmlout($ispis);          
      }
      ?>
    </div>
</body>
</html>