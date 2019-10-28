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
		$stmt->bindParam(":first_name",    $this->setOrNull($user["first_name"]));
		$stmt->bindParam(":last_name",     $this->setOrNull($user["last_name"]));
		$stmt->bindParam(":handle",        $this->setOrNull($user["handle"]));
		$stmt->bindParam(":email",         $this->setOrNull($user["email"]));
		$stmt->bindParam(":password_hash",  $this->hashPass($user["password"]));
		$stmt->bindParam(":dob",           $this->setOrNull($user["dob"]));
		$stmt->bindParam(":profile_img",   $this->setOrNull($user["profile_img"]));
		return $stmt->execute();
	}

	public function authenticate($username, $password)
	{
		$db = $this->getDb();

		$stmt = $db->prepare("SELECT * FROM users WHERE handle=:user LIMIT 1");

		$stmt->bindParam(":user", $username);
		$stmt->execute();
		$result = $stmt->fetch();

		if ($result)
			return (hash("sha512", $password) === $result["password_hash"]);
		else
			return false;
	}
}