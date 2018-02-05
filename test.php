<?php

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

class Edge {

	protected $v1;
	protected $v2;

	public function __construct($v1 = '', $v2 = '') {

		if(is_array($v1)) list($v1, $v2) = $v1;

		$this->v1 = $v1;
		$this->v2 = $v2;
	}

	public function __toString() {
		return $this->v1 . ' <-> ' . $this->v2;
	}

	public function valid() {
		return (!empty($this->v1) && !empty($this->v2));
	}

	public function hasVertex($vertex = '') {
		return ($this->v1 == $vertex || $this->v2 == $vertex);
	}

	public function nextVertex($current = '') {
		return $this->v1 == $current ? $this->v2 : $this->v1;
	}
}

foreach ($edges as $key => $edge) {
	$edges[$key] = new Edge($edge);
}

$current = 'A';
$path = [];

while(count($edges) > 0) {

	$e = array_pop($edges); 

	if(count($edges) == 0) {
		$path[] = $current;
		$path[] = $e->nextVertex($current);
		break;
	}
	
	if($e->hasVertex($current)) {

		$v = $e->nextVertex($current); 
		$good = false;

		foreach($edges as $next) { echo 'Next: ' . print_r($next, true);
			if($next->hasVertex($v)) {
				$good = true;
				break;
			}
		}

		if(!empty($good)) {
			$path[] = $current; 
			$current = $v;
			continue;
		}
	}

	array_unshift($edges, $e);
}

echo ' --- END ---';

echo 'Current:' . $current . PHP_EOL . 'Edges: ' . print_r($edges, true) . PHP_EOL . 'Path: '. print_r($path, true) . PHP_EOL;