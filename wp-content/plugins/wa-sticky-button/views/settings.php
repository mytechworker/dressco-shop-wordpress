<?php
$activate = get_option('okapi_wasb_activate', 2);
$display_on_mobile = get_option('okapi_wasb_display_on_mobile', 'TRUE');
$display_on_tablet = get_option('okapi_wasb_display_on_tablet', 'TRUE');
$display_on_desktop = get_option('okapi_wasb_display_on_desktop', 'TRUE');
$position = get_option('okapi_wasb_position', 3);
$number = get_option('okapi_wasb_number', '');
$msg = get_option('okapi_wasb_msg', 'Hi');
$width = get_option('okapi_wasb_width', 75);
$height = get_option('okapi_wasb_height', 75);
$margin = get_option('okapi_wasb_margin', 15);
$icon_type = get_option('okapi_wasb_icon_type', 1);
$icon_id = get_option('okapi_wasb_icon_id', 0);
$icon_src = OKAPI_WASB_DEFAULT_IMG;
$default_src = OKAPI_WASB_DEFAULT_IMG;

$icon_attachment = wp_get_attachment_image_src($icon_id, 90);
if(isset($icon_attachment[0]) && $icon_type == 2){
    $icon_src = $icon_attachment[0];
}
?>
<div id="wpbody" role="main">
    <div id="wpbody-content" aria-label="Main content" tabindex="0">
        <h3 style="color: #28D044;">
        	<?php _e('If you have any suggestion or want to free/paid support, feel free to contact me at contact2farazquazi@gmail.com', 'wa-sticky-button') ?>
    	</h3>
        <div class="wrap" style="padding-bottom: 300px;">
            <form id="okapi-wasb-form" onsubmit="return false;" action="javascript: void(0);" method="post">
				<?php echo wp_nonce_field('okapi_wasb_save_settings'); ?>
				<input name="action" value="okapi_wasb_save_settings" type="hidden">
				<input name="icon_id" value="<?php esc_html_e($icon_id) ?>" type="hidden">
	            <table class="widefat">
	                <thead>
	                    <tr>
	                        <th colspan="3">
	                            <h1><?php _e('WhatsApp Sticky Button - Settings', 'wa-sticky-button') ?></h1>
	                        </th>
	                    </tr>
	                </thead>
	                <tbody>
	                    <tr>
	                        <td class="okapi-wasb-td-1">
	                            <?php _e('Activate', 'wa-sticky-button') ?> <span class="required">*</span>  
	                        </td>
	                        <td class="okapi-wasb-td-2">
	                            <select name="activate" class="okapi-wasb-form-element" required>
	                                <option value="1" <?php if($activate == '1'){ echo 'selected'; } ?> >
	                                	<?php _e('Yes', 'wa-sticky-button') ?>
                                	</option>
	                                <option value="2" <?php if($activate == '2'){ echo 'selected'; } ?> >
	                                	<?php _e('No', 'wa-sticky-button') ?>
                                	</option>
	                            </select>
	                        </td>
	                        <td class="okapi-wasb-td-3">&nbsp;</td>
	                    </tr>
	                    <tr>
	                        <td class="okapi-wasb-td-1">
	                            <?php _e('Display on', 'wa-sticky-button') ?> <span class="required">*</span>
	                        </td>
	                        <td class="okapi-wasb-td-2">
								<label style="display: block;">
									<input name="display_on_mobile" type="checkbox" value="TRUE" <?php if($display_on_mobile == 'TRUE'){ echo 'checked'; } ?> > &nbsp; 
									Phone	
								</label>
								<label style="display: block;">
									<input name="display_on_tablet" type="checkbox" value="TRUE" <?php if($display_on_tablet == 'TRUE'){ echo 'checked'; } ?> > &nbsp; 
									Tablet	
								</label>
								<label style="display: block;">
									<input name="display_on_desktop" type="checkbox" value="TRUE" <?php if($display_on_desktop == 'TRUE'){ echo 'checked'; } ?> > &nbsp; 
									Desktop	
								</label>
	                        </td>
	                        <td class="okapi-wasb-td-3">&nbsp;</td>
	                    </tr>
	                    <tr>
	                        <td class="okapi-wasb-td-1">
	                            <?php _e('Button Position', 'wa-sticky-button') ?> <span class="required">*</span>
	                        </td>
	                        <td class="okapi-wasb-td-2">
	                            <select name="position" class="okapi-wasb-form-element" required>
	                                <option value="1" <?php if($position == '1'){ echo 'selected'; } ?> >
	                                	<?php _e('Top Left', 'wa-sticky-button') ?>
                                	</option>
	                                <option value="2" <?php if($position == '2'){ echo 'selected'; } ?> >
	                                	<?php _e('Top Right', 'wa-sticky-button') ?>
                                	</option>
	                                <option value="3" <?php if($position == '3'){ echo 'selected'; } ?> >
	                                	<?php _e('Bottom Right', 'wa-sticky-button') ?>
                                	</option>
	                                <option value="4" <?php if($position == '4'){ echo 'selected'; } ?> >
	                                	<?php _e('Bottom Left', 'wa-sticky-button') ?>
                                	</option>
	                            </select>
	                        </td>
	                        <td class="okapi-wasb-td-3">&nbsp;</td>
	                    </tr>
	                    <tr>
	                        <td class="okapi-wasb-td-1">
	                            <?php _e('WhatsApp Number', 'wa-sticky-button') ?> <span class="required">*</span>
	                        </td>
	                        <td class="okapi-wasb-td-2">
	                            <input name="number" class="okapi-wasb-form-element" value="<?php esc_html_e($number) ?>" type="number" required>
	                        </td>
	                        <td class="okapi-wasb-td-3">
	                            <small class="okapi-wasb-small">
	                                <?php _e('WhatsApp number like that 919806886806 <br>(with country code but without any plus, preceding zero, hyphen, brackets, space)', 'wa-sticky-button') ?>
	                            </small>
	                        </td>
	                    </tr>
	                    <tr>
	                        <td class="okapi-wasb-td-1">
	                            <?php _e('WhatsApp Default Message', 'wa-sticky-button') ?>
	                        </td>
	                        <td class="okapi-wasb-td-2">
	                            <input name="msg" class="okapi-wasb-form-element" value="<?php esc_html_e($msg) ?>" type="text" required>
	                        </td>
	                        <td class="okapi-wasb-td-3">&nbsp;</td>
	                    </tr>
	                    <tr>
	                        <td class="okapi-wasb-td-1">
	                            <?php _e('Icon Width', 'wa-sticky-button') ?> <span class="required">*</span>
	                        </td>
	                        <td class="okapi-wasb-td-2">
	                            <input name="width" class="okapi-wasb-form-element" value="<?php esc_html_e($width) ?>" type="number" required>
	                        </td>
	                        <td class="okapi-wasb-td-3">
	                            <small class="okapi-wasb-small">
	                                <?php _e('In Pixel', 'wa-sticky-button') ?>
	                            </small>
	                        </td>
	                    </tr>
	                    <tr>
	                        <td class="okapi-wasb-td-1">
	                            <?php _e('Icon Height', 'wa-sticky-button') ?> <span class="required">*</span>
	                        </td>
	                        <td class="okapi-wasb-td-2">
	                            <input name="height" class="okapi-wasb-form-element" value="<?php esc_html_e($height) ?>" type="number" required>
	                        </td>
	                        <td class="okapi-wasb-td-3">
	                            <small class="okapi-wasb-small">
	                                <?php _e('In Pixel', 'wa-sticky-button') ?>
	                            </small>
	                        </td>
	                    </tr>
	                    <tr>
	                        <td class="okapi-wasb-td-1">
	                            <?php _e('Icon Margin', 'wa-sticky-button') ?> <span class="required">*</span>
	                        </td>
	                        <td class="okapi-wasb-td-2">
	                            <input name="margin" class="okapi-wasb-form-element" value="<?php esc_html_e($margin) ?>" type="number" required>
	                        </td>
	                        <td class="okapi-wasb-td-3">
	                            <small class="okapi-wasb-small">
	                                <?php _e('In Pixel', 'wa-sticky-button') ?>
	                            </small>
	                        </td>
	                    </tr>
	                    <tr>
	                        <td class="okapi-wasb-td-1">
	                            <?php _e('Icon Type', 'wa-sticky-button') ?> <span class="required">*</span>
	                        </td>
	                        <td class="okapi-wasb-td-2">
	                            <select name="icon_type" class="okapi-wasb-form-element" required>
	                                <option value="1" <?php if($icon_type == '1'){ echo 'selected'; } ?> >
	                                	<?php _e('Default WhatsApp Icon', 'wa-sticky-button') ?>
                                	</option>
	                                <option value="2" <?php if($icon_type == '2'){ echo 'selected'; } ?> >
	                                	<?php _e('Select Custom Icon', 'wa-sticky-button') ?>
                                	</option>
	                            </select>
	                        </td>
	                        <td class="okapi-wasb-td-3">
	                            <button id="okapi-wasb-icon-id" class="button button-large">
	                                <?php _e('Select Icon', 'wa-sticky-button') ?>
	                            </button>
	                            <div class="okapi-wasb-error"></div>
	                        </td>
	                    </tr>
	                    <tr>
	                        <td class="okapi-wasb-td-1">
	                            <?php _e('Icon Preview', 'wa-sticky-button') ?> <span class="required">*</span>
	                        </td>
	                        <td class="okapi-wasb-td-2">
	                            <img src="<?php esc_html_e($icon_src) ?>" id="okapi-wasb-icon-preview" class="okapi-wasb-add-sub-btn-link" title="WhatsApp" alt="WhatsApp" style="max-height: 75px;">
	                        </td>
	                        <td class="okapi-wasb-td-3">&nbsp;</td>
	                    </tr>
	                </tbody>
	                <tfoot>
	                    <tr>
	                        <td colspan="3">
	                            <button id="okapi-wasb-save-settings" type="submit" class="button button-primary button-large">
	                                <?php _e('Save Changes', 'wa-sticky-button') ?>
	                            </button>
	                        </td>
	                    </tr>  
	                </tfoot>
	            </table>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
var default_src = "<?php esc_html_e($default_src) ?>";
jQuery(document).on("change", "select[name='icon_type']", function(){
    var value = jQuery(this).val();
    if(value == 1){
        jQuery("#okapi-wasb-icon-id").fadeOut();
        jQuery("#okapi-wasb-icon-preview").attr("src", default_src);
    }else{
        jQuery("#okapi-wasb-icon-id").fadeIn();
    }
});
jQuery(document).ready(function(){
    jQuery("select[name='icon_type']").trigger("change");
    jQuery(document).on("click", "#okapi-wasb-icon-id", function(){
        var file_frame = wp.media.frames.file_frame = wp.media({
            title: "Choose Icon Image",
            button: {
                text: "Select",
            },
            multiple: false,
        });
        file_frame.on("select", function(){
            attachment = file_frame.state().get("selection").first().toJSON();
            jQuery("input[name='icon_id']").val(attachment.id);
            jQuery("#okapi-wasb-icon-preview").attr("src", attachment.url);
        });
        file_frame.open();
    });
});
jQuery(document).on("submit", "#okapi-wasb-form", function(e){
	e.preventDefault();
    jQuery(".okapi-wasb-error").html("");
    var status = true;
    var icon_type = jQuery("select[name='icon_type']").val();
    var icon_id = jQuery("input[name='icon_id']").val();
    if(icon_type == 2 && icon_id == 0){
        jQuery("#okapi-wasb-icon-id").next(".okapi-wasb-error").html("Please select icon image.");
        status = false;
    }
    if(status == true){
        jQuery("#okapi-wasb-save-settings").html('Saving...');
        jQuery.ajax({
            type: "POST",
            url: "<?php echo get_admin_url(); ?>admin-ajax.php",
            data: jQuery("#okapi-wasb-form").serialize(),
            success: function(res){
                jQuery("#okapi-wasb-save-settings").html("<?php _e('Saved Successfully!', 'wa-sticky-button') ?>");
                setTimeout(function(){
                	jQuery("#okapi-wasb-save-settings").html("<?php _e('Save Changes', 'wa-sticky-button') ?>");
                }, 3000);
            }
        }); 
    }
});
</script>

<style type="text/css">
.okapi-wasb-small{
    display: block;
    color: #28D044;
    font-size: 13px;
    font-weight: 500;
}
.okapi-wasb-td-1{
    vertical-align: middle !important;
    width: 180px;
    font-weight: bold;
}
.okapi-wasb-td-2{
    vertical-align: middle !important;
    width: 220px;
}
.okapi-wasb-td-3{
    vertical-align: middle !important;
}
.okapi-wasb-error{
    color: red;
    display: block;
}
.okapi-wasb-form-element{
    width: 100%;
    height: 36px !important;
    font-size: 16px;
}
</style>