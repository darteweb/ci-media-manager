<?php
if(!empty($_FILES)){
    // Include the database configuration file
    //require 'dbConfig.php';
    
    // File path configuration
    $targetDir = "public/uploads/";
    $fileName = $_FILES['file']['name'];
    $targetFilePath = $targetDir.$fileName;
    
    // Upload file to server
    if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)){
        // Insert file information in the database
        $insert = $db->query("INSERT INTO files (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
    }

foreach ($_FILES["file"]["name"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["file"]["tmp_name"][$key];
        $name = basename($_FILES["file"]["name"][$key]);
        move_uploaded_file($tmp_name, "$target_dir/$name");
    }
}
}

