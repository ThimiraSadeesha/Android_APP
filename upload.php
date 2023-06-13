<?php

$targetDir = "uploads/htdocs";
$targetFile = $targetDir . basename($_FILES["Subs_list.json"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if file is a JSON file
if ($fileType != "json") {
    echo "Invalid file format. Only JSON files are allowed.";
    $uploadOk = 0;
}

// Check if file already exists
if (file_exists($targetFile)) {
    echo "File already exists.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["Subs_list.json"], $targetFile)) {
        echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


$filePath = "htdocs/down";
$fileName = "downloaded_file.json";

// Check if the file exists
if (file_exists($filePath)) {
    // Set appropriate headers
    header('Content-Type: application/json');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    header('Content-Length: ' . filesize($filePath));

    // Read the file and output its contents
    readfile($filePath);
} else {
    echo "File not found.";
}
?>


