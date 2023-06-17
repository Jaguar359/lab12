<?php

namespace app\models;

class Resizer
{
    /**
     * @param $file
     */
    public static function thumbCreate($file)
    {
        $source_properties = getimagesize($file);
        $image_type        = $source_properties[2];

        if ($image_type == IMAGETYPE_JPEG) {
            $image_resource_id = imagecreatefromjpeg($file);
            $target_layer      = self::fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
            imagejpeg($target_layer, $file . "_th.jpg");
        } elseif ($image_type == IMAGETYPE_GIF) {
            $image_resource_id = imagecreatefromgif($file);
            $target_layer      = self::fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
            imagegif($target_layer, $file . "_th.gif");
        } elseif ($image_type == IMAGETYPE_PNG) {
            $image_resource_id = imagecreatefrompng($file);
            $target_layer      = self::fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
            imagepng($target_layer, $file . "_th.png");
        }
    }

    /**
     * @param $image_resource_id
     * @param $width
     * @param $height
     *
     * @return false|resource
     */
    public static function fn_resize($image_resource_id, $width, $height)
    {
        $target_width  = 400;
        $target_height = 400;
        $target_layer  = imagecreatetruecolor($target_width, $target_height);
        imagecopyresampled($target_layer, $image_resource_id, 0, 0, 0, 0, $target_width, $target_height, $width,
            $height);

        return $target_layer;
    }
}