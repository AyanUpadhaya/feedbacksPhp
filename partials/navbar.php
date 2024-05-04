<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="">Feedback</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php echo (isActivePath('index.php')) || (isActivePath('feedbacks')) ? 'active' : '' ?>"
                        aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo (isActivePath('feedbacks.php')) ? 'active' : '' ?>"
                        href="feedbacks.php">Feedbacks</a>
                </li>
            </ul>
            <div class="d-flex flex-end">
                <a href="add.php" class="btn btn-outline-success" type="submit">Add</a>
            </div>
        </div>

    </div>
</nav>