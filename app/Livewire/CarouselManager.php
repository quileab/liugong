<?php

namespace App\Livewire;

use App\Models\Carousel;
use Livewire\Component;
use Livewire\WithFileUploads;

class CarouselManager extends Component
{
    use WithFileUploads;

    public $carousels;
    public $showModal = false;
    public $isEdit = false;
    public $slide_id;
    public $image_path, $title, $description, $url, $url_text, $order, $image;

    public function mount()
    {
        $this->carousels = Carousel::orderBy('order')->get();
    }

    public function create()
    {
        $this->isEdit = false;
        $this->reset(['image_path', 'title', 'description', 'url', 'url_text', 'order', 'slide_id', 'image']);

        $maxOrder = Carousel::max('order');
        $this->order = $maxOrder ? $maxOrder + 1 : 1;

        $this->showModal = true;
    }

    public function edit($id)
    {
        $slide = Carousel::findOrFail($id);
        $this->slide_id = $id;
        $this->image_path = $slide->image_path;
        $this->title = $slide->title;
        $this->description = $slide->description;
        $this->url = $slide->url;
        $this->url_text = $slide->url_text;
        $this->order = $slide->order;
        $this->isEdit = true;
        $this->showModal = true;
        $this->image = null; // Clear the image input
    }

    public function save()
    {
        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'url' => $this->url,
            'url_text' => $this->url_text,
            'order' => $this->order,
        ];

        if ($this->image) {
            $data['image_path'] = $this->image->store('carousels', 'public');
        } else {
            $data['image_path'] = $this->image_path;
        }

        if ($this->isEdit) {
            Carousel::find($this->slide_id)->update($data);
        } else {
            Carousel::create($data);
        }

        $this->showModal = false;
        $this->carousels = Carousel::orderBy('order')->get();
    }

    public function delete($id)
    {
        Carousel::destroy($id);
        $this->carousels = Carousel::orderBy('order')->get();
    }

    public function render()
    {
        return view('livewire.carousel-manager');
    }
}
