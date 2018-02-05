<?php 

include_once('src/_autoload.php');

/* Figure 1 */

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

/* Figure 2 */

$edges = [
	['F','E'],
	['F','D'],
	['D','E'],
	['D','C'],
	['D','A'],
	['A','C'],
	['A','B'],
	['B','C'],
	['B','E'],
	['E','C'],
];

$edges = new EdgeCollection($edges);

echo implode('->', $edges->fleury('A')) . PHP_EOL;