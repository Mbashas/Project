<?php
function generateRandomId() {
    $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $digits = '0123456789';
    $randomLetters = '';
    $randomDigits = '';

    // Generate three random letters
    for ($i = 0; $i < 3; $i++) {
        $randomLetters .= $letters[rand(0, strlen($letters) - 1)];
    }

    // Generate three random digits
    for ($i = 0; $i < 3; $i++) {
        $randomDigits .= $digits[rand(0, strlen($digits) - 1)];
    }

    // Concatenate the letters and digits
    return $randomLetters . $randomDigits;
}

// Number of IDs to generate
$numIdsToGenerate = 1000;
$generatedIds = [];

for ($i = 0; $i < $numIdsToGenerate; $i++) {
    $newId = generateRandomId();
    if (in_array($newId, $generatedIds)) {
        echo "Duplicate ID found: $newId\n";
    } else {
        $generatedIds[] = $newId;
    }
}

echo "Generated $numIdsToGenerate IDs. No duplicates found.\n";
?>