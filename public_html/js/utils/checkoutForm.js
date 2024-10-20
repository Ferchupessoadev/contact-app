const $ = documentSelector => document.querySelector(documentSelector);

/**
 * @function checkoutForm
 * @description Valida un formulario de inicio de sesión y retorna el resultado.
 * @param {string} idEmail - El ID del campo de entrada del email.
 * @param {string} idPassword - El ID del campo de entrada de la contraseña.
 * @returns {Object} Un objeto que contiene:
 *   @returns {boolean} success - Indica si la validación fue exitosa.
 *   @returns {string} message - Mensaje relacionado con la validación.
 */
export default function checkoutForm(idEmail, idPassword) {
	const $email = $(`#${idEmail}`).value;
	const $password = $(`#${idPassword}`).value;

	let data = {
		success: true,
		message: ''
	};

	if (!$email || !$password) {
		if (!$email) {
			data.message = 'Email vacío';
			data.success = false;
		}

		if (!$password) {
			data.message = 'Contraseña vacía';
			data.success = false;
		}

		if (!$email && !$password) {
			data.message = 'Email y contraseña vacías';
			data.success = false;
		}
	}

	return data;

}

