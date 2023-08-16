<?php


namespace app\components;

use yii\base\Widget;

class HelloWidget extends Widget
{
    public function run()
    {
        return 'Incorrect username or password.';
    }
    
}


