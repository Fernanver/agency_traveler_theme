<?php
$args = [
    'post_type' => 'post',
    'posts_per_page' => 6
];
$query = new WP_Query($args);
$posts = [];
if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        $posts[] = [
            'title' => get_the_title(),
            'excerpt' => get_the_excerpt(),
            'image' => get_the_post_thumbnail_url(get_the_ID(), 'large') 
                ?: 'https://images.unsplash.com/photo-1501785888041-af3ef285b470'
        ];
    }
}
wp_reset_postdata();
?>
<?php if (!empty($posts)) : ?>
<section class="travel-slider">
    <div class="travel-slider__image">
        <img id="slider-img" src="<?php echo esc_url($posts[0]['image']); ?>">
    </div>
    <div class="travel-slider__content">
        <h2 id="slider-title"><?php echo esc_html($posts[0]['title']); ?></h2>
        <p id="slider-text"><?php echo esc_html($posts[0]['excerpt']); ?></p>
        <div class="slider-buttons">
            <button class="slider-btn" id="prev">←</button>
            <button class="slider-btn" id="next">→</button>
        </div>
    </div>
</section>

<script>
const posts = <?php echo json_encode($posts); ?>;
let index = 0;
let sliderAutoplay;

const img    = document.getElementById("slider-img");
const title  = document.getElementById("slider-title");
const text   = document.getElementById("slider-text");
const elements = [img, title, text];

function update() {
    elements.forEach(el => el.classList.add("is-changing"));
    setTimeout(() => {
        img.src          = posts[index].image;
        title.textContent = posts[index].title;
        text.textContent  = posts[index].excerpt;
        elements.forEach(el => el.classList.remove("is-changing"));
    }, 200);
}

function startSliderAutoplay() {
    sliderAutoplay = setInterval(() => {
        index = (index + 1) % posts.length;
        update();
    }, 8000);
}

function stopSliderAutoplay() {
    clearInterval(sliderAutoplay);
}

document.getElementById("next").addEventListener("click", () => {
    stopSliderAutoplay();
    index = (index + 1) % posts.length;
    update();
    startSliderAutoplay();
});

document.getElementById("prev").addEventListener("click", () => {
    stopSliderAutoplay();
    index = (index - 1 + posts.length) % posts.length;
    update();
    startSliderAutoplay();
});

startSliderAutoplay();
</script>
<?php endif; ?>