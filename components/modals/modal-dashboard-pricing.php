<div id="modal-dashboard-pricing" class="modal">
    <div class="modal-header">
        <h4>Project Pricing</h4> <br>
    </div>

    <?php // Get the total price of the project
    $priceTotal = 0;
    $array = get_field('items');
    setlocale(LC_MONETARY, 'en_US');

    foreach ($array as $item) {
        $priceTotal += $item['price'];
    }

    $formattedPriceTotal = money_format('%(#10n', $priceTotal) . "\n";

    ?>


    <div class="modal-content">
        <?php if (have_rows('items')) : ?>
            <div class="card accent-1 total-price">
                <p class="tag sm success">Total Project Price</p>
                <h2><?php echo $formattedPriceTotal ?></h2>
                <?php if (get_field('payment_terms')) : ?>
                    <h5>Payment Terms</h5>
                    <p class="sm"><?php the_field('payment_terms'); ?></p>
                <?php endif; ?>
            </div>
            <h4>Project Items</h4>
            <ul class="paymentItems">
                <?php while (have_rows('items')) : the_row(); ?>
                    <li>
                        <p><?php the_sub_field('item'); ?></p>
                        <p>$<?php the_sub_field('price'); ?></p>
                    </li>
                <?php endwhile; ?>
            <?php endif; ?>

            </ul>
    </div>
</div>