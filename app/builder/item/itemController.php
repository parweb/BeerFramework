<?php

class itemController extends Controller {
	var $layout = 'page';

	public function listAction () {
		$this->items = $this->helper( 'sql' )->find( 'item' );
	}

	public function addAction () {
		if ( count( $this->post( 'data.item' ) ) ) {
			$this->items = $this->helper( 'sql' )->add( 'item', $this->post( 'data.item' ) );
			
			$this->helper( 'html' )->redirect( 'builder/item/list/' );
		}
	}

	public function deleteAction () {
		$this->helper( 'sql' )->delete( 'item', array( 'id' => $this->get( 'item.id' ) ) );
		
		$this->helper( 'html' )->redirect( 'builder/item/list/' );
	}

	public function showAction () {
		$this->item = $this->helper( 'sql' )->find(
			'item',
			array( 'id' => $this->get( 'item.id' ) )
		);
		
		$this->items = $this->helper( 'sql' )->find( 'item' );

		$this->subs_item = $this->helper( 'sql' )->query( "
			SELECT item.id, item.name as item_name, lot.listable, lot.id as lot_id, lot.name as lot_name FROM item, lot, item as parent
			WHERE item.id = lot.item_id AND lot.parent_id = parent.id AND parent.id = ".$this->get( 'item.id' )."
		" );
	}

	public function editAction () {
		if ( count( $this->post( 'data.item' ) ) ) {
			$this->items = $this->helper( 'sql' )->update( 'item', $this->post( 'data.item' ) );
			
			$this->helper( 'html' )->redirect( 'builder/item/list/' );
		}

		$this->item = $this->helper( 'sql' )->find(
			'item',
			array( 'id' => $this->get( 'item.id' ) )
		);
	}
}