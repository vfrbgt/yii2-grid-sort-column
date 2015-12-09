Bootstrap Grid Sort Column Widget for Yii2
====================================


Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require greshnik/yii2-grid-sort-column:~1.0
```
or add

```json
"greshnik/yii2-grid-sort-column" : "~1.0"
```

to the require section of your application's `composer.json` file.

Usage
-----

***Example***

```
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'id',
        'name',
        'class',

        ['class' => 'yii\grid\ActionColumn'],
        ['class' => 'app\gridSortColumn\SortColumn']
    ],
]); ?>
```  
***Example add sort action in controller***

```  
public function actions()
{
    return [
        'swap' => [
            'class' => 'app\gridSortColumn\Swap',
            'model' => new Mark,
            'attribute' => 'name'
        ]
    ];
}
```

License
-------

The BSD License (BSD). Please see [License File](LICENSE.md) for more information.


> [![2amigOS!](http://www.gravatar.com/avatar/55363394d72945ff7ed312556ec041e0.png)](http://www.2amigos.us)  
<i>Web development has never been so fun!</i>  
[www.2amigos.us](http://www.2amigos.us)