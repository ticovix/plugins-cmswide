<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Fontawesome
{

    public function output($icon, $field, $fields, $page)
    {
        if (!empty($icon) && $page == 'search') {
            return '<div class="fa ' . $icon . '"></div>';
        }

        return $icon;
    }
}