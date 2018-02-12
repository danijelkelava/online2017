<?php

function htmlout($html){
    echo $html;
}

function dayFormat($day){
    switch ($day) {
        case 'PO':
            return 'Ponedjeljak';
            break;
        case 'UT':
            return 'Utorak';
            break;
        case 'SR':
            return 'Srijeda';
            break;
        case 'CE':
            return 'Cetvrtak';
            break;
        case 'PE':
            return 'Petak';
            break;
        default:
            return 'Subotom i nedjeljom nema predavanja';
            break;
    }
}

function timeFormat($time){
    return (string)$time . ":00";
}
