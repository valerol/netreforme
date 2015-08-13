<?php

if ( ! function_exists( 'netreforme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Twenty Fifteen 1.0
 */
function netreforme_setup() {
	
	load_theme_textdomain( 'netreforme', get_template_directory() . '/languages' );

	register_nav_menus( array(
    'top' => __( 'Верхнее меню', 'netreforme' )
	) );

}
endif; // netreforme_setup
add_action( 'after_setup_theme', 'netreforme_setup' );

//Отключаем скрипты и стили по умолчанию, подключаем минифицированые и пользовательские
function netreforme_styles() {
	wp_enqueue_style( 'nr-minify-styles', '/min/?f=wp-content/themes/netreforme/style.css,wp-content/themes/netreforme/css/fonts.css,wp-includes/css/dashicons.css,wp-includes/css/admin-bar.css,wp-content/plugins/contact-form-7/includes/css/styles.css,wp-content/plugins/tag-or-category-term-group-order/lib/style.css,wp-content/plugins/ns-category-widget/public/assets/css/themes/default/style.css' );
	
	wp_dequeue_style( 'ns-category-widget-tree-style' );
	wp_dequeue_style( 'open-sans' );
	wp_dequeue_style( 'dashicons' );
	wp_dequeue_style( 'admin-bar' );
	wp_dequeue_style( 'contact-form-7' );
	wp_dequeue_style( 'tctgo-style' );
	wp_dequeue_style( 'ns-category-widget-tree-style-css' );
	
	wp_deregister_script( 'jquery' );
	wp_deregister_script( 'jquery-migrate' );
	wp_deregister_script( 'accordion-menu' );
	
}

add_action( 'wp_enqueue_scripts', 'netreforme_styles' );

function netreforme_scripts() {
	wp_enqueue_script( 'nr-minify-scripts', '/min/?f=wp-includes/js/jquery/jquery.js,wp-includes/js/jquery/jquery-migrate.js,wp-content/plugins/accordion-menu/accordion-menu.js' );
	wp_enqueue_script( 'netreforme-script-vk', '//vk.com/js/api/openapi.js' );
		
}
add_action( 'wp_footer', 'netreforme_scripts' );

//Виджеты
function netreforme_widgets_init() {
	
	register_sidebar( array(
		'name'          => __( 'Правая колонка в рамке' ),
		'id'            => 'sidebar',
		'description'   => __( 'Перенесите нужный виджет сюда' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'netreforme_widgets_init' );

//Удаление циклических ссылок
function wp_nav_menu_extended($args = array()) {
    $_echo = array_key_exists('echo', $args) ? $args['echo'] : true;
    $args['echo'] = false;

    $menu = wp_nav_menu($args);

    // Load menu as xml
    $menu = simplexml_load_string($menu);

    // Find current menu item with xpath selector
    if (array_key_exists('xpath', $args)) {
        $xpath = $args['xpath'];
    } else {
        $xpath = '//li[contains(@class, "current-menu-item") or contains(@class, "current_page_item")]';
    }

    $current = $menu->xpath($xpath);

    // If current item exists
    if (!empty($current)) {
        $text_node = (string) $current[0]->children();

        // Remove link
        unset($current[0]->a);

        // Create required element with text from link
        $element_name = $args['replace_a_by'] ? $args['replace_a_by'] : 'span';

        $dom = dom_import_simplexml($current[0]);
        $n = $dom->insertBefore(
            $dom->ownerDocument->createElement($element_name, $text_node),
            $dom->firstChild
        );

        $current[0] = simplexml_import_dom($n);
    }

    $xml_doc = new DOMDocument('1.0', 'utf-8');
    $menu_x = $xml_doc->importNode(dom_import_simplexml($menu), true);
    $xml_doc->appendChild($menu_x);

    $menu = $xml_doc->saveXML($xml_doc->documentElement);

    if ($_echo) {
        echo $menu;
    } else {
        return $menu;
    }
}

//Дополнительные поля "Автор" и "Источник"
	// подключаем функцию активации мета блока (my_extra_fields)
add_action('add_meta_boxes', 'my_extra_fields', 1);

function my_extra_fields() {
	add_meta_box( 'extra_fields', 'Дополнительные поля', 'extra_fields_box_func', 'post', 'normal', 'high'  );
}

	// код блока
function extra_fields_box_func( $post ){
	?>	
	<p>Ссылка:
		<input type="text" name="extra[Ссылка]" value="<?php echo get_post_meta($post->ID, 'Ссылка', 1); ?>"></input>
	</p>

	<p>Источник:
		<input type="text" name="extra[Источник]" value="<?php echo get_post_meta($post->ID, 'Источник', 1); ?>"></input>
	</p>
	
	<p>Автор:
		<input type="text" name="extra[Автор]" value="<?php echo get_post_meta($post->ID, 'Автор', 1); ?>"></input>
	</p>

	<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
	<?php
}

	// включаем обновление полей при сохранении
add_action('save_post', 'my_extra_fields_update', 0);

	/* Сохраняем данные, при сохранении поста */
function my_extra_fields_update( $post_id ){
	if ( !wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__) ) return false; // проверка
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false; // если это автосохранение
	if ( !current_user_can('edit_post', $post_id) ) return false; // если юзер не имеет право редактировать запись

	if( !isset($_POST['extra']) ) return false;	

	// Все ОК! Теперь, нужно сохранить/удалить данные
	$_POST['extra'] = array_map('trim', $_POST['extra']);
	foreach( $_POST['extra'] as $key=>$value ){
		if( empty($value) ){
			delete_post_meta($post_id, $key); // удаляем поле если значение пустое
			continue;
		}

		update_post_meta($post_id, $key, $value); // add_post_meta() работает автоматически
	}
	return $post_id;
}

function replace_text($text) {
  $text = str_replace('href="http://', 'href="/away.php?page=http://', $text);
  $text = str_replace('href="/away.php?page=http://'.$_SERVER['SERVER_NAME'], 'href="', $text);
  return $text;
}
add_filter('the_content', 'replace_text');
add_filter('comment_text', 'replace_text');

//Разрешенные теги в редакторе
function override_mce_options($initArray) {
	$opts = 'html,head,body,div[!class<mceTemp],p[-style],img[src|alt|title|class|width|height],br,a[*],table[*],tbody[*],tr[*],td[*],th[*],h1,h2,h3,h4,ul,ol,li,b,strong,i,em,dl[*],dt[*],dd[*]';
	$initArray['valid_elements'] = $opts;	
	$initArray['extended_valid_elements'] = $opts;
	return $initArray;
}
add_filter('tiny_mce_before_init', 'override_mce_options');

//Размер шрифта в виджете тегов
function nr_widget_tagcloud_args() {
	$args = array(
			'smallest' => 0.7, 
			'largest'  => 1.6, 
			'unit'     => 'em',
		);
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'nr_widget_tagcloud_args' );

//Ссылка на комментарии к посту
/*function my_comment_form_before() {
    echo '<a name="comments"></a>';
}
add_action( 'comment_form_before', 'my_comment_form_before' );*/

//Отключаем смайлики вместе со скриптами и стилями
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

//СПИСОК ВСЕХ «ХУКНУТЫХ» ФУНКЦИЙ
function list_hooked_functions($tag=false){
 global $wp_filter;
 if ($tag) {
  $hook[$tag]=$wp_filter[$tag];
  if (!is_array($hook[$tag])) {
  trigger_error("Nothing found for '$tag' hook", E_USER_WARNING);
  return;
  }
 }
 else {
  $hook=$wp_filter;
  ksort($hook);
 }
 echo '<pre>';
 foreach($hook as $tag => $priority){
  echo "<br />&gt;&gt;&gt;&gt;&gt;\t<strong>$tag</strong><br />";
  ksort($priority);
  foreach($priority as $priority => $function){
  echo $priority;
  foreach($function as $name => $properties) echo "\t$name<br />";
  }
 }
 echo '</pre>';
 return;
}




