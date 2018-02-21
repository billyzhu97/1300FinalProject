<?php
// Written by Grant Storey on 11/10/17
// Helper functions so that students don't have to worry about objects

// Include CSV Writing files
include("includes/KeboolaCSV/CsvFile.php");
include("includes/KeboolaCSV/Exception.php");
include("includes/KeboolaCSV/InvalidArgumentException.php");


// get a file
function csvGetFile($filePath) {
	$path = __DIR__ . '/../' . 'data/comments.csv';
	$csvFileObject = new Keboola\Csv\CsvFile($path);
	return $csvFileObject;
}


// clear a file
function csvClearFile($csvFile) {
	$csvFile->clearFile($value);
}

// append to a file
function csvAppendToFile($csvFile, $value) {
	$csvFile->appendRow($value);
}


?>
