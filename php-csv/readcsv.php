<?php

    // ref : https://www.php.net/manual/en/function.fgetcsv.php

    $file = fopen("product.csv","r");
    while (($row = fgetcsv($file, 1000, ",")) !== FALSE) {
        echo $row[0] . ' ' . $row[1];
        echo '<br/>';
    }

    fclose($file);
?>