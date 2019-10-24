<?php 

class Request 
{
    
}



class App {

    private $uri;
    private $get = [];

    function __construct($uri)
    {
        $this->__setURI($uri);

        // Add all routes

        echo $_SERVER['REQUEST_METHOD'] == "POST";
        print_r($_POST);


        echo "Constructed URI $this->uri <br>";
        print_r($this->get);

        echo "
        
            <form method='POST'>
                <input type='text' name='asd'>
                <button type='submit'>Test</button>

            </form>
        
        ";


    }

    public function followRoute()
    {

    }


    private function __setURI($uri)
    {
        if ($q = strpos($uri, "?"))
        {
            $this->uri = substr($uri, 0, $q);
            $params = substr($uri, $q + 1, strlen($uri));
            if (strpos($params, "&"))
            {
                $get = explode("&", $params);
                foreach ($get as $keypair)
                {
                    $_ = explode("=", $keypair);
                    $this->get[$_[0]] = $_[0];
                }
            }
            else
                $this->get = explode("&", $params);
        }
        else
        {
            $this->uri = $uri;
        }
    }

}

?>