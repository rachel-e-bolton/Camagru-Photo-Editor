<?php 

class DatabaseResponse
{
    private $data = NULL;
    private $valid = FALSE;
    private $errorMessage = NULL;
    private $id = NULL;
    public $rowCount = 0;

    public function __construct($stmt, $database = NULL)
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
                if ($database)
                {
                    $this->id = $database->lastInsertId();
                    //$this->id = ($base->getDb())->lastInsertId();
                }
            }
            $this->rowCount = count($this->data);
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