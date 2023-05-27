<?php

namespace app\models;

use Yii;

class Upload
{
    /**
     * @param $files
     */
    public static function file($files)
    {
        $upload_dir = 'uploads';
        $user_dir   = Yii::$app->user->id;
        $final_dir  = "{$upload_dir}/{$user_dir}";

        if (!is_dir($final_dir)) {
            mkdir($final_dir);
        }

        $image_tmp_name      = $files["Products"]["tmp_name"]["image"];
        $image_size          = $files["Products"]["size"]["image"];
        $image_type          = $files["Products"]["type"]["image"];
        $image_original_name = $files["Products"]["name"]["image"];

        $ext = explode('.', $image_original_name);
        $ext = end($ext);

        if (self::validate($files)) {
            $new_image_name = rand(1000, 9999) . $image_original_name . time();
            $new_image_name = md5($new_image_name);

            $final_path = "{$final_dir}/{$new_image_name}.{$ext}";

            if (move_uploaded_file($image_tmp_name, $final_path)) {
                return $final_path;
            } else {
                echo 'Ошибка сохранения файла';
            }
        }
    }

    /**
     * @param $files
     *
     * @return bool|string
     */
    private static function validate($files)
    {
        $image_tmp_name      = $files["Products"]["tmp_name"]["image"];
        $image_size          = $files["Products"]["size"]["image"];
        $image_type          = $files["Products"]["type"]["image"];
        $image_original_name = $files["Products"]["name"]["image"];

        if ($image_type == 'image/jpeg' or $image_type == 'image/png') {
            if ($image_size < '150000000000') {
                return true;
            } else {
                return 'Вес файла больше разрешенного (' . $image_size . ')';
            }
        } else {
            return 'Не верный тип файла (' . $image_type . ')';
        }

        return false;
    }
}