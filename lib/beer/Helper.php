<?php

if ( !class_exists( 'Helper' ) ) {
	class Helper {

	}
}

if ( !class_exists( 'html' ) ) {
	class html extends Helper {
		public function uri ( $uri ) {
			return URL_BASE.DS.$uri;
		}

		public function link ( $text, $uri, $params = array() ) {
			return '<a href="'.$this->uri( $uri ).'">'.$text.'</a>';
		}

		public function redirect ( $uri ) {
			header( 'location: '.$this->uri( $uri ) );
		}
	}
}

if ( !class_exists( 'sql' ) ) {
	class sql extends Helper {
		public function find ( $table, $params = array() ) {			
			$bdd['host'] = 'localhost';
			$bdd['user'] = 'root';
			$bdd['pass'] = 'root';
			$bdd['base'] = 'beerframework';
		
			$PDO = new PDO( 'mysql:host='.$bdd['host'].';dbname='.$bdd['base'], $bdd['user'], $bdd['pass'] );
			
			$where = '';
			if ( count( $params ) ) {
				$where = ' WHERE ';
				
				foreach ( $params as $field => $val ) {
					$where .= "$table.$field = '$val'";
				}
			}

			$req = $PDO->prepare( "SELECT * from $table$where" );
			$req->execute();
			
			if ( $req->rowCount() ) {
				if ( $req->rowCount() > 1 ) {
					$result = $req->fetchAll( PDO::FETCH_ASSOC );
				}
				else {
					$result = $req->fetch( PDO::FETCH_ASSOC );
				}
			}
			else {
				$result = array();
			}

			return $result;
		}
		
		public function add ( $table, $datas = array() ) {
			$bdd['host'] = 'localhost';
			$bdd['user'] = 'root';
			$bdd['pass'] = 'root';
			$bdd['base'] = 'beerframework';
		
			$PDO = new PDO( 'mysql:host='.$bdd['host'].';dbname='.$bdd['base'], $bdd['user'], $bdd['pass'] );
		
			$sql = "INSERT INTO $table ( ".join( ', ', array_keys( $datas ) )." ) VALUES ( '".join( "', '", array_values( $datas ) )."' )";

			return $PDO->query( $sql );
		}
		
		public function query ( $sql ) {
			$bdd['host'] = 'localhost';
			$bdd['user'] = 'root';
			$bdd['pass'] = 'root';
			$bdd['base'] = 'beerframework';
		
			$PDO = new PDO( 'mysql:host='.$bdd['host'].';dbname='.$bdd['base'], $bdd['user'], $bdd['pass'] );
		
			$req = $PDO->prepare( $sql );
			$req->execute();
			
			if ( $req->rowCount() ) {
				if ( $req->rowCount() > 1 ) {
					$result = $req->fetchAll( PDO::FETCH_ASSOC );
				}
				else {
					$result = $req->fetch( PDO::FETCH_ASSOC );
				}
			}
			else {
				$result = array();
			}

			return $result;
		}
		
		public function delete ( $table, $params = array() ) {
			$bdd['host'] = 'localhost';
			$bdd['user'] = 'root';
			$bdd['pass'] = 'root';
			$bdd['base'] = 'beerframework';
		
			$PDO = new PDO( 'mysql:host='.$bdd['host'].';dbname='.$bdd['base'], $bdd['user'], $bdd['pass'] );
		
			$sql = "DELETE FROM $table WHERE $table.id = $params[id]";

			return $PDO->query( $sql );
		}

		public function update ( $table, $datas = array() ) {
			if ( isset( $datas['id'] ) ) {
				$id = $datas['id'];
				unset( $datas['id'] );
				
				$bdd['host'] = 'localhost';
				$bdd['user'] = 'root';
				$bdd['pass'] = 'root';
				$bdd['base'] = 'beerframework';
		
				$PDO = new PDO( 'mysql:host='.$bdd['host'].';dbname='.$bdd['base'], $bdd['user'], $bdd['pass'] );
				
				$set = '';
				if ( count( $datas ) ) {
					foreach ( $datas as $field => $val ) {
						$set .= "$table.$field = '$val'";
					}
				}
		
				$sql = "UPDATE $table SET $set WHERE $table.id = $id";

				return $PDO->query( $sql );
			}
		}
	}
}