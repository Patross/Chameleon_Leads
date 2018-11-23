<?php
class FileUpload //WHY DOES NAMESPACE BREAK THE CODE!?!?!?!?!?!?!?
{
    public $files;
    public $uploaded;
    public $failed;
    public $allowed;

    public $max_file_size;
    public $upload_directory;
    public $log_info = true;

    public function __construct($file)//$_FILES["files"];
    {
        $this->files = $file;
        $this->uploaded = array();
        $this->failed = array();
        $this->allowed = array();
    }
    public function MaxSize($size)
    {
        $this->max_file_size = $size;    
        return $this; 
    }
    public function Extensions($array)
    {
        $this->allowed = $array;
        return $this;
    }
    public function UploadDir($directory)
    {
            $this->upload_directory = $directory;
            return $this;
    }
    public function LogInfo($bool)
    {
        $this->log_info = $bool;
        return $this;
    }
    public function Upload()
    {
        foreach ($this->files["name"] as $position => $file_name) {
            $file_tmp = $this->files["tmp_name"][$position];
            $file_size = $this->files["size"][$position];
            $file_error = $this->files["error"][$position];

            $file_extension = explode('.',$file_name);
            $file_extension = strtolower(end($file_extension));

            if (in_array($file_extension,$this->allowed)) {
                if ($file_error === 0) {
                    if ($file_size <= (1024^2)*100) {
                        $file_name_new = uniqid("",true).'.'.$file_extension;
                        $file_destination = $this->upload_directory.$file_name_new;
    
                        if (move_uploaded_file($file_tmp,$file_destination)) {
                            $uploaded[$position] = $file_destination;
                        }
                        else{
                            $failed[$position] = "[{$file_name}] failed to upload";
                        }
                    }
                    else{
                        $failed[$position] = "[{$file_name}] is too big";
                    }
                }
                else{
                    $failed[$position] = "[{$file_name}] errored with code [$file_error]";
                }
            }else{
                $failed[$position] = "[{$file_name}] file extension '{$file_extension}' is not allowed";
            }
        }
        //logs which files are uploaded or not and all errors if the users sets the log_info property is set to true(default)
        if ($this->log_info === true) { 
            if (!empty($uploaded)) {
                print_r($uploaded);
            }
            if (!empty($failed)) {
                print_r($failed)."<br/>";
            }
       }
    }
}
