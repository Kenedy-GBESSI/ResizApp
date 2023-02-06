<?php
$file = "./image2.jpg";
$source_properties = getimagesize($file);
$image_type = $source_properties[2];
if ($image_type == IMAGETYPE_JPEG) {
    $image_resource_id = imagecreatefromjpeg($file);
    $target_width = 150;
    $target_height = 150;
    $target_layer = imagecreatetruecolor($target_width, $target_height);
    imagecopyresampled($target_layer, $image_resource_id, 0, 0, 0, 0, $target_width, $target_height, $source_properties[0], $source_properties[1]);
    imagejpeg($target_layer, "./christmas_thump.jpg");
    echo "Hello !";
}
phpinfo();

?>