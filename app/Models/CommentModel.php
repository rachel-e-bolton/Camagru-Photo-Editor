<?php

class CommentModel extends BaseModel
{
    public function add($comment)
    {
        $response = [];

        $sql = "
            INSERT INTO comments
                (user_id, post_id, comment)
            VALUES
                (:uid, :pid, :comment)
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(":uid", $comment["user_id"]);
        $stmt->bindParam(":pid", $comment["post_id"]);
        $stmt->bindParam(":comment", $comment["comment"]);

        return (new DatabaseResponse($stmt));

        // try
		// {    
		// 	$stmt->execute();
        //     $response["success"] = true;
        //     $response["id"] = $this->db->lastInsertId();
		// }
		// catch (PDOException $e)
		// {
        //     error_log("SQL Error: " . $e->getMessage(),0);
        //     $response["success"] = false;
        //     $response["error"] = $e->getMessage();
        // }
        
        // return $response;
    }

    public function getCommentById($id)
    {
        $sql = "SELECT * FROM comments WHERE id=:id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id);

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

    public function getCommentsByPostId($id)
    {
        $sql = "
            SELECT handle, comment, profile_img, first_name, last_name FROM comments 
                LEFT JOIN users ON comments.user_id=users.id
            WHERE post_id=:id
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id);

      

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