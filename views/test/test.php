<?php
$products = [
    '1' => [
        'id'    => 1,
        'title' => 'Товар 1',
        'price' => 12500,
    ],
    '2' => [
        'id'    => 1,
        'title' => 'Товар 2',
        'price' => 12500,
    ],
    '3' => [
        'id'    => 1,
        'title' => 'Товар 3',
        'price' => 12500,
    ],
];
?>
<style>
    table{
        width: 100%;
    }
    td{
        padding: 3px;
        border: 1px solid grey;
    }
    .header{
        font-weight: 700;
    }
</style>

<table>
    <tr>
        <td class="header">1 dsfg </td>
        <td class="header">2df g</td>
        <td class="header">3df g</td>
    </tr>

    <?php
    foreach ($products as $id => $item) {
        echo "<tr>";
        echo "<td>{$item['id']}</td>";
        echo "<td>{$item['title']}</td>";
        echo "<td>{$item['price']}</td>";
        echo "</tr>";
    }
    ?>
</table>