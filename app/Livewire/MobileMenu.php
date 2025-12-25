<?php

namespace App\Livewire;

use Livewire\Component;

class MobileMenu extends Component
{
    public $isOpen = false;

    protected $listeners = ['toggleMobileMenu' => 'toggleMenu'];

    public function toggleMenu()
    {
        $this->isOpen = !$this->isOpen;
        $this->dispatchBrowserEvent('menuStateChanged', ['isOpen' => $this->isOpen]);
    }
    
    public function openMenu()
    {
        $this->isOpen = true;
        $this->dispatchBrowserEvent('menuStateChanged', ['isOpen' => true]);
    }
    
    public function closeMenu()
    {
        $this->isOpen = false;
        $this->dispatchBrowserEvent('menuStateChanged', ['isOpen' => false]);
    }

    public function render()
    {
        return view('livewire.mobile-menu');
    }
}