<?php

function getFileNameFromUrl()
{
    return basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
}

function isActivePath($path)
{
    $currentPath = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);

    // If the current path is empty or '/', set it to 'index.php'
    if ($currentPath === '' || $currentPath === '/') {
        $currentPath = 'index.php';
    }

    return ($path == $currentPath) ? true : false;
}

function getTitle()
{
    $currentPath = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
    if ($currentPath === 'index.php' || $currentPath === 'feedbacks') {
        return 'Home';
    } else if ($currentPath === 'feedbacks.php') {
        return 'Feedbacks';
    } else {
        return 'App';
    }
}


function ehllo()
{
    return "ehllo";
}

?>