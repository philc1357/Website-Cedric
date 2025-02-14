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
                    // Sterne-Bewertung generieren
                    $bewertung = (int) $row['bewertung']; // Sicherstellen, dass es eine ganze Zahl ist
                    $sterne = str_repeat("★", $bewertung) . str_repeat("☆", 5 - $bewertung);
                
                    echo "<tr>
                            <td><img style='width: 100px' src='../media/produktfotos/Bio-Ashwagandha - KSM-66® Premiumrohstoff 180 Kapseln.jpg'></td>
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