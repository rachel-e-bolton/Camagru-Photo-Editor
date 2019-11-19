<?php 

require_once "BaseModel.php";

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
			    (`first_name`, `last_name`, `handle`, 
				 `email`, `password_hash`) 
			VALUES
				(:first_name, :last_name, :handle, :email, 
			     :password_hash)";

		$db = $this->getDb();

		$stmt = $db->prepare($insert);
		$stmt->bindValue(":first_name",     $this->setOrNull($user["first_name"]));
		$stmt->bindValue(":last_name",      $this->setOrNull($user["last_name"]));
		$stmt->bindValue(":handle",         $this->setOrNull($user["handle"]));
		$stmt->bindValue(":email",          $this->setOrNull($user["email"]));
		$stmt->bindValue(":password_hash",  $this->hashPass($user["password"]));


		try
		{    
			return $stmt->execute();
		}
		catch (PDOException $e)
		{
			error_log("SQL Error: " . $e->getMessage(),0);
			return false;
		}
	}

	public function getUserByEmail($email)
	{
		$stmt = $this->db->prepare("
			SELECT id, first_name, last_name, handle, email, profile_img, verified, notifications
		 		FROM users WHERE email=:email LIMIT 1
		 ");
		$stmt->bindValue(":email", $email);

		try
		{
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		catch (PDOException $e)
		{
			error_log("SQL Error: " . $e->getMessage(),0);
			return false;
		}
	}

	public function getUserById($id)
	{
		$stmt = $this->db->prepare("SELECT id, first_name, last_name, handle, email, profile_img, verified, notifications FROM users WHERE id=:id LIMIT 1");
		$stmt->bindValue(":id", $id);

		try
		{
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		catch (PDOException $e)
		{
			error_log("SQL Error: " . $e->getMessage(),0);
			return false;
		}
	}

	public function verifyUserById($id)
	{
		$stmt = $this->db->prepare("UPDATE users SET verified=1 WHERE id=:id");
		$stmt->bindValue(":id", $id);
		
		try
		{    
			return $stmt->execute();
		}
		catch (PDOException $e)
		{
			error_log("SQL Error: " . $e->getMessage(),0);
			return false;
		}
	}

	public function deleteUserById($id)
	{
		$stmt = $this->db->prepare("DELETE FROM users WHERE id=:id");
		$stmt->bindValue(":id", $id);

		try
		{    
			return $stmt->execute();
		}
		catch (PDOException $e)
		{
			error_log("SQL Error: " . $e->getMessage(),0);
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

	public function updatePassword($id, $newPassword)
	{
		$stmt = $this->db->prepare("UPDATE users set password_hash=:hash WHERE id=:id");
		$stmt->bindValue(":id", (int)$userId, PDO::PARAM_INT);

		$hash = $this->hashPass($newPassword);
		$stmt->bindParam(":hash", $hash);

		return (new DatabaseResponse($stmt));
	}

	public function updateDetails($userId, $handle, $fname, $lname)
	{
		$sql = "
			UPDATE
				users
			SET
				handle=:handle,
				first_name=:fname,
				last_name=:lname
			WHERE
				id=:id
		";

		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":id", (int)$userId, PDO::PARAM_INT);
		$stmt->bindParam(":handle", $handle);
		$stmt->bindParam(":fname", $fname);
		$stmt->bindParam(":lname", $lname);

		return (new DatabaseResponse($stmt));
	}

	public function updateEmail($id, $newEmail)
	{
		$stmt = $this->db->prepare("UPDATE users SET email=:email, verified=0 WHERE id=:id");
		$stmt->bindValue(":id", (int)$id, PDO::PARAM_INT);
		$stmt->bindParam(":email", $newEmail);

		return (new DatabaseResponse($stmt));
	}

	public function updateNotifications($id, $val)
	{
		$stmt = $this->db->prepare("UPDATE users SET notifications=:val WHERE id=:id");
		$stmt->bindValue(":id", (int)$id, PDO::PARAM_INT);
		
		$value = ($val) ? "1" : "0";
		
		$stmt->bindParam(":val", $value);



		return (new DatabaseResponse($stmt));
	}
}