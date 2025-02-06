<?php
// submit_review.php
$dsn = 'mysql:host=db5017148435.hosting-data.io;dbname=reviews;charset=utf8';
$dbUser = 'dbs13782398.reviews';
$dbPass = 'rezensionDB12095692$$';

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Datenbankverbindung fehlgeschlagen: " . $e->getMessage());
}
?>