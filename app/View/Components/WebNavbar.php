<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WebNavbar extends Component
{
    public array $menus;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
                $this->menus = [
            [
                'name' => 'Acuña',
                'url' => '/',
                'image' => true,
                'logo' => 'logo_acuna'
            ],
            [
                'name' => 'LiuGong',
                'url' => '/about',
                'image' => true,
                'logo' => 'logo_liugong'
            ],
            [
                'name' => 'Usados',
                'url' => '/used'
            ],
            [
                'name' => 'Contactos',
                'url' => '/contact'
            ],
            
            // [
            //     'name' => 'Services',
            //     'url' => '/services'
            // ],
            // [
            //     'name' => 'Blog',
            //     'url' => '/blog'
            // ]
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.web-navbar');
    }
}