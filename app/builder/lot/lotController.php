<?php

class lotController extends Controller {
	var $layout = 'page';

	public function listAction () {
		$this->items = $this->helper( 'sql' )->find( 'item' );
	}

	public function addAction () {	
		if ( count( $this->post( 'data.lot' ) ) ) {
			$this->items = $this->helper( 'sql' )->add( 'lot', $this->post( 'data.lot' ) );
		}

		$this->helper( 'html' )->redirect( 'builder/item/show/item.id:'.$this->post( 'data.lot.parent_id' ).'/' );
	}

	public function deleteAction () {
		$this->helper( 'sql' )->delete( 'lot', array( 'id' => $this->get( 'lot.id' ) ) );
		
		$this->helper( 'html' )->redirect( 'builder/item/list/' );
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
		if ( count( $this->post( 'data.lot' ) ) ) {
			$this->items = $this->helper( 'sql' )->update( 'lot', $this->post( 'data.lot' ) );

			$this->helper( 'html' )->redirect( 'builder/item/list/' );
		}
		
		$this->items = $this->helper( 'sql' )->find( 'item' );

		$this->lot = $this->helper( 'sql' )->find(
			'lot',
			array( 'id' => $this->get( 'lot.id' ) )
		);
	}
}