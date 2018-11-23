# PatrossPHP

A PHP library used to simplify many tasks.

This Library is currently in progress. If you decide to use it, keep in mind that some features may not work properly or may not work at all. If you upgrade to the newer version of the library, your code may break. If it does, check the documentation for the usage of the methods.

*If you believe there is an error anywhere in this readme file, do not hesistate to drop me an email @contactpatross@gmail.com*
**How to use**
# FILE UPLOAD
----------
**Make sure to include the library at the top of every file that's going to use it.**
```php
<?php
    require_once "path/to/library/PatrossPHP.php";
?>
```

**File Upload**
1. Create an instance of the class.
```php
<?php
    $file = new FileUpload($files['files'])
?>
```
**Replace "files" with whatever name you've included in your html form**
2. Set the upload settings up.
```php
<?php
    $file
    ->MaxSize((1024^2)*100)
    ->Extensions(array("png"))
    ->UploadDir("images/")
    ->LogInfo(true)
?>
```
**And upload the file**
```php
<?php
    ->Upload();
?>
```
- **MaxSize takes the max possible size for each file.**
- **Extensions takes an array file extensions that will be the allowed extensions for the file upload.**
- **UploadDir sets the directory to which the files will get uploaded.**
- **LogInfo takes a boolean. If it's true it will display all file associated errors and also which files have been uploaded and with what names.**
- **Upload siply does all required validation, and if successful, uploads the file.**
**Full script should look like this (basic html form included):**
```php
<form action="index.php" method="post" enctype="multipart/form-data">
    <input type="file" name="files[]" multiple>
    <input type="submit" name="submit">
</form>


<?php
if (!empty($_FILES["files"]["name"][0])) {
    require_once "PatrossPHP/FileUpload.php";
    $file = new FileUpload($_FILES["files"]);
    $file
    ->MaxSize((1024^2)*100)
    ->Extensions(array("png"))
    ->UploadDir("images/")
    ->LogInfo(true)
    ->Upload();
}
?>
```



#File DOWNLOAD
**This bit is as simple as this line:**
```php
<?php
new FileDownload($file);
?>
```
**In which $file specifies the file to download, as a path**

#ZIP DOWNLOAD
**This class is used to create a zip file with files inside it and downloading it. Here is the one line call to the function:**
```php
<?php
new ZipDownload($arr,$filePath);
?>
```
**where arr specifies the array of files and filePath is the name of the zip file**
