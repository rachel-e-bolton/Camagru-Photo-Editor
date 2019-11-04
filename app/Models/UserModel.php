<?php 

require_once "BaseModel.php";

/*  
	Schema for users table (dev sqlite)

	CREATE TABLE users (
		first_name TEXT,
		last_name TEXT,
		handle TEXT,
		email TEXT,
		password_hash TEXT,
		dob TEXT,
		is_verified INT,
		profile_img TEXT
	)
*/


class UserModel extends BaseModel
{
	private function setOrNull($value)
	{
		if ($value)
			return $value;
		return NULL;
	}

	private function hashPass($passwd)
	{
		return hash("sha512", $passwd);
	}

	public function create($user)
	{
		$insert = "
			INSERT INTO users 
			    (first_name, last_name, handle, 
				 email, password_hash, dob, profile_img) 
			VALUES
				(:first_name, :last_name, :handle, :email, 
			     :password_hash, :dob, :profile_img)";

		
		$db = $this->getDb();

		$stmt = $db->prepare($insert);
		$stmt->bindValue(":first_name",    $this->setOrNull($user["first_name"]));
		$stmt->bindValue(":last_name",     $this->setOrNull($user["last_name"]));
		$stmt->bindValue(":handle",        $this->setOrNull($user["handle"]));
		$stmt->bindValue(":email",         $this->setOrNull($user["email"]));
		$stmt->bindValue(":password_hash",  $this->hashPass($user["password"]));

		try
		{    
			return $stmt->execute();
		}
		catch (PDOException $e)
		{
			return false;
		}
	}

	public function handleExists($handle)
	{
		$db = $this->getDb();

		$stmt = $db->prepare("SELECT * FROM users WHERE handle=:handle LIMIT 1");
		$stmt->bindParam(":handle", $handle);
		$stmt->execute();
		$result = $stmt->fetch();
		
		return ((bool)$result);
	}

	public function authenticate($email, $password)
	{
		$db = $this->getDb();

		$stmt = $db->prepare("SELECT * FROM users WHERE email=:email LIMIT 1");

		$stmt->bindParam(":email", $email);
		$stmt->execute();
		$result = $stmt->fetch();

		if ($result)
			return (hash("sha512", $password) === $result["password_hash"]);
		else
			return false;
	}
}