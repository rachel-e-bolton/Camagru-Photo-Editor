class Api
{
	static get(url)
	{
		return fetch(url).then(resp => resp.json())
	}

	static post(url, body)
	{
		let options = {
			method: "POST",
			body: body
		}
		return fetch(url, options).then(resp => resp.json())
	}

	static delete(url, body = {})
	{
		let options = {
			method: "DELETE",
			body: body
		}
		return fetch(url, options).then(resp => resp.json())
	}
}




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

	static async getPosts(start = 0, handle = null)
	{
		//let response = await fetch(`/posts/get?start=${start}` + (handle) ? `&handle=${handle}` : "")
		let urlParams = new URLSearchParams(window.location.search);
		let response
		
		if (!handle)
			handle = urlParams.get('handle');


		Messages.info(`Loading posts for ${handle}`)

		if (handle)
			response = await fetch(`/posts/get?start=${start}&handle=${handle}`)
		else
			response = await fetch(`/posts/get?start=${start}`)
		let data = await response.json()
		return data
	}

	static async getStickers()
	{
		let response = await fetch(`/stickers/get_all`)
		let data = await response.json()
		return data
	}

	static async savePost(post)
	{
		let response = await fetch(`/posts/add`, {
			method: 'POST',
			body: JSON.stringify(post)
		})
		let data = await response.json()
		return data
	}

	static async addComment(comment)
	{
		let response = await fetch(`/comment/add`, {
			method: 'POST',
			body: JSON.stringify(comment)
		})
		let data = await response.json()
		return data
	}
}


