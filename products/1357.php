<!-- Bio-Ashwagandha - KSM-66® Premiumrohstoff 180 Kapseln -->

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bio-Ashwagandha - KSM-66® Premiumrohstoff 180 Kapseln</title>
</head>
<body>
    <main>
        <?php               
            $servername = "localhost";
            $username = "root";
            $password = "1234";
            $database = "mysql";
                    
            // Creating a connection
            $conn = new mysqli($servername, $username, $password, $database);
                    
            // SQL-Abfrage vorbereiten
            $sql = "SELECT * FROM produkte WHERE produkt_id = 1357";
            $result = $conn->query($sql);                
                
            // Daten ausgeben, falls vorhanden
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Sterne-Bewertung als Double abrufen
                    $bewertung = (float) $row['bewertung'];
                    $volle_sterne = floor($bewertung);
                    $hat_halben_stern = ($bewertung - $volle_sterne) >= 0.5;
                    $leere_sterne = 5 - $volle_sterne - ($hat_halben_stern ? 1 : 0);
                
                    // HTML-Sterne generieren
                    $sterne = str_repeat("★", $volle_sterne);
                    if ($hat_halben_stern) {
                        $sterne .= "⯪"; // Unicode für halben Stern
                    }
                    $sterne .= str_repeat("☆", $leere_sterne);
                
                    // Bildpfad korrigieren (falls in der Datenbank kein vollständiger Pfad steht)
                    $bildpfad = !empty($row['bild']) ? "../media/produktfotos/" . $row['bild'] : "../media/produktfotos/platzhalter.jpg";
                
                    echo 
                    "<tr>
                        <td><img style='width: 100px' src='../media/produktfotos/{$row['bild']}'></td>
                        <td><b>{$row['produktname']}</b></td>
                        <td><span style='font-size: 25px; color: rgb(255,200,0)'>{$sterne}</span></td>
                        <td>" . number_format($row['preis'], 2, ',', '.') . " €</td>
                        <td><a href='{$row['link']}' target='_blank' class='btn_kaufen_mobile'>Jetzt kaufen</a></td>                                
                    </tr>";
                }
            }
            else {
                echo "<tr><td colspan='4'>Keine Produkte gefunden</td></tr>";
            }
        
            // Verbindung schließen
            $conn->close();
        ?>
    </main>
</body>
</html>