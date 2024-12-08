var elMsg = document.getElementById('feedback');
var elUsername = document.getElementById('username');

var elMsgPassword = document.getElementById('feedbackPassword');
var elPassword = document.getElementById('password');

function checkUsername(minLength)
{
	if (elUsername.value.length < minLength)
	{
	elMsg.innerHTML = 'Username must be '+minLength+' characters or more';
	}
	else
	{
	elMsg.innerHTML = '';
	}
}

function checkPassword(minLengthPassword)
{
	if (elPassword.value.length < minLengthPassword)
	{
	elMsgPassword.innerHTML = 'Password must be '+minLengthPassword+' characters or more';
	}
	else
	{
	elMsgPassword.innerHTML = '';
	}
}

elUsername.addEventListener('blur', function() {
	checkUsername(6);
	},false);

elPassword.addEventListener('blur', function() {
	checkPassword(8);
	},false);