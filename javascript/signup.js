// signup.js

function validate() {
    // Example validation logic
    let username = document.getElementById('username').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let fullName = document.getElementById('full_name').value;
    
    let usernameError = document.getElementById('errorusername');
    let emailError = document.getElementById('errorEmail');
    let passwordError = document.getElementById('errorpassword');
    let fullNameError = document.getElementById('errorfull_name');
    let finalError = document.getElementById('errorFinal');
    
    usernameError.innerHTML = "";
    emailError.innerHTML = "";
    passwordError.innerHTML = "";
    fullNameError.innerHTML = "";
    finalError.innerHTML = "";
    
    let valid = true;
    
    if (username.length < 3) {
        usernameError.innerHTML = "Username must be at least 3 characters long";
        valid = false;
    }
    
    if (!email.includes('@')) {
        emailError.innerHTML = "Email must be valid";
        valid = false;
    }
    
    if (password.length < 6) {
        passwordError.innerHTML = "Password must be at least 6 characters long";
        valid = false;
    }
    
    if (fullName.length < 1) {
        fullNameError.innerHTML = "Full Name cannot be empty";
        valid = false;
    }
    
    if (!valid) {
        finalError.innerHTML = "Please fix the errors above";
    }
    
    return valid;
}
