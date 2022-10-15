<?php
function readCSVFile($fileName) {
  $data=array();
  $file_to_read = fopen($fileName, 'r');
  if($file_to_read !== FALSE){
    while(($row = fgetcsv($file_to_read, 100, ',')) !== FALSE){
      array_push($data,$row);
    }
    fclose($file_to_read);
    return $data;
  }
}
function readCSVFileGetSpecificElement($fileName,$element) {
  $data=array();
  $file_to_read = fopen($fileName, 'r');
  if($file_to_read !== FALSE){
    while(($row = fgetcsv($file_to_read, 100, ',')) !== FALSE){
      array_push($data,$row);
    }
    fclose($file_to_read);
    return $data[$element];
  }
}
function writeToCSVFile($fileName,$row){
  $fp = fopen($fileName, 'a');
  fputcsv($fp, $row);
  fclose($fp);
  return 'sad boss';
}
function updateCSVFile($fileName,$i,$newRow){
  $data = readCSVFile($fileName);
  $data[$i] = $newRow;
  $fp = fopen($fileName, 'w');
  foreach($data as $value){
    fputcsv($fp, $value);
  }
  fclose($fp);
}
function updateCSVEmptySpecificRecord($fileName,$i){
  $data = readCSVFile($fileName);
  $fp = fopen($fileName, 'w');
  $blank = array();
  for ($x = 0; $x <= count($data[0]); $x++) {
    array_push($blank,"\t");
  }
  foreach($data as $key=>$value){
    if($key==$i){
      fputcsv($fp, $blank);
    }else{
      fputcsv($fp, $value);
    }
  }
  fclose($fp);
}
function updateCSVRemoveSpecificRecord($fileName,$i){
  $data = readCSVFile($fileName);
  $fp = fopen($fileName, 'w');
  foreach($data as $key=>$value){
    if($key==intval($i)){
      continue;
    }else{
      fputcsv($fp, $value);
    }
  }
  fclose($fp);
  return "sad";
}
function updateCSVRemoveAuthor($fileName,$i){
  $data = readCSVFile($fileName);
	$quotes = readCSVFile("../quotes.csv");
  $fp = fopen($fileName, 'w');
  foreach($data as $key=>$value){
    if($key==intval($i)){
      continue;
    }else{
      fputcsv($fp, $value);
    }
  }
  fclose($fp);
  $fp = fopen("../quotes.csv", 'w');
  foreach($quotes as $key=>$value){
    if(intval($value[0])==intval($i)){
      $value[0] = -1;
    }
    fputcsv($fp, $value);
  }
  fclose($fp);
  return "sad";
}
