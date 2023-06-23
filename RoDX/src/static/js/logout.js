// Funcția JavaScript pentru a face logout și a actualiza baza de date
function performLogout() {
    // Realizează cererea AJAX către fișierul logout.php pentru a face logout și a actualiza baza de date
    $.ajax({
      url: '../api/logout.php', // Calea către fișierul logout.php
      type: 'POST',
      data: { logout: true }, // Trimiterea unui parametru pentru identificarea acțiunii de logout
      success: function(response) {
        // Acțiuni specifice după efectuarea logout-ului și actualizarea bazei de date
        console.log(response); // Exemplu: Afișează răspunsul primit de la fișierul PHP
        // Redirecționează către pagina de index sau altă acțiune specifică
      },
      error: function() {
        console.log("Nu merge");
      }
    });
  }
  