<h2>Editer un item</h2>
<form method="post">
	<p>
		<label for="item-name">name: </label>
		<input type="text" name="data[item][name]" id="item-name" value="<?php echo $this->item['name']; ?>" />
	</p>

	<input type="hidden" name="data[item][id]" value="<?php echo $this->item['id']; ?>" />

	<input type="submit" value="editer" />
</form>