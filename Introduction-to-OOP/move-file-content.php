<?php

// base representation

$source = 'somedir/source.txt';
$destination = 'somedir/destination.txt';

$content = file_get_contents($source);

$fDestination = fopen($destination, 'a');
fwrite($fDestination, $content);
fclose($fDestination);

$fSource = fopen($source, 'w');
fclose($fSource);

//================================================================

// oop representation

$source = new File('somedir/source.txt');
$content = $source->getContent();

$destination = new File('somedir/destination.txt');
$destination->putToEnd($content);

$source->clear();
