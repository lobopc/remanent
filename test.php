<?php

$filePaths = array_filter(glob('Remanent/*.TXT'), 'is_file');

$productsData = array_map(function ($filePath) {
    $fileContent = file_get_contents($filePath);

    if (preg_match_all('#^(\d+),(\d+)\s*$#m', $fileContent, $matches, PREG_SET_ORDER) === 0) {
        return null;
    }

    return array_map(function ($record) {
        list($ean, $quantity) = array_slice($record, 1);

        return [
            'ean' => $ean,
            'quantity' => (int) $quantity
        ];
    }, $matches);
}, $filePaths);

$fileNames = array_map(function ($filePath) {
    return pathinfo($filePath, PATHINFO_FILENAME);
}, $filePaths);

$productsData = array_filter(array_combine($fileNames, $productsData));
//print_r($productsData);


echo "<br><br><br>";
foreach ($productsData as $products){
//    print_r ($product);
//    echo "<br />";
    foreach ($products as $product){
        print_r($product);
        echo "<br />";
        }
}
echo (<br>);
echo (<br>);
