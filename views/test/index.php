<?php

/* @var $this yii\web\View */


use yii\bootstrap\ActiveForm;
?>
<div class="site-index">

    <?php $form = ActiveForm::begin([
            'id'=>'test-file-upload-form',
            'layout' => 'horizontal',
            'options' => ['enctype' => 'multipart/form-data']
        ]);
    ?>

    <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <button>Submit</button>

    <?php ActiveForm::end() ?>

</div>
