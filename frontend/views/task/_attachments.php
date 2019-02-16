<?php
/**@var \common\models\tables\Tasks $model */
/**@var \common\models\tables\TaskComments $taskCommentForm */
/**@var \common\models\tables\TaskAttachments $taskAttachmentForm */
use \yii\widgets\ActiveForm;
use \yii\helpers\Url;
use \yii\helpers\Html;
?>
<?php
\yii\widgets\Pjax::begin([
    'enablePushState' => false,
    'id' => 'task_attachments'
])?>
<h3>Вложения</h3>
<?php $form = ActiveForm::begin([
    'action' => Url::to(['task/add-attachment']),
    'options' => ['class' => "form-inline"]
]);?>
<?=$form->field($taskAttachmentForm, 'taskId')->hiddenInput(['value' => $model->id])->label(false);?>
<?=$form->field($taskAttachmentForm, 'file')->fileInput();?>
<?=Html::submitButton("Добавить",['class' => 'btn btn-default']);?>
<?ActiveForm::end()?>
<hr>
<div class="attachments-history">
    <?foreach ($model->taskAttachments as $file): ?>
        <a href="/img/tasks/<?=$file->path?>">
            <img src="/img/tasks/small/<?=$file->path?>" alt="">
        </a>
    <?php endforeach;?>
</div>
<?php \yii\widgets\Pjax::end();?>