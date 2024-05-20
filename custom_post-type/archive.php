<?php
get_header(); // Include the header template

// Main content area
?>

<div class="container">
    <main id="main-content" class="main-content">
        <header class="page-header">
            <h1 class="page-title">
                <?php
                if (is_category()) {
                    single_cat_title();
                } elseif (is_tag()) {
                    single_tag_title();
                } elseif (is_author()) {
                    the_post();
                    echo 'Author Archives: ' . get_the_author();
                    rewind_posts();
                } elseif (is_day()) {
                    echo 'Daily Archives: ' . get_the_date();
                } elseif (is_month()) {
                    echo 'Monthly Archives: ' . get_the_date('F Y');
                } elseif (is_year()) {
                    echo 'Yearly Archives: ' . get_the_date('Y');
                } else {
                    echo 'Archives';
                }
                ?>
            </h1>
        </header>

        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h2 class="entry-title">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <div class="entry-meta">
                            <span class="posted-on">
                                Posted on <?php echo get_the_date(); ?>
                            </span>
                        </div>
                    </header>

                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>

                    <footer class="entry-footer">
                        <span class="cat-links">
                            Categories: <?php the_category(', '); ?>
                        </span>
                    </footer>
                </article>
                <?php
            endwhile;
            ?>
            <div class="pagination">
                <?php
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => '&laquo; Previous',
                    'next_text' => 'Next &raquo;',
                ));
                ?>
            </div>
            <?php
        else :
            ?>
            <p>No content found.</p>
            <?php
        endif;
        ?>
    </main>
</div>

<?php
get_sidebar(); // Include the sidebar template
get_footer(); // Include the footer template
