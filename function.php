<?php 

// student gander checked box selected here function
function checkRadio($value){
    if( isset($_POST['gander']) && is_array($_POST['gander']) && in_array($value, $_POST['gander'] )){
        echo "checked";
    }
}


function studentOptionBox($optionValues){
    foreach( $optionValues as $optionValue ){
        printf("<option value='%s'>%s</option>", strtolower($optionValue), ucwords($optionValue));
    }
}