<?php

class Controller {
	var $_vars = array();
	
	public function __set ( $key, $val ) {
		$this->_vars[$key] = $val;
	}
	
	public function __get ( $key ) {
		if ( isset( $this->_vars[$key] ) ) {
			return $this->_vars[$key];
		}
		else {
			echo 'la variable de vu $this->'.$key.' n\'a pas encore était crée';
		}
	}
	
	public function get ( $var ) {
		if ( preg_match( '#/'.$var.':(.*)/#', URI_BASE, $out ) ) {
			return $out[1];
		};
	}
	
	public function post ( $var ) {
		if ( count( $_POST ) ) {
			eval( '$out = $_POST[\''.str_replace( '.', "']['", $var ).'\'];' );
			
			return $out;
		}
	}

	public function lunch ( $action ) {
		$this->$action();

		$view = str_replace( 'Action', 'View', $action );
		$this->content = $view;

		include DIR_APP_SECTION.'layouts'.DS.$this->layout.'Layout.php';
	}
	
	public function helper ( $name ) {
		include 'Helper.php';
		
		$Helper = new $name();
		return $Helper;
	}
}