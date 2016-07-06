<?php

class VaultWareImporter {
    protected $filePath;
    protected $fileHandle;
    protected $fileContents;
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function handle()
    {
        return $this
                ->openFile() // Open the file and create a handle
                ->getContents() // Use the file handle to open a stream and get all content
                ->convertToArray(); // Convert result contents into an array
    }

    /**
     * Open XML file for processing
     * @return $this
     */
    protected function openFile()
    {
        try {
            $this->fileHandle = fopen($this->filePath, 'rb');
        } catch (Exception $e) {
            if ($e->getMessage()) die("Error binding file to stream: ".$e->getMessage());
            else die("Error binding file to stream");
        }
        return $this;
    }

    /**
     * Get the contents of the current file stream
     * @return $this
     */
    protected function getContents()
    {
        try {
            $this->fileContents = stream_get_contents($this->fileHandle);
        } catch (Exception $e) {
            if ($e->getMessage()) die("Error fetching file stream content: ".$e->getMessage());
            else die("Error fetching file stream content.");
        }
        // At this point we're done with the stream, so we can close it out
        fclose($this->fileHandle);
        return $this;
    }

    /**
     * Convert file stream contents into readable array
     * @return array [VaultWare properties]
     */
    protected function convertToArray()
    {
        try {
            $vwProperties = simplexml_load_string($this->fileContents, 'SimpleXMLElement', LIBXML_NOCDATA | LIBXML_NOBLANKS);
        } catch (Exception $e) {
            if ($e->getMessage()) die("Error converting stream contents into XML: ".$e->getMessage());
            else die("Error converting stream contents into XML.");
        }
        return $vwProperties;
    }
}
