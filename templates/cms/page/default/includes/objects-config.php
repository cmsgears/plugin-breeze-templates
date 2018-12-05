<?php
$metas		= !empty( $settings->metas ) ? $settings->metas : false;
$elements	= !empty( $settings->elements ) ? $settings->elements : false;
$widgets	= !empty( $settings->widgets ) ? $settings->widgets : false;
$blocks		= !empty( $settings->blocks ) ? $settings->blocks : false;
$sidebars	= !empty( $settings->sidebars ) ? $settings->sidebars : false;

// Attributes ---------------------

$metasWithContent	= !empty( $settings->metasWithContent ) ? $settings->metasWithContent : false;
$metasOrder			= !empty( $settings->metasOrder ) ? $settings->metasOrder : 0;

// Elements -----------------------

$elementsBeforeContent	= !empty( $settings->elementsBeforeContent ) ? $settings->elementsBeforeContent : false;
$elementsWithContent	= !empty( $settings->elementsWithContent ) ? $settings->elementsWithContent : false;
$elementsOrder			= !empty( $settings->elementsOrder ) ? $settings->elementsOrder : 0;

// Widgets ------------------------

$widgetsBeforeContent	= !empty( $settings->widgetsBeforeContent ) ? $settings->widgetsBeforeContent : false;
$widgetsWithContent		= !empty( $settings->widgetsWithContent ) ? $settings->widgetsWithContent : false;
$widgetsOrder			= !empty( $settings->widgetsOrder ) ? $settings->widgetsOrder : 0;

// Blocks -------------------------

$blocksBeforeContent	= !empty( $settings->blocksBeforeContent ) ? $settings->blocksBeforeContent : false;
$blocksWithContent		= !empty( $settings->blocksWithContent ) ? $settings->blocksWithContent : false;
$blocksOrder			= !empty( $settings->blocksOrder ) ? $settings->blocksOrder : 0;

// Sidebars -----------------------

$sidebarsBeforeContent	= !empty( $settings->sidebarsBeforeContent ) ? $settings->sidebarsBeforeContent : false;
$sidebarsWithContent	= !empty( $settings->sidebarsWithContent ) ? $settings->sidebarsWithContent : false;
$sidebarsOrder			= !empty( $settings->sidebarsOrder ) ? $settings->sidebarsOrder : 0;

$objectsOrder = [ 'metas' => $metasOrder, 'elements' => $elementsOrder, 'widgets' => $widgetsOrder, 'blocks' => $blocksOrder, 'sidebars' => $sidebarsOrder ];

asort( $objectsOrder );
