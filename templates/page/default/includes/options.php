<?php
// Yii Imports
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

// Template options
$template		= $modelContent->template;
$tclass			= isset( $template ) ? "page-{$template->slug}" : null;
$htmlOptions	= isset( $template ) && !empty( $template->htmlOptions ) ? json_decode( $template->htmlOptions, true ) : [];

// Page Options
$options = [ "data-slug" => $model->slug, "cmt-block" => "block-half-auto" ];
$options = !empty( $htmlOptions ) ? ArrayHelper::merge( $options, $htmlOptions ) : $options;

$options[ 'class' ] = isset( $options[ 'class' ] ) ? $options[ 'class' ] . " $tclass page-model-{$template->type} page-{$model->slug}" : "page page-basic page-default page-model-{$template->type} $tclass page-{$model->slug}";

$options = Html::renderTagAttributes( $options );
