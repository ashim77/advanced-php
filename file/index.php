<?php
if (isset($_POST['form1'])) {

  $path = $_FILES['my_files']['name'];
  $path_tmp = $_FILES['my_files']['tmp_name'];
  // echo $path;
  $finfo = finfo_open(FILEINFO_MIME_TYPE);
  $mime = finfo_file($finfo, $_FILES['my_files']['tmp_name']);


  $extension = explode('/', $mime);
  // echo '<pre>';
  // var_dump($extension);
  // echo '</pre>';

  if ($mime === 'image/jpeg' || $mime === 'image/png' || $mime === 'image/gif' || $mime === 'application/pdf') {
    echo 'You can upload this file.';
    $file_name = time() . '.' . $extension[1];
    copy($path_tmp, 'images/' . $file_name);
    move_uploaded_file($path_tmp, 'uploads/' . $file_name);
  } else {
    echo 'Invalid Formate.';
  }
  finfo_close($finfo);
}
?>

<form action="" method="post" enctype="multipart/form-data">
  <input type="file" name="my_files">
  <input type="submit" value="submit" name="form1">
</form>