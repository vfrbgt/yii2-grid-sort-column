<?php

namespace app\gridSortColumn;

use yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;

class SortBehavior extends Behavior
{
    public $attribute;

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'attributeInc'
        ];
    }

    public function attributeInc($event) {
        $maxValue = $this->owner->find()->max($this->attribute);
        $this->owner->{$this->attribute} = $maxValue+1;
    }
}