<?php

class GetMyFile {

    private $fileFullPath;

    public function __construct($fileFullPath)
    {
        $this->fileFullPath = $fileFullPath;
    }

    public function serveFile()
    {
        if(!$this->verifyFileExists() || !$this->validateFileType()) {
            echo "\nInvalid source\n";
            return false;
        }

        header('Content-Type: ' . $this->getFileType());
        header('Content-Disposition: attachment; filename='.basename($this->fileFullPath));
        header('Pragma: no-cache');

        readfile($this->fileFullPath);
    }

    private function verifyFileExists()
    {
        if(file_exists($this->fileFullPath)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * only allow type 'file' to download
     * @return string (fifo, char, dir, block, link, file, socket, unknown)
     */
    private function validateFileType()
    {
        if(filetype($this->fileFullPath) != 'file') {
            return false;
        } else {
            return true;
        }
    }

    /**
     * determine whether file is ascii or binary
     * @return text | bin
     */
    private function getFileType()
    {
        $fInfo = finfo_open(FILEINFO_MIME_TYPE);
        $strFileType = finfo_file($fInfo, $this->fileFullPath);
        finfo_close($fInfo);

        return $strFileType;
    }

}