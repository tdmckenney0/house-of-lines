<?php 

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