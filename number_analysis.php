<?php
// Console-based Number Analyzer in PHP

function prompt($message) {
    echo $message;
    return trim(fgets(STDIN));
}

function isValidNumberList($inputArray) {
    foreach ($inputArray as $value) {
        if (!is_numeric($value)) {
            return false;
        }
    }
    return true;
}

function analyzeNumbers($numbers) {
    $max = max($numbers);
    $min = min($numbers);
    $sum = array_sum($numbers);
    $avg = $sum / count($numbers);

    echo "\n=== Results ===\n";
    echo "Maximum: $max\n";
    echo "Minimum: $min\n";
    echo "Sum: $sum\n";
    echo "Average: " . number_format($avg, 2) . "\n\n";
}

// Main Loop
while (true) {
    $input = prompt("Enter a list of numbers separated by spaces (or type 'exit' to quit): ");

    if (strtolower($input) === "exit") {
        echo "Goodbye!\n";
        break;
    }

    $inputArray = preg_split('/\s+/', $input); // split by spaces

    if (!isValidNumberList($inputArray)) {
        echo "Invalid input! Please enter only numbers separated by spaces.\n\n";
        continue;
    }

    // Convert string values to float for analysis
    $numbers = array_map('floatval', $inputArray);
    analyzeNumbers($numbers);
}

