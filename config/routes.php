<?php
return array(
    'admin/add-([0-9]+)'     => 'adminItem/additem/$1',
    'admin/item/add'         => 'adminItem/add',
    'admin/item'             => 'adminItem/index',
    'admin/category/additem' => 'adminCategory/addItem',
    'admin/category/add'     => 'adminCategory/add',
    'admin/category'         => 'adminCategory/index',
    'admin/login'            => 'admin/login',
    'admin/exit'             => 'admin/exit',
    'admin'                  => 'admin/index',
    'search/page-([0-9]+)'   => 'search/item/$1',
    'search'                 => 'search/item',
    'ajax'                   => 'sortAJAX/ajax',
    'sortAJAX'               => 'site/sort',
    'item/([0-9]+)/([0-9]+)' => 'item/index/$1/$2',
    'category/([0-9]+)/page-([0-9]+)' => 'category/index/$1/$2',
    'category/([0-9]+)'      => 'category/index/$1',
    '([A-Z]{3})'             => 'site/currency/$1',
    ''                       => 'site/index'
);