<?php

class valueController extends Controller {
	var $layout = 'page';

	public function listAction () {
		$this->items = $this->helper( 'sql' )->find( 'item' );
	}
	
	public function addAction () {
		if ( $this->post( 'data' ) ) {
			foreach ( $this->post( 'data.lot_id' ) as $lot_id => $val ) {
				$data = array(
					'item_id' => $this->post( 'data.item.id' ),
					'lot_id' => $lot_id,
					'val' => $val
				);

				$this->helper('sql')->add( 'value', $data );
			}
			
			$this->helper('html')->redirect( 'builder/value/list/' );
		}

		if ( $this->get( 'item.id' ) ) {
			$this->items = $this->helper( 'sql' )->query( "
				SELECT * FROM item, lot
				WHERE lot.parent_id = ".$this->get( 'item.id' )."
					AND item.id = lot.parent_id
			" );
			//printr($this->items);
			foreach	( $this->items as $item ) {
				if ( $item['listable'] ) {
					$item_values[$item['name']] = $this->helper( 'sql' )->find(
						'value',
						array( 'item_id' => $item['item_id'] )
					);
				}
			}

			printr( $item_values, true );
			@$this->item_value = $item_values;
		}
	}
}