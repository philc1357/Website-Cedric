<!DOCTYPE html>
<html lang="de">
   
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gesundheitsprodukte Vergleich</title>
 
        <link rel="stylesheet" href="css/main_style.css">
    </head>
 
    <body>        
        <!-- Header mit Hero Slider und Überlagerungstext -->
        <header>
            <div class="hero-slider">
                <div class="hero-overlay_desktop">
                    <h1>Verbessern Sie Ihre Gesundheit noch heute!</h1>
                    <p>Entdecken Sie unsere Premium-Gesundheitsprodukte – Qualität, die überzeugt!</p>
                    <a href="#angebote" id="btn_entdecken">Jetzt entdecken</a>
                </div>
 
                <div class="hero-overlay_mobile">
                    <div>
                        <h1>Verbessern Sie Ihre</h1>
                        <h1>Gesundheit noch heute!</h1>
                    </div>
 
                    <div id="hero_overlay_description">
                        <p>Entdecken Sie unsere</p>
                        <p>Premium - Gesundheitsprodukte.</p>
                        <p>Qualität, die überzeugt!</p>
                    </div>
                    <a href="#angebote" id="btn_entdecken">Jetzt entdecken</a>
                </div>
 
                <div class="slide fade">
                    <img src="media/immunsystem.jpg" alt="Bild 3">
                </div>
            </div>
        </header>
   
        <!-- Promo Section mit überzeugenden Inhalten -->
        <section class="promo">
            <h2>Warum unsere Produkte?</h2>
 
            <div class="promo-items">
                <div class="promo-item">
                    <img src="media/produktvergleich1.jpg" alt="Unabhängiger Vergleich">
                    <h3>Unabhängiger Vergleich</h3>
                    <p>Wir analysieren und vergleichen verschiedene Produkte, um Ihnen die besten Optionen basierend auf Bewertungen und Preis-Leistung zu präsentieren.</p>
                </div>
 
                <div class="promo-item">
                    <img src="media/kaufentscheidung1.jpg" alt="Smarte Kaufentscheidungen">
                    <h3>Smarte Kaufentscheidungen</h3>
                    <p>Mit unserem Vergleich sparen Sie Zeit und Geld, indem Sie direkt die am besten bewerteten und preislich attraktiven Produkte entdecken.</p>
                </div>
 
                <div class="promo-item">
                    <img src="media/angebote.jpg" alt="Beste Angebote auf einen Blick">
                    <h3>Beste Angebote auf einen Blick</h3>
                    <p>Finden Sie schnell und einfach die besten Gesundheitsprodukte – unabhängig und objektiv verglichen.</p>
                </div>
            </div>
        </section>
 
 
   
        <!-- Hauptinhalt: Suche, Kategorien und Produktvergleich -->
        <div class="container" id="angebote">
            <center id="txt_entdecken">Entdecken Sie unsere Produkte</center>
            <br>
 
            <!-- Suchleiste inklusive dynamischem Vorschlagsfeld -->
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Suche nach Kategorien oder Produkten...">
                <div id="suggestionsContainer" class="suggestions-container"></div>
            </div>
       
            <!-- Navigationsleiste der Kategorien für große Bildschirme (Desktop)-->
            <div class="categories_desktop">
                <a onclick="show_categories_all()">Alle</a>
                <a onclick="show_categories_blutdruck()">Blutdruck</a>
                <a onclick="show_categories_herz()">Herz</a>
                <a onclick="show_categories_ausdauer()">Ausdauer</a>
                <a onclick="show_categories_immunsystem()">Immunsystem</a>
                <a onclick="show_categories_stress()">Stress</a>
            </div>
 
            <!-- Navigationsleiste der Kategorien für mittlere und kleine Bildschirme (Tablets, Handys)-->
            <div class="categories_mobile">
                <a onclick="show_categories_all_mobile()">Alle</a>
                <a onclick="show_categories_blutdruck_mobile()">Blutdruck</a>
                <a onclick="show_categories_herz_mobile()">Herz</a>
            </div>
 
            <div class="categories_mobile">
                <a onclick="show_categories_ausdauer_mobile()">Ausdauer</a>
                <a onclick="show_categories_immunsystem_mobile()">Immunsystem</a>
                <a onclick="show_categories_stress_mobile()">Stress</a>
            </div>
 
            <hr class="display_mobile">
 
            <!-- Bereich für Suchergebnisse -->
            <div id="searchResults" class="category-section" style="display: none;"></div>
 
            <!-- Tabelle für Desktop -->
            <div id='display_kategorie_alle_desktop' class="display_desktop">
                <h2 class="txt_alle_produkte">Alle Gesundheitsprodukte</h2>
                <table>
                    <tr>
                        <th></th>
                        <th>Produkt</th>
                        <th>Bewertung</th>
                        <th>Preis</th>
                        <th>Link</th>
                    </tr>
                
                    <?php               
                        $servername = "db5017148435.hosting-data.io";
                        $username = "dbu2060385";
                        $password = "1234";
                        $database = "rezensionDB12095692$$";
                
                        // Creating a connection
                        $conn = new rezensionDB12095692$$i($servername, $username, $password, $database);
                
                        // SQL-Abfrage vorbereiten
                        $sql = "SELECT * FROM produkte";
                        $result = $conn->query($sql);                
                            
                        // Daten ausgeben, falls vorhanden
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Sterne-Bewertung als Double abrufen
                                $bewertung = (double) $row['bewertung']; // Stelle sicher, dass es eine Gleitkommazahl ist
                                $volle_sterne = floor($bewertung); // Ganze Sterne
                                $hat_halben_stern = ($bewertung - $volle_sterne) >= 0.5; // Prüfen, ob es einen halben Stern gibt
                                $leere_sterne = 5 - $volle_sterne - ($hat_halben_stern ? 1 : 0); // Restliche leere Sterne berechnen
                            
                                // HTML-Sterne generieren
                                $sterne = str_repeat("★", $volle_sterne);
                                if ($hat_halben_stern) {
                                    $sterne .= "⯪"; // Unicode für halben Stern
                                }
                                $sterne .= str_repeat("☆", $leere_sterne);
                            
                                echo "<tr>
                                        <td><a href='products/{$row['produkt_id']}.php'><img style='height: 100px; width: auto'title='{$row['produktname']}' src='media/produktfotos/{$row['bild']}'></a></td>
                                        <td><a class='table_link_desktop' style='color: black; text-decoration: none' href='products/{$row['produkt_id']}.php'><b title='{$row['produktname']}'>{$row['produktname']}</b></a></td>
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
                </table>
            </div>

            <div id='display_kategorie_blutdruck_desktop' class="display_desktop">
                <h2 class="txt_alle_produkte">Blutdruck</h2>

                <table>
                    <tr>
                        <th></th>
                        <th>Produkt</th>
                        <th>Bewertung</th>
                        <th>Preis</th>
                        <th>Link</th>
                    </tr>
                
                    <?php               
                        $servername = "db5017148435.hosting-data.io";
                        $username = "dbu2060385";
                        $password = "1234";
                        $database = "rezensionDB12095692$$";
                
                        // Creating a connection
                        $conn = new rezensionDB12095692$$i($servername, $username, $password, $database);
                
                        // SQL-Abfrage vorbereiten
                        $sql = "SELECT * FROM produkte WHERE kategorie = 'blutdruck'";
                        $result = $conn->query($sql);                
                            
                        // Daten ausgeben, falls vorhanden
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Sterne-Bewertung als Double abrufen
                                $bewertung = (double) $row['bewertung']; // Stelle sicher, dass es eine Gleitkommazahl ist
                                $volle_sterne = floor($bewertung); // Ganze Sterne
                                $hat_halben_stern = ($bewertung - $volle_sterne) >= 0.5; // Prüfen, ob es einen halben Stern gibt
                                $leere_sterne = 5 - $volle_sterne - ($hat_halben_stern ? 1 : 0); // Restliche leere Sterne berechnen
                            
                                // HTML-Sterne generieren
                                $sterne = str_repeat("★", $volle_sterne);
                                if ($hat_halben_stern) {
                                    $sterne .= "⯪"; // Unicode für halben Stern
                                }
                                $sterne .= str_repeat("☆", $leere_sterne);
                            
                                echo "<tr>
                                        <td><a href='products/{$row['produkt_id']}.php'><img style='height: 100px; width: auto'title='{$row['produktname']}' src='media/produktfotos/{$row['bild']}'></a></td>
                                        <td><a class='table_link_desktop' style='color: black; text-decoration: none' href='products/{$row['produkt_id']}.php'><b title='{$row['produktname']}'>{$row['produktname']}</b></a></td>
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
                </table>
            </div>

            <div id='display_kategorie_herz_desktop' class="display_desktop">
                <h2 class="txt_alle_produkte">Herz</h2>

                <table>
                    <tr>
                        <th></th>
                        <th>Produkt</th>
                        <th>Bewertung</th>
                        <th>Preis</th>
                        <th>Link</th>
                    </tr>
                
                    <?php               
                        $servername = "db5017148435.hosting-data.io";
                        $username = "dbu2060385";
                        $password = "1234";
                        $database = "rezensionDB12095692$$";
                
                        // Creating a connection
                        $conn = new rezensionDB12095692$$i($servername, $username, $password, $database);
                
                        // SQL-Abfrage vorbereiten
                        $sql = "SELECT * FROM produkte WHERE kategorie = 'herz'";
                        $result = $conn->query($sql);                
                            
                        // Daten ausgeben, falls vorhanden
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Sterne-Bewertung als Double abrufen
                                $bewertung = (double) $row['bewertung']; // Stelle sicher, dass es eine Gleitkommazahl ist
                                $volle_sterne = floor($bewertung); // Ganze Sterne
                                $hat_halben_stern = ($bewertung - $volle_sterne) >= 0.5; // Prüfen, ob es einen halben Stern gibt
                                $leere_sterne = 5 - $volle_sterne - ($hat_halben_stern ? 1 : 0); // Restliche leere Sterne berechnen
                            
                                // HTML-Sterne generieren
                                $sterne = str_repeat("★", $volle_sterne);
                                if ($hat_halben_stern) {
                                    $sterne .= "⯪"; // Unicode für halben Stern
                                }
                                $sterne .= str_repeat("☆", $leere_sterne);
                            
                                echo "<tr>
                                        <td><a href='products/{$row['produkt_id']}.php'><img style='height: 100px; width: auto'title='{$row['produktname']}' src='media/produktfotos/{$row['bild']}'></a></td>
                                        <td><a class='table_link_desktop' style='color: black; text-decoration: none' href='products/{$row['produkt_id']}.php'><b title='{$row['produktname']}'>{$row['produktname']}</b></a></td>
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
                </table>
            </div>

            <div id='display_kategorie_ausdauer_desktop' class="display_desktop">
                <h2 class="txt_alle_produkte">Ausdauer</h2>
                <table>
                    <tr>
                        <th></th>
                        <th>Produkt</th>
                        <th>Bewertung</th>
                        <th>Preis</th>
                        <th>Link</th>
                    </tr>
                
                    <?php               
                        $servername = "db5017148435.hosting-data.io";
                        $username = "dbu2060385";
                        $password = "1234";
                        $database = "rezensionDB12095692$$";
                
                        // Creating a connection
                        $conn = new rezensionDB12095692$$i($servername, $username, $password, $database);
                
                        // SQL-Abfrage vorbereiten
                        $sql = "SELECT * FROM produkte WHERE kategorie = 'ausdauer'";
                        $result = $conn->query($sql);                
                            
                        // Daten ausgeben, falls vorhanden
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Sterne-Bewertung als Double abrufen
                                $bewertung = (double) $row['bewertung']; // Stelle sicher, dass es eine Gleitkommazahl ist
                                $volle_sterne = floor($bewertung); // Ganze Sterne
                                $hat_halben_stern = ($bewertung - $volle_sterne) >= 0.5; // Prüfen, ob es einen halben Stern gibt
                                $leere_sterne = 5 - $volle_sterne - ($hat_halben_stern ? 1 : 0); // Restliche leere Sterne berechnen
                            
                                // HTML-Sterne generieren
                                $sterne = str_repeat("★", $volle_sterne);
                                if ($hat_halben_stern) {
                                    $sterne .= "⯪"; // Unicode für halben Stern
                                }
                                $sterne .= str_repeat("☆", $leere_sterne);
                            
                                echo "<tr>
                                        <td><a href='products/{$row['produkt_id']}.php'><img style='height: 100px; width: auto'title='{$row['produktname']}' src='media/produktfotos/{$row['bild']}'></a></td>
                                        <td><a class='table_link_desktop' style='color: black; text-decoration: none' href='products/{$row['produkt_id']}.php'><b title='{$row['produktname']}'>{$row['produktname']}</b></a></td>
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
                </table>
            </div>

            <div id='display_kategorie_immunsystem_desktop' class="display_desktop">
                <h2 class="txt_alle_produkte">Immunsystem</h2>
                <table>
                    <tr>
                        <th></th>
                        <th>Produkt</th>
                        <th>Bewertung</th>
                        <th>Preis</th>
                        <th>Link</th>
                    </tr>
                
                    <?php               
                        $servername = "db5017148435.hosting-data.io";
                        $username = "dbu2060385";
                        $password = "1234";
                        $database = "rezensionDB12095692$$";
                
                        // Creating a connection
                        $conn = new rezensionDB12095692$$i($servername, $username, $password, $database);
                
                        // SQL-Abfrage vorbereiten
                        $sql = "SELECT * FROM produkte WHERE kategorie = 'immunsystem'";
                        $result = $conn->query($sql);                
                            
                        // Daten ausgeben, falls vorhanden
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Sterne-Bewertung als Double abrufen
                                $bewertung = (double) $row['bewertung']; // Stelle sicher, dass es eine Gleitkommazahl ist
                                $volle_sterne = floor($bewertung); // Ganze Sterne
                                $hat_halben_stern = ($bewertung - $volle_sterne) >= 0.5; // Prüfen, ob es einen halben Stern gibt
                                $leere_sterne = 5 - $volle_sterne - ($hat_halben_stern ? 1 : 0); // Restliche leere Sterne berechnen
                            
                                // HTML-Sterne generieren
                                $sterne = str_repeat("★", $volle_sterne);
                                if ($hat_halben_stern) {
                                    $sterne .= "⯪"; // Unicode für halben Stern
                                }
                                $sterne .= str_repeat("☆", $leere_sterne);
                            
                                echo "<tr>
                                        <td><a href='products/{$row['produkt_id']}.php'><img style='height: 100px; width: auto'title='{$row['produktname']}' src='media/produktfotos/{$row['bild']}'></a></td>
                                        <td><a class='table_link_desktop' style='color: black; text-decoration: none' href='products/{$row['produkt_id']}.php'><b title='{$row['produktname']}'>{$row['produktname']}</b></a></td>
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
                </table>
            </div>

            <div id='display_kategorie_stress_desktop' class="display_desktop">
                <h2 class="txt_alle_produkte">Stress</h2>
                <table>
                    <tr>
                        <th></th>
                        <th>Produkt</th>
                        <th>Bewertung</th>
                        <th>Preis</th>
                        <th>Link</th>
                    </tr>
                
                    <?php               
                        $servername = "db5017148435.hosting-data.io";
                        $username = "dbu2060385";
                        $password = "1234";
                        $database = "rezensionDB12095692$$";
                
                        // Creating a connection
                        $conn = new rezensionDB12095692$$i($servername, $username, $password, $database);
                
                        // SQL-Abfrage vorbereiten
                        $sql = "SELECT * FROM produkte WHERE kategorie = 'stress'";
                        $result = $conn->query($sql);                
                            
                        // Daten ausgeben, falls vorhanden
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Sterne-Bewertung als Double abrufen
                                $bewertung = (double) $row['bewertung']; // Stelle sicher, dass es eine Gleitkommazahl ist
                                $volle_sterne = floor($bewertung); // Ganze Sterne
                                $hat_halben_stern = ($bewertung - $volle_sterne) >= 0.5; // Prüfen, ob es einen halben Stern gibt
                                $leere_sterne = 5 - $volle_sterne - ($hat_halben_stern ? 1 : 0); // Restliche leere Sterne berechnen
                            
                                // HTML-Sterne generieren
                                $sterne = str_repeat("★", $volle_sterne);
                                if ($hat_halben_stern) {
                                    $sterne .= "⯪"; // Unicode für halben Stern
                                }
                                $sterne .= str_repeat("☆", $leere_sterne);
                            
                                echo "<tr>
                                        <td><a href='products/{$row['produkt_id']}.php'><img style='height: 100px; width: auto'title='{$row['produktname']}' src='media/produktfotos/{$row['bild']}'></a></td>
                                        <td><a class='table_link_desktop' style='color: black; text-decoration: none' href='products/{$row['produkt_id']}.php'><b title='{$row['produktname']}'>{$row['produktname']}</b></a></td>
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
                </table>
            </div>
<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

            <!-- Tabelle für Mobile -->
            <div id='display_kategorie_alle_mobile' class="display_mobile">
                <h2 class="txt_alle_produkte">Alle Gesundheitsprodukte</h2>
                <table>
                    <tr>
                        <th>Produkt</th>
                        <th>Preis</th>
                        <th>Link</th>
                    </tr>
                
                    <?php
                        $servername = "db5017148435.hosting-data.io";
                        $username = "dbu2060385";
                        $password = "1234";
                        $database = "rezensionDB12095692$$";
        
                        // Verbindung erstellen
                        $conn = new rezensionDB12095692$$i($servername, $username, $password, $database);
        
                        // SQL-Abfrage vorbereiten
                        $sql = "SELECT * FROM produkte";
                        $result = $conn->query($sql);
        
                        // Daten ausgeben, falls vorhanden
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Sterne-Bewertung als Double abrufen
                                $bewertung = (double) $row['bewertung']; // Stelle sicher, dass es eine Gleitkommazahl ist
                                $volle_sterne = floor($bewertung); // Ganze Sterne
                                $hat_halben_stern = ($bewertung - $volle_sterne) >= 0.5; // Prüfen, ob es einen halben Stern gibt
                                $leere_sterne = 5 - $volle_sterne - ($hat_halben_stern ? 1 : 0); // Restliche leere Sterne berechnen
                            
                                // HTML-Sterne generieren
                                $sterne = str_repeat("★", $volle_sterne);
                                if ($hat_halben_stern) {
                                    $sterne .= "⯪"; // Unicode für halben Stern
                                }
                                $sterne .= str_repeat("☆", $leere_sterne);
                            
                                echo "<tr>
                                        <td>
                                            <a class='table_link_desktop' style='color: black; text-decoration: none' href='products/{$row['produkt_id']}.php'><b title='{$row['produktname']}'>{$row['produktname']}</b></a>
                                            <span style='font-size: 25px; color: rgb(255,200,0)'>{$sterne}</span>
                                        </td>
                                        <td>" . number_format($row['preis'], 2, ',', '.') . " €</td>
                                        <td><a href='{$row['link']}' target='_blank' class='btn_kaufen_mobile'>Jetzt kaufen</a></td>                                
                                    </tr>";
                            }  
                        } 
                        else {
                            echo "<tr><td colspan='3'>Keine Produkte gefunden</td></tr>";
                        }
        
                        // Verbindung schließen
                        $conn->close();
                    ?>
                </table>
            </div>

            <div id='display_kategorie_blutdruck_mobile' class="display_mobile">
                <h2 class="txt_alle_produkte">Blutdruck</h2>
                <table>
                    <tr>
                        <th>Produkt</th>
                        <th>Preis</th>
                        <th>Link</th>
                    </tr>
                
                    <?php
                        $servername = "db5017148435.hosting-data.io";
                        $username = "dbu2060385";
                        $password = "1234";
                        $database = "rezensionDB12095692$$";
        
                        // Verbindung erstellen
                        $conn = new rezensionDB12095692$$i($servername, $username, $password, $database);
        
                        // SQL-Abfrage vorbereiten
                        $sql = "SELECT * FROM produkte WHERE kategorie = 'blutdruck'";
                        $result = $conn->query($sql);
        
                        // Daten ausgeben, falls vorhanden
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Sterne-Bewertung als Double abrufen
                                $bewertung = (double) $row['bewertung']; // Stelle sicher, dass es eine Gleitkommazahl ist
                                $volle_sterne = floor($bewertung); // Ganze Sterne
                                $hat_halben_stern = ($bewertung - $volle_sterne) >= 0.5; // Prüfen, ob es einen halben Stern gibt
                                $leere_sterne = 5 - $volle_sterne - ($hat_halben_stern ? 1 : 0); // Restliche leere Sterne berechnen
                            
                                // HTML-Sterne generieren
                                $sterne = str_repeat("★", $volle_sterne);
                                if ($hat_halben_stern) {
                                    $sterne .= "⯪"; // Unicode für halben Stern
                                }
                                $sterne .= str_repeat("☆", $leere_sterne);
                            
                                echo "<tr>
                                        <td>
                                            <a class='table_link_desktop' style='color: black; text-decoration: none' href='products/{$row['produkt_id']}.php'><b title='{$row['produktname']}'>{$row['produktname']}</b></a>
                                            <span style='font-size: 25px; color: rgb(255,200,0)'>{$sterne}</span>
                                        </td>
                                        <td>" . number_format($row['preis'], 2, ',', '.') . " €</td>
                                        <td><a href='{$row['link']}' target='_blank' class='btn_kaufen_mobile'>Jetzt kaufen</a></td>                                
                                    </tr>";
                            }  
                        } 
                        else {
                            echo "<tr><td colspan='3'>Keine Produkte gefunden</td></tr>";
                        }
        
                        // Verbindung schließen
                        $conn->close();
                    ?>
                </table>
            </div>

            <div id='display_kategorie_stress_mobile' class="display_mobile">
                <h2 class="txt_alle_produkte">Stress</h2>
                <table>
                    <tr>
                        <th>Produkt</th>
                        <th>Preis</th>
                        <th>Link</th>
                    </tr>
                
                    <?php
                        $servername = "db5017148435.hosting-data.io";
                        $username = "dbu2060385";
                        $password = "1234";
                        $database = "rezensionDB12095692$$";
        
                        // Verbindung erstellen
                        $conn = new rezensionDB12095692$$i($servername, $username, $password, $database);
        
                        // SQL-Abfrage vorbereiten
                        $sql = "SELECT * FROM produkte WHERE kategorie = 'stress'";
                        $result = $conn->query($sql);
        
                        // Daten ausgeben, falls vorhanden
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Sterne-Bewertung als Double abrufen
                                $bewertung = (double) $row['bewertung']; // Stelle sicher, dass es eine Gleitkommazahl ist
                                $volle_sterne = floor($bewertung); // Ganze Sterne
                                $hat_halben_stern = ($bewertung - $volle_sterne) >= 0.5; // Prüfen, ob es einen halben Stern gibt
                                $leere_sterne = 5 - $volle_sterne - ($hat_halben_stern ? 1 : 0); // Restliche leere Sterne berechnen
                            
                                // HTML-Sterne generieren
                                $sterne = str_repeat("★", $volle_sterne);
                                if ($hat_halben_stern) {
                                    $sterne .= "⯪"; // Unicode für halben Stern
                                }
                                $sterne .= str_repeat("☆", $leere_sterne);
                            
                                echo "<tr>
                                        <td>
                                            <a class='table_link_desktop' style='color: black; text-decoration: none' href='products/{$row['produkt_id']}.php'><b title='{$row['produktname']}'>{$row['produktname']}</b></a>
                                            <span style='font-size: 25px; color: rgb(255,200,0)'>{$sterne}</span>
                                        </td>
                                        <td>" . number_format($row['preis'], 2, ',', '.') . " €</td>
                                        <td><a href='{$row['link']}' target='_blank' class='btn_kaufen_mobile'>Jetzt kaufen</a></td>                                
                                    </tr>";
                            }  
                        } 
                        else {
                            echo "<tr><td colspan='3'>Keine Produkte gefunden</td></tr>";
                        }
        
                        // Verbindung schließen
                        $conn->close();
                    ?>
                </table>
            </div>

            <div id='display_kategorie_ausdauer_mobile' class="display_mobile">
                <h2 class="txt_alle_produkte">Ausdauer</h2>
                <table>
                    <tr>
                        <th>Produkt</th>
                        <th>Preis</th>
                        <th>Link</th>
                    </tr>
                
                    <?php
                        $servername = "db5017148435.hosting-data.io";
                        $username = "dbu2060385";
                        $password = "1234";
                        $database = "rezensionDB12095692$$";
        
                        // Verbindung erstellen
                        $conn = new rezensionDB12095692$$i($servername, $username, $password, $database);
        
                        // SQL-Abfrage vorbereiten
                        $sql = "SELECT * FROM produkte WHERE kategorie = 'ausdauer'";
                        $result = $conn->query($sql);
        
                        // Daten ausgeben, falls vorhanden
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Sterne-Bewertung als Double abrufen
                                $bewertung = (double) $row['bewertung']; // Stelle sicher, dass es eine Gleitkommazahl ist
                                $volle_sterne = floor($bewertung); // Ganze Sterne
                                $hat_halben_stern = ($bewertung - $volle_sterne) >= 0.5; // Prüfen, ob es einen halben Stern gibt
                                $leere_sterne = 5 - $volle_sterne - ($hat_halben_stern ? 1 : 0); // Restliche leere Sterne berechnen
                            
                                // HTML-Sterne generieren
                                $sterne = str_repeat("★", $volle_sterne);
                                if ($hat_halben_stern) {
                                    $sterne .= "⯪"; // Unicode für halben Stern
                                }
                                $sterne .= str_repeat("☆", $leere_sterne);
                            
                                echo "<tr>
                                        <td>
                                            <a class='table_link_desktop' style='color: black; text-decoration: none' href='products/{$row['produkt_id']}.php'><b title='{$row['produktname']}'>{$row['produktname']}</b></a>
                                            <span style='font-size: 25px; color: rgb(255,200,0)'>{$sterne}</span>
                                        </td>
                                        <td>" . number_format($row['preis'], 2, ',', '.') . " €</td>
                                        <td><a href='{$row['link']}' target='_blank' class='btn_kaufen_mobile'>Jetzt kaufen</a></td>                                
                                    </tr>";
                            }  
                        } 
                        else {
                            echo "<tr><td colspan='3'>Keine Produkte gefunden</td></tr>";
                        }
        
                        // Verbindung schließen
                        $conn->close();
                    ?>
                </table>
            </div>

            <div id='display_kategorie_herz_mobile' class="display_mobile">
                <h2 class="txt_alle_produkte">Herz</h2>
                <table>
                    <tr>
                        <th>Produkt</th>
                        <th>Preis</th>
                        <th>Link</th>
                    </tr>
                
                    <?php
                        $servername = "db5017148435.hosting-data.io";
                        $username = "dbu2060385";
                        $password = "1234";
                        $database = "rezensionDB12095692$$";
        
                        // Verbindung erstellen
                        $conn = new rezensionDB12095692$$i($servername, $username, $password, $database);
        
                        // SQL-Abfrage vorbereiten
                        $sql = "SELECT * FROM produkte WHERE kategorie = 'herz'";
                        $result = $conn->query($sql);
        
                        // Daten ausgeben, falls vorhanden
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Sterne-Bewertung als Double abrufen
                                $bewertung = (double) $row['bewertung']; // Stelle sicher, dass es eine Gleitkommazahl ist
                                $volle_sterne = floor($bewertung); // Ganze Sterne
                                $hat_halben_stern = ($bewertung - $volle_sterne) >= 0.5; // Prüfen, ob es einen halben Stern gibt
                                $leere_sterne = 5 - $volle_sterne - ($hat_halben_stern ? 1 : 0); // Restliche leere Sterne berechnen
                            
                                // HTML-Sterne generieren
                                $sterne = str_repeat("★", $volle_sterne);
                                if ($hat_halben_stern) {
                                    $sterne .= "⯪"; // Unicode für halben Stern
                                }
                                $sterne .= str_repeat("☆", $leere_sterne);
                            
                                echo "<tr>
                                        <td>
                                            <a class='table_link_desktop' style='color: black; text-decoration: none' href='products/{$row['produkt_id']}.php'><b title='{$row['produktname']}'>{$row['produktname']}</b></a>
                                            <span style='font-size: 25px; color: rgb(255,200,0)'>{$sterne}</span>
                                        </td>
                                        <td>" . number_format($row['preis'], 2, ',', '.') . " €</td>
                                        <td><a href='{$row['link']}' target='_blank' class='btn_kaufen_mobile'>Jetzt kaufen</a></td>                                
                                    </tr>";
                            }  
                        } 
                        else {
                            echo "<tr><td colspan='3'>Keine Produkte gefunden</td></tr>";
                        }
        
                        // Verbindung schließen
                        $conn->close();
                    ?>
                </table>
            </div>

            <div id='display_kategorie_immunsystem_mobile' class="display_mobile">
                <h2 class="txt_alle_produkte">Immunsystem</h2>
                <table>
                    <tr>
                        <th>Produkt</th>
                        <th>Preis</th>
                        <th>Link</th>
                    </tr>
                
                    <?php
                        $servername = "db5017148435.hosting-data.io";
                        $username = "dbu2060385";
                        $password = "1234";
                        $database = "rezensionDB12095692$$";
        
                        // Verbindung erstellen
                        $conn = new rezensionDB12095692$$i($servername, $username, $password, $database);
        
                        // SQL-Abfrage vorbereiten
                        $sql = "SELECT * FROM produkte WHERE kategorie = 'immunsystem'";
                        $result = $conn->query($sql);
        
                        // Daten ausgeben, falls vorhanden
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Sterne-Bewertung als Double abrufen
                                $bewertung = (double) $row['bewertung']; // Stelle sicher, dass es eine Gleitkommazahl ist
                                $volle_sterne = floor($bewertung); // Ganze Sterne
                                $hat_halben_stern = ($bewertung - $volle_sterne) >= 0.5; // Prüfen, ob es einen halben Stern gibt
                                $leere_sterne = 5 - $volle_sterne - ($hat_halben_stern ? 1 : 0); // Restliche leere Sterne berechnen
                            
                                // HTML-Sterne generieren
                                $sterne = str_repeat("★", $volle_sterne);
                                if ($hat_halben_stern) {
                                    $sterne .= "⯪"; // Unicode für halben Stern
                                }
                                $sterne .= str_repeat("☆", $leere_sterne);
                            
                                echo "<tr>
                                        <td>
                                            <a class='table_link_desktop' style='color: black; text-decoration: none' href='products/{$row['produkt_id']}.php'><b title='{$row['produktname']}'>{$row['produktname']}</b></a>
                                            <span style='font-size: 25px; color: rgb(255,200,0)'>{$sterne}</span>
                                        </td>
                                        <td>" . number_format($row['preis'], 2, ',', '.') . " €</td>
                                        <td><a href='{$row['link']}' target='_blank' class='btn_kaufen_mobile'>Jetzt kaufen</a></td>                                
                                    </tr>";
                            }  
                        } 
                        else {
                            echo "<tr><td colspan='3'>Keine Produkte gefunden</td></tr>";
                        }
        
                        // Verbindung schließen
                        $conn->close();
                    ?>
                </table>
            </div>
        </div>
        <!-- Footer mit rechtlich wichtigen Links -->
        <footer>
                <div class="footer-links">
                    <a href="/html/impressum.html" target="_blank">Impressum</a> |
                    <a href="/html/datenschutz.html" target="_blank">Datenschutz</a> |
                    <a href="/html/haftungsausschluss.html" target="_blank">Haftungsausschluss</a>
                </div>
 
                <div class="footer-text">
                    <p>&copy; 2025 Gesundheitsprodukte Vergleich. Alle Rechte vorbehalten.</p>
                </div>
        </footer>
 
       
        <script src="javascript/main_script.js"></script>
    </body>
</html>
