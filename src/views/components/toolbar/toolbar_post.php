<?php
	use App\Utils\Lang;
?>

<div class="tempora_toolbar_drop_container">
	<p class="tempora_toolbar_drop_hover_element" title="<?= Lang::translate(key: "TOOLBAR_POST_TITLE") ?>"><i class="ri-mail-line"></i> <?= count(value: $_POST) ?></p>
	<div class="tempora_toolbar_drop_element">
		<table>
			<?php foreach ($_POST as $key => $value) { ?>
				<tr>
					<td><?= $key ?></td><td><?= $value ?></td>
				</tr>
			<?php } ?>
		</table>
	</div>
</div>
