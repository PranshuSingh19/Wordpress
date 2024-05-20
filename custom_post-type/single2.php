<?php
get_header(); // Include the header template

// Main content area
?>

<div class="container">
    <main id="main-content" class="main-content">
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title">
                            <?php the_title(); ?>
                        </h1>
                        <div class="entry-meta">
                            <span class="posted-on">
                                Posted on <?php echo get_the_date(); ?>
                            </span>
                        </div>
                    </header>

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>

                    <footer class="entry-footer">
                        <span class="cat-links">
                            Categories: <?php the_category(', '); ?>
                        </span>
                    </footer>
                </article>

                <nav class="post-navigation">
                    <div class="nav-previous">
                        <?php previous_post_link('%link', '&laquo; %title'); ?>
                    </div>
                    <div class="nav-next">
                        <?php next_post_link('%link', '%title &raquo;'); ?>
                    </div>
                </nav>
                <?php
            endwhile;
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
