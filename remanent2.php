<?php
$tab = array();
if ($dir = @opendir("Remanent")) {
    while (false !== ($file = readdir($dir))) {
        if ($file != "." && $file != "..") {
            if(!is_dir($file)){
                $tab[]=$file;
            }
        }
    }
    closedir($dir);
}
//print_r($tab);
echo "<p></p>";
foreach ($tab as $filename) {
    $handle = fopen("Remanent/$filename", "r");
    $data = array();
        if ($handle) {
            while (!feof($handle)) {
                $buffer = fgets($handle, 4096);
                $data[]=array_pad(explode(",",$buffer), 3, substr("$filename", -8, -4));
                       }
                fclose($handle);
        } else {
        die("Error opening a file $filename");
        }
$alldata[] = $data;
}
foreach ($alldata as $data1){
    foreach ($data1 as $data2){
        foreach ($data2 as $data3){
            echo ($data3) . ",";
        }
echo "<br />";
    }

}

/*
foreach ($alldata as $dataone){

for ($i = 0; $i < count($dataone); ++$i) {
    for ($j = 0; $j < count($dataone[$i]); ++$j){
        echo $dataone[$i][$j] . ',';
    }
    echo "<br />";
}
}
*/

//print_r($alldata);
/*
array_map(function($row) use(&$fotki_firm) {
    $fotki_firm[$row['id_firmy']][] = $row['nazwa_fotki'];
}, $tablica_wejsciowa);
*/
