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
      openModalF();
      },
      error: function() {
        console.log("Nu se pot obține informațiile utilizatorului.");
      }
    });
  }
  
  function openModalF() {
    
    var modal = document.getElementById('modal');
    var openModal = document.getElementById("open-modal");
    var closeModal = document.getElementsByClassName("close")[0];
    openModal.onclick = function() {
      modal.style.display = "block";
    }
    closeModal.onclick = function() {
      modal.style.display = "none";
    }
    
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  }
  