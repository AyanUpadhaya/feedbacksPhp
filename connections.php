<?php

function connect_to_database($servername, $username, $password, $database)
{
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Failed to connect:" . mysqli_connect_error());
    }
    return "connection was successful";
}

function create_database($servername, $username, $password, $name)
{
    $conn = mysqli_connect($servername, $username, $password);
    $query = "CREATE DATABASE feedback";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        throw new Exception('Database already exist');
    } else {
        return "database created successful";
    }

}
function create_table($servername, $username, $password, $database, $tablename)
{
    $conn = mysqli_connect($servername, $username, $password, $database);
    $query = "CREATE TABLE `$database`.`$tablename` (`id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(500) NOT NULL , `comment` VARCHAR(1000) NOT NULL , `date` DATETIME NOT NULL , PRIMARY KEY (`id`))";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        throw new Exception('Table exists');
    } else {
        return "Table created successful";
    }
}

function create_feedback($servername, $username, $password, $database, $tablename, $name, $comment)
{
    $conn = mysqli_connect($servername, $username, $password, $database);
    $query = "INSERT INTO `$tablename` (`name`, `comment`) VALUES ('$name', '$comment')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        throw new Exception('Failed to post feedback');
    } else {
        return true;
    }
}

function get_all_feedback($servername, $username, $password, $database, $tablename)
{
    $conn = mysqli_connect($servername, $username, $password, $database);
    $query = "SELECT * FROM `$tablename`";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);
    if (!$result) {
        throw new Exception('Failed to get feedbacks');
    } else {
        return $result;
    }
}

function get_single_feedback($servername, $username, $password, $database, $tablename, $id)
{
    $conn = mysqli_connect($servername, $username, $password, $database);
    $sql = "SELECT * FROM `$tablename` WHERE id ='$id'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    if (!$result) {
        throw new Exception('Failed to get feedback');
    } else {
        return $result;
    }
}

function update_feedback($servername, $username, $password, $database, $tablename, $name, $comment, $id)
{
    $conn = mysqli_connect($servername, $username, $password, $database);
    $sql = "UPDATE `feedbacks` SET `name` = '$name', `comment` = '$comment' WHERE id = '$id'";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    if (!$result) {
        throw new Exception('Failed to update feedback');
    } else {
        return $result;
    }
}
function delete_feedback($servername, $username, $password, $database, $tablename, $id)
{
    $conn = mysqli_connect($servername, $username, $password, $database);
    $sql = "DELETE FROM `$tablename`  WHERE id = '$id'";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    if (!$result) {
        throw new Exception('Failed to delete feedback');
    } else {
        return $result;
    }
}