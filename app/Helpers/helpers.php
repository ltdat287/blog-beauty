<?php
/**
 * Return sizes readable by humans
 */
function human_filesize($byte, $decimals = 2)
{
    $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
    $factor = floor((strlen($byte) - 1) / 3);

    return sprintf("%.{$decimals}f", $byte / pow(1024, $factor)) . @$size[$factor];
}


function is_image($mimeType)
{
    return starts_with($mimeType, 'image/');
}
