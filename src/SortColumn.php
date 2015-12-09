<?php

namespace app\gridSortColumn;

use Yii;
use Closure;
use yii\grid\Column;
use yii\helpers\Html;
use yii\helpers\Url;

class SortColumn extends Column
{
    public $controller;
    public $urlCreator;
    public $view;


    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $view = $this->grid->getView();
        $script = '$(document).ready(function(){
                $(\'.sort-up\').on(\'click\', function(){
                    var element = $(this).parent().parent();
                    var id1 = element.attr(\'data-key\');
                    var id2 = element.prev().attr(\'data-key\');
                    element.prev().before(element);
                    $.ajax({
                        url: "'.Url::toRoute(['swap']).'?idFrom="+id1+"&idTo="+id2
                    });
                    return false;
                });
                $(\'.sort-down\').on(\'click\' ,function(){
                    var element = $(this).parent().parent();
                    var id1 = element.attr(\'data-key\');
                    var id2 = element.next().attr(\'data-key\');
                    element.next().after(element);
                    $.ajax({
                        url: "'.Url::toRoute(['swap']).'?idFrom="+id1+"&idTo="+id2
                    });
                    return false;
                });
            });';
        $view->registerJs($script);
    }

    /**
     * @inheritdoc
     */
    protected function renderDataCellContent($model, $key, $index)
    {
        return '<a href="" class="sort-up" data-id="'.$key.'"><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span></a>
                <a href="" class="sort-down" data-id="'.$key.'"><span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span></a>';
    }
}
