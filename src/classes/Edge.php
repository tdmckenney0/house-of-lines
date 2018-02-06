<?php 

/**
 * Edge Class
 * 
 * Represents a line between to vertices. 
 * 
 * @author Tanner Mckenney
 */
class Edge {

	protected $v1;
	protected $v2;

	/**
	 * __construct()
	 * 
	 * Builds the class. 
	 * 
	 * @param array|char - Array of two Vertices e.g. ['A', 'B'] or Vertex 1. 
	 * @param char - Vertex 2 if param 1 is also of type `char`. 
	 * 
	 * @return Edge
	 */
	public function __construct($v1 = '', $v2 = '') {

		if(is_array($v1)) list($v1, $v2) = $v1;

		$this->v1 = $v1;
		$this->v2 = $v2;
	}

	/**
	 * __toString()
	 * 
	 * self-explanatory magic method. 
	 * 
	 * @return string
	 */
	public function __toString() {
		return $this->v1 . ' <-> ' . $this->v2;
	}

	/**
	 * valid()
	 * 
	 * Returns `true` if Edge has been created correctly. 
	 * 
	 * @return boolean
	 */
	public function valid() {
		return (!empty($this->v1) && !empty($this->v2));
	}

	/**
	 * hasVertex()
	 * 
	 * Returns `true` if $vertex exists on the edge. 
	 * 
	 * @param char $vertex - Vertex to check.
	 * 
	 * @return boolean 
	 */
	public function hasVertex($vertex = '') {
		return ($this->v1 == $vertex || $this->v2 == $vertex);
	}

	/**
	 * nextVertex()
	 * 
	 * Returns Vertex that is not $current. Be warned, check that your
	 * Vertex exists with `hasVertex()` first. The side-effect of this
	 * Method is useful and documented: It will return one of the vertices
	 * if $current doesn't exist.
	 * 
	 * @param char $current - the Current vertex.
	 * 
	 * @return char - The vertex that's not current, or v1 if $current doesn't exist. 
	 * 
	 */
	public function nextVertex($current = '') {
		return $this->v1 == $current ? $this->v2 : $this->v1;
	}
}