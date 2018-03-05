// This is the main Javascript form validator function
function formValidator(event) {
   // The event parameter is implicitly supplied and lets us get a hold of the event being handled.
   // All values obtained here (document.forms gives the list of forms in the current document)
   let userForm = document.forms["user-form"];
   let fullName = userForm[0].children[0].value;
   // Regular Expression for finding two words separated by a space!
   let regExpName = /^\w+\s\w+$/;
   // We execute the regex pattern on the name value obtained from the document
   if(!regExpName.exec(fullName)) {
      // Alert user as to how the name should be displayed if the user gave the wrong input by giving the box a red outline and displaying error text underneath
      userForm[1].style.border = "1px solid red";
      document.getElementById("name-error").style.display = "block";
      // The preventDefault method is used to stop the form submission if it is not properly filled out!
      event.preventDefault();
   }
   else {
      // Remove the error text if the user got the current box correct
      document.getElementById("name-error").style.display = "none";
   }
   // This particular regular expression was obtained from: https://www.w3resource.com/javascript/form/email-validation.php
   let regExpEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
   let emailAddress = userForm[3].value;
   if(!regExpEmail.exec(emailAddress)) {
      // Alert user as to how the name should be displayed if the user gave the wrong input by giving the box a red outline and displaying error text underneath
      userForm[3].style.border = "1px solid red";
      document.getElementById("email-error").style.display = "block";
      event.preventDefault();
   }
   else {
      // Remove the error text if the user got the current box correct
      document.getElementById("email-error").style.display = "none";
   }
   let firstPass = userForm[9].value;
   let secondPass = userForm[11].value;
   if (firstPass !== secondPass || !firstPass || !secondPass) {
      // Alert user as to how the name should be displayed if the user gave the wrong input by giving the box a red outline and displaying error text underneath
      userForm[9].style.border = "1px solid red";
      userForm[11].style.border = "1px solid red";
      document.getElementById("password-error").style.display = "block";
      event.preventDefault();
   }
   else {
      // Remove the error text if the user got the current box correct
      document.getElementById("password-error").style.display = "none";
   }
   let userName = userForm[7].value;
   if(userName.length < 5) {
      // Alert user as to how the name should be displayed if the user gave the wrong input by giving the box a red outline and displaying error text underneath
      userForm[7].style.border = "1px solid red";
      document.getElementById("username-error").style.display = "block";
      event.preventDefault();
   }
   else {
      // Remove the error text if the user got the current box correct
      document.getElementById("username-error").style.display = "none";
   }
   let date = userForm[5];
   if(!date.value) {
      // Alert user as to how the name should be displayed if the user gave the wrong input by giving the box a red outline and displaying error text underneath
      userForm[5].style.border = "1px solid red";
      document.getElementById("date-error").style.display = "block";
      event.preventDefault();
   }
   else {
      // Remove the error text if the user got the current box correct
      document.getElementById("date-error").style.display = "none";
   }
}
// This function removed the red and is used dynamically when the boxes are selected to give the user some feedback
function removeRed(control) {
   control.style.border = "0px";
}