<?php
function aliceFamily($bros, $sis){
    return $sis;
}

$bros = 5;
$sis = 4;

$countSisters = aliceFamily ( null , $sis);
echo "Количество сестёр произвольного брата Алисы: " . $countSisters;