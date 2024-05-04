<?php require 'connections.php'; ?>
<?php require 'partials/_dbconfig.php'; ?>

<?php require 'partials/header.php'; ?>

<?php

$status = connect_to_database($servername, $username, $password, $database);
$results = get_all_feedback($servername, $username, $password, $database, $tablename);
$feedbacks = $results->fetch_all(MYSQLI_ASSOC);

?>

<?php require 'partials/navbar.php'; ?>

<div class="container-fluid">
    <?php if (empty($feedbacks)): ?>
        <div class="container py-2">
            <p class="fs-2 text-center">No data found.</p>
        </div>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                
                    <th scope="col">Name</th>
                    <th scope="col">Feedback</th>
                    <th scope="col">Date</th>
                    <th class="text-center" scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($feedbacks as $row): ?>
                    <tr>

                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['comment']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <span>
                                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-dark">
                                        <i class="fa-solid fa-pen-to-square" style="color: #fafcff;"></i>
                                    </a>
                                    <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger">
                                        <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                                    </a>
                                </span>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php require 'partials/footer.php'; ?>