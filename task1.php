<?php
$languages = [];

while (true) {
    $language = readline("Enter the language (or 'exit' to quit): ");

    if ($language === 'exit') {
        break;
    }

    $languageCode = strtok($language, '-');

    if (!file_exists($languageCode)) {
        if (!mkdir($languageCode)) {
            die("Failed to create the language folder.");
        }
    }

    $languageFile = fopen($language . '.txt', 'w');
    fclose($languageFile);

    if (!rename($language . '.txt', $languageCode . '/' . $language . '.txt')) {
        die("Failed to move the language file.");
    }

    echo "Folder created, language file created, and file moved successfully!\n";
    $languages[] = $languageCode;
}

if (!mkdir('attachments')) {
    die("Failed to create the attachments folder.");
}

foreach ($languages as $language) {
    rename($language, 'attachments/' . $language);
}

echo "All language folders transferred to the attachments folder.\n";
?>








