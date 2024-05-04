<?php require 'connections.php'; ?>
<?php require 'partials/_dbconfig.php'; ?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST["name"];
    $comment = $_POST["comment"];
    try {
        $create_feedback_status = create_feedback($servername, $username, $password, $database, $tablename, $name, $comment);
        header("Location:feedbacks.php");
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }

}
; ?>


<?php require 'partials/header.php'; ?>
<?php require 'partials/navbar.php'; ?>
<div class="container p-3">
    <h3 class="text-center mb-3">Feedback Project</h3>
    <div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Your name">
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">Your Feedback</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-dark">Add Feedback</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<?php require 'partials/footer.php'; ?>