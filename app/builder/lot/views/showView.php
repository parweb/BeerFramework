<h2>Détail de: <?php echo $this->item['name']; ?></h2>

<form method="post" action="<?php echo $this->helper('html')->uri( "builder/append/" ); ?>">
	<p>
		<label for="item-items">Item existant: </label>
		<select name="data[lot][item_id]" id="item-items">
			<?php foreach ( $this->items as $item ) : ?>
				<option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
			<?php endforeach; ?>
		</select>
	</p>
	
	<input type="hidden" name="data[lot][parent_id]" value="<?php echo $this->item['id']; ?>" />

	<input type="submit" value="ajouter" />
</form>

<table width="100%">
	<thead>
		<tr>
			<th>#</th>
			<th>name</th>
			<th>actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ( $this->subs_item as $item ) : ?>
			<tr>
				<td><?php echo $item['lot_id']; ?></td>
				<td><?php echo $this->helper('html')->link( $item['name'], "builder/show/item.id:$item[id]/" ); ?></td>
				<td>
					<?php echo $this->helper('html')->link( 'editer', "builder/edit/lot.id:$item[lot_id]/" ); ?>
					<?php echo $this->helper('html')->link( 'x', "builder/delete/lot.id:$item[lot_id]/" ); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>