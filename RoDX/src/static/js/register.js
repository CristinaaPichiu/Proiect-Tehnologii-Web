const usernameTag = "name";
const passwordTag = "password";
const passwordTag1 = "firstPassword";
const emailTag = "email";

const async = true;
const urlRegister = 'http://localhost:8081/api/auth/register';


const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
  container.classList.add("move-panel");
  // console.log("a1");
});

signInButton.addEventListener('click', () => {
  container.classList.remove("move-panel");
  // console.log("a2");
});

function openModal() {
  var modal = document.getElementById("modal-content");
  modal.classList.add("show");
}


/**
 * method used to register an user
 * @param {*} registerCredentials 
 */
function register(registerCredentials) {
  $.ajax({
    url: urlRegister,
    type: 'POST',
    contentType: 'application/json',
    data: JSON.stringify({
      username: registerCredentials[usernameTag],
      user_password: registerCredentials[passwordTag],
      user_email: registerCredentials[emailTag]
    }),
    success: function (data, textStatus, xhr) {
      if (xhr.status === 200) {
        // Utilizatorul este autentificat cu succes
        $('#username-modal').text(registerCredentials[usernameTag]);
        $('#email-modal').text(registerCredentials[emailTag]);
        $('#password-modal').text(registerCredentials[passwordTag]);
        openModal();
      } else {
        // Autentificarea a eșuat
        cleanHtml();
        $('#login-failed').html('Autentificare eșuată!');
      }
    },
    error: function (xhr, textStatus, errorThrown) {
      // Autentificarea a eșuat
      cleanHtml();
      $('#login-failed').html('Autentificare eșuată!');
    }
  });
}


function cleanHtml() {
  document.getElementById("username-constraints").innerHTML = "";
  document.getElementById("password-constraints").innerHTML = "";
  document.getElementById("email-constraints").innerHTML = "";
  document.getElementById("register-failed").innerHTML ="";
}

