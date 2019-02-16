<?php
/**
 * Created by PhpStorm.
 * User: Ilmir
 * Date: 16.02.2019
 * Time: 22:38
 */

namespace console\controllers;


use common\models\tables\TelegramOffset;
use SonkoDmitry\Yii\TelegramBot\Component;
use TelegramBot\Api\Types\Message;
use TelegramBot\Api\Types\Update;
use yii\console\Controller;

class TelegramController extends Controller
{
    /**
     * @var Component
     */
    private $bot;
    private $offset = 0;

    public function init(){
        parent::init();
        $this->bot = \Yii::$app->bot;
    }

    public function actionIndex()
    {
        $updates = $this->bot->getUpdates($this->getOffset() + 1);

        $updCount = count($updates);

        if($updCount > 0){
            foreach ($updates as $update) {
                $this->updateOffset($update);
                if ($message = $update->getMessage()){
                    $this->processComand($message);
                }
            }
            echo "Новых сообщений: " . $updCount . PHP_EOL;
        }else{
            echo "Новых сообщений нет!" . PHP_EOL;
        }
    }

    private function getOffset()
    {
        $max = TelegramOffset::find()
            ->select('id')
            ->max('id');
        if($max > 0){
            $this->offset = $max;
        }
        return $this->offset;
    }

    private function updateOffset(Update $update)
    {
        $model = new TelegramOffset([
            'id' => $update->getUpdateId(),
            'timestamp_offset' => date("Y-m-d H:i:s")
        ]);
        $model->save();
    }

    private function processComand(Message $message)
    {
        var_dump($message);
    }
}