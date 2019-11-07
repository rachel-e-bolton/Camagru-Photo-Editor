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




class Canvas
{
	constructor(parent, width = 300, height = 300)
	{
		if (typeof parent == "string")
			parent = document.getElementById(parent)

		this.canvas = document.createElement("canvas")
		this.ctx = this.canvas.getContext("2d")
		parent.appendChild(this.canvas)
		this.canvas.width = width
		this.canvas.height = height
	}

	background(colour)
	{
		this.canvas.style.background = colour
	}

	addImage(image)
	{
		this.ctx.drawImage(image, 0, 0)
	}

	getContext()
	{
		return this.ctx
	}

	getCanvas()
	{
		return this.canvas
	}
}

var container = document.getElementById("posts-container")

var canvas = new Canvas(container)

var image = new Image()

var x = 0;

var c = canvas.getCanvas()
var ctx = canvas.getContext()

image.onload = () => {
	ctx.clearRect(0, 0, c.width, c.height);
	ctx.drawImage(image, x, 0);
}

image.src = "/img/Browse.png"
