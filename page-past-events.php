<?php get_header(); 
    page_banner( array(
        'title' => 'Past Events',
        'subtitle' => 'A recap of our past events.'
    ) );
    ?>

    <div class="container container--narrow page-section">
        <?php
            $eventPosts = new WP_Query( array(
              'post_type' => 'event',
              'paged' => get_query_var( 'paged', 1 ),
              'meta_key' => 'event_date',
              'orderby' => 'meta_value_num',
              'order' => 'ASC',
              'meta_query' => array(
                array(
                  'key' => 'event_date',
                  'compare' => '<',
                  'value' => date( 'Ymd' ),
                  'type' => 'numeric'
                )
              )
            ) );
            while($eventPosts->have_posts()) {
                $eventPosts->the_post();
                get_template_part('template-parts/content', 'event');
                }
            echo paginate_links( array(
                'total' => $eventPosts->max_num_pages
            ) )
        ?>
    </div>

<?php get_footer(); ?>