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
		if (!response.ok)
			throw await response.json()
		else
			return await response.json()
	}

	static async loginUser(formId)
	{
		let myForm = document.getElementById(formId);
		let formData = new FormData(myForm);

		let response = await fetch(`/login/authenticate`, {
				method: 'POST', 
				body: JSON.stringify(Object.fromEntries(formData))
			}
		);
		return await response.json()
	}

	static async getUsers()
	{
		let response = await fetch("/users/get")
		let data = await response.json()
		return data
	}

	static async getPosts(handle, order)
	{
		//let response = await fetch(`/posts/get?handle=${handle}&order=${order}`)
		let response = await fetch(`/posts/get`)
		let data = await response.json()
		return data
	}
}




