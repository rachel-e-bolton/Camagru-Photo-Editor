import multiprocessing
import requests
import unittest
import signal
import os

from subprocess import Popen, PIPE
from time import sleep


url = "http://localhost:8080{}"
verify_link = None


class TestLogin(unittest.TestCase):

	@classmethod
	def setUpClass(self):
		self.server = Popen(["php", "-S", "localhost:8080", "-t", "public"], stderr=PIPE, stdout=PIPE)
		self.pid = self.server.pid
		self.s = requests.Session()
		sleep(2)


	@classmethod
	def tearDownClass(self):
		sleep(2)
		os.kill(self.pid, signal.SIGKILL)


	def test_01_invalidlogin(self):
		data = requests.post(url.format("/login/authenticate"), 
			json={"email" : "asd@asd.com", "password" : "asd"})

		result = data.json()
		self.assertFalse(result["success"])


	def test_02_signup(self):
		data = self.s.post(url.format("/signup/create"), 
			json= {
				"first_name" : "Glen",
				"last_name" : "Wasserfall",
				"handle" : "gwasserf",
				"email" : "glen@wasserfalls.co.za",
				"password" : "password"
				})
		result = data.json()
		TestLogin.link = result["data"]["link"]
		self.assertTrue(result["success"])


	def test_03_validLoginWithoutVerification(self):
		data = self.s.post(url.format("/login/authenticate"), 
			json={"email" : "glen@wasserfalls.co.za", "password" : "password"})
		result = data.json()
		sleep(1)
		self.assertFalse(result["success"])

	def test_04_verifyAccount(self):
		if not TestLogin.link:
			assert False
		data = self.s.get(TestLogin.link)
		result = data.text
		sleep(1)
		self.assertTrue("<title>Log In</title>" in result)

	def test_05_validLoginWithVerification(self):
		data = self.s.post(url.format("/login/authenticate"), 
			json={"email" : "glen@wasserfalls.co.za", "password" : "password"})
		result = data.json()
		sleep(1)
		self.assertTrue(result["success"])

	def test_06_deleteUser(self):
		data = self.s.delete(url.format("/users/delete"), json={"email" : "glen@wasserfalls.co.za", "password" : "password"})
		result = data.json()
		self.assertTrue(result["success"])

if __name__ == "__main__":
	unittest.main()
	print "Done"
	