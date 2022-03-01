<?php
class custom_menu extends Walker_Nav_menu
{
	/**
	 * Starts the list before the elements are added.
	 *
	 * @since 3.0.0
	 *
	 * @see Walker::start_lvl()
	 *
	 * @param string   $output Used to append additional content (passed by reference).
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function start_lvl(&$output, $depth = 0, $args = null)
	{
		if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = str_repeat($t, $depth);

		// Default class.
		$classes = ($depth > 0) ? array('dropdown-menu dropdown-submenu') : array('dropdown-menu');
		$attribute_ul_menu = array('aria-labelledby="navbarDropdownMenuLink"');
		$attr_ul = join(" ", $attribute_ul_menu);
		/**
		 * Filters the CSS class(es) applied to a menu list element.
		 *
		 * @since 4.8.0
		 *
		 * @param string[] $classes Array of the CSS classes that are applied to the menu `<ul>` element.
		 * @param stdClass $args    An object of `wp_nav_menu()` arguments.
		 * @param int      $depth   Depth of menu item. Used for padding.
		 */
		$class_names = implode(' ', apply_filters('nav_menu_submenu_css_class', $classes, $args, $depth));
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

		$output .= "{$n}{$indent}<ul$class_names $attr_ul>{$n} ";
	}

	/**
	 * Ends the list of after the elements are added.
	 *
	 * @since 3.0.0
	 *
	 * @see Walker::end_lvl()
	 *
	 * @param string   $output Used to append additional content (passed by reference).
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function end_lvl(&$output, $depth = 0, $args = null)
	{
		if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent  = str_repeat($t, $depth);
		$output .= "$indent</ul>{$n}";
	}






	public function start_el(&$output, $data_object, $depth = 0, $args = null, $current_object_id = 0)
	{
		// Restores the more descriptive, specific name for use within this method.
		$menu_item = $data_object;

		if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = ($depth) ? str_repeat($t, $depth) : '';

		$classes   = empty($menu_item->classes) ? array() : (array) $menu_item->classes;
		$classes[] = 'menu-item-' . $menu_item->ID;
		$classes[] = 'nav-item';
		$classes[] = ($args->walker->has_children)
			? 'dropdown' : '';
		$classes[] = 'p-3';
		$classes[] = ($menu_item->current || $menu_item->current_item_ancestor) ? "active" : '';

		/**
		 * Filters the arguments for a single nav menu item.
		 *
		 * @since 4.4.0
		 *
		 * @param stdClass $args      An object of wp_nav_menu() arguments.
		 * @param WP_Post  $menu_item Menu item data object.
		 * @param int      $depth     Depth of menu item. Used for padding.
		 */
		$args = apply_filters('nav_menu_item_args', $args, $menu_item, $depth);

		/**
		 * Filters the CSS classes applied to a menu item's list item element.
		 *
		 * @since 3.0.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param string[] $classes   Array of the CSS classes that are applied to the menu item's `<li>` element.
		 * @param WP_Post  $menu_item The current menu item object.
		 * @param stdClass $args      An object of wp_nav_menu() arguments.
		 * @param int      $depth     Depth of menu item. Used for padding.
		 */
		$class_names = implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $menu_item, $args, $depth));
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

		/**
		 * Filters the ID applied to a menu item's list item element.
		 *
		 * @since 3.0.1
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param string   $menu_id   The ID that is applied to the menu item's `<li>` element.
		 * @param WP_Post  $menu_item The current menu item.
		 * @param stdClass $args      An object of wp_nav_menu() arguments.
		 * @param int      $depth     Depth of menu item. Used for padding.
		 */
		// 'menu-item-' . $menu_item->ID
		
		$arr_id_li = array('menu-item-' . $menu_item->ID, "ghadeer", "pro");
		$id_li = join(" ", $arr_id_li);
		$id = apply_filters('nav_menu_item_id', $id_li, $menu_item, $args, $depth);
		$id = $id ? ' id="' . esc_attr($id) . '"' : '';

		$output .= $indent  . '<li' . $id . $class_names . '>';

		$atts           = array();
		$atts['title']  = !empty($menu_item->attr_title) ? $menu_item->attr_title : '';
		$atts['target'] = !empty($menu_item->target) ? $menu_item->target : '';
		if ('_blank' === $menu_item->target && empty($menu_item->xfn)) {
			$atts['rel'] = 'noopener';
		} else {
			$atts['rel'] = $menu_item->xfn;
		}
		// class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"
		// $atts['class'] = in_array("menu-item-has-children",$menu_item->classes)? 'nav-link dropdown-toggle'  : 'nav-link';
		if ($args->walker->has_children) {
			if($depth > 0 ){
				$atts['class'] = 'dropdown-item dropdown-togele';
			}else{
				if($menu_item->current || $menu_item->current_item_ancestor){
					$atts['class'] = 'nav-link dropdown-toggle active' ;
				}else{
					$atts['class'] = 'nav-link dropdown-toggle' ;
				}
			}
			
			
		} else {
			if($depth > 0){
				$atts['class'] = 'dropdown-item ';
			}else{
				if($menu_item->current || $menu_item->current_item_ancestor){
					$atts['class'] = 'nav-link active';
				}else{
					$atts['class'] = 'nav-link';
				}
			}
			
		}
		$atts['id'] = in_array("menu-item-has-children", $menu_item->classes) ? 'navbarDropdownMenuLink'  : '';
		$atts['role'] = in_array("menu-item-has-children", $menu_item->classes) ? 'button'  : '';
		$atts['data-bs-toggle'] = in_array("menu-item-has-children", $menu_item->classes) ? 'dropdown'  : '';

		$atts['href']         = !empty($menu_item->url) ? $menu_item->url : '';
		$atts['aria-current'] = $menu_item->current ? 'page' : '';

		/**
		 * Filters the HTML attributes applied to a menu item's anchor element.
		 *
		 * @since 3.6.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array $atts {
		 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
		 *
		 *     @type string $title        Title attribute.
		 *     @type string $target       Target attribute.
		 *     @type string $rel          The rel attribute.
		 *     @type string $href         The href attribute.
		 *     @type string $aria-current The aria-current attribute.
		 * }
		 * @param WP_Post  $menu_item The current menu item object.
		 * @param stdClass $args      An object of wp_nav_menu() arguments.
		 * @param int      $depth     Depth of menu item. Used for padding.
		 */

		$atts = apply_filters('nav_menu_link_attributes', $atts, $menu_item, $args, $depth);

		$attributes = '';
		foreach ($atts as $attr => $value) {
			if (is_scalar($value) && '' !== $value && false !== $value) {
				$value       = ('href' === $attr) ? esc_url($value) : esc_attr($value);
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		/** This filter is documented in wp-includes/post-template.php */
		$title = apply_filters('the_title', $menu_item->title, $menu_item->ID);

		/**
		 * Filters a menu item's title.
		 *
		 * @since 4.4.0
		 *
		 * @param string   $title     The menu item's title.
		 * @param WP_Post  $menu_item The current menu item object.
		 * @param stdClass $args      An object of wp_nav_menu() arguments.
		 * @param int      $depth     Depth of menu item. Used for padding.
		 */
		$title = apply_filters('nav_menu_item_title', $title, $menu_item, $args, $depth);

		$item_output  = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= ($depth == 0 && in_array("menu-item-has-children", $menu_item->classes))
			? '<b class="caret"></b></a>' : '</a>';
		$item_output .= $args->after;

		/**
		 * Filters a menu item's starting output.
		 *
		 * The menu item's starting output only includes `$args->before`, the opening `<a>`,
		 * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
		 * no filter for modifying the opening and closing `<li>` for a menu item.
		 *
		 * @since 3.0.0
		 *
		 * @param string   $item_output The menu item's starting HTML output.
		 * @param WP_Post  $menu_item   Menu item data object.
		 * @param int      $depth       Depth of menu item. Used for padding.
		 * @param stdClass $args        An object of wp_nav_menu() arguments.
		 */
		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $menu_item, $depth, $args);
	}
	public function end_el(&$output, $data_object, $depth = 0, $args = null)
	{
		if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$output .= "</li>{$n}";
	}
}
