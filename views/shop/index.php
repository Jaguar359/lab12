<style>
    .form-control{
        border: 1px solid #000000 !important;
        margin-bottom: 15px;
    }
</style>
<div class="container">
    <div class="row" style="margin-bottom: 25px">
        <div class="col-md-12">
            <input type="text" class="form-control f-search">
        </div>

        <div class="col-md-4">
            <select class="form-control f-param1">
                <option value="">(не выбран)</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-control f-param2">
                <option value="">(не выбран)</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-control f-param3">
                <option value="">(не выбран)</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
        </div>
    </div>

    <div class="row result-html">
        <?php foreach ($products as $product) {
            echo $this->render('_product', [
                'product' => $product,
            ]);
        } ?>
    </div>
</div>