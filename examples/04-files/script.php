<?php

// This file will read a csv file, convert it to json and export the result to a json file.

// Open the CSV file.
if (($handle = fopen('in/in.csv', 'r')) !== false) {
    // $keys will contain the headlines, $result the array with data from the CSV file.
    $keys = [];
    $result = [];

    // Read first row.
    $keys = fgetcsv($handle, 1000, ",") or die("Couldn't read file");

    // Read rest of rows.
    while (($current_row = fgetcsv($handle, 1000, ",")) !== false) {
        // We'll make an array for each row.
        $tmp = [];
        $field = 0;

        // Loop through the headline fields, set the headline to the current field that we're on an increase
        // the field counter.
        foreach ($keys as $key) {
            $tmp[$key] = $current_row[$field++];
        }

        // Add the array for the current row to out result array.
        $result[] = $tmp;
    }

    // Close the file.
    fclose($handle);

    // Encode the result array to JSON.
    $result_json = json_encode($result);

    // Set the file name we'll write the result to.
    $json_file = 'out/out.json';

    // Write the contents back to the file.
    file_put_contents($json_file, $result_json);

    echo "Done!";
}
