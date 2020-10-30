<div class="novoitem">
	<table class="wp-list-table widefat fixed striped posts">
		<thead>
			<tr>
				<th scope="col" id="title" class="manage-column column-title column-primary">
					<?php echo get_lang('AN') ?>
				</th>
		</thead>
	</table>
	<form action="<?php echo($_SERVER['REQUEST_URI']); ?>" method="post">
		<input type="hidden" name="action" value="new" class="inputAction">
		<label for="<?php echo CTS_TableAttName ?>"><?php echo get_lang('NPS') ?></label>
		<input type="text" name="<?php echo CTS_TableAttName ?>" required>
		<label for="<?php echo CTS_TableCode ?>"><?php echo get_lang('IS') ?></label>
		<textarea name="<?php echo CTS_TableCode ?>" cols="50" rows="10" required></textarea>
		<button type="submit"><?php echo get_lang('AN') ?></button>
	</form>
</div>