<?php
  if (isset($_POST['Add']) && (strlen($_POST['make']) < 1)) {$res_text="make is required";
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

?>

<html>
<head>

<title>Alexander Abramov  - Autos database</title>
</head>

<body>

<div >
<?php
if ( isset($_SESSION['account']) ) {
    echo "<h1>Tracking Autos for ";
    echo htmlentities($_SESSION['account']);
    echo "</h1>\n";
}
?>
</div>


<div>
<form method="post">
   <p><label for="make">Input make</label>
   <input type="text" name="make" id="make"
      size="40" value="" /></p>

	<p><label for="year">Input Year</label>
   <input type="text" name="year" id="year"
      size="40" value="" /></p>

	<p><label for="mile">Input Mileage</label>
   <input type="text" name="mileage" id="mileage"
      size="40" value="" /></p>
   <input type="submit" name="Add" value="Add"/>
   <input type="submit" name="logout" value="logout"/>
</form>
</div>

<div>


</div>



</body>

</html>
