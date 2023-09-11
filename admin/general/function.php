<?php
define("Base_URl","http://localhost/medical/admin/");




function url($var = null){
    return Base_URl .$var;
}

function testMessage($condotion , $message){
if($condotion){
    return "$message DOne";
}

}

function filtervalidition($input_values){
    $input_values= trim($input_values);
    $input_values = strip_tags($input_values);
    $input_values = stripslashes($input_values);
    $input_values= htmlspecialchars($input_values);
    return $input_values;

}


function Numbervalidition($input_values){
    $empty = empty($input_values);
    $isNegetive = $input_values < 0 ; 
    $isnumber = filter_Var($input_values,FILTER_VALIDATE_INT)== false ; 

    if($empty == true ||$isNegetive = true || $isnumber  = true ){
        return true;
    }
    else{
        return false;
    }
}
function filter_size_file($image_name ,$image_size , $your_size = 2){

    $sizetoM = ($image_size /1024) /1024 ; 
    $bigsize =$sizetoM > $your_size;
    $empty=  empty($image_name);
    if( $empty == true ||   $bigsize == true){
        return true;
    }
    else {
        return false;
    }
}

function filterType_file($file_type,$type1 = null , $type2 = null  ,$type3= null , $type4 = null ){
if(
    $file_type == "$type1" ||
    $file_type == "$type2" ||
    $file_type == "$type3" ||
    $file_type == "$type4" 
){
return false;
}
else{
    return true;
}

}