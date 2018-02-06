<?php 

/**
 * Solution class.
 * 
 * This determines the Solution to the House of Lines problem. 
 * 
 * @author Tanner Mckenney 
 */
class Solution {

	public $paths = [];
	public $allowCenter = false; 
	public $timeTaken = 0;

	// Edges for Figure 1.

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
	
	// Edges for Figure 2. 

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

	/**
	 * __construct()
	 * 
	 * This function generates the possible solutions according to the rules. 
	 * They will be available in $this->paths upon creation. Also, a time-taken
	 * is present in $this->timeTaken. 
	 * 
	 * @param boolean $allowcenter - Allow changing direction at the center point. 
	 */
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