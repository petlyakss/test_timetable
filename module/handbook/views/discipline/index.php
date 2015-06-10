<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\module\handbook\models\DisciplineGroups;
use yii\helpers\ArrayHelper;
use app\module\handbook\models\Groups;

/* @var $this yii\web\View */
/* @var $searchModel app\module\handbook\models\DisciplineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Дисципліни';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="discipline-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Додати дисципліну', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'discipline_distribution_id',            
            [
              'attribute' => 'id_discipline',
              'value' => 'disciplineName.discipline_name'
            ],
            //'id_edbo',
            //'id_deanery',
            [
              'attribute' => 'id_cathedra',
              'value' => 'cathedra.cathedra_name'
            ],
            [
              'attribute' => 'id_lessons_type',
              'value' => 'lessonsType.lesson_type_name'
            ],
            /*[
              'attribute' => 'id_group',
              //'header' => 'Групи',
              'format' => 'raw',
              'filter' => '<input type="text" class="form-control" '
                .' name="DisciplineSearch[groups_name]" '
                .' value="'.$searchModel->groups_name.'" />',
              'value' => ArrayHelper::map(Groups::find()->all(), 'group_id', 'main_group_name')
            ],*/
            [
              'attribute' => 'id_group',
              'value' => 'group.main_group_name'
            ],
            'course',
            'hours',
            'semestr_hours',
            //'id_classroom',
            [
               'header' => 'Операції',
               'format' => 'raw',
               'value' => function($data){
                    $btn = "";
                    $btn .= '<a href="index.php?r=handbook/discipline/view&id='.$data->discipline_distribution_id.'" title="Перегляд" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;';               
                    $btn .= '<a href="index.php?r=handbook/discipline/copy&id='.$data->discipline_distribution_id.'" title="Копіювати" data-pjax="0"><span class="glyphicon glyphicon-copy"></span></a>&nbsp;';
                    $btn .= '<a href="index.php?r=handbook/discipline/update&id='.$data->discipline_distribution_id.'" title="Оновити" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;';
                    $btn .= '<a href="/timetable/web/index.php?r=handbook/discipline/delete&id='.$data->discipline_distribution_id.'" title="Видалити" data-confirm="Are you sure you want to delete this item?" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a>';
                    return $btn;
               }
            ]
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
