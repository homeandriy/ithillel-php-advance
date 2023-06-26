<?php
/**
 * @var string $href
 */
?>
<ul class="nav nav-pills nav-fill mt-2 mb-10">

    <li class="nav-item">
        <a class="nav-link" href="/">Home</a>
    </li>
    <?php if(!\App\Models\User::auth()): ?>
        <li class="nav-item">
            <a class="nav-link <?php if($href === '/login'): ?>active<?php endif;?>" href="/login">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($href === '/register'): ?>active<?php endif;?>" href="/register">Register</a>
        </li>
    <?php else: ?>
        <li class="nav-item">
            <a class="nav-link" id="logout" href="/logout">Logout</a>
        </li>
    <?php endif; ?>
</ul>
