<?php
/*
Plugin Name: Simple Contact Form
Plugin URI: http://www.wpamanuke.com
Description:  Simple Contact Form tutoriel
Version: 1.0.0
Author: fatma
Author URI: https://wpamanuke.com
*/
if(!defined('ABSPATH'))
{
    echo "est ce que vous pouvez faire?";
    exit;
}
class  SimpleContactForm
{

    public function __construct()
    {
        //creat costum post type 
        add_action( 'init',array($this,'create_custom_post_type'));
        //add assets (css,js, ..)
        add_action('wp_enqueue_scripts',array($this,'load_assets'));
        //add form 
        add_shortcode('feedback_form',array($this, 'load_shortcode'));

    }
    public function create_custom_post_type()
    {
        $args = array(
            'public' => true,
            'has_archive'=> true,
            'supports' => array('title'),
            'exclude_form_search' => true,
            'publicly_queryable' =>false,
            'capability' => 'manage_options',
            'labels' => array(
                'name' => 'Contact Form',
                'singular_name' => 'Contact Form Entry'
            ),
            'menu_icon' => 'dashicons-media-document',
        );
        register_post_type('simple_contact_form',$args);
    }
    public function load_assets()
    {

        wp_enqueue_style( 
        'simple-contact-form',
         plugin_dir_url(__FILE__).'/css/simple-contact-form.css',
         array(), 
         1, 
        'all'
    );
    }

    public function load_shortcode(){
		?>
        <div>
            <form  method="post" >
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
			<div>
			<label for="remarque">Remarque:</label>
				<textarea name="remarque" id="remarque"></textarea>
			</div>
            <br>
            <input type="hidden" name="id" value="<?php echo get_the_ID()?>">
			<button name="submit" type="submit">add</button>
		</form>
		</div>
		<?php
	}
}
new SimpleContactForm;
