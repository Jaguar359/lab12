<?php

namespace app\models;

use app\models\db\Products;

class CheckImages
{
    public string $dir          = 'uploads/';
    public array  $images_paths = [];

    /** Запускатор */
    public function start()
    {
        $this->getDirs();
        $this->getImages();
    }

    /**
     * Получение директорий
     *
     * @return bool
     */
    public function getDirs(): bool
    {
        // сканирование указанной директории
        $scan = scandir($this->dir);

        foreach ($scan as $dir) {
            if ($dir != '.' and $dir != '..') {
                // сканирование найденных директорий
                $images_scan = scandir($this->dir . $dir);

                // перебираем директории без стоковых . и ..
                foreach ($images_scan as $image) {
                    if ($image != '.' and $image != '..') {
                        $this->images_paths[$dir][] = $image;
                    }
                }
            }
        }

        return true;
    }

    /**
     * Проверка картинок
     *
     * @return bool
     */
    public function getImages(): bool
    {
        foreach ($this->images_paths as $user_id => $user_images) {
            foreach ($user_images as $user_image) {
                $url_to_image = "{$this->dir}{$user_id}/{$user_image}";

                if (!$this->checkImageInBd($url_to_image)) {
                    $this->deleteImage($url_to_image);
                }
            }
        }

        return true;
    }

    /**
     * Поиск картинки в бд (если картинки нет - вернет false)
     *
     * @param $image_path
     *
     * @return bool
     */
    public function checkImageInBd($image_path): bool
    {
        if (Products::find()->where(['image' => $image_path])->one()) {
            return true;
        }

        return false;
    }

    /**
     * Удаление картинки
     *
     * @param $image_path
     *
     * @return bool
     */
    public function deleteImage($image_path): bool
    {
        if (unlink($image_path)) {
            return true;
        }

        return false;
    }
}