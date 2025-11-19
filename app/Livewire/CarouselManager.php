<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

class CarouselManager extends Component
{
    use WithFileUploads, Toast;

    public $carousels = [];
    public $showModal = false;
    public $isEdit = false;
    public $slide_id;
    public $image_path, $title, $description, $url, $url_text, $image;

    private function getSlides()
    {
        if (Storage::disk('public')->exists('carousel/slides.json')) {
            $json = Storage::disk('public')->get('carousel/slides.json');
            $slides = json_decode($json, true);
            return $slides;
        }
        return [];
    }

    private function saveSlides(array $slides)
    {
        Storage::disk('public')->put('carousel/slides.json', json_encode($slides, JSON_PRETTY_PRINT));
    }

    public function mount()
    {
        $this->carousels = $this->getSlides();
    }

    public function create()
    {
        $this->isEdit = false;
        $this->reset(['image_path', 'title', 'description', 'url', 'url_text', 'slide_id', 'image']);
        $this->showModal = true;
    }

    public function edit($id)
    {
        $slide = collect($this->carousels)->firstWhere('id', $id);
        if ($slide) {
            $this->slide_id = $id;
            $this->image_path = $slide['image_path'];
            $this->title = $slide['title'];
            $this->description = $slide['description'];
            $this->url = $slide['url'];
            $this->url_text = $slide['url_text'];
            $this->isEdit = true;
            $this->showModal = true;
            $this->image = null;
        }
    }

    public function save()
    {
        $slides = $this->getSlides();
        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'url' => $this->url,
            'url_text' => $this->url_text,
        ];

        if ($this->image) {
            // Delete old image if it exists
            if ($this->isEdit && $this->image_path) {
                Storage::disk('public')->delete($this->image_path);
            }
            $imageName = time() . '-' . Str::random(8) . '.' . $this->image->getClientOriginalExtension();
            $data['image_path'] = $this->image->storeAs('carousel', $imageName, 'public');
        } else {
            $data['image_path'] = $this->image_path;
        }

        if ($this->isEdit) {
            $index = collect($slides)->search(fn($s) => $s['id'] == $this->slide_id);
            if ($index !== false) {
                $slides[$index] = array_merge($slides[$index], $data);
            }
        } else {
            $data['id'] = (string) Str::uuid();
            $slides[] = $data;
        }

        $this->saveSlides($slides);
        $this->carousels = $this->getSlides();
        $this->showModal = false;
        $this->success('Slide saved successfully.');
    }

    public function delete($id)
    {
        $slides = $this->getSlides();
        $index = collect($slides)->search(fn($s) => $s['id'] == $id);

        if ($index !== false) {
            // Delete image from storage
            if (!empty($slides[$index]['image_path'])) {
                Storage::disk('public')->delete($slides[$index]['image_path']);
            }
            array_splice($slides, $index, 1);
            $this->saveSlides($slides);
            $this->carousels = $this->getSlides();
            $this->success('Slide deleted successfully.');
        }
    }

    public function updateOrder($orderedSlides)
    {
        $slides = $this->getSlides();
        $lookup = collect($slides)->keyBy('id');
        $newOrder = [];
        foreach($orderedSlides as $slide) {
            $newOrder[] = $lookup[$slide['value']];
        }

        $this->saveSlides($newOrder);
        $this->carousels = $this->getSlides();
        $this->success('Slides reordered successfully.');
    }


    public function render()
    {
        return view('livewire.carousel-manager');
    }
}
