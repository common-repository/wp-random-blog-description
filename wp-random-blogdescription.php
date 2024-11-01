<?php
/**
* @package WP Random Blog Description
* @author Daniel Straub
* @version 1.3
*/
/*
Plugin Name: WP Random Blog Description
Plugin URI: http://katzenhirn.com/projekte/wp-random-blogdescription/
Description: Replaces the Blog Description every hour, day, week or month randomly. You can define as many Blog Descriptions as you want.
Author: Daniel Straub
Version: 1.3
Author URI: http://www.katzenhirn.com

*/

add_action('admin_menu', 'wp_random_blogdescription_adminpage');
add_action('admin_head', 'include_js_script', 1); //und noch ein Hoock fürs Javascript
register_activation_hook(__FILE__, 'wp_random_blogdescription_activation');
register_deactivation_hook(__FILE__, 'wp_random_blogdescription_deactivation');
$plugin_path = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
$plugin_lang_path = dirname( plugin_basename( __FILE__ ) ) ."/lang";
load_plugin_textdomain( 'wp-random-blogdescription',false, $plugin_lang_path);
$timestamp = time();


function wp_random_blogdescription_activation()
{
// Für die Aktivierung des Plugins
$standard_description = get_option('blogdescription');
$standard_timing = 86400;
$timestamp = time();
add_option('wp_random_blogdescription', $standard_description, '', '');
add_option('wp_random_blogdescription_timing', $standard_timing, '','');
add_option('wp_random_blogdescription_last', $timestamp, '', '');
}



function wp_random_blogdescription_adminpage()
{
add_options_page("Random Blogdescription", "WP Random Blog Description", "administrator", __FILE__, "wp_random_blogdescription_adminpage_content");
}

function wp_random_blogdescription_old_explode($string) {
$array = explode(";", $string);
return $array;
}

function wp_random_blogdescription_adminpage_content()
{

// Speicherung nur bei Senden



if ('insert' == $_POST['action']) {
$new_random_description_array =  $_POST['description'];

for($i=0; $i<count($new_random_description_array); $i++) {
	$new_random_description_array[$i] = htmlspecialchars(stripslashes($new_random_description_array[$i]));
}
	
	$new_timing = $_POST['timing'];

	update_option('wp_random_blogdescription', $new_random_description_array);
	update_option('wp_random_blogdescription_timing', $new_timing);

	echo "<div class='updated fade'>";
	echo __('Data saved', 'wp-random-blogdescription');
	echo "</div>"; 

}



// Anzeige Admin Script
$description_array = get_option('wp_random_blogdescription');

if(!is_array($description_array)) {
$description_array = wp_random_blogdescription_old_explode($description_array);
}

$anzahl_array_werte = count($description_array);
$timing = get_option('wp_random_blogdescription_timing');
global $plugin_path;
?>

<br>

<div id="poststuff">
	<div class="postbox">
		<h3><?php echo __('Options WP Random Blogdescription', 'wp-random-blogdescription');?></h3>
	
		<div class="inside less">
      	<form name="options" method="post" action="<?php $location ?>">
      	
      	   <h4><?php echo __('Descriptions', 'wp-random-blogdescription'); ?>:</h4>
      	   
      			<?php for($i = 0; $i < $anzahl_array_werte; $i++) { ?>
      			<span id="<?php echo $i; ?>"><input name="description[]" value="<?php echo$description_array[$i]  ?>" type="text" size="100" /><input type="button" onclick="del_insert('<?php echo $i; ?>')" value="-"><br></span> 
      			<?php } ?>
      			<span id="more_input"></span>
      		<span id="button"><input type="button" onclick="new_insert('<?php echo $i; ?>')" value="+"></span>
      		<p>
      		<h4><?php echo __('How often the description changes', 'wp-random-blogdescription'); ?></h4>
      		<input type="radio" name="timing" value="0" <?php if($timing == 0){ echo"checked"; } ?> /><?php echo __('permanent', 'wp-random-blogdescription'); ?><br />
				<input type="radio" name="timing" value="3600" <?php if($timing == 3600){ echo"checked"; } ?> /><?php echo __('per Hour', 'wp-random-blogdescription'); ?><br />
				<input type="radio" name="timing" value="86400" <?php if($timing == 86400){ echo"checked"; } ?> /><?php echo __('per day', 'wp-random-blogdescription'); ?><br />
				<input type="radio" name="timing" value="604800" <?php if($timing == 604800){ echo"checked"; } ?> /><?php echo __('per week', 'wp-random-blogdescription'); ?><br />
				<input type="radio" name="timing" value="2592000" <?php if($timing == 2592000){ echo"checked"; } ?> /><?php echo __('per month (every 30 days)', 'wp-random-blogdescription'); ?><br />
				<br />    		
      		</p>
      		<input type="submit" value="<?php echo __('Save', 'wp-random-blogdescription'); ?>" class="button-primary" />
      		<input name="action" value="insert" type="hidden" />
      	</form>
      </div>
	
	</div>
	
	
	<div class="postbox">
	<h3>

	<?php echo __('Information', 'wp-random-blogdescription'); ?></h3>
		<div class="inside less">
		<p>
		<?php $plugin_data = get_plugin_data(__FILE__);
		echo sprintf(__('Thank you for using the %1$s Version %2$s Plugin. This Plugin is written by %3$s', 'wp-random-blogdescription'), $plugin_data['Name'], $plugin_data['Version'], $plugin_data['Author']);
 ?>
	</div>
</div>

<?php


}

function check_time() {
// Prüfung der Zeitvariable und Aufruf von wp_random_set_blogdescription

$blogdes_timing = get_option('wp_random_blogdescription_timing');
$blogdes_last = get_option('wp_random_blogdescription_last');
global $timestamp;

$diff_time = $timestamp - $blogdes_last;

$diff_time = (int)$diff_time;
$blogdes_timing = (int)$blogdes_timing;

if($diff_time > $blogdes_timing)
{
	
	update_option('wp_random_blogdescription_last', $timestamp);
	return true;
}
else
{
	return false;
}

}
	
function wp_random_set_blogdescription()
{

$blogdes_new_array  = get_option('wp_random_blogdescription');
$blogdes_old_string = get_option('blogdescription');

if(!is_array($blogdes_new_array)) {
$blogdes_new_array = wp_random_blogdescription_old_explode($blogdes_new_array);
}

$anzahl_array_werte = count($blogdes_new_array);
$anzahl_array_werte = $anzahl_array_werte - 1;
$zufalls_array = mt_rand(0, $anzahl_array_werte);

if($blogdes_old_string == $blogdes_new_string)
{
	if($zufalls_array == $anzahl_array_werte)
	{
		$zufalls_array -1;
	}

$zufalls_array +1;

}
update_option('blogdescription', $blogdes_new_array[$zufalls_array]);

}

function include_js_script() {
global $plugin_path;
	echo '<script type="text/javascript" src="'.  $plugin_path .'script.js"></script>';
}



function wp_random_blogdescription_deactivation()
{
// Für die Deaktivierng des Plugins
delete_option("wp_random_blogdescription"); 
delete_option("wp_random_blogdescription_timing");
delete_option("wp_random_blogdescription_last");
}

if(check_time())
{
wp_random_set_blogdescription();
}

?>
