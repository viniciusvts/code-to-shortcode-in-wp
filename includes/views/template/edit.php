<?php
$sheet = isset($_GET['sheet'])?$_GET['sheet']:1;
$ctsCodes = ctsQueryAllShortcodes($sheet);
$maxNumPages = ctsNumberOfPages();//é float,
?>
<table class="wp-list-table widefat fixed striped posts">
	<thead>
		<tr>
			<th scope="col" id="title" class="manage-column column-title column-primary">
				<?php echo get_lang('N') ?>
			</th>
			<th scope="col" id="shortcode" class="manage-column column-shortcode">
				ShortCode
			</th>
	</thead>
	<tbody id="the-list" data-wp-lists="list:post">
		<?php
		foreach($ctsCodes as $code){
			$codeId = $code[CTS_TableId];
			$codeName = $code[CTS_TableAttName];
			$codeContent = $code[CTS_TableCode];
			$codeShort = "[".CTS_ShortcodeName." ".CTS_TableAttName."='".$codeName."']";
		?>
		<tr class="linha"><!--procuro essa classe no javascript, não remova-->
			<form action="<?php echo($_SERVER['REQUEST_URI']); ?>" method="POST">
				<input type="hidden" name="action" value="edit" class="inputAction">
				<input type="hidden" value="<?php echo($codeId); ?>" name="<?php echo CTS_TableId ?>">
				<td class="title column-title has-row-actions column-primary" data-colname="Title">
					<strong class="namedisplay">
						<?php echo $codeName ?>
					</strong>
					<input type="text" value="<?php echo($codeName); ?>"
							class="large-text code nameEdit" name="<?php echo CTS_TableAttName ?>"
							style="display:none;" required>
					<div class="row-actions">
						<span class="edit editLinks">
							<button type="button" class="button-link editinline">
								<?php echo get_lang('E') ?>
							</button>
							| 
						</span>
						<span class="trash trashLinks" msgOnClick="<?php echo get_lang('CDE') ?>">
							<a href="">
								<?php echo get_lang('D') ?>
							</a>
						</span>
					</div>
					<div class="buttonEdit" style="display:none;">
						<button type="submit"><?php echo get_lang('UP') ?></button>
						<button type="button" class="cancelButton" msgOnClick="<?php echo get_lang('CDE') ?>"><?php echo get_lang('CC') ?></button>
					</div>
					
				</td>
				<td class="shortcode column-shortcode" data-colname="Shortcode">
					<span class="shortcode">
						<input type="text" readonly value="<?php echo($codeShort); ?>" 
								class="large-text code shortcodeEdit">
					</span>
					<textarea class="large-text code codeEdit" name="<?php echo CTS_TableCode ?>"
							style="display:none;" rows="10" required><?php echo($codeContent); ?></textarea>
				</td>
			</form>
		</tr>
		<?php
		}
		?>
	</tbody>
	<tfoot>
		<tr>
			<th scope="col" id="title" class="manage-column column-title column-primary">
				<?php echo get_lang('N') ?>
			</th>
			<th scope="col" id="shortcode" class="manage-column column-shortcode">
				<?php echo get_lang('SC') ?>
			</th>
	</tfoot>
</table>
<div class="paginate">
	<div class="col">
		<?php
			//links da paginação
			$prev = cts_get_prev_page_link($maxNumPages);
			$next = cts_get_next_page_link($maxNumPages);
			$page = $_GET['sheet'];
			if($prev){
				echo "<a class='np-link' href='".$prev."'>";
				echo "Anterior";
				echo "</a>";
			}
		?>
	</div>
	<div class="col"><?php if(isset($page)){echo"Pag: ".$page;}else{echo"Pag: 1";} ?></div>
	<div class="col">
		<?php
			if($next){
				echo "<a class='np-link' href='".$next."'>";
				echo "Próxima";
				echo "</a>";
			}
		?>
	</div>
</div>
