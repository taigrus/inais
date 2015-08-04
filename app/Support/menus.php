<?php
/**
 * Created by PhpStorm.
 * User: rburgos
 * Date: 03-08-15
 * Time: 10:26 PM
 */
\Menu::create('navbar', function($menu)
{
    $menu->route(
        'users.show', // route name
        'View Profile', // title
        ['id' => 1], // route parameters
        ['target' => 'blank'] // attributes
    );
});
