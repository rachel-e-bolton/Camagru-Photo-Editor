<?php

// user_id 		INT 			NOT NULL,
// 	date 			DATETIME 		DEFAULT CURRENT_TIMESTAMP,
// 	image			longtext 		NOT NULL,
// 	comment			varchar(500),

class PostModel extends BaseModel
{
	public function create($post)
	{
		$sql = "
			INSERT INTO posts 
				(user_id, image, comment)
			VALUES
				(:user_id, :image, :comment)";

		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":user_id", $post["user_id"]);
		$stmt->bindParam(":image", $post["image"]);
		$stmt->bindParam(":comment", $post["comment"]);
		
		try
		{    
			return $stmt->execute();
		}
		catch (PDOException $e)
		{
			echo "<pre>";
			$stmt->debugDumpParams();
			echo "</pre>";
			
			error_log("SQL Error: " . $e->getMessage(),0);
			return false;
		}
	}

	public function retrieve($handle=NULL, $order=NULL)
	{
		$sql = "
		SELECT 
			first_name, 
			last_name, 
			handle, 
			email,
			date,
			image,
			(SELECT COUNT(*) FROM likes WHERE post_id=posts.id) AS like_count,
			(SELECT COUNT(*) FROM comments WHERE post_id=posts.id) AS comment_count
		FROM posts
			LEFT JOIN users ON users.id=posts.user_id
		";

		$sql .= ($handle) ? " WHERE handle = :handle" : "";		
		$sql .= ($order) ? " ORDER BY :order" : " ORDER BY date";


		$stmt = $this->db->prepare($sql);
		if ($handle)
			$stmt->bindParam(":handle", $handle);
		if ($order)
			$stmt->bindParam(":order", $order);

		try
		{    
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch (PDOException $e)
		{
			error_log("SQL Error: " . $e->getMessage(),0);
			return false;
		}

	}
}