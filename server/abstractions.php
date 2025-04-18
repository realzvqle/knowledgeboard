<?php

function PrintToConsole($string){
    $s = htmlspecialchars($string);
    echo("<script>console.log(\"$s\")</script>");
}




?>