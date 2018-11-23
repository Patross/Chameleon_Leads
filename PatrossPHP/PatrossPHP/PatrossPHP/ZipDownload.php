<?php
class ZipDownload{
    public function __construct($fileArray,$zipName)
    {
        $zip = new ZipArchive();

        if ($zip->open($zipName, ZipArchive::CREATE)!==TRUE) {
            exit("cannot open <$zipName>\n");
        }else{
            foreach ($fileArray as $key => $value) {
                $zip->addFile($value);
            }
            $zip->close();
        } 
        new FileDownload($zipName);
        unlink($zipName);
    }
}