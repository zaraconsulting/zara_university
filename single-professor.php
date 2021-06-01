<?php get_header(); ?>

    <?php
        while(have_posts()) {
            the_post();
            page_banner(); ?>
            

            <div class="container container--narrow page-section">
                <!-- <div class="metabox metabox--position-up metabox--with-home-link">
                    <p>
                    <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event'); ?>">
                        <i class="fa fa-home" aria-hidden="true"></i> 
                        Professors Home 
                    </a> 
                        <span class="metabox__main"><?php the_title(); ?></span>
                    </p>
                </div> -->

                <div class="generic-content">
                    <div class="row group">
                        <div class="one-third">
                            <?php the_post_thumbnail('professorPortrait'); ?>
                        </div>
                        <div class="two-thirds">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>


                    
                <?php
                    $relatedPrograms = get_field('related_programs'); 
                    if ( $relatedPrograms ) { ?>
                        <hr class="section-break" />
                        <h2 class="headline headline--medium">Subject(s) Taught</h2>
                        <ul class="link-list min-list">
                            <?php
                                foreach ($relatedPrograms as $program) { ?>
                                    <li>
                                    <a href="<?php echo get_the_permalink( $program ); ?>"><?php echo get_the_title( $program ); ?></a>
                                    </li>
                                <?php }
                            ?>
                        </ul>
                <?php } ?>
            </div>
        <?php }
    ?>

<?php get_footer(); ?>