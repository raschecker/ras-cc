<?php
$credits = (int)file_get_contents('credits.txt');
if ($credits > 0) {
    $credits--;
    file_put_contents('credits.txt', $credits);
}
echo $credits;
?>