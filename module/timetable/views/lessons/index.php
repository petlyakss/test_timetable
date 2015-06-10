<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\module\handbook\models\Groups;
use app\module\handbook\models\Faculty;
use app\module\timetable\models\Lessons;

/* @var $this yii\web\View */
/* @var $searchModel app\module\timetable\models\LessonsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Розклад занять';
$this->params['breadcrumbs'][] = $this->title;

$all_faculty = Faculty::find()->all();
$all_groups = Groups::find()->all();
$all_lessons = Lessons::find()->all();
 
foreach ($all_faculty as $af){
    foreach($all_lessons as $al){
        if($al['id_faculty'] == $af['faculty_id']){            
            if($al['id_group'] != $tmp){
                $uniq_group[$al['id_faculty']] = $al['id_group'];
                $tmp = $al['id_group'];
            }  
    }
}
}
var_dump($uniq_group);
?>
<div class="lessons-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lessons', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'lesson_id',
            [
                'attribute' => 'id_group',
                'value' => 'group.main_group_name'
            ],
            [
                'attribute' => 'id_faculty',
                'value' => 'faculty.faculty_name'
            ],
            [
                'attribute' => 'id_speciality',
                'value' => 'speciality.speciality_name',
            ],
            'course',
            'semester',
            /*'id_okr',
            'is_numerator',
            'id_discipline',
            'id_teacher',
            'id_classroom',
            'day',
            'is_holiday',*/
            /*'all_group',
            'all_speciality',
            'lesson_number',*/

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
