<style>
    table{
        width: 100%;
    }
    td{
        border: 1px solid gainsboro;
        padding: 3px;
    }
</style>
<div class="dashboard_contents p-top-100 p-bottom-70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Мои заказы</h4>
                <table>
                    <tr>
                        <td>#</td>
                        <td>Сумма</td>
                        <td>Дата</td>
                        <td>Статус</td>
                    </tr>
                    <?php
                    foreach ($my_orders as $my_order) {
                        $datetime = date('d.m.Y');
                        $status   = \app\models\db\OrdersStatuses::getNameById($my_order['status']);

                        echo "<tr>";
                        echo "<td>{$my_order['order_num']}</td>";
                        echo "<td>{$my_order['sum']} руб.</td>";
                        echo "<td>{$datetime}</td>";
                        echo "<td>{$status}</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>