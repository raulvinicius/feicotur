<?php 

//IN CASE OF REWRITE CASH BREAK THIS COMMENTS
//flush_rewrite_rules();

//OR THIS
//global $wp_rewrite;
//$wp_rewrite->flush_rules();


// CUSTOM POST

function codex_custom_init() {
	$labelsFotos = array(
		'name' => _x('Fotos', 'nome plural do tipo de post'),
		'singular_name' => _x('Foto', 'nome singular do tipo de post'),
		'add_new' => _x('Adicionar Foto', 'fotos'),
		'add_new_item' => __('Adicionar Foto'),
		'edit_item' => __('Editar Foto'),
		'new_item' => __('Nova Foto'),
		'all_items' => __('Todas as Fotos'),
		'view_item' => __('Ver Foto'),
		'search_items' => __('Procurar por Foto'),
		'not_found' =>  __('Nenhuma Foto foi encontradas'),
		'not_found_in_trash' => __('Não há Fotos na lixeira'),
		'parent_item_colon' => '',
		'menu_name' => 'Fotos'
	);
	$argsFotos = array(
		'labels' => $labelsFotos,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => false, 
		'hierarchical' => false,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-screenoptions',
		'supports' => array( 'title' ),	
		'taxonomies' => array('tag-edicoes')
	); 
	register_post_type('fotos',$argsFotos);




}
add_action( 'init', 'codex_custom_init' );





add_action('init', 'add_homenageado_url');
function add_homenageado_url()
{
    add_rewrite_rule(
        'fotos/([0-9]+)/?$',
        'index.php?pagename=fotos&category_name=$matches[1]',
        'top'
    );

    // flush_rewrite_rules();
}






add_action( 'init', 'build_taxonomies', 0 );
 
function build_taxonomies() 
{

	register_taxonomy(
	    'tag-edicoes',
	    array('fotos'),
	    array(
	        'hierarchical' => false,
	        'label' => 'Edições',
	        'query_var' => true,
	        'rewrite' => false
	    )
	);

}





// CUSTOM IMAGE SIZE

if ( function_exists( 'add_image_size' ) ) 
{
	add_image_size( 'foto-galeria', 315, 205, true );
}


function get_post_by_type($type, $extra_args = NULL, $order = 'DESC', $per_page = -1, $paged = NULL)
{
	$args = array();
	if (!isset( $paged ) )
	{
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	}

	$args = array();
	if (isset( $extra_args ) )
	{
		$args = $extra_args;
	}

	$args['post_type']			=	$type;
	$args['posts_per_page'] 	=	$per_page;
	$args['paged']			 	=	$paged;
	$args['order']				=	$order;

	return new WP_Query( $args );
}


// ALTERA O COMPORTAMENTO DO TITLE FIELD
function change_default_title( $title ){

    $screen = get_current_screen();

	// ALTERAR O PLACEHOLDER DO TITLE FIELD
    if ( 'depoimentos' == $screen->post_type )
    {
        $title = 'Autor do depoimento';
    }

    // ESCONTE O TITLE FIELD DE POST EDITS DO TIPO PÁGINA
	/*
    if ( 'page' == $screen->post_type )
    {
    ?>
	    <style class="euquero" type="text/css">
	    <!--
	    #post-body-content
	    {
	    	margin-bottom: 0;
	    }
	    #titlediv
	    {
	        display: none;
	    }
	    -->
	    </style>
    <?php
    }
	*/

    return $title;
}

add_filter( 'enter_title_here', 'change_default_title' );


function wp_path_to_js()
{
	echo "
	    <script class='segredo' type=\"text/javascript\">

	        templateUrl = '" . get_bloginfo('template_url') . "/';
	        blogUrl = '" . get_bloginfo('url') . "/';

	    </script>
	";
}

function slugify($text)
{ 
  // replace non letter or digits by -
  $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

  // trim
  $text = trim($text, '-');

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // lowercase
  $text = strtolower($text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  if (empty($text))
  {
    return 'n-a';
  }

  return $text;
}

function pluralize ($num, $plural = 's', $single = '')
{ 
    if ($num == 1) :
    	return $single; 
 	else :
 		return $plural; 
 	endif;
}


// ADICIONA URL ABSOLUTO NO AMBIENTE DE DESENVOLVIMENTO
function completaUrl ($urlAdicional = "")
{
	if($_SERVER['HTTP_HOST'] == "localhost")
	{
		echo get_bloginfo('url') . $urlAdicional;
	}
}

// RETORNA URL ABSOLUTO NO AMBIENTE DE DESENVOLVIMENTO
function get_completaUrl ($urlAdicional = "")
{
	if($_SERVER['HTTP_HOST'] == "localhost")
	{
		return get_bloginfo('url') . $urlAdicional;
	}
}

// ORDENA ARRAYS MULTIDIMENSIONAIS
function array_orderby()
{
    $args = func_get_args();
    $data = array_shift($args);
    foreach ($args as $n => $field) {
        if (is_string($field)) {
            $tmp = array();
            foreach ($data as $key => $row)
                $tmp[$key] = $row[$field];
            $args[$n] = $tmp;
            }
    }
    $args[] = &$data;
    call_user_func_array('array_multisort', $args);
    return array_pop($args);
}

