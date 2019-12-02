<?php 

class StickerModel extends BaseModel
{
	public function getAll()
	{
		$stmt = $this->db->prepare("SELECT id, name, image, type FROM stickers");

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
}