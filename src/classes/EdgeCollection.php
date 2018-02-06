<?php

class EdgeCollection {

	public $collection = [];
	public $paths = [];

	public function __construct(array $data = []) {
		foreach ($data as $edge) {
			$this->collection[] = new Edge($edge);
		}
	}

	public function paths($current = 'A', $edges = [], $path = []) {

		if(empty($edges) && empty($path)) {
			$edges = $this->collection;
		}

		$path[] = $current;

		foreach($edges as $key => $edge) {
			if($edge->hasVertex($current)) { 

				$_edges = $edges;
				unset($_edges[$key]);

				$this->paths($edge->nextVertex($current), $_edges, $path);
			}
		}

		// Logically, if there are no edges left...then this is a valid path. 

		if (count($edges) == 0) {
			$this->paths[] = $path;
		}
	}
}