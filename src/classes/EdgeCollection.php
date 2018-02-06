<?php

class EdgeCollection {

	public $collection = [];

	public function __construct(array $data = []) {
		foreach ($data as $edge) {
			$this->collection[] = new Edge($edge);
		}
	}

	public function fleury($current = 'A') {
		
		$edges = $this->collection;
		$path = [];

		while(count($edges) > 0) {

			$e = array_pop($edges);  print_r($path); print_r($e); print_r($edges);

			if(count($edges) == 0) {
				$path[] = $current;
				$path[] = $e->nextVertex($current);
				break;
			}
			
			if($e->hasVertex($current)) {

				$v = $e->nextVertex($current); 
				$good = false;

				foreach($edges as $next) {
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

		return $path;
	}
}