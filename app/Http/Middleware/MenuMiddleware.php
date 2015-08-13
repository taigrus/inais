<?php

namespace inais\Http\Middleware;

use Closure;
use Caffeinated\Menus\Facades\Menu;


class MenuMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Menu::make('example', function($menu) {
            $menu->add('Home', route('home.index'));
            $menu->add('Usuarios', route('admin.users.index'))->prepend('<span class="glyphicon glyphicon-user"></span>')
                ->append('<b class="caret"></b>');
            $menu->add('Familias', route('bid.familias.index'));
            $menu->add('Contact Me', '/contact-me');
            $menu->contactMe->add('Submenu', '/home');
        });

        return $next($request);
    }
}
