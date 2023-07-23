<!DOCTYPE html>
<html lang="pl">

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>zadanie</title>
</head>

<body>

    <?php 
$csvPath = './php_internship_data.csv';


function readCSV($file)
{
  $row      = 0;
  $csvArray = array();
  if( ( $handle = fopen($file, "r") ) !== FALSE ) {
    while( ( $data = fgetcsv($handle, 0, ",") ) !== FALSE ) {
      $num = count($data);
      for( $c = 0; $c < $num; $c++ ) {
        $csvArray[$row][] = $data[$c];
      }
      $row++;
    }
  }

    if( !empty( $csvArray ) ) {

        $Mfr= array_column($csvArray, 0);
        $dupes = array_diff(array_count_values($Mfr), [1]);
        arsort($dupes);
        $newArray = array_slice($dupes, 0, 10, true);
        
      
        echo "<h1> TOP 10 najczęściej występujących imion posortowane malejąco po liczbie wystąpień: </h1>";
        echo "<div >";

        foreach($newArray as $key => $value) {
            echo '<p>' . ucfirst(mb_strtolower($key,"UTF-8")) . ':' . $value . '</p>';
    
        }
        echo "</div>";
    } else {
        return false;
    }


   

}

$csvData = readCSV($csvPath); 

?>


</body>

</html>