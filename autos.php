<?php

// Demand a GET parameter
if ( ! isset($_GET['name']) || strlen($_GET['name']) < 1  ) {
    die('Name parameter missing');
}

require_once "pdo.php";

$res_text="";
$check_make=True;

   if (isset($_POST['Add'])) {
	header('Location: newauto.php');
    return;
   }

 /*  if (isset($_POST['Add']) && (strlen($_POST['make']) < 1)) {$res_text="make is required";
								  $check_make=False;
   };

if ( isset($_POST['Add']) && isset($_POST['make']) && isset($_POST['year'])
     && isset($_POST['mileage']) && ($check_make)) {
		 if (is_numeric($_POST['mileage']) && is_numeric($_POST['year'])) {
    $sql = "INSERT INTO autos (make, year, mileage)
              VALUES (:make, :year, :mileage)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':make' => $_POST['make'],
        ':year' => $_POST['year'],
        ':mileage' => $_POST['mileage']));
	$res_text="Record inserted";
		 }
		  else
		  {
			  			  $res_text="Mileage and year must be numeric";
		  }
}
*/
if  (isset($_POST['logout'])) {
		header('Location: index.php');
    return;
}

$stmt = $pdo->query("SELECT make,year,mileage FROM autos");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<html>
<head>
<title>Alexander Abramov  - Autos database</title>
</head>

<body>
 <div>

</div>

<div >
<?php
if ( isset($_REQUEST['name']) ) {
    echo "<h1>Tracking Autos for ";
    echo htmlentities($_REQUEST['name']);
    echo "</h1>\n";
}
?>
</div>

<div>
"<h2> Automobiles</h2>
</div>


<div>

<?php
 if ($res_text=="Record inserted") {
   echo "<h4 style="."color:green;"." >".$res_text."</h4>";
 }
  else {
	  echo "<h4 style="."color:red;"." >".$res_text."</h4>";
  };

?>
</div>


<div>

<?php
echo "<ul>";
foreach ( $rows as $row ) {
     echo"<li>";
    echo($row['year']);
    echo(" ");
    echo($row['make']);
    echo(" / ");
    echo($row['mileage']);
    echo("</li>\n");
}
echo "</ul>"
?>

</div>


<div>
<form method="post">
   <input type="submit" name="Add" value="Add"/>
   <input type="submit" name="logout" value="logout"/>
</form>
</div>



</body>

</html>
