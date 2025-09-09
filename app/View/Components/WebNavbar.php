<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WebNavbar extends Component
{
    public array $links = [];
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->links = [
            [
                'label' => 'Acuña Maquinarias',
                'url' => '/',
                'logo_url' => 'images/SVG/logo-acuna.svg'
            ],
            [
                'label' => 'LiuGong',
                'url' => '/products',
                'logo_url' => 'images/SVG/Logo-LiuGong.svg'
            ],
            [
                'label' => 'Nosotros',
                'url' => '/about',
            ],
            [
                'label' => 'Contacto',
                'url' => '/contact',
            ]
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.web-navbar', [
            'links' => $this->links,
        ]);
    }
}
