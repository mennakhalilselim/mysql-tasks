<?php

function flattenArray($separator ,$array): array
{
    $flatArray = [];
    foreach($array as $element){
        $flatArray[] = is_array($element) ? implode($separator, $element) : $element;
    }
    return $flatArray;
}

$formDataString = implode(',', flattenArray('-', $_POST));
echo $formDataString;

file_put_contents("data.txt", "$formDataString\n", FILE_APPEND);

header('Location:list.php');

?>
