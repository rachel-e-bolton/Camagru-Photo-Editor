<?php

class CommentModel extends BaseModel
{
    public function add($userId, $postId, $comment)
    {
        $response = [];

        $sql = "
            INSERT INTO comments
                (user_id, post_id, comment)
            VALUES
                (:uid, :pid, :comment)
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(":uid", $userId);
        $stmt->bindParam(":pid", $postId);
        $stmt->bindParam(":comment", $comment);

        return (new DatabaseResponse($stmt, $this->db));

    }

    public function getCommentById($id)
    {
        $sql = "
        SELECT comments.id as id, user_id, handle, date, comment, email, notifications
            FROM comments 
        LEFT JOIN users on comments.user_id = users.id
        WHERE comments.id=:id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id);

        try
		{
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		catch (PDOException $e)
		{
			return false;
		}
    }

    public function getCommentsByPostId($id)
    {
        $sql = "
            SELECT comments.id as cid, users.id as uid, date, handle, comment, profile_img, first_name, last_name FROM comments 
                LEFT JOIN users ON comments.user_id=users.id
            WHERE post_id=:id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id);

        try
		{
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch (PDOException $e)
		{
			return false;
		}
    }

    public function deleteCommentById($id)
    {
        $stmt = $this->db->prepare("DELETE FROM comments where id=:id");
        $stmt->bindValue(":id", (int)$id, PDO::PARAM_INT);

        try
		{
			return $stmt->execute();
		}
		catch (PDOException $e)
		{
			return false;
		}
    }

}