<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Fontawesome
{

    public function output($icon)
    {
        if (!empty($icon)) {
            return '<div class="fa ' . $icon . '"></div>';
        }
        return $icon;
    }
}