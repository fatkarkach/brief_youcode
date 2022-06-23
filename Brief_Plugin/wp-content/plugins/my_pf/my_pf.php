<?php

/**
 * Plugin Name:My PF
 * Plugin URI: http://localhost/Brief_Plugin/
 * Description: My first plugin Creation of  Feedback  from scratch.
 * Version: 1.0
 * Author: fatma karkach
 * Author URI: http://localhost/Brief_Plugin/
 */

if (!defined('ABSPATH')){
    die;
}

class  my_pf{
    public function __construct()
    {
        add_action('init', array($this,'create_custom'));
		add_action('wp_enqueue_scripts',array($this,'load_assets'));
		add_shortcode('feedback_form',array($this, 'load_shortcode'));

    }

	public function create_custom(){
		$args=array(
			'public' => true,
			'has_archive'=>true,
			'supports'=>array('title'),
			'exclude_from_search'=>true,
			'publicly_queryable'=>false,
			'capability'=>'manage_options',
			'labels'=>array(
                'name'=>'Feedback Form',
				'singular_name'=>'Feedback Form Entry'
            ),
			'menu_icon'=>'dashicons-media-text',
		);
		register_post_type('my_pf',$args);
    }
	public function load_assets(){
		wp_enqueue_style(
			'my_pf',
			plugin_dir_url(__FILE__).'/css/my_pf.css',
			array(),
			1,
			'all'
		);
	}
	public function load_shortcode(){
		?>
        <div class="t_c">
            <form  method="post" id="form_remarque">
            <div >
                <label for="note">Choose a note:</label>
                <select   name="note" id="note">
                    <option selected value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
			<br>
			<div class="div_textarea">
			<label for="remarque">Remarque:</label>
				<textarea name="remarque" id="remarque"></textarea>
			</div>
            <br>
            <input type="hidden" name="id" value="<?php echo get_the_ID()?> ">
			<button name="submit" type="submit" id="button_sub">add</button>
		</form>
		</div>
		<?php
	}

}
new my_pf;
global $wpdb;
if (isset($_POST['submit'])) {
	$remarque = $_POST['remarque'];
	$id = $_POST['id'];
	$note = $_POST['note'];

	$wpdb->insert('wp_feedback', array('post_id' => $id, 'remarque' => $remarque, 'note' => $note));
	header('refresh:0', 'Location: ' . $_SERVER['HTTP_REFERER']);
	exit();
}
