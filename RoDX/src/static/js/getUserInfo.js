function loadUserInfo() {
    // Realizează cererea AJAX către fișierul get_user_info.php pentru a obține informațiile utilizatorului
    $.ajax({
      url: '../api/getUserInfo.php', // Calea către fișierul get_user_info.php
      type: 'GET',
      dataType: 'json',
      success: function(response) {
        // Parsează răspunsul JSON primit de la fișierul PHP
        console.log(response); // Exemplu: Afișează răspunsul primit de la fișierul PHP
      
      // Actualizați conținutul modalului cu informațiile utilizatorului
      document.getElementById('username-modal').textContent = response.name;
      document.getElementById('email-modal').textContent = response.email;
      document.getElementById('password-modal').textContent = response.password;
      
      // Deschideți modalul
      openModal();
      },
      error: function() {
        console.log("Nu se pot obține informațiile utilizatorului.");
      }
    });
  }
  
  function openModal() {
    var modal = document.getElementById('modal');
    modal.style.display = 'block';
  }
  