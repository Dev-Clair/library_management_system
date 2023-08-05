<header class="flex fixed-top bg-secondary text-white my-1 py-1">
    <!-- Nav-->
    <nav class="flex-left btn-grp">
        <div class="btn-grp px-2 px-lg-2">
            <a class="btn text-white ml-5 mr-5" onclick="event.preventDefault()" href="/index.php"><strong>Home</strong></a>
            <a class="btn text-white ml-5 mr-5" onclick="event.preventDefault()" href="/about"><strong>About</strong></a>
            <a class="btn text-white ml-5 mr-5" onclick="event.preventDefault()" href="/donations"><strong>Donations</strong></a>
            <a class="btn text-white ml-5 mr-5" onclick="event.preventDefault()" href="/newsletter"><strong>Newsletter</strong></a>
        </div>
    </nav>

    <nav class="flex-right btn-grp">
        <div class="btn-grp px-2 px-lg-2">
            <?php if (!empty($_SESSION['user'])) : ?>
                <a class="btn text-white ml-5 mr-5" onclick="event.preventDefault()" href="/logout"><strong>Log out</strong></a>
            <?php else : ?>
                <a class="btn text-white ml-5 mr-5" onclick="event.preventDefault()" href="/login"><strong>Log in</strong></a>
                <a class="btn text-white ml-5 mr-5" onclick="event.preventDefault()" href="/register"><strong>Register</strong></a>
            <?php endif; ?>
        </div>
    </nav>
</header>

<main class="my-2 pt-3">