<?php
add_action('wp_enqueue_scripts', function() {

    // Charger le CSS du parent réel (bloglo)
    wp_enqueue_style(
        'bloglo-style',
        get_template_directory_uri() . '/style.css'
    );

    // Charger le CSS du parent intermédiaire (blogvi-custom)
    wp_enqueue_style(
        'blogvi-custom-style',
        get_stylesheet_directory_uri() . '/../blogvi-custom/style.css',
        ['bloglo-style']
    );

    // Charger le CSS du thème enfant
    wp_enqueue_style(
        'child-style',
        get_stylesheet_uri(),
        ['blogvi-custom-style'],
        wp_get_theme()->get('Version')
    );

}, 20);
// Forcer le favicon Google SERP
add_action('wp_head', function () {
    ?>
    <link rel="icon" href="https://www.horizonsmedia.fr/wp-content/uploads/2026/01/faviconh.png" sizes="512x512" type="image/png">
    <?php
});