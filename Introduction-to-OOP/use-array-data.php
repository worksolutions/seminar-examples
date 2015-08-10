<?php
/**
 * @author Maxim Sokolovsky <sokolovsky@worksolutions.ru>
 */

// base representation

$ar = array(1, 2, 3);

$ar = array_merge($ar, array(4, 5, 6));

$ar = array_filter($ar, function ($value) {
    return $value > 3;
});

array_walk($ar, function (& $el) {
    $el .= 'prefix'.$el;
});

var_dump($ar);

//============================================================

// oop representation

$ar = new ArrayData(array(1, 2, 3));

$ar->merge(array(4, 5, 6));

$ar->filter(function ($value) {
    return $value > 3;
});

$ar->assignPrefix('prefix');

var_dump($ar->getData());
