<?php
// Conectare la baza de date
$host = "hansken.db.elephantsql.com";
$port = "5432";
$dbname = "cyjvryeg";
$user = "cyjvryeg";
$password = "J5vORyk7ysgEBeHVnEJhD9Hnywf6kfm6";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// Verificare conexiune la baza de date
if (!$conn) {
    die("Conexiunea la baza de date a eșuat");
}

// Verificare dacă a fost trimis formularul de autentificare
if (isset($_POST['login'])) {
    // Preiați valorile introduse în formular
    $username = $_POST['uname'];
    $password = $_POST['psw'];

    // Realizați aici verificările suplimentare ale datelor, cum ar fi verificarea utilizatorului și parolei în baza de date

    // Exemplu de inserare în baza de date
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    $result = pg_query($conn, $sql);
    if ($result) {
        // Inserarea s-a realizat cu succes

        // Redirecționare către pagina principală (home)
        header("Location: index.html");
        exit();
    } else {
        echo "Eroare la inserarea datelor în baza de date: " . pg_last_error($conn);
    }
}

// Închideți conexiunea la baza de date
pg_close($conn);
?>
