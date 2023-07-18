<?php
$sourceFolder = getcwd(); 
 

if (!file_exists("attachments")) {
    mkdir("attachments", 0777, true);
}

$textFiles = glob($sourceFolder . "/*.txt");

foreach ($textFiles as $textFile) {
    $fileName = basename($textFile);
    $languageCode = substr($fileName, 0, 2);
    $languageFolder = "attachments" . "/" . $languageCode;

   
    if (!file_exists($languageFolder)) {
        mkdir($languageFolder, 0777, true);
    }

    $destinationFilePath = $languageFolder . "/" . $fileName;

    
    if (rename($textFile, $destinationFilePath)) {
        echo "File transferred: " . $fileName . "\n";
    } else {
        echo "Failed to transfer file: " . $fileName . "\n";
    }
}
?>








