<style>
    table {
        width: 100%
    }

    td {
        border: 1px solid #dbdbdb;
        padding: 3px
    }

    .delete {
        color: red;
        cursor: pointer;
    }
</style>
<div class="result-html">
    <?php echo $this->render('cart-table'); ?>
</div>

<div style="margin-top: 50px; text-align: right">
    <a href="index.php?r=cart/send-order">
        <button class="btn btn-success">Отправить заказ</button>
    </a>
</div>
