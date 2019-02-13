<?php  use yii\widgets\Pjax;
$script = <<<JS
   setInterval(function() {
     console.log("1");
     $("#btn-refresh").click();
   }, 1000);
JS;
$this->registerJs($script);?>
<?php Pjax::begin()?>
<?= \yii\helpers\Html::a("Обновить", ['pjax/index'], ['id' => 'btn-refresh', 'class' => 'btn-success']);?>
<h2>Текущее время: <?= $time?></h2>
<?php Pjax::end()?>
