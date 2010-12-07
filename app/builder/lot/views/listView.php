<h2>Liste des lots</h2>
<table width="100%">
	<thead>
		<tr>
			<th>#</th>
			<th>name</th>
			<th>actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ( $this->items as $item ) : ?>
			<tr>
				<td><?php echo $item['id']; ?></td>
				<td><?php echo $this->helper('html')->link( $item['name'], "builder/show/item.id:$item[id]/" ); ?></td>
				<td>
					<?php echo $this->helper('html')->link( 'editer', "builder/edit/item.id:$item[id]/" ); ?>
					<?php echo $this->helper('html')->link( 'x', "builder/delete/item.id:$item[id]/" ); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>