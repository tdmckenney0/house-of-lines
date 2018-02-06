<?php 

class Solution {

	public $paths = [];
	public $allowCenter = false; 
	public $timeTaken = 0;

	public static $f1edges = [
		['A','C'],
		['A','B'],
		['A','D'],
		['B','D'],
		['B','C'],
		['D','C'],
		['D','E'],
		['C','E']
	];

	public static $f2edges = [
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

	public function __construct($allowCenter = false) {

		$this->allowCenter = !empty($allowCenter);
		
		$edges = new EdgeCollection($this->allowCenter ? self::$f2edges : self::$f1edges);

		$time = -microtime(true);

		foreach(range('A', ($this->allowCenter ? 'F' : 'E')) as $current) {
			$edges->paths($current);
		}

		$this->timeTaken = $time + microtime(true);

		$this->paths = $edges->paths;
	}
}