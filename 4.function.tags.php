<?php

function fn_check_tags($tags)
{
    $html = implode(" ", $tags);

    preg_match_all('#<(?!meta|img|br|hr|input\b)\b([a-z]+)(?: .*)?(?<![/|/ ])>#iU', $html, $open_result);
    $opened_tags = $open_result[1];

    preg_match_all('#</([a-z]+)>#iU', $html, $close_result);
    $closed_tags = $close_result[1];

    $count_open_tags = count($opened_tags);
    $count_closed_tags = count($closed_tags);

    if ($count_closed_tags == $count_open_tags) {
        return true;
    }

    $opened_tags = array_reverse($opened_tags);
    $count_tags = 0;

    for ($i = 0; $i < $count_open_tags; $i++) {
        if (!in_array($opened_tags[$i], $closed_tags)) {
            $count_tags++;
        }
    }

    return ($count_tags) ? false : true;
}