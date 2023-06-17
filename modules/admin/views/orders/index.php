<?php
/** @var \app\models\db\OrdersHistory $order */

use app\models\db\OrdersStatuses;
use app\models\User;

?>
<style>
    table {
        width: 100%;
    }

    td {
        border: 1px solid darkgrey;
        padding: 3px;
    }
</style>
<table>
    <tr>
        <td>id</td>
        <td>user</td>
        <td>sum</td>
        <td>datetime</td>
        <td>status</td>
    </tr>
    <?php
    foreach ($orders as $order) {
        $datetime = date('d.m.Y H:i:s', $order['datetime']);

        if ($order['user_id'] == 0){
            $username = 'Гость';
        } else {
            $username = User::find()->where(['id' => $order['user_id']])->one()->username;
        }

        echo "<tr>";
        echo "<td>{$order['id']}</td>";
        echo "<td>{$username}</td>";
        echo "<td>{$order['sum']}</td>";
        echo "<td>{$datetime}</td>";
        echo "<td>";
        echo OrdersStatuses::getNameById($order['status']);
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>