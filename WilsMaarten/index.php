<?php session_reset() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>De krokante Kruimel</title>
</head>
<body>
    <h1>De Krokante Kruimel</h1>
    <form action="thankyou.php" method="post">
        <input type="text" name="name" placeholder="Geef uw naam" require> <br>
        <input type="email" name="email" placeholder="Geef uw email" require> <br>
        <input type="text" name="tel" placeholder="Geef uw telefoon" require> <br>
        <input type="text" name="adres" placeholder="Geef uw adres"> <br>
        <input type="text" name="woonplaats" placeholder="Geef uw woonplaats"> <br>
       
        <!--Dropdown menu broodjes-->
        <div>
            <label>Kies een broodje:</label>

            <select name="selectBroodje" id="selectBroodje">
                <?php

                // Array voor de broodjes
                $broodjes = ["Broodje Kaas 5eur", "Broodje Hesp 5eur", "Broodje Kaas Hesp 6eur", "Broodje Tonijnsla 8eur"];
                
                // Loop voor de broodjes
                foreach ($broodjes as $broodje) {
                    echo "<option value=\"$broodje\">$broodje</option>";
                }
                ?>
            </select>
        </div> 

        <!--Dropdown menu sauzen-->
            <div>
            <label>Kies een saus:</label>
                
            <select name="selectSaus" id="selectSaus">
                <?php
                // Your voor de sauzen
                $sauzen = ["Geen saus", "Mayonaise +1eur","Samurai +1eur","Ketchup +1eur","Andalouse +1eur" ];

                // Loop voor de sauzen
                foreach ($sauzen as $saus) {
                    echo "<option value=\"$saus\">$saus</option>";
                }
                ?>
            </select>
        </div>

        <label>Kies de gewenste lever of afhaaltijd:</label>
     <select name="tijdsSlot" id="tijdsSlot">
        <?php
        // Extra feature Leveringstijd
        // Openingsuren definieren
        $openingsUur = strtotime('10:00');
        $sluitingsUur = strtotime('18:00');

        // Tijdssloten genereren
        $currentTime = $openingsUur;
        while ($currentTime <= $sluitingsUur) {
            $formattedTime = date('H:i', $currentTime);
            echo "<option value=\"$formattedTime\">$formattedTime</option>";

            // currenttime met 15 min verhogen per loop
            $currentTime = strtotime('+15 minutes', $currentTime);
        }
        ?>
    </select>

         <!--Radio knop voor leveren / afhalen -->
        <div>
            <label>Wilt u laten leveren of afhalen?</label><br>
            <input type="radio" name="deliveryOption" value="leveren"> Leveren +5eur<br>
            <input type="radio" name="deliveryOption" value="afhalen"> Afhalen <br>
            <input type="submit" value="Submit">
        </div>

    </form>

</body>
</html>