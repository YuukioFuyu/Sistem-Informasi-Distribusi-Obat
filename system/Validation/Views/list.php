<?php if (! empty($errors)) : ?>
	<div class="errors validation_error" role="alert">
		<ul>
		<?php foreach ($errors as $error) : ?>
			<li><?= esc($error) ?></li>
		<?php endforeach ?>
		</ul>
	</div>
<?php endif ?>
