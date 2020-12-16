<?php
$target_imagedir = "./uploads/pics/";
$target_videodir = "./uploads/videos/";
$target_imagefile = $target_imagedir . basename($_FILES["image"]["name"]);
$target_videofile = $target_videodir . basename($_FILES["video"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_imagefile,PATHINFO_EXTENSION));
$videoFileType = strtolower(pathinfo($target_videofile,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image and same for video
if(isset($_POST["submit"])) {
  $checkimage = getimagesize($_FILES["image"]["tmp_name"]);
  $checkvideo = getvideosize($_FILES["video"]["tmp_name"]);
  if($checkimage !== false && $checkvideo !== false) {
    echo "This file is an image - " . $checkimage["mime"] . " and this file is a video - ". $checkvideo["mime"];
    $uploadOk = 1;
  } else {
    echo "File may not be image or video.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_imagefile) || file_exists($target_videofile)) {
  echo "Sorry, one of your files already exists.";
  $uploadOk = 0;
}

// Check file size
if (($_FILES["image"]["size"] > 500000000) || ($_FILES["video"]["size"] > 500000000)) {
  echo "Sorry, one of your files is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $videoFileType != "mp4" && $videoFileType != "mov" ) {
  echo "Sorry, only JPG, JPEG, PNG, GIF, MP4, and MOV files are allowed.";
  $uploadOk = 0;
}

?>



