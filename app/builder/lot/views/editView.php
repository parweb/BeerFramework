<h2>Editer un lot</h2>
<form method="post">
	<!--<p>
		<label for="lot-item_id">Item existant: </label>
		<select name="data[lot][item_id]" id="lot-item_id">
			<?php foreach ( $this->items as $item ) : ?>
				<option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
			<?php endforeach; ?>
		</select>
	</p>-->
	<p>
		<label for="lot-listable">Listable: </label>
		<input type="text" name="data[lot][Listable]" id="lot-Listable" value="<?php echo $this->lot['listable']; ?>" />
	</p>
	<p>
		<label for="lot-name">name: </label>
		<input type="text" name="data[lot][name]" id="lot-name" value="<?php echo $this->lot['name']; ?>" />
	</p>

	<input type="hidden" name="data[lot][id]" value="<?php echo $this->lot['id']; ?>" />

	<input type="submit" value="editer" />
</form>