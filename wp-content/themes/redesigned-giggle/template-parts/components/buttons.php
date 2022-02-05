<?php

require_once get_template_directory() . '/vendor/Mexitek/PHPColors/src/Mexitek/PHPColors/Color.php';

use Mexitek\PHPColors\Color;

// Check rows exists.
if( $buttons ) : ?>
<div class="actions-wrapper">
<?php // Loop through rows.
    foreach( $buttons as $button) :

        // Load sub field value.
        $linkText = $button['link_text'];
		$url = $button['link_url'];
		$buttonStyle = $button['button_style'];
        $buttonColour = $button['button_colour'];
        $buttonBrandCol = get_field('brand_colours', 'option')['brand_colour_' . $buttonColour];
        
        $buttonColourObj = new Color($buttonBrandCol);
        $buttonTextColour = $buttonColourObj->isDark() ? 'light' : 'dark';
        
		?>
		<a href="<?= $url ?>" class="action action--<?php echo $buttonTextColour; ?> action--<?= $buttonStyle; ?>--<?php echo $buttonColour; ?> action--<?= $buttonStyle ?>"><?= $linkText ?></a>

<?php // End loop.
    endforeach; ?>
</div>
<?php // No value.
else :
    // Do something...
endif;