<section class="destinations container">

    <h2>Destinos populares</h2>

    <div class="card-grid">

        <?php
        $args = [
            'post_type' => 'post',
            'posts_per_page' => 6
        ];

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
        ?>

            <article class="travel-card">

                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                <?php else: ?>
                    <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470" alt="default">
                <?php endif; ?>

                <div class="card-content">
                    <h3><?php the_title(); ?></h3>
                    <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                </div>

            </article>

        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>

    </div>

</section>