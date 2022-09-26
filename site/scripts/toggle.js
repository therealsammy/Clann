const passwordField = document.querySelector(".form input[type='password']"),
    toggleBtn = document.querySelector(".form .field i");

toggleBtn.addEventListener("click", () => {
    if (passwordField.type == "password") {
        passwordField.type = "text";
        toggleBtn.classList.add("active");
    } else {
        passwordField.type = "password";
        toggleBtn.classList.remove("active");
    }

})