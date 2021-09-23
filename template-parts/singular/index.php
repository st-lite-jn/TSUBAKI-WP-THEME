
<?php require TEMPLATEPATH . "/template-parts/components/header.php";?>
<div class="l-container u-mt--40 <?php if(is_single()):?>l-col<?php endif;?>">
    <div class="l-col-wide">
        <?php if ( have_posts() ): ?>
            <?php while( have_posts() ): the_post(); ?>
            <div class="p-content-block">
                <?php the_content();?>
                <?php
                    //ページ区切り
                    wp_link_pages(
                        array(
                        'before'   => '<nav class="p-content-block__pages" aria-label="' . esc_attr__( 'ページ', 'tsubaki' ) . '">',
                        'after'    => '</nav>',
                        /* translators: %: Page number. */
                        'pagelink' => esc_html__( 'ページ %', 'tsubaki' ),
                        )
                    );
                ?>
            </div>
            <?php require __DIR__ . "/footer.php";?>
            <?php if(is_single()) require TEMPLATEPATH .'/template-parts/components/prev-next.php'; ?>
            <?php endwhile;?>
        <?php endif; ?>
    </div>
    <!-- // l-col-wide -->
    <?php if(is_single()) get_sidebar(); ?>
</div>

