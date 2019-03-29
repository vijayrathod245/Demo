<?php
/* Select particular name */

$q = $this->db->query('SELECT age FROM my_users_table WHERE id = ?',array(3));
$data = array_shift($q->result_array());
echo($data['age']);

Or

$this->db->select('age');
$this->db->where('id', '3');
$q = $this->db->get('my_users_table');
// if id is unique, we want to return just one row
$data = array_shift($q->result_array());

echo($data['age']);

Or

// here we select just the age column
$this->db->select('age');
$this->db->where('id', '3');
$q = $this->db->get('my_users_table');
$data = $q->result_array();

echo($data[0]['age']);

Or

$this->db->where('id', '3');
// here we select every column of the table
$q = $this->db->get('my_users_table');
$data = $q->result_array();

echo($data[0]['age']);


/* Last to second record show */

SELECT countryname FROM `country` GROUP BY countryname DESC LIMIT 1 OFFSET 1
  
/* Display only india record */
select name from tablename where name in ('india');

/* 1 to 10 id show */
select * from tablename where id between 1 and 10;




<img class="w-2r bdrs-50p" src="<?php echo base_url()?>image/<?php
					$id=$this->session->userdata('admin');
					$logtype=$this->session->userdata('logtype'); 	
					if($logtype=='admin'){
						$this->db->select('image');
						$this->db->where('id',$id);
						$qry_sel=$this->db->get('admin');
						$arr=$qry_sel->row_array();
						echo($arr['image']);
					}else{
						$this->db->select('image');
						$this->db->where('id',$id);
						$qry_sel=$this->db->get('user');
						$arr=$qry_sel->row_array();
						echo($arr['image']);
					}?>" alt="">
					
                  </div>
                  <div class="peer">
                    <span class="fsz-sm c-grey-900">
						<?php 
					$id=$this->session->userdata('admin');
					$logtype=$this->session->userdata('logtype');	
					if($logtype=='admin'){
						$this->db->select('name');
						$this->db->where('id',$id);
						$qry_sel=$this->db->get('admin');
						$arr=$qry_sel->row_array();
						echo($arr['name']);
					}else{
						$this->db->select('fullname');
						$this->db->where('id',$id);
						$qry_sel=$this->db->get('user');
						$arr=$qry_sel->row_array();
						echo($arr['fullname']);
					}?>
                    </span>



/* Wordpress show perent and child category */

<?php
/**
 * 
 */

/**
 * Define Constants
 */

/**
 * Enqueue styles
 */

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

add_shortcode('show_sub_category_list', 'load_sub_category_function');

function load_sub_category_function() {
	ob_start();
	$category = get_queried_object();
	?>
	<div class="row">
	<?php
		if ($category->parent == 0) {
			$categories = get_categories( array( 'parent' => $category->cat_ID,'hide_empty' => false ) ); 
		    foreach ( $categories as $category ) {
	?>
		        <div class="col-md-4">
		        	<a href="<?php echo get_category_link($category->term_id) ?>">
			        	<div class="category-box">
				        	<div class="title">
				        		<?php echo $category->cat_name; ?>
				        	</div>
				        	<div class="icon">
				        		<img src="<?php echo z_taxonomy_image_url($category->term_id); ?>" />
				        	</div>
			        	</div>
		        	</a>
		        </div>
    <?php
		    }
		} else { 
			$categories = get_categories( array( 'parent' => $category->parent,'hide_empty' => false ) );
			?>
			<div class="col-md-12 mb-4">
				<div class="category-dropdown">
					<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
						<?php 
							foreach ($categories as $subcategory):
								echo '<option '. (($category->cat_ID == $subcategory->term_id) ? 'selected' : '') .' value="'. get_category_link($subcategory->term_id) .'">'. $subcategory->cat_name .'</option>';
							endforeach;
						?>
					</select>
				</div>
			</div>
			<?php

			$posts = get_posts( array('category' => $category->cat_ID) );
			echo '<div class="post-lists"><ul>';
			foreach ( $posts as $post ) :
			?>
				<li>
					<a href="<?php the_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a>	
				</li>
			<?php
			endforeach; 
			echo '</ul></div>';
		}
    ?>
	</div>
    <?php
    return ob_get_clean();
}

add_shortcode('header_category_dropdown', 'load_header_category_function');

function load_header_category_function() {
	$active_category = get_queried_object();
	$categories = get_categories( array( 'parent' => 0,'hide_empty' => false, 'orderby' => 'id', 'exclude' => array(1) ) );  
    ?>
		<div class="header-category-dropdown">
			<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
				<?php
					foreach ($categories as $category):
						echo '<option '. (($active_category->term_id == $category->cat_ID || $active_category->parent == $category->cat_ID) ? 'selected' : '') .' value="'. get_category_link($category->term_id) .'">'. $category->cat_name .'</option>';
					endforeach;
				?>
			</select>
		</div>
	<?php
}

add_action('wp_enqueue_scripts', 'hook_bootstrap');

function hook_bootstrap() {
	wp_enqueue_style( 'bootstrap-style', get_stylesheet_directory_uri() . '/bootstrap.css' );
}

?>

