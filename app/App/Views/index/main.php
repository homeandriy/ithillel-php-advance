<?php

view('blocks/header');
?>
    <div class="main">
        <div class="col-md-12 col-sm-12">
            <?php
            view('blocks/navigation', ['href' => '/']); ?>
        </div>
    </div>
<?php
view('blocks/footer');
