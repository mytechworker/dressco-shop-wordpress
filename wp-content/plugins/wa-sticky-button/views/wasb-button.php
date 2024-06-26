<?php 

$on_mobile = get_option('okapi_wasb_display_on_mobile', 'TRUE');
$on_tablet = get_option('okapi_wasb_display_on_tablet', 'TRUE');
$on_desktop = get_option('okapi_wasb_display_on_desktop', 'TRUE');

$number = get_option('okapi_wasb_number', '');
$invalid_array = array(' ', '+', '-', '(', ')', '{', '}', '[', ']');
$number = str_replace($invalid_array, '', $number);

$msg = get_option('okapi_wasb_msg', 'Hi');
$msg = urlencode($msg);

$whatsapp_url = 'https://wa.me/'.$number.'?text='.$msg;

$position = get_option('okapi_wasb_position', 3);
$width = get_option('okapi_wasb_width', 75);
$height = get_option('okapi_wasb_height', 75);
$margin = get_option('okapi_wasb_margin', 15);
$icon_type = get_option('okapi_wasb_icon_type', 1);
$icon_id = get_option('okapi_wasb_icon_id', 0);
$icon_src = OKAPI_WASB_DEFAULT_IMG;

$icon_attachment = wp_get_attachment_image_src($icon_id, 90);
if(isset($icon_attachment[0]) && $icon_type == 2){
    $icon_src = $icon_attachment[0];
}

?>

<style type="text/css">
#okapi-wasb-button{
    position: fixed;
    z-index: 9999999;
}
<?php if($position == 1): ?>
    #okapi-wasb-button{
        top: <?php esc_html_e($margin) ?>px;
        left: <?php esc_html_e($margin) ?>px;
    }
<?php elseif($position == 2): ?>
    #okapi-wasb-button{
        top: <?php esc_html_e($margin) ?>px;
        right: <?php esc_html_e($margin) ?>px;
    }
<?php elseif($position == 3): ?>
    #okapi-wasb-button{
        bottom: <?php esc_html_e($margin) ?>px;
        right: <?php esc_html_e($margin) ?>px;
    }
<?php elseif($position == 4): ?>
    #okapi-wasb-button{
        bottom: <?php esc_html_e($margin) ?>px;
        left: <?php esc_html_e($margin) ?>px;
    }
<?php endif; ?>
#okapi-wasb-icon{
    opacity: 0.95;
    width: <?php esc_html_e($width) ?>px;
    height: <?php esc_html_e($height) ?>px;
}
#okapi-wasb-icon:hover{
    opacity: 1;
}
@media only screen and (min-width: 320px){
    #okapi-wasb-button{
		<?php if($on_mobile == 'TRUE'): ?>
			display: block;
		<?php else: ?>
		    display: none;
		<?php endif; ?>
    }
}
@media only screen and (min-width: 768px){
    #okapi-wasb-button{
		<?php if($on_tablet == 'TRUE'): ?>
			display: block;
		<?php else: ?>
			display: none;
		<?php endif; ?>
    }	    
}
@media only screen and (min-width: 992px){
    #okapi-wasb-button{
		<?php if($on_desktop == 'TRUE'): ?>
			display: block;
		<?php else: ?>
			display: none;
		<?php endif; ?>
    }
}
</style>
<a href="<?php esc_html_e($whatsapp_url) ?>" id="okapi-wasb-button" target="_blank">
	<img id="okapi-wasb-icon" src="<?php esc_html_e($icon_src) ?>">
</a>