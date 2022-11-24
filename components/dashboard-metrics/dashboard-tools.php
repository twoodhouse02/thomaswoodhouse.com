<div class="col-filled side-actions margin-b-3x">
            <a class="btn icon tooltip" data-title="Reach Out" href="#modal-help" rel="modal:open"><i class="isax isax-messages-2"></i></a>
            <?php if (get_field('enable_pricing')) : ?>
              <a class="btn icon tooltip" data-title="Project Pricing" href="#modal-dashboard-pricing" rel="modal:open"><i class="isax isax-receipt-text"></i></a>
            <?php endif ?>
            <?php if (get_field('enable_creative_brief')) : ?>
              <a class="btn icon tooltip" data-title="Creative Brief" href="#modal-dashboard-creative-brief" rel="modal:open"><i class="isax isax-brush-square"></i></a>
            <?php endif ?>
            <?php if (get_field('enable_documents')) : ?>
              <a class="btn icon tooltip" data-title="Documents" href="#modal-dashboard-documents" rel="modal:open"><i class="isax isax-document-copy"></i></a>
            <?php endif ?>
            <?php if (get_field('enable_links')) : ?>
              <a class="btn icon tooltip" data-title="Links" href="#modal-dashboard-links" rel="modal:open"><i class="isax isax-link-21"></i></a>
            <?php endif ?>
          </div>