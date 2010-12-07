<h2>Ajouter une valeur</h2>
<form method="post">
	<?php foreach ( $this->items as $item ) : ?>
		<?php if ( $item['listable'] ) : ?>
			<p>
				<label for="item-<?php echo $item['name']; ?>"><?php echo $item['name']; ?></label>
				<select name="data[lot_id][<?php echo $item['id']; ?>]" id="item-<?php echo $item['name']; ?>">
					<?php foreach ( $this->item_values[$item['name']] as $value ) : ?>
						<option value="<?php echo $value['key']; ?>"><?php echo $value['value']; ?></option>
					<?php endforeach; ?>
				</select>
			</p>
		<?php else : ?>
			<p>
				<label for="item-<?php echo $item['name']; ?>"><?php echo $item['name']; ?></label>
				<input type="text" name="data[lot_id][<?php echo $item['id']; ?>]" id="item-<?php echo $item['name']; ?>" />
			</p>
		<?php endif; ?>
	<?php endforeach; ?>
	
	<input type="hidden" name="data[item][id]" value="<?php echo $this->get( 'item.id' ); ?>" />

	<input type="submit" value="Ajouter" />
</form>