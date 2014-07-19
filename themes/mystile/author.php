<?php get_header(); ?>

<div id="content" class="narrowcolumn">

<!-- This sets the $curauth variable -->

    <?php
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    ?>

    <div style="float: left; width: 250px; border-radius: 50%;"><?php echo get_avatar( get_the_author_meta( 'ID' ), 150 ); ?></div> 
        <h1><?php the_author() ?></h1>
    <dl>
        <dt>Website</dt>
        <dd><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></dd>
        <dt>Profile</dt>
        <dd><?php echo $curauth->user_description; ?></dd>
    </dl>
 
<?php
    $args = array(
    'author'     =>  $author_id,
    'post_type'  => 'product'
);

$author_posts = get_posts( $args );?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>