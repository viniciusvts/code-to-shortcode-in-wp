<div class="ctsoptions">
	<table class="wp-list-table widefat fixed striped posts">
		<thead>
			<tr>
				<th scope="col" id="title" class="manage-column column-title column-primary">
					<?php echo get_lang('OPT') ?>
				</th>
		</thead>
	</table>
	<form action="<?php echo($_SERVER['REQUEST_URI']); ?>" method="post" class="option">
		<label for="<?php echo CTS_LangOption ?>"><?php echo get_lang('LN') ?></label>
		<select id="lang" name="<?php echo CTS_LangOption ?>">
			<?php
			$linguaAtual = get_option( CTS_LangOption );
			$idiomas = get_my_laguages();
			foreach($idiomas as $idioma){
			?>
			<option value="<?php echo $idioma ?>" <?php if($idioma==$linguaAtual){echo('selected');} ?>>
				<?php echo $idioma ?>
			</option>
			<?php
			}
			?>
		</select>
	</form>
	<form action="<?php echo($_SERVER['REQUEST_URI']); ?>" method="post" class="option">
		<label for="<?php echo CTS_ItensPorPagOption ?>"><?php echo get_lang('CPP') ?></label>
		<select id="ppp" name="<?php echo CTS_ItensPorPagOption ?>">
			<?php
			$itensPorPaginaOption = get_option( CTS_ItensPorPagOption );
			$ItensPorPagina = array(10,25,50,100);
			foreach($ItensPorPagina as $idioma){
			?>
			<option value="<?php echo $idioma ?>" <?php if($idioma==$itensPorPaginaOption){echo('selected');} ?>>
				<?php echo $idioma ?>
			</option>
			<?php
			}
			?>
		</select>
	</form>
</div>