<?php

namespace app\models;

abstract class CartModel
{
    /**
     * Метод для добавления товара
     * Должен будет принимать id добавляемого товара
     *
     * @return mixed
     */
    abstract static function add($id);

    /**
     * Метод получения кол-ва товара в корзине
     * Возвращает число
     *
     * @return integer
     */
    abstract static function getQty();
}