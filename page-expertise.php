<?php get_header();  ?>

<div class="main">
  <div class="wrapper clearfix expertise">

    <div class="content">
       <?php // Start the loop ?>
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>

      <?php endwhile; // end the loop?>
<?php

// Get the page as an Object
$expertise_page =  get_page_by_title('Expertise');

  $mypages = get_pages( array( 
    'child_of' => $expertise_page->ID, 
    'sort_column' => 'post_date', 
    'sort_order' => 'desc' )
  );


  foreach( $mypages as $page ) {    
    $content = $page->post_content;
    if ( ! $page) // Check for empty page
      continue;
    $content = apply_filters( 'the_content', $content );
    $excerpt = substr($content, 0,600);
  ?>
    <h3><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></h3>
    <div class="entry"><?php echo $excerpt; ?>&#8230;</div>
    <h4 class="readmore"><a href="<?php echo get_page_link( $page->ID ); ?>">Read More</a></h4>
  <?php
  } 
?>

    </div> <!-- /.content -->

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>