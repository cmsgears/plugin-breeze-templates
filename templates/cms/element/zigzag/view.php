<?php
$model	= $widget->model;
$data	= $widget->modelData;

$settings = isset( $data->settings ) ? $data->settings : [];

$defaultIncludes = Yii::getAlias( '@breeze' ) . '/templates/cms/element/zigzag/includes';

$avatarUrl = isset( $model->avatar ) ? $model->avatar->getFileUrl() : null;
?>
<?php include "$defaultIncludes/part1.php"; ?>
<?php include "$defaultIncludes/part2.php"; ?>
