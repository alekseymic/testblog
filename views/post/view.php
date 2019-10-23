<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;


$this->title = 'View Post';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="well red">
    <h2 style="margin-bottom: 0;"><?=Html::encode($post['title'])?></h2>
    <a href="#"><span class="glyphicon glyphicon-user" style="margin-bottom: 0.6em"></span> <?=Html::encode($post['username'])?></a><span> in <a href=""><?=Html::encode($post['category'])?></a></span>
    <br>
    <?php foreach ($post['tags'] as $tag):?>
        <a href="#" class="badge badge-secondary"><?=Html::encode($tag['name'])?></a>
    <?php endforeach;?><br>

    <div class="post__content">
        <?=nl2br(Html::encode($post['content']))?>
    </div>

    <div class="row">
    <?php foreach($post['attachments'] as $file):?>
    <div class="col-sm-3">
        <div class="card">
            <?=Html::img('@web/web/uploads/'.$file['path'],['alt'=> $file['name'], 'class'=> 'card-img-top post__image img-thumbnail'])?>
            <div class="card-body post__image-caption ">
                <p class="card-text"><?=Html::encode($file['name'])?></p>
            </div>
        </div>
    </div>
    <?php endforeach;?>
    </div>


    <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <img src="" class="imagepreview" style="width: 100%;" >
                </div>
            </div>
        </div>
    </div>
</div>
