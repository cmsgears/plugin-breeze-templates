<?php
$elements	= isset( $settings->elements ) ? $settings->elements : $widget->elements;
$widgets	= isset( $settings->widgets ) ? $settings->widgets : false;

// Elements -----------------------

$elementsBeforeContent	= isset( $settings->elementsBeforeContent ) ? $settings->elementsBeforeContent : false;

// Widgets ------------------------

$widgetsBeforeContent	= isset( $settings->widgetsBeforeContent ) ? $settings->widgetsBeforeContent : false;
