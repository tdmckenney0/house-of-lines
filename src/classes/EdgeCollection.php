<?php

/**
 * EdgeCollection
 * 
 * Stores all the `Edge` classes and manipulates them. 
 * 
 * @author Tanner Mckenney
 */
class EdgeCollection {

	public $collection = [];
	public $paths = [];

	/**
	 * __construct
	 * 
	 * Builds the EdgeCollection class. 
	 * 
	 * @param array A nest array of Vertex pairs e.g. [['A', 'B'], ['B', 'C'], ['C', 'A']]
	 */
	public function __construct(array $data = []) {
		foreach ($data as $edge) {
			$this->collection[] = new Edge($edge);
		}
	}

	/**
	 * addUnique()
	 * 
	 * Inserts a Path to the $this->paths array if itself and its reversal are unique to the list.
	 * 
	 * @param array $path - A path e.g. ['A', 'B', 'C', 'D']
	 * 
	 * @return void
	 */
	public function addUnique(array $path = []) {
		$rev = array_reverse($path);

		if(!in_array($path, $this->paths) && !in_array($rev, $this->paths)) {
			$this->paths[] = $path;
		}
	}

	/**
	 * paths()
	 * 
	 * Implements a Euler Path-finding algorithm. This is a recursive function that 
	 * validates every possible path. 
	 * 
	 * @param char $current - The Current vertex. 
	 * @param array $edges - The remaining edges to check. 
	 * @param array $path - The current Path. 
	 * 
	 * @return void 
	 */
	public function paths($current = 'A', $edges = [], $path = []) {

		// Load our current collection into $edges if we're just starting out. 

		if(empty($edges) && empty($path)) {
			$edges = $this->collection;
		}

		$path[] = $current; // Push into Path. 

		foreach($edges as $key => $edge) {
			if($edge->hasVertex($current)) { 

				// Recurse possible path, removing the choosen edge from this loop iteration. 

				$_edges = $edges;
				unset($_edges[$key]);
				
				$this->paths($edge->nextVertex($current), $_edges, $path);
			}
		}

		// Logically, if there are no edges left...then this is a valid path. 

		if (count($edges) == 0) {
			$this->addUnique($path);
		}
	}
}