<?php require 'connections.php'; ?>
<?php require 'partials/_dbconfig.php'; ?>
<?php
$id = isset($_GET['id']) ? $_GET['id'] : null;


$results = get_single_feedback($servername, $username, $password, $database, $tablename, $id);
$feedback = $results->fetch_assoc() || null;

if (!$feedback) {
    echo "Feedback not found";
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST["name"];
    $comment = $_POST["comment"];
    try {
        $update_feedback_status = update_feedback($servername, $username, $password, $database, $tablename, $name, $comment, $id);
        header("Location:feedbacks.php");
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }

}
; ?>


<?php
require 'partials/header.php';

$results = get_single_feedback($servername, $username, $password, $database, $tablename, $id);
$feedback = $results->fetch_assoc(); // Fetch a single row as an associative array

// Check if feedback exists
if (!$feedback) {
    echo "Feedback not found";
    exit;
}

?>
<?php require 'partials/navbar.php'; ?>
<div class="container p-3">
    <h3 class="text-center mb-3">Edit Feedback</h3>
    <div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . "?id= $id"; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input value="<?= $feedback['name'] ?>" type="text" class="form-control" id="name" name="name"
                    placeholder="Your name">
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">Your Feedback</label>
                <textarea class="form-control" id="comment" name="comment"
                    rows="3"> <?= $feedback['comment'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-dark">Update Feedback</button>

        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<?php require 'partials/footer.php'; ?>