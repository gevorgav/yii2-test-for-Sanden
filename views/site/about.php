<?php

/* @var $this yii\web\View */


use app\models\MainSearch;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

$this->registerJs(
    "$(window).scroll('click', function() { 
        if($(window).scrollTop() + $(window).height() == $(document).height()) {
           $(\"#searchButtonId\").click();
        }
        
    });",
    \yii\web\View::POS_READY
);

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;


?>
<?php Pjax::begin(['enablePushState' => false, 'id' => 'pjax_form']); ?>
<div class="container">

        <div class="row">
            <?php $form = ActiveForm::begin([
                'action' => yii\helpers\Url::to(['site/about']),
                'options' => [
                    'data-pjax' => true,
                ],
            ]); ?>
            <div class="col-md-6">
                <?= $form->field($search, 'search')->textInput(['id' => 'searchId'])->label(false) ?>
                <?= $form->field($search, 'has_more_results')->hiddenInput()->label(false) ?>
                <?= $form->field($search, 'limit')->hiddenInput()->label(false) ?>
            </div>
            <div class="col-md-6">
                <?php echo Html::submitButton('Search', ['class' => 'btn', 'id' => 'searchButtonId']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>

</div>
<br>
<div class="container">

    <div class="flex-row row">
        <?php foreach ($results as $result): ?>
            <div class="col-xs-6 col-sm-4 col-lg-3">
                <div class="thumbnail ">
                    <div>
                        <img src="<?= $result['author_image_url']?>"
                             alt="Avatar" class="avatar">
                        <h5><?= $result['author_name']?></h5>
                    </div>
                    <img src="<?= $result['image_url']?>">
                    <div class="caption">
                        <p class="flex-text text-muted"><?= $result['description'] ?></p>
                        <div class="line"></div>
                        <div class="comment">25k<span class="glyphicon glyphicon-bookmark"></span><span
                                    class="comment_date">Dec 01 2017</span></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
<?php Pjax::end(); ?>
