<?php 

class LikesModel extends BaseModel
{
    public function toggleLike($postId, $userId)
    {
        if ($this->isLiked($postId, $userId))
            return $this->unlike($postId, $userId);
        else
            return $this->like($postId, $userId);
    }

    private function like($postId, $userId)
    {
        $stmt = $this->db->prepare("INSERT INTO likes (post_id, user_id) VALUES (:postid, :userid)");

        $stmt->bindValue(":userid", (int)$userId, PDO::PARAM_INT);
        $stmt->bindValue(":postid", (int)$postId, PDO::PARAM_INT);

        return new DatabaseResponse($stmt);
    }

    private function unlike($postId, $userId)
    {
        $stmt = $this->db->prepare("DELETE FROM likes WHERE user_id=:userid AND post_id=:postid");
        $stmt->bindValue(":userid", (int)$userId, PDO::PARAM_INT);
        $stmt->bindValue(":postid", (int)$postId, PDO::PARAM_INT);

        return new DatabaseResponse($stmt);
    }

    public function isLiked($postId, $userId)
    {
        $stmt = $this->db->prepare("SELECT * FROM likes WHERE user_id=:userid AND post_id=:postid");
        $stmt->bindValue(":userid", (int)$userId, PDO::PARAM_INT);
        $stmt->bindValue(":postid", (int)$postId, PDO::PARAM_INT);

        $stmt->execute();
        $count = count($stmt->fetchAll());

        return ($count > 0);
    }

}