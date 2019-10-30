class ApiClient
{
	static async createUser(formId)
	{

		let myForm = document.getElementById(formId);
		let formData = new FormData(myForm);
		let response = await fetch(`/signup/create`, {
				method: 'POST', 
				body: JSON.stringify(Object.fromEntries(formData))
			}
		);
		let data = await response.json()
		return data
	}

	static async loginUser(formId)
	{
		let myForm = document.getElementById(formId);
		let formData = new FormData(myForm);

		let response = await fetch(`/users/authenticate`, {
				method: 'POST', 
				body: JSON.stringify(Object.fromEntries(formData))
			}
		);
		let data = await response.json()
		return data.status
	}

	static async getUsers()
	{
		let response = await fetch("/users/get")
		let data = await response.json()
		return data
	}
}