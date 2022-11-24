<div id="modal-favorites" class="modal">
    <div class="modal-header">
        <h4>My Favorites</h4> <br>
        <?php echo do_shortcode('[clear_favorites_button]'); ?>
    </div>
    <div class="modal-content">
        <?php echo do_shortcode('[user_favorites]'); ?>
    </div>
</div>