<?php

namespace app\gridSortColumn;

use yii;
use yii\db\ActiveRecord;

class Swap extends yii\base\Action
{
    public $attribute;
    public $model;

    public function run($idFrom, $idTo) {
        $modelFrom = $this->model->findOne($idFrom);
        $modelTo = $this->model->findOne($idTo);
        $temp = $modelTo->attributes[$this->attribute];
        $modelTo->{$this->attribute} = $modelFrom->{$this->attribute};
        $modelFrom->{$this->attribute} = $temp;
        $modelFrom->save();
        $modelTo->save();
    }
}