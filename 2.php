<?php
function fibonacci($n) {
    if ($n == 0 || $n == 1)
        return 1;
    return fibonacci($n - 1) + fibonacci($n - 2);
}

for ($i = 0; $i < 10; $i++) {
    echo fibonacci($i) . " ";
}

$memo = array();

function fibonacciMemo($n) {
    global $memo;

    if ($n == 0 || $n == 1)
        return 1;

    if (isset($memo[$n]))
        return $memo[$n];

    $memo[$n] = fibonacciMemo($n - 1) + fibonacciMemo($n - 2);
    return $memo[$n];
}

for ($i = 0; $i < 10; $i++) {
    echo fibonacciMemo($i) . " ";
}

?>
