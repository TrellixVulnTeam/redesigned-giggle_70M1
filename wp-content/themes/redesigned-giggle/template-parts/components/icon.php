<?php if (get_field('icons', 'option')['icon_family'] === 'ionicions') : ?>
    <?php if (get_field('icons', 'option')['ionicion_icon_style'] === 'outline') {
        $iconStyle = '-outline';
    } elseif (get_field('icons', 'option')['ionicion_icon_style'] === 'sharp') {
        $iconStyle = '-sharp';
    } else {
        $iconStyle = '';
    }
    $iconName = isset($iconName) ? $iconName : 'bug';
    ?>
    <ion-icon name="<?php echo $iconName . $iconStyle; ?>"></ion-icon>
<?php else: ?>
    <?php if (get_field('icons', 'option')['ionicion_icon_style'] === 'outline') {
        $iconStyle = '-outline';
    } elseif (get_field('icons', 'option')['ionicion_icon_style'] === 'sharp') {
        $iconStyle = '-sharp';
    } else {
        $iconStyle = '';
    }
    $iconName = isset($iconName) ? $iconName : 'bug';
    ?>
    <ion-icon name="<?php echo $iconName . $iconStyle; ?>"></ion-icon>
<?php endif; ?>