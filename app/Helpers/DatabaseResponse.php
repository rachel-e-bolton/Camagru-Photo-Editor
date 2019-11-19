<?php 

class DatabaseResponse
{
    private $data = NULL;
    private $valid = FALSE;
    private $errorMessage = NULL;
    private $id = NULL;

    public function __construct($stmt, $multiple = TRUE)
    {
        try
		{
            $base = new BaseModel();

            $stmt->execute();
         
            if (strpos(strtolower($stmt->queryString), "select") === TRUE)
            {
                if ($multiple)
                    $this->data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                else
                    $this->data = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else
            {
                $this->id = ($base->getDb())->lastInsertId();
            }
            $this->valid = TRUE;
		}
		catch (PDOException $e)
		{
			$this->errorMessage = $e->getMessage();
			$this->valid = FALSE;
        }
    }

    public function isValid()
    {
        return $this->valid;
    }

    public function errorMessage()
    {
        return $this->errorMessage;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getId()
    {
        return $this->id;
    }
}