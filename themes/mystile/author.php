<?php get_header(); ?>

<div id="content" class="narrowcolumn">
  <div class="main">

  <!-- This sets the $curauth variable -->

    <?php
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    ?>

    <div class="profile-header clearfix">
      <div class="avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?></div>
      <div class="profile-info">
        <h1><?php the_author() ?></h1>
        <p class="website"><a href="<?php echo $curauth->user_url; ?>" target="_blank"><i class="fa fa-laptop"></i>Website</a></p>
        <p class="bio"><?php echo $curauth->user_description; ?></p>
        </dl>
      </div><!-- profile-info -->
    </div><!-- profile-header -->

    <?php
      $args = array(
      'author'     =>  $author_id,
      'post_type'  => 'product'
    );

    $author_posts = get_posts( $args );?>

    <ul class="products">
      <?php
        $args = array(
            'author' => $curauth->ID,
            'post_type' => 'product',
            'posts_per_page' => 12
            );
        $loop = new WP_Query( $args );
        if ( $loop->have_posts() ) {
            while ( $loop->have_posts() ) : $loop->the_post();
                woocommerce_get_template_part( 'content', 'product' );
            endwhile;
        } else {
            echo __( 'No products found' );
        }
        wp_reset_postdata();
      ?>
    </ul><!--/.products-->

  </div><!-- main -->
</div><!-- content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>