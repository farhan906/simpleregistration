let nname = document.querySelector("#name");
let username = document.querySelector("#username");
let email = document.querySelector("#email");
let password = document.querySelector("#password");
let cpassword = document.querySelector("#cpassword");
let submit = document.querySelector("#submit");

let enterel = document.querySelector(".enterel");
let matchpass = document.querySelector(".matchpass");

submit.addEventListener("click", (e) => {
    if (
      nname.value === "" ||
      username.value === "" ||
      email.value === "" ||
      password.value === "" ||
      cpassword.value === ""
    ) {
      enterel.hidden = false;
      e.preventDefault(); // prevent form submission if fields are empty
    } else if (password.value!== cpassword.value) {
      matchpass.hidden = false;
      e.preventDefault(); // prevent form submission if passwords don't match
    } else {
      enterel.hidden = true;
      matchpass.hidden = true;
      // form is valid, allow submission
      document.querySelector("form").submit();
    }
  });