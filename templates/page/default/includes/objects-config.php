<?php
$attributes	= isset( $settings ) && !empty( $settings->attributes ) ? $settings->attributes : false;
$elements	= isset( $settings ) && !empty( $settings->elements ) ? $settings->elements : false;
$widgets	= isset( $settings ) && !empty( $settings->widgets ) ? $settings->widgets : false;
$blocks		= isset( $settings ) && !empty( $settings->blocks ) ? $settings->blocks : false;
$sidebars	= isset( $settings ) && !empty( $settings->sidebars ) ? $settings->sidebars : false;

// Attributes ---------------------

$attributesWithContent	= isset( $settings ) && !empty( $settings->attributesWithContent ) ? $settings->attributesWithContent : false;
$attributesOrder		= isset( $settings ) && !empty( $settings->attributesOrder ) ? $settings->attributesOrder : 0;

// Elements -----------------------

$elementsWithContent	= isset( $settings ) && !empty( $settings->elementsWithContent ) ? $settings->elementsWithContent : false;
$elementsOrder			= isset( $settings ) && !empty( $settings->elementsOrder ) ? $settings->elementsOrder : 0;

// Widgets ------------------------

$widgetsWithContent	= isset( $settings ) && !empty( $settings->widgetsWithContent ) ? $settings->widgetsWithContent : false;
$widgetsOrder		= isset( $settings ) && !empty( $settings->widgetsOrder ) ? $settings->widgetsOrder : 0;

// Blocks -------------------------

$blocksWithContent	= isset( $settings ) && !empty( $settings->blocksWithContent ) ? $settings->blocksWithContent : false;
$blocksOrder		= isset( $settings ) && !empty( $settings->blocksOrder ) ? $settings->blocksOrder : 0;

// Sidebars -----------------------

$sidebarsWithContent	= isset( $settings ) && !empty( $settings->sidebarsWithContent ) ? $settings->sidebarsWithContent : false;
$sidebarsOrder			= isset( $settings ) && !empty( $settings->sidebarsOrder ) ? $settings->sidebarsOrder : 0;

$objectsOrder = [ 'attributes' => $attributesOrder, 'elements' => $elementsOrder, 'widgets' => $widgetsOrder, 'blocks' => $blocksOrder, 'sidebars' => $sidebarsOrder ];

asort( $objectsOrder );
