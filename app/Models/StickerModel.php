<?php 

class StickerModel extends BaseModel
{
	public function getAll()
	{
		$stmt = $this->db->prepare("SELECT * FROM stickers");

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