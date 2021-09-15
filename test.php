<?php
$data = "abc123";

echo $data;

echo '<br>';

$hash = password_hash($data, PASSWORD_DEFAULT);

echo $hash;

echo '<table border=1>';

foreach (hash_algos() as $v) {
        $r = hash($v, $data, false);
        print('<tr><td>'.$v.'</td><td>'.strlen($r).'</td><td>'.$r.'</td></tr>');
}


echo '</table>';
?>