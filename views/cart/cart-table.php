<?php
if (!isset($_SESSION['cart'])) {
    echo 'Корзина пуста =(';
} else {
    $cart = $_SESSION['cart'];

    echo '<table>';
    echo '<tr>';
    echo '<td>Фото</td>';
    echo '<td>id</td>';
    echo '<td>Название</td>';
    echo '<td>Цена за 1шт</td>';
    echo '<td>Кол-во</td>';
    echo '<td>Итого</td>';
    echo '<td>x</td>';
    echo '</tr>';

    $sum_qty    = 0;
    $sum_result = 0;

    foreach ($cart as $id => $product) {
        $sum_qty      += $product['qty'];
        $sum_result   += $product['price'] * $product['qty'];
        $sum_position = $product['qty'] * $product['price'];

        echo '<tr>';
        echo "<td style='width: 150px;'><img src='{$product['image']}' style='width: 100%;'></td>";
        echo "<td>{$id}</td>";
        echo "<td>{$product['title']}</td>";
        echo "<td>{$product['price']}</td>";

        echo "<td>";
        echo "<input type='number' class='change-qty' data-id='{$id}' value='{$product['qty']}' min='0'>";
        echo "</td>";

        echo "<td>{$sum_position}</td>";
        echo "<td><span class='delete' data-id='{$id}'>x</span></td>";
        echo "</tr>";
    }

    echo "<tr>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td style='text-align: right'>Итого:</td>";
    echo "<td>{$sum_qty}</td>";
    echo "<td>{$sum_result}</td>";
    echo "<td></td>";
    echo "</tr>";

    echo '</table>';
}
