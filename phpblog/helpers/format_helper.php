<?php
/*
 * Format the Date
 */
function formatDate($date) {
    return date('F j, Y, g:i a', strtotime($date));
}

/*
 * 
 */
function shortenText($text, $chars = 450) {
    $text = $text . " ";
    $text = substr($text, 0, $chars);
    $text = substr($text, 0, strrpos($text, ' '));//to make sure that the text dosent cutofin the middle of a word
    $text = $text . "...";
    return $text;
}