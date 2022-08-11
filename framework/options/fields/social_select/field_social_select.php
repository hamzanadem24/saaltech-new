<?php
/**
 * Redux Framework is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Redux Framework is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Redux Framework. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package	 ReduxFramework
 * @subpackage  Field_slides
 * @author	  Luciano "WebCaos" Ubertini
 * @author	  Daniel J Griffiths (Ghost1227)
 * @author	  Dovy Paukstys
 * @version	 3.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Don't duplicate me!
if (!class_exists('ReduxFramework_social_select')) {

	/**
	 * Main ReduxFramework_slides class
	 *
	 * @since	   1.0.0
	 */
	class ReduxFramework_social_select {

		/**
		 * Field Constructor.
		 *
		 * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
		 *
		 * @since	   1.0.0
		 * @access	  public
		 * @return	  void
		 */
		function __construct( $field = array(), $value ='', $parent ) {
		
			$this->parent = $parent;
			$this->field = $field;
			$this->value = $value;
		
		}

		/**
		 * Field Render Function.
		 *
		 * Takes the vars and outputs the HTML for the field in the settings
		 *
		 * @since	   1.0.0
		 * @access	  public
		 * @return	  void
		 */
		public function render() {

			$_iconList = '
				<option value="">Select the Social Media</option>
				<option value="envelope">Mail</option>
				<option value="dribbble">Dribbble</option>
				<option value="flickr">Flickr</option>
				<option value="github">GitHub</option>
				<option value="pinterest">Pinterest</option>
				<option value="twitter">Twitter</option>
				<option value="weibo">Weibo</option>
				<option value="youtube">YouTube</option>
				<option value="foursquare">FourSquare</option>
				<option value="instagram">Instagram</option>
				<option value="renren">RenRen</option>
				<option value="facebook">Facebook</option>
				<option value="google-plus">Google+</option>
				<option value="linkedin">LinkedIn</option>
				<option value="skype">Skype</option>
				<option value="tumblr">Tumblr</option>
				<option value="vimeo-square">Vimeo</option>
				<option value="xing">Xing</option>
				<option value="vk">VK</option>
			';

			echo '<div class="redux-slides-accordion">';

			$x = 0;

			$multi = (isset($this->field['multi']) && $this->field['multi']) ? ' multiple="multiple"' : "";

			if (isset($this->value) && is_array($this->value)) {

				$slides = $this->value;

				foreach ($slides as $slide) {
					
					if ( empty( $slide ) ) {
						continue;
					}

					$defaults = array(
						'title' => '',
						'description' => '',
						'sort' => '',
						'url' => '',
						'image' => '',
						'thumb' => '',
						'attachment_id' => '',
						'height' => '',
						'width' => '',
						'select' => array(),
					);
					$slide = wp_parse_args( $slide, $defaults );

					echo '<div class="redux-slides-accordion-group"><fieldset class="redux-field" data-id="'.$this->field['id'].'"><h3><span class="redux-slides-header">' . $slide['title'] . '</span></h3><div>';

					echo '<ul id="' . $this->field['id'] . '-ul" class="redux-slides-list">';
					$placeholder = (isset($this->field['placeholder']['title'])) ? esc_attr($this->field['placeholder']['title']) : esc_html__( 'Title', 'bomby' );
					echo '<li><input type="text" id="' . $this->field['id'] . '-title_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][title]" value="' . esc_attr($slide['title']) . '" placeholder="'.$placeholder.'" class="full-text slide-title" /></li>';
					$placeholder = (isset($this->field['placeholder']['url'])) ? esc_attr($this->field['placeholder']['url']) : esc_html__( 'URL', 'bomby' );
					echo '<li class="social-icon-receiver"><input type="hidden" id="' . $this->field['id'] . '-url_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][url]" value="' . esc_attr($slide['url']) . '" class="full-text" placeholder="'.$placeholder.'" /></li>';

					echo '<li class="social-icon-changer">
						<select class="social-selector-sel">
							'. $_iconList .'
						</select>
						</li>';

					echo '<li><a href="javascript:void(0);" class="button deletion redux-social-select-remove">' . esc_html__('Delete', 'bomby') . '</a></li>';
					echo '</ul></div></fieldset></div>';
					$x++;
				
				}
			}

			if ($x == 0) {
				echo '<div class="redux-slides-accordion-group"><fieldset class="redux-field" data-id="'.$this->field['id'].'"><h3><span class="redux-slides-header">New Social Icon</span></h3><div>';

				echo '<ul id="' . $this->field['id'] . '-ul" class="redux-slides-list">';
				$placeholder = (isset($this->field['placeholder']['title'])) ? esc_attr($this->field['placeholder']['title']) : esc_html__( 'Title', 'bomby' );
				echo '<li><input type="text" id="' . $this->field['id'] . '-title_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][title]" value="" placeholder="'.$placeholder.'" class="full-text slide-title" /></li>';
				$placeholder = (isset($this->field['placeholder']['url'])) ? esc_attr($this->field['placeholder']['url']) : esc_html__( 'URL', 'bomby' );
				echo '<li class="social-icon-receiver"><input type="hidden" id="' . $this->field['id'] . '-url_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][url]" value="" class="full-text" placeholder="'.$placeholder.'" /></li>';

				echo '<li class="social-icon-changer">
						<select class="social-selector-sel">
							'. $_iconList .'
						</select>
						</li>';

				echo '<li><a href="javascript:void(0);" class="button deletion redux-social-select-remove">' . esc_html__('Delete', 'bomby') . '</a></li>';
				echo '</ul></div></fieldset></div>';
			}
			echo '</div><a href="javascript:void(0);" class="button redux-social-select-add button-primary" rel-id="' . $this->field['id'] . '-ul" rel-name="' . $this->field['name'] . '[title][]">' . esc_html__('Add', 'bomby') . '</a><br/>';
			
		}		 

		/**
		 * Enqueue Function.
		 *
		 * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
		 *
		 * @since	   1.0.0
		 * @access	  public
		 * @return	  void
		 */

		public function enqueue() {

			wp_enqueue_script(
				'redux-field-social-select-js',
				get_template_directory_uri() . '/framework/options/fields/social_select/field_social_select.js',
				array('jquery', 'jquery-ui-core', 'jquery-ui-accordion', 'wp-color-picker'),
				time(),
				true
			);

			wp_enqueue_style(
				'redux-field-social-select-css',
				get_template_directory_uri() . '/framework/options/fields/social_select/field_social_select.css',
				time(),
				true
			);


		}

	}
}
