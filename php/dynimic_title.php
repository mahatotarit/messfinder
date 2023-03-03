<?php
$URL_PATH = $_SERVER['REQUEST_URI'];
$PAGE_FILE = explode('/', $URL_PATH);
$PAGE_NAME = end($PAGE_FILE);
$FIRST_PAGE = explode('.', $PAGE_NAME);
$TITLE = $FIRST_PAGE[0];
echo "<title>" . $TITLE . "</title>";
?>

<!-- dynimic title -->