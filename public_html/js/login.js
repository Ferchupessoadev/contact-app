import checkoutForm from './utils/checkoutForm.js';

const $ = documentSelector => document.querySelector(documentSelector);

$('#login-form').addEventListener('submit', async e => {
	e.preventDefault();

	let isValidForm = checkoutForm('email', 'password');
	if (!isValidForm.success) {
		alert(isValidForm.message);
		return
	}

	try {
		const data = await fetch('/login', {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json'
			},
			body: JSON.stringify({
				email: $('#email').value,
				password: $('#password').value
			})
		})

		const response = await data.json();
		if (response.message == 'ok') {
			window.location.href = '/';
		}
	} catch (error) {
		console.log(error);
	}
})
