<?php
// Yii Imports
use yii\helpers\Html;
?>

<span class="action"><?= Html::a( 'Update', [ "update?id=$model->id" ] ) ?></span>

<span class="action action-pop action-delete" target="<?= $model->id ?>" popup="popup-grid-delete"><span class="action-title">Delete</span></span>
