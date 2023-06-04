<?php
$this->title = $post->title;
?>
<style>
    .flex{
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        justify-content: space-between;
        margin-top: 15px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12" style="margin-top: 25px">
            <img src="<?=$post->image?>" style="width: 100%;">
            <div class="flex">
                <div>
                    <h3><?=$post->title?></h3>
                </div>
                <div>
                    &#10084; <?=$post->likes?>
                    &#9786; <?=$post->views?>
                </div>
            </div>
            <?=$post->content?>
        </div>

        <div class="col-md-12 mt-50">
            <h4>Комментарии</h4>
            <div class="comment-area"></div>
        </div>

        <div class="col-md-12 mt-50">
            <h4>Добавить коммент</h4>
            <textarea class="form-control t-comment"></textarea><br>
            <button class="btn btn-success send-comment">Добавить</button>
        </div>
    </div>
</div>
