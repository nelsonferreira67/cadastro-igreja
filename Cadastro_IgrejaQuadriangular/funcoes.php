<?php
function datetobr($dataNasc){
    $dataNasc = explode("-", $dataNasc);
    return $dataNasc[2]."/".$dataNasc[1]."/".$dataNasc[0];
}

function datetoen($dataNasc){
    $dataNasc = explode("/", $dataNasc);
    return $dataNasc[2]."-".$dataNasc[1]."-".$dataNasc[0];
}

