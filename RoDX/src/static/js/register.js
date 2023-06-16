
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

/**
 * method used to register an user
 * @param {*} registerCredentials 
 */
function register(registerCredentials) {
  var xhr = new XMLHttpRequest();
  xhr.open('POST', urlRegister, async);
  xhr.setRequestHeader('Content-Type', 'application/json; charset=UTF-8');
  xhr.onreadystatechange = function () {
    if (xhr.status === 201 && xhr.readyState == 4) {
      //console.log("User Registered!");                                        //todo
      window.location.href = "../../views/index.html";
    }
    else if(xhr.readyState == 4){
      cleanHtml()
      document.getElementById("register-failed").innerHTML = "Incearca alt Username!";
    }
  };
  var body = JSON.stringify({ username: registerCredentials[usernameTag], user_password: registerCredentials[passwordTag1], user_email: registerCredentials[emailTag] });
  xhr.send(body);
}

function cleanHtml() {
  document.getElementById("username-constraints").innerHTML = "";
  document.getElementById("password-constraints").innerHTML = "";
  document.getElementById("email-constraints").innerHTML = "";
  document.getElementById("register-failed").innerHTML ="";
}
