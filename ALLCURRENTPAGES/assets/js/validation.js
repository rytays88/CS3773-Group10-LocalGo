// Function to validate names (first and last)
function validateName(name, feedbackId, statusId) {
    var validNameRegex = /^[a-zA-Z'-]{2,}$/;
    var elStatus = document.getElementById(statusId);  // Note to self: not passing a string, passing the actual id itself
    var elFeedback = document.getElementById(feedbackId); // Notice not in quotes, and white, not yellow.

    if (name.value.match(validNameRegex)) {
        elStatus.classList.remove("has-error");
        elStatus.classList.add("has-success");
        elFeedback.innerHTML = "This is a valid name";
    } else {
        elStatus.classList.remove("has-success");
        elStatus.classList.add("has-error");
        elFeedback.innerHTML = "Name is INVALID!";
    }
}

// Function to validate email addresses
function validateEmail(email) {
    var validRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var elEmailStatus = document.getElementById('emailStatus'); // here I'm more specific and call the statusID "emailStatus"
    var elEmailFeedback = document.getElementById('emailFeedback');
    if (email.value.match(validRegex)) {
        elEmailStatus.classList.remove("has-error");
        elEmailStatus.classList.add("has-success");
        elEmailFeedback.innerHTML = "This is a valid email address";
    } else {
        elEmailStatus.classList.remove("has-success");
        elEmailStatus.classList.add("has-error");
        elEmailFeedback.innerHTML = "Email address is INVALID!";
    }
}

// Function to validate phone numbers
function validatePhone(phone) {
    var validPhoneRegex = /^\+?[1-9]\d{1,14}$/; // Example: E.164 format
    var elPhoneStatus = document.getElementById('phoneStatus');
    var elPhoneFeedback = document.getElementById('phoneFeedback');
    if (phone.value.match(validPhoneRegex)) {
        elPhoneStatus.classList.remove("has-error");
        elPhoneStatus.classList.add("has-success");
        elPhoneFeedback.innerHTML = "This is a valid phone number";
    } else {
        elPhoneStatus.classList.remove("has-success");
        elPhoneStatus.classList.add("has-error");
        elPhoneFeedback.innerHTML = "Phone number is INVALID!";
    }
}

// Function to validate usernames / passwords
function validateUsernamePassword(usernamePassword, feedbackId, statusId) {
    var validUsernamePasswordRegex = /.{6,}/;
    var elUsernamePasswordStatus = document.getElementById(statusId);
    var elUsernamePasswordFeedback = document.getElementById(feedbackId);

    if (usernamePassword.value.match(validUsernamePasswordRegex)) {
        elUsernamePasswordStatus.classList.remove("has-error");
        elUsernamePasswordStatus.classList.add("has-success");
        elUsernamePasswordFeedback.innerHTML = "Entry is valid";
    } else {
        elUsernamePasswordStatus.classList.remove("has-success");
        elUsernamePasswordStatus.classList.add("has-error");
        elUsernamePasswordFeedback.innerHTML = "Entry must be at least 6 characters long";
    }
}

// Function to validate comments
function validateComments(comments) {
    var elCommentsStatus = document.getElementById('commentsStatus');
    var elCommentsFeedback = document.getElementById('commentsFeedback');

    if (comments.value.trim() !== "") {
        elCommentsStatus.classList.remove("has-error");
        elCommentsStatus.classList.add("has-success");
        elCommentsFeedback.innerHTML = "Comments are valid";
    } else {
        elCommentsStatus.classList.remove("has-success");
        elCommentsStatus.classList.add("has-error");
        elCommentsFeedback.innerHTML = "Comments cannot be empty!";
    }
}

// Event listeners for input fields
var elFirstName = document.getElementById('FirstName');
elFirstName.addEventListener('blur', function() { validateName(elFirstName, 'fnFeedback', 'firstnameStatus'); }, false);

var elLastName = document.getElementById('LastName');
elLastName.addEventListener('blur', function() { validateName(elLastName, 'lnFeedback', 'lastnameStatus'); }, false);

var elEmail = document.getElementById('Email');
elEmail.addEventListener('blur', function() { validateEmail(elEmail); }, false);

var elPhone = document.getElementById('Phone');
elPhone.addEventListener('blur', function() { validatePhone(elPhone); }, false);

var elUsername = document.getElementById('username');
elUsername.addEventListener('blur', function() { validateUsernamePassword(elUsername, 'unFeedback', 'usernameStatus'); }, false);

var elPassword = document.getElementById('password');
elPassword.addEventListener('blur', function() { validateUsernamePassword(elPassword, 'pwFeedback', 'passwordStatus'); }, false);

var elComments = document.getElementById('comments');
elComments.addEventListener('blur', function() { validateComments(elComments); }, false);
