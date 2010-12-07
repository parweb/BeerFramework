<h2><?php echo $this->item['name']; ?></h2>

<form method="post" action="<?php echo $this->helper('html')->uri( "builder/lot/add/" ); ?>">
	<p>
		<label for="lot-item_id">Item existant: </label>
		<select name="data[lot][item_id]" id="lot-item_id">
			<?php foreach ( $this->items as $item ) : ?>
				<option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
			<?php endforeach; ?>
		</select>
	</p>
	<p>
		<label for="lot-name">Nom: </label>
		<input type="text" name="data[lot][name]" id="lot-name" />
	</p>
	
	<input type="hidden" name="data[lot][parent_id]" value="<?php echo $this->item['id']; ?>" />

	<input type="submit" value="ajouter" />
</form>

<table width="100%">
	<thead>
		<tr>
			<th>#</th>
			<th>name</th>
			<th>item</th>
			<th>listable</th>
			<th>actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ( $this->subs_item as $i => $item ) : ?>
			<tr>
				<td><?php echo $i+1; ?></td>
				<td><?php echo $item['lot_name']; ?></td>
				<td><?php echo $this->helper('html')->link( $item['item_name'], "builder/item/show/item.id:$item[id]/" ); ?></td>
				<td><?php echo $item['listable']; ?></td>
				<td>
					<?php echo $this->helper('html')->link( 'editer', "builder/lot/edit/lot.id:$item[lot_id]/" ); ?>
					<?php echo $this->helper('html')->link( 'x', "builder/lot/delete/lot.id:$item[lot_id]/" ); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>