<?php

// Adatbázis kapcsolat beállítása
$servername = "localhost";  // Az adatbázis szerver
$username = "root";         // Az adatbázis felhasználó
$password = "";             // Az adatbázis jelszó (ha nincs, akkor üresen hagyható)
$dbname = "dolgozatdb";       

// Kapcsolódás az adatbázishoz
$conn = new mysqli($servername, $username, $password, $dbname);

// Kapcsolódás ellenőrzése
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['nap'])) {
    $date = $_GET['nap'];

  
    if (strpos($date, '-') !== false) {
        list($month, $day) = explode('-', $date);  // A dátumot hónap-nap formátumban várjuk, pl. "4-30"
    } else {
        echo json_encode(['hiba' => 'Érvénytelen dátum formátum. A formátumnak hónap-nap (pl. 4-30) kell lennie.']);
        exit;
    }

    // SQL lekérdezés a hónap és nap alapján
    $sql = "SELECT nev1 FROM nevnap WHERE ho = '$month' AND nap = '$day'";
    $result = $conn->query($sql);

    // Ellenőrizzük, hogy a lekérdezés sikeres volt-e
    if (!$result) {
        // Ha a lekérdezés hibás, kiíratjuk a MySQL hibát
        echo json_encode(['hiba' => 'SQL hiba: ' . $conn->error]);
    } elseif ($result->num_rows > 0) {
        $names = [];
        while ($row = $result->fetch_assoc()) {
            $names[] = $row['nev1'];
        }
        // JSON válasz
        echo json_encode([
            'datum' => $date,
            'nevnap' => implode(", ", $names)
        ]);
    } else {
        echo json_encode(['hiba' => 'nincs találat']);
    }
}elseif (isset($_GET['nev'])) {
    $name = $_GET['nev'];

    // SQL lekérdezés a név alapján
    $sql = "SELECT ho, nap FROM nevnap WHERE nev1 LIKE '%$name%'";
    $result = $conn->query($sql);

    // Ellenőrizzük, hogy a lekérdezés sikeres volt-e
    if (!$result) {
        // Ha a lekérdezés hibás, kiíratjuk a MySQL hibát
        echo json_encode(['hiba' => 'SQL hiba: ' . $conn->error]);
    } elseif ($result->num_rows > 0) {
        $dates = [];
        while ($row = $result->fetch_assoc()) {
            $dates[] = $row['ho'] . '-' . $row['nap']; // A hónap-nap formátumban jelenítjük meg
        }
        // JSON válasz
        echo json_encode([
            'nev' => $name,
            'datum' => implode(", ", $dates)
        ]);
    } else {
        echo json_encode(['hiba' => 'nincs találat']);
    }
} else {
    // Ha nincs 'nap' vagy 'nev' paraméter
    echo json_encode(['hiba' => 'paraméterek hiányoznak']);
}

// Kapcsolat lezárása
$conn->close();
?>

