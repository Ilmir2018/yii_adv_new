<?php
/**@var \common\models\tables\Tasks $model */
/**@var integer $userId */
/**@var \common\models\tables\TaskStatuses[] $statusesList */
/**@var \common\models\tables\Users[] $usersList */
/**@var \common\models\tables\TaskComments $taskCommentForm */
/**@var \common\models\tables\TaskAttachments $taskAttachmentForm */
use \yii\widgets\ActiveForm;
use \yii\helpers\Url;
use \yii\helpers\Html;

\frontend\assets\TaskOneAsset::register($this);
?>

<div class="task-edit">
    <div class="task-main">
        <?php $form = ActiveForm::begin(['action' => Url::to(['task/save', 'id' => $model->id])]);?>
        <?=$form->field($model, 'name')->textInput();?>
        <div class="row">
            <div class="col-lg-4">
                <?=$form->field($model, 'status')
                    ->dropDownList($statusesList)?>
            </div>
            <div class="col-lg-4">
                <?=$form->field($model, 'responsible_id')
                    ->dropDownList($usersList)?>
            </div>
            <div class="col-lg-4">
                <?=$form->field($model, 'date')
//                ->widget(\yii\jui\DatePicker::class, [
//                        'language' => 'ru'
//                ])
                   ->textInput(['type' => 'date'])
                ?>
            </div>
        </div>
        <div>
            <?=$form->field($model, 'description')
                ->textarea()?>
        </div>
        <?=Html::submitButton("Сохранить",['class' => 'btn btn-success']);?>
        <?ActiveForm::end()?>
        <button id="push-me-btn" class="btn btn-success">Push me!</button>
    </div>
</div>
<div class="attachments">
    <?= $this->render('_attachments', [
        'model' => $model,
        'taskAttachmentForm' => $taskAttachmentForm
    ]);
    ?>
</div>
<div class="task-history">
    <?= $this->render('_comments', [
            'model' => $model,
        'taskCommentForm' => $taskCommentForm,
        'userId' => $userId
    ]);
    ?>
</div>
    <div class="task-chat">
        <form action="#" name="chat_form" id="chat_form">
            <label>
                <input type="hidden" name="channel" value="<?=$channel?>"/>
                <input type="hidden" name="user_id" value="<?=$userId?>"/>
                введите сообщение
                <input type="text" name="message"/>
                <input type="submit"/>
            </label>
        </form>
        <hr>
        <div id="root_chat"></div>
    </div>
    <script>
        var channel = '<?=$channel?>';
    </script>
