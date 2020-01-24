<?php

function searchCategory($categories, $id) {
    if (!empty($categories) && !empty($id)) {
        foreach ($categories as $category) {
            if ($id == $category['id']) {
                echo $category['title'];
            } elseif (!empty($category['children'])) {
                echo searchCategory($category['children'], $id);
            }
        }
    }
}