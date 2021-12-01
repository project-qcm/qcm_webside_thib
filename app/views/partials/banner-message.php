<!-- banner message -->
<?php if (Session::getInstance()->hasFlash()) : ?>
    <?php foreach (Session::getInstance()->getFlash() as $type => $message) : ?>
        <div class="alert alert-<?= $type ?> alert-dismissible fade show">
            <?= $message; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<!-- banner message -->