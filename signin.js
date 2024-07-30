let username = document.querySelector("#username");
let password = document.querySelector("#password");
let submit = document.querySelector("#submit");

let enterel = document.querySelector(".enterel");

submit.addEventListener("click", (e) => {
    if (
      username.value === "" ||
      password.value === "" 
    ) {
      enterel.hidden = false;
      e.preventDefault(); // prevent form submission if fields are empty
    
    } else {
      enterel.hidden = true;
      // form is valid, allow submission
      document.querySelector("form").submit();
    }
  });