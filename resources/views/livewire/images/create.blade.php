<?php

use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;
use Illuminate\Support\Facades\Auth;
use Mary\Traits\Toast;
use App\Models\Category;
use App\Models\Image;

new class extends Component {

    use WithFileUploads, Toast;

    #[Rule('required|image|max:2000')]
    public $photo = '';

    #[Rule('required')]
    public string $description = '';

    #[Rule('required|exists:categories,id')]
    public string $category_id = '1';

    #[Rule('boolean')]
    public bool $adult = false;

    public function save()
    {
        // Validation
        $data = $this->validate();

        // // Save image
        // $path = basename($this->photo->store('images', 'public'));

        // // Save thumb
        // $image = InterventionImage::make($this->photo)->widen(500)->encode();
        // Storage::disk('public')->put('thumbs/'.$path, $image);

         // Save image
        $path = basename($this->photo->store('images', 'public'));

        // Save thumb
        $image = InterventionImage::make($this->photo)->widen(500)->encode ();
        Storage::disk('public')->put('thumbs/' . $path, $image);

        // Save in database
        // Auth::user()->images()->create($data + ['name' => $path]);
        $image = new Image;
        $image->description = $data['description'];
        $image->category_id = $data['category_id'];
        $image->adult = $data['adult'];
        $image->name = $path;
        $image->user_id = Auth::id();
        Auth::user()->images()->save($image);
        // $image->save();

        $this->success(__('Image added with success.'), redirectTo: '/images/create');
    }

    public function with(): array
    {
        return [
            'categories' => Category::all()
        ];
    }

}; ?>

<div>
    <x-card class="flex justify-center h-screen tiems-center" title="{{__('Add image')}}">
        <x-form wire:submit="save">
            <x-file wire:model="photo" label="{{__('Image')}}" hint="{{__('Only image')}}" accept="image/png, image/jpeg">
                <img src="{{$photo == '' ? '/ask.jpg' : $photo}}" alt="Photo" class="h-40">
            </x-file>
            <x-select label="{{__('Category')}}" icon="o-tag" :options="$categories" wire:model="category_id" hint="{{__('Choose a pertinent category')}}"/>
            <x-input label="{{__('Description')}}" wire:model="description" hint="{{__('Describe your image here')}}" />
            <x-checkbox label="{{__('Adult content')}}" wire:model="adult" />
            <x-slot:actions>
                <x-button label="{{__('Save')}}" icon="o-paper-airplane" snipper="save" type="submit" class="btn-primary" />
            </x-slot:actions>
        </x-form>
    </x-card>
</div>
