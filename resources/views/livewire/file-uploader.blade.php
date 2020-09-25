<div>
<div class="w-full p-20">
    {{-- @error('photos.*') <span class="error">{{ $message }}</span> @enderror --}}
    @php  $err = 0 @endphp
    @error('photos.*')<div class="w-full p-2 mb-2 text-white text-center text-bold rounded shadow-lg"
        style="background-image: linear-gradient( 65.4deg,  rgb(235, 122, 122) -9.1%, rgb(247, 18, 18) 48%,      rgb(241, 71, 71) 111.1% );">{{ $message }}</div> 
        @php  $err = 1 @endphp
    @enderror
    
    <!-- <div wire:loading wire:target="photo">Uploading...</div>
    <div wire:loading wire:target="save">Storing to S3...</div> -->

    @if (session()->has('message'))
    <div class="w-full p-2 mb-2 text-white text-center text-bold rounded shadow-lg"
        style="background-image: linear-gradient( 65.4deg,  rgba(209, 183, 183) -9.1%, rgba(8,243,70,1) 48%, rgba(249,56,152,1) 111.1% );">
        {{ session('message') }}
    </div>
    @endif
       
    <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
        x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
        x-on:livewire-upload-progress="progress = $event.detail.progress" class="border-8 border-gray m-3">
        <div class="w-full h-40 rounded-lg text-center font-bold text-white-500 p-16 cursor-pointer border border-dashed border-blue-500"
            style="background-image: linear-gradient( 89.9deg,  rgb(207, 134, 134) 0.1%, rgba(8,243,70,1) 47.9%, rgb(224, 224, 37) 100.2% );"
            @click="$refs.fileInput.click()">Upload Images</div>
        <input x-ref="fileInput" type="file" multiple wire:model="photos" class="hidden" />

        <!-- Progress Bar -->
        <div x-show="isUploading">
            <progress max="100" x-bind:value="progress"></progress>
        </div>
    </div>
    
    @if ($photos)
    @foreach($photos as $photo)
    @if ($err == 0)
    <div class="p-4 my-3 rounded-lg shadow-lg transition-all duration-500"
        style="background-image: radial-gradient( circle farthest-corner at 14.2% 27.5%,  rgb(68, 241, 45) 0%,
         rgb(210, 216, 201) 90% );"
        wire:key="{{$loop->index}}">
        <i class="fas fa-times-circle text-gray-700 text-2xl float-right cursor-pointer"
            wire:click="remove({{$loop->index}})"></i>        
              <div class="flex justify-center">            
            <img src="{{ $photo->temporaryUrl()}}" width="250">
        </div>        
    </div>
    @endif
    @endforeach
     @if ($err == 0)
    <button wire:loading.remove wire:click.prevent="save" class="w-full p-2 mt-1 text-white rounded shadow-lg"
        style="background-image: linear-gradient( 65.4deg,  rgba(209, 183, 183) -9.1%, rgba(8,243,70,1) 48%, rgba(249,56,152,1) 111.1% );">Save</button>
    <button wire:loading wire:target="save" class="w-full p-2 text-white rounded shadow-lg"
        style="background-image: linear-gradient( 65.4deg,  rgb(240, 10, 10) -9.1%, rgba(8,243,70,1) 48%, rgb(235, 110, 172) 111.1% );">
        <i class="fas fa-spinner fa-spin text-2xl"></i>
    </button>
    @endif
    @endif    
</div>

<!-- Five columns -->
{{-- <div class="flex mb-4">
       @foreach ($albums as $album)             
       <div class="w-1/5 bg-gray-500 h-12">  <a href="{{ asset('storage/photos/'.$album->image) }}" target="_blank" class="bg-white rounded h-full text-grey-darkest no-underline shadow-md">
       <h2 class="text-2xl">Pics {{$album->id}}</h2>
                     <img src="{{ asset('storage/photos/'.$album->image) }}" height="150">
        </a></div>
   @endforeach  
</div> --}}

<div class="grid gap-4 grid-cols-5">
       @foreach ($albums as $album)   
       <div class=" border-8 border-gray m-3">
           <h2 class="text-2xl text-red-500 text-center">Pics {{$album->id}} <i class="fas fa-times text-red-200 hover:text-red-600 cursor-pointer float-right p-1" onclick="confirm('Are you sure want to delete this image?') || event.stopImmediatePropagation()"
                wire:click="removeImg({{$album->id}})"></i></h2>         
       <a href="{{ asset('storage/photos/'.$album->image) }}" data-lightbox="mygallery" class="bg-white rounded h-full text-grey-darkest no-underline shadow-md">
       
            {{-- <img class="block rounded-b" src="https://picsum.photos/200/300?random=1"> --}}
            
              <img src="{{ asset('storage/photos/'.$album->image) }}" height="150">
                
        </a>   
       </div>
       
         
   @endforeach  
</div>
</div>