<?php

//upload.php

if(isset($_FILES['des']['name']))
{
 $file = $_FILES['des']['tmp_name'];
 $file_name = $_FILES['des']['name'];
 $file_name_array = explode(".", $file_name);
 $extension = end($file_name_array);
 $new_image_name = rand() . '.' . $extension;
 chmod('images', 0777);
 $allowed_extension = array("jpg", "gif", "png");
 if(in_array($extension, $allowed_extension))
 {
  move_uploaded_file($file, 'images/' . $new_image_name);
  $function_number = $_GET['CKEditorFuncNum'];
  $url = 'images/' . $new_image_name;
  $message = '';
  echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
 }
}

?>