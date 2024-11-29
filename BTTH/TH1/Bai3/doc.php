<?php
$filename = "KTPM2.csv";
$sinhvien = [];
if (($handle = fopen($filename, "r")) !== FALSE) {
    $headers = fgetcsv($handle, 1000, ",");
    $headers = array_map(function($header) {
        return trim($header, " \xEF\xBB\xBF");
    }, $headers);
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $sinhvien[] = array_combine($headers, $data);
    }
    fclose($handle);
}
return $sinhvien;
?>
