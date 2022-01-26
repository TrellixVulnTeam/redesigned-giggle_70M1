<?php
// Check rows exists.
if( $buttons ) : ?>
<div class="actions-wrapper">
<?php // Loop through rows.
    foreach( $buttons as $button) :

        // Load sub field value.
        $linkText = $button['link_text'];
		$url = $button['link_url'];
		$buttonStyle = $button['button_style'];
		?>

		<a href="<?= $url ?>" class="action action--<?= $buttonStyle ?>"><?= $linkText ?></a>

<?php // End loop.
    endforeach; ?>
</div>
<?php // No value.
else :
    // Do something...
endif;