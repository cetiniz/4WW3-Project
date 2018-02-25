function formValidator(event) {
   // All values obtained here
   let userForm = document.forms["user-form"];
   let userName = userForm[0].children[0].value;
   // Regular Expression for finding two words separated by a space!
   let regExpName = /^\w+\s\w+$/;
   if(!regExpName.exec(userName)) {
      // Alert user as to how the name should be displayed
      userForm[1].style.border = "1px solid red";
      document.getElementById("name-error").style.display = "block";
      event.preventDefault();
   }
   else {
      document.getElementById("name-error").style.display = "none";
   }
   // This particular regular expression was obtained from: https://www.w3resource.com/javascript/form/email-validation.php
   let regExpEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
   let emailAddress = userForm[3].value;
   if(!regExpEmail.exec(emailAddress)) {
      userForm[3].style.border = "1px solid red";
      document.getElementById("email-error").style.display = "block";
      event.preventDefault();
   }
   else {
      document.getElementById("email-error").style.display = "none";
   }
   let firstPass = userForm[9].value;
   let secondPass = userForm[11].value;
   if (firstPass !== secondPass || !firstPass || !secondPass) {
      userForm[9].style.border = "1px solid red";
      userForm[11].style.border = "1px solid red";
      document.getElementById("password-error").style.display = "block";
      event.preventDefault();
   }
   else {
      document.getElementById("password-error").style.display = "none";
   }
}
function removeRed(control) {
   control.style.border = "0px";
}