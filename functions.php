<?php
function breadcrumb(){
	global $post;
	$str ='';
	if(!is_home()&&!is_admin()){ /* !is_admin は管理ページ以外という条件分岐 */
		$str.= '<ol id="topicpath">';
		$str.= '<li class="home"><a href="'. home_url() .'/">ホーム</a></li>';
		
		if(is_search()){
			$str.='<li>「'. get_search_query() .'」で検索した結果</li>';
		} elseif(is_tag()){
			$str.='<li>タグ : '. single_tag_title( '' , false ). '</li>';
		} elseif(is_404()){
			$str.='<li>404 Not found</li>';
		} elseif(is_date()){
			if(get_query_var('day') != 0){
				$str.='<li><a href="'. get_year_link(get_query_var('year')). '">' . get_query_var('year'). '年</a></li>';
				$str.='<li>&gt;</li>';
				$str.='<li><a href="'. get_month_link(get_query_var('year'), get_query_var('monthnum')). '">'. get_query_var('monthnum') .'月</a></li>';
				$str.='<li>&gt;</li>';
				$str.='<li>'. get_query_var('day'). '日</li>';
			} elseif(get_query_var('monthnum') != 0){
				$str.='<li><a href="'. get_year_link(get_query_var('year')) .'">'. get_query_var('year') .'年</a></li>';
				$str.='<li>&gt;</li>';
				$str.='<li>'. get_query_var('monthnum'). '月</li>';
			} else {
				$str.='<li>'. get_query_var('year') .'年</li>';
			}
		} elseif(is_category()) {
			$cat = get_queried_object();
			if($cat -> parent != 0){
				$ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
				foreach($ancestors as $ancestor){
					$str.='<li><a href="'. get_category_link($ancestor) .'">'. get_cat_name($ancestor) .'</a></li>';
				//	$str.='<li>&gt;</li>';
				}
			}
			$str.='<li>'. $cat -> name . '</li>';
		} elseif(is_author()){
			$str .='<li>投稿者 : '. get_the_author_meta('display_name', get_query_var('author')).'</li>';
		} elseif(is_page()){
			if($post -> post_parent != 0 ){
				$ancestors = array_reverse(get_post_ancestors( $post->ID ));
				foreach($ancestors as $ancestor){
					$str.='<li><a href="'. get_permalink($ancestor).'">'. get_the_title($ancestor) .'</a></li>';
				//	$str.='<li>&gt;</li>';
				}
			}
			$str.= '<li>'. $post -> post_title .'</li>';
			
		} elseif(is_attachment()){
			if($post -> post_parent != 0 ){
				$str.= '<li><a href="'. get_permalink($post -> post_parent).'">'. get_the_title($post -> post_parent) .'</a></li>';
			//	$str.='<li>&gt;</li>';
			}
			$str.= '<li>' . $post -> post_title . '</li>';
		} elseif(is_single()){
			$categories = get_the_category($post->ID);
			$cat = $categories[0];
			if($cat -> parent != 0){
				$ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
				foreach($ancestors as $ancestor){
					$str.='<li><a href="'. get_category_link($ancestor).'">'. get_cat_name($ancestor). '</a></li>';
				//	$str.='<li>&gt;</li>';
				}
			}
			$str.='<li><a href="'. get_category_link($cat -> term_id).'">'. $cat-> cat_name . '</a></li>';
			$str.= '<li><em>'. $post -> post_title .'</em></li>';
		} else{
			$str.='<li>'. wp_title('', false) .'</li>';
		}
		$str.='</ol>';
	}
	echo $str;
}

//アイキャッチ
add_theme_support('post-thumbnails');
set_post_thumbnail_size('thumbnails');
add_image_size('news',150,150,true);
//add_image_size('news',300,185,true);

//概要
function new_excerpt_more($post) {
	return '<a href="'. get_permalink($post->ID) . '">' . '...' . '</a>';	
}	
add_filter('excerpt_more', 'new_excerpt_more');

// Register Sidebar
function custom_sidebar() {

	$args = array(
		'id'            => 'sidebar-aside',
		'name'          => __( 'Secondary Widget Area', 'text_domain' ),
		'description'   => __( 'Aside Widgets.', 'text_domain' ),
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	);
	register_sidebar( $args );

}

// Hook into the 'widgets_init' action
add_action( 'widgets_init', 'custom_sidebar' );

?>