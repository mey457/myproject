<?php 
   $image=" ";
   function MoveFile($name){
    global $image;
    $image=rand(1,1000).'_'.$_FILES[$name]['name'];
    $tmp_name=$_FILES[$name]['tmp_name'];
    $path='./assets/image/'.$image;
    move_uploaded_file($tmp_name,$path);
    return $image;
   }

?>