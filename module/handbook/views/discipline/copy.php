<?php

use yii\helpers\Html;
use app\module\handbook\models\DisciplineList;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\Discipline */

$d_name = DisciplineList::findOne([$model->id_discipline]);
$this->title = 'Скопіювати дисципліну: ' . ' ' . $d_name['discipline_name'];
$this->params['breadcrumbs'][] = ['label' => 'Дисципліни', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $d_name['discipline_name'], 'url' => ['view', 'id' => $model->discipline_distribution_id]];
$this->params['breadcrumbs'][] = 'Скопіювати';
?>
<div class="discipline-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
