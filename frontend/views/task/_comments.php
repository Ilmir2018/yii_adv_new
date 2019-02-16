<?php
/**@var \common\models\tables\Tasks $model */
/**@var integer $userId */
/**@var \common\models\tables\TaskComments $taskCommentForm */
/**@var \common\models\tables\TaskAttachments $taskAttachmentForm */
use \yii\widgets\ActiveForm;
use \yii\helpers\Url;
use \yii\helpers\Html;
?>
<?php
\yii\widgets\Pjax::begin([
        'enablePushState' => false,
        'id' => 'task_comments'
])?>
    <div class="comments">
        <h3>Комментарии</h3>
        <?php $form = ActiveForm::begin([
                'action' => Url::to(['task/add-comment']),
                'options' => ['data-pjax' => true]]
        );?>
        <?=$form->field($taskCommentForm, 'user_id')->hiddenInput(['value' => $userId])->label(false);?>
        <?=$form->field($taskCommentForm, 'task_id')->hiddenInput(['value' => $model->id])->label(false);?>
        <?=$form->field($taskCommentForm, 'content')->textInput();?>
        <?=Html::submitButton("Добавить",['class' => 'btn btn-default']);?>
        <?ActiveForm::end()?>
        <hr>
        <div class="comment-history">
            <?foreach ($model->taskComments as $comment): ?>
                <p><strong><?=$comment->user->username?></strong>: <?=$comment->content?></p>
            <?php endforeach;?>
        </div>
    </div>
<?php \yii\widgets\Pjax::end();?>