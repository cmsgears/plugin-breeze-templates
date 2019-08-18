<?php
$metas		= isset( $settings->metas ) ? $settings->metas : false;
$elements	= isset( $settings->elements ) ? $settings->elements : false;
$widgets	= isset( $settings->widgets ) ? $settings->widgets : false;
$blocks		= isset( $settings->blocks ) ? $settings->blocks : false;
$sidebars	= isset( $settings->sidebars ) ? $settings->sidebars : false;

// Attributes ---------------------

$metasWithContent	= isset( $settings->metasWithContent ) ? $settings->metasWithContent : false;
$metasOrder			= !empty( $settings->metasOrder ) ? $settings->metasOrder : 0;

// Elements -----------------------

$elementsBeforeContent	= isset( $settings->elementsBeforeContent ) ? $settings->elementsBeforeContent : false;
$elementsWithContent	= isset( $settings->elementsWithContent ) ? $settings->elementsWithContent : false;
$elementsOrder			= !empty( $settings->elementsOrder ) ? $settings->elementsOrder : 0;

// Widgets ------------------------

$widgetsBeforeContent	= isset( $settings->widgetsBeforeContent ) ? $settings->widgetsBeforeContent : false;
$widgetsWithContent		= isset( $settings->widgetsWithContent ) ? $settings->widgetsWithContent : false;
$widgetsOrder			= !empty( $settings->widgetsOrder ) ? $settings->widgetsOrder : 0;

// Blocks -------------------------

$blocksBeforeContent	= isset( $settings->blocksBeforeContent ) ? $settings->blocksBeforeContent : false;
$blocksWithContent		= isset( $settings->blocksWithContent ) ? $settings->blocksWithContent : false;
$blocksOrder			= !empty( $settings->blocksOrder ) ? $settings->blocksOrder : 0;

// Sidebars -----------------------

$sidebarsBeforeContent	= isset( $settings->sidebarsBeforeContent ) ? $settings->sidebarsBeforeContent : false;
$sidebarsWithContent	= isset( $settings->sidebarsWithContent ) ? $settings->sidebarsWithContent : false;
$sidebarsOrder			= !empty( $settings->sidebarsOrder ) ? $settings->sidebarsOrder : 0;

$objectsOrder = [ 'elements' => $elementsOrder, 'widgets' => $widgetsOrder, 'blocks' => $blocksOrder, 'sidebars' => $sidebarsOrder, 'metas' => $metasOrder ];

asort( $objectsOrder );
