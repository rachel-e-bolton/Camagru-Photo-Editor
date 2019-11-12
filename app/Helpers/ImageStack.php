<?php

class ImageStack
{
    private $layers;
    private $baseLayer = NULL;
    private $files = [];
    private $uid;

    public function __construct($layers, $uid)
    {
        $this->layers = $layers;
        $this->uid = $uid;
    }

    private function saveLayers()
    {
        $i = 0;
        foreach ($this->layers as $rawBase64)
        {
            $base64 = explode("base64,", $rawBase64)[1];
            $path = $this->uid . $i . ".png";
            file_put_contents(TEMP . $path, base64_decode($base64));
            array_push($this->files, TEMP . $path);
            $i++;
        }
    }

    private function mergeLayers()
    {
        foreach ($this->files as $file)
        {
            if (!$this->baseLayer)
            {
                $this->baseLayer = imagecreatefrompng($file);
                imagealphablending($this->baseLayer, true);
                imagesavealpha($this->baseLayer, true);
                continue;
            }
            $next_layer = imagecreatefrompng($file);
            imagealphablending($next_layer, true);
            imagesavealpha($next_layer, true);
            imagecopy($this->baseLayer, $next_layer, 0, 0, 0, 0, 600, 600);
        }
    }

    private function deleteFiles()
    {
        foreach ($this->files as $file)
        {
            unlink($file);
        }
    }

    public function mergedImage64()
    {
        $this->saveLayers();
        $this->mergeLayers();
        $final = TEMP . $this->uid . ".png";
        imagepng($this->baseLayer, $final);
        $base64 = base64_encode(file_get_contents($final));
        $result = "data:image/png;base64," . $base64;
        $this->deleteFiles();
        unlink($final);

        return $result;
    }
}