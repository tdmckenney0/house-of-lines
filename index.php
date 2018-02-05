<?php 

include_once('src/_autoload.php');

/* Data */

$edges = [
	['A','C'],
	['A','B'],
	['A','D'],
	['B','D'],
	['B','C'],
	['D','C'],
	['D','E'],
	['C','E']
];

$edges = new EdgeCollection($edges);

echo implode('->', $edges->fleury('A')) . PHP_EOL;