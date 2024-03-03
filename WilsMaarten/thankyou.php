<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You!</title>
</head>
<body>
    <h1>De gegevens van uw bestelling</h1>
<?php 
    // Opslaan van posted data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $adres = $_POST['adres'];
    $woonplaats = $_POST['woonplaats'];
    $saus = $_POST['selectSaus'];
    $broodje = $_POST['selectBroodje'];
    $leveringsmethode = $_POST['deliveryOption'];
    $tijdsSlot = $_POST['tijdsSlot'];
    

    // Sessies maken van posted data
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['tel'] = $tel;
    $_SESSION['adres'] = $adres;
    $_SESSION['woonplaats'] = $woonplaats;
    $_SESSION['selectSaus'] = $saus;
    $_SESSION['selectBroodje'] = $broodje;
    $_SESSION['deliveryOption'] = $leveringsmethode;
    $_SESSION['tijdsSlot'] = $tijdsSlot;



    // Prijs van de broodjes bepalen
    if ($broodje == "Broodje Kaas 5eur" or $broodje == "Broodje Hesp 5eur"){
       $prijsBroodje = 5;
    } elseif ($broodje == "Broodje Kaas Hesp 6eur") {
       $prijsBroodje = 6;
    } elseif ($broodje == "Broodje Tonijnsla 8eur") {
        $prijsBroodje = 8;
    };

    // Prijs van de saus bepalen
    if ($saus == "Geen saus"){
        $prijsSaus = 0;
    } else{
        $prijsSaus = 1;
    };

    // Prijs van de levering bepalen
    if ($leveringsmethode == "leveren"){
        $prijsLevering = 5;
    } else{
        $prijsLevering = 0;
    };
    // Totaalprijs berekenen en opslaan
    $totalePrijsBroodje = $prijsBroodje + $prijsSaus + $prijsLevering;
    $_SESSION['totalePrijsBroodje'] = $totalePrijsBroodje;
    ?>

    <p>Uw naam is: <?php echo $_SESSION['name'] ?></p>
    <p>Uw email is: <?php echo $_SESSION['email'] ?></p>
    <p>Uw telefoonnummer is: <?php echo $_SESSION['tel'] ?></p>
    <p>Uw adres is: <?php echo $_SESSION['adres'] ?></p>
    <p>Uw woonplaats is: <?php echo $_SESSION['woonplaats'] ?></p>
    <p>Uw gekozen broodje is: <?php echo $_SESSION['selectBroodje'] ?> met <?php echo $_SESSION['selectSaus'] ?> </p>

    

    <?php 
    //Leveren of afhalen
    if ($leveringsmethode == "leveren"){
        echo "<p>U hebt gekozen om het broodje te laten leveren, dit kost 5 euro, het wordt geleverd om $tijdsSlot uur<p>";
    } else {
        echo "<p>U hebt gekozen om uw broodje af te halen. Het zal klaarliggen om $tijdsSlot uur<p> ";
    }
    ?>


    
    <p>Uw broodje kost u: <?php echo $totalePrijsBroodje ?> euro.</p>

    <h2>Bedankt om bij de Krokante Kruimel te bestellen</h2>
    <?php

    

// CSV File
$csvFilePath = 'orders.csv';

// Data naar csv wegschrijven
if (($handle = fopen($csvFilePath, 'a')) !== false) {
    fputcsv($handle, $_SESSION);
    fclose($handle);
}

?>

</body>
</html>