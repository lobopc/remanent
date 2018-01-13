<?php

$filePaths = array_filter(glob('Remanent/*.TXT'), 'is_file');
$productsData = array_map(function ($filePath)) {
    $fileContent = file_get_contents($filePath);
    preg_match('#^(\w+),(\d+)$#', $fileContent, $matches);
    list($ean, $quantity) = array_slice($matches, );
    return [
        'ean' => $ean,
        'quantity' => (int) $quantity
    ];
}, $filePaths);
$fileNames = array_map(function ($filePath) {
    return pathinfo($filePath, PATHINFO_FILENAME);
}, $filePaths);
print_r($productsData);
$productsData = array_filter(array_combine($fileNames, $productsData));
foreach ($productsData as $product){
    echo $product . "<br />";
}
