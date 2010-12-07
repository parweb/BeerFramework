<?php

class builderController extends Controller {
	var $layout = 'page';

	public function appendAction () {	
		if ( count( $this->post( 'data.lot' ) ) ) {
			$this->items = $this->helper( 'sql' )->add( 'lot', $this->post( 'data.lot' ) );
		}

		$this->helper( 'html' )->redirect( 'builder/show/item.id:'.$this->post( 'data.lot.parent_id' ).'/' );
	}

	public function listAction () {
		$this->items = $this->helper( 'sql' )->find( 'item' );
	}

	public function addAction () {
		if ( count( $this->post( 'data.item' ) ) ) {
			$this->items = $this->helper( 'sql' )->add( 'item', $this->post( 'data.item' ) );
			
			$this->helper( 'html' )->redirect( 'builder/list/' );
		}
	}

	public function deleteAction () {
		$this->helper( 'sql' )->delete( 'item', array( 'id' => $this->get( 'item.id' ) ) );
		
		$this->helper( 'html' )->redirect( 'builder/list/' );
	}

	public function showAction () {
		$this->item = $this->helper( 'sql' )->find(
			'item',
			array( 'id' => $this->get( 'item.id' ) )
		);
		
		$this->items = $this->helper( 'sql' )->find( 'item' );

		$this->subs_item = $this->helper( 'sql' )->query( "
			SELECT item.*, lot.id as lot_id FROM item, lot, item as parent
			WHERE item.id = lot.item_id AND lot.parent_id = parent.id AND parent.id = ".$this->get( 'item.id' )."
		" );
	}

	public function editAction () {
		if ( count( $this->post( 'data.item' ) ) ) {
			$this->items = $this->helper( 'sql' )->update( 'item', $this->post( 'data.item' ) );
			
			$this->helper( 'html' )->redirect( 'builder/list/' );
		}

		$this->item = $this->helper( 'sql' )->find(
			'item',
			array( 'id' => $this->get( 'item.id' ) )
		);
	}
}