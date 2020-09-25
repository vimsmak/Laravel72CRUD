<?php
namespace App\Http\Livewire;

use App\Album;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class FileUploader extends Component
{
    use WithFileUploads;

    public $photos = [];
    public $image;
    public $albums;

    public function updatedphotos()
    {
        $this->validate([
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024', // 1MB Max
        ]);
    }

    public function save()
    {
        $this->validate([
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024', // 10MB Max
        ]);
        foreach ($this->photos as $photo) {
            //$photo->storePublicly('photos', 's3');
            $image = $photo->storePublicly('public/photos');
            $img = (explode("/", $image));
            Album::create([
            'user_id' => auth()->user()->id,
            'image'   => $img[2],
            ]);
        }
        $this->photos = [];
        session()->flash('message', 'File Uploaded Successfully!');
    }

    public function remove($index)
    {
        array_splice($this->photos, $index, 1);
    }
    public function removeImg($albumId)
    {
        $album = Album::find($albumId);
        $file = 'public/photos'.$album->image;
        //Storage::disk('public/photos')->delete($album->image);
        //Storage::delete($file);
        // unlink(storage_path('app\public\photos'.$album->image));
        unlink(storage_path('app/public/photos/'.$album->image));
        //File::delete('photos/' . $album->image);
        
        $album->delete();
        session()->flash('message', 'Image deleted successfully 😊');
    }

    public function render()
    {
        //$this->albums = Album::all();
        $this->albums = Album::latest()->get();
        return view('livewire.file-uploader');
    }
}