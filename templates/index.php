<div class="wrap">
    <h1>Flour Heart Menu Settings Page</h1>
    
    <?php settings_errors(); ?>

    <form method="post" action="options.php">
        <?php
            settings_fields( 'flour_heart_options_group' );
            do_settings_sections( 'flour_heart_menu_plugin' );
            submit_button();
        ?>
    </form>

</div>
