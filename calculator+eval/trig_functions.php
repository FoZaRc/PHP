<?php
function calculateTrig($funcName, $value) {
    $radians = deg2rad($value);
    switch (strtolower($funcName)) {
        case 'sin':
            return sin($radians);
        case 'cos':
            return cos($radians);
        case 'tan':
            return tan($radians);
        case 'cot':
            return 1 / tan($radians);
        case 'sec':
            return 1 / cos($radians);
        case 'csc':
            return 1 / sin($radians);
        default:
            return "Invalid function";
    }
}
?>
