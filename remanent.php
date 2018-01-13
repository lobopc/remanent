<?php

$tab = array();
if ($dir = @opendir("Remanent")) {
   while($file = readdir($dir)) {
	  $tab[] = $file;
   }
   closedir($dir);
}
print_r($tab);

$filename1 = "Remanent/1111.TXT";
$filename2 = "Remanent/1112.TXT";
$filename3 = "Remanent/1122.TXT";

$handle = fopen($filename1, "r");
$data1 = array();
    if ($handle) {
        while (!feof($handle)) {
            $buffer = fgets($handle, 4096);
            $data1[]=array_pad(explode(",", $buffer), 3, substr("$filename1", -8, -4));

            }
        fclose($handle);
    } else {
        die("Error opening a file $filename1");
    }
print_r($data1);
echo "<br><br>";

$handle = fopen($filename2, "r");
$data2 = array();
    if ($handle) {
        while (!feof($handle)) {
            $buffer = fgets($handle, 4096);
            $data2[]=array_pad(explode(",", $buffer), 3, substr("$filename2", -8, -4));
        }
        fclose($handle);
    } else {
        die("Error opening a file $filename2");
    }
print_r($data2);
echo "<br><br>";

$handle = fopen($filename3, "r");
$data3 = array();
    if ($handle) {
        while (!feof($handle)) {
            $buffer = fgets($handle, 4096);
            $data3[]=array_pad(explode(",", $buffer), 3, substr("$filename3", -8, -4));
        }
        fclose($handle);
    } else {
        die("Error opening a file $filename3");
    }
print_r($data3);
$mdata = array_merge($data1, $data2, $data3);
echo "<br><br>";
print_r($mdata);
