<?php
if (isset($_SESSION['errorMessage'])) {
    $errorMessage = $_SESSION['errorMessage'];
    echo '<div class="alert alert-danger">' . $errorMessage . '</div>';
    unset($_SESSION['errorMessage']);
}

if (isset($_SESSION['successMessage'])) {
    $successMessage = $_SESSION['successMessage'];
    echo '<div class="alert alert-success">' . $successMessage . '</div>';
    unset($_SESSION['successMessage']);
}
