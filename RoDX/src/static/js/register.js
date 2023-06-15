
const usernameTag = "name";
const passwordTag = "password";
const passwordTag1 = "firstPassword";
const passwordTag2 = "secondPassword";
const emailTag = "email";
const accessTokenTag = "access_token";
const receivedAccessTokenTag = "token";
const async = true;
const urlLogin = 'http://localhost:8081/api/auth/login';
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


// Register
const registerFormElement = document.getElementById("registerForm");
registerFormElement.addEventListener('submit', e => {
  e.preventDefault();
  // console.log("submited Register!");

  var registerCredentials = getRegisterCredentials(registerFormElement);
  if (checkRegisterCredentials(registerCredentials)) {
    register(registerCredentials);
  }
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

/**
 * method used to get the register credentials
 * @param {*} registerFormElement 
 * @returns 
 */
function getRegisterCredentials(registerFormElement) {
  var credentials = {};
  credentials[usernameTag] = registerFormElement[0].value;
  credentials[emailTag] = registerFormElement[1].value;
  credentials[passwordTag1] = registerFormElement[2].value;
  credentials[passwordTag2] = registerFormElement[3].value;
  return credentials;
}

/**
 * method used to check the register credentials
 * @param {*} registerCredentials 
 */
function checkRegisterCredentials(credentials) {
  if (credentials[usernameTag].length < 6) {
    cleanHtml();
    document.getElementById("username-constraints").innerHTML = "Username-ul trebuie sa contina sase sau mai multe caractere!";
    return false;
  }
  if (credentials[emailTag] == "") {
    cleanHtml();
    document.getElementById("email-constraints").innerHTML = "Email-ul trebuie sa fie valid!";
    return false;
  }
  if (credentials[passwordTag1].length < 6) {
    cleanHtml();
    document.getElementById("password-constraints").innerHTML = "Parola trebuie sa contina sase sau mai multe caractere!";
    return false;
  }
  if (credentials[passwordTag1] !== credentials[passwordTag2]) {
    cleanHtml();
    document.getElementById("password-constraints").innerHTML = "Parola trebuie sa fie identica!";
    return false;
  }
  return true;
}

function cleanHtml() {
  document.getElementById("username-constraints").innerHTML = "";
  document.getElementById("password-constraints").innerHTML = "";
  document.getElementById("email-constraints").innerHTML = "";
  document.getElementById("register-failed").innerHTML ="";
}
