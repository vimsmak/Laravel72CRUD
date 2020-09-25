<div class="my-10 flex justify-center w-full">
    <section class="border rounded shadow-lg p-4 w-6/12 bg-gray-200">
        <h1 class="text-center text-3xl my-5">Contact Us</h1>
        <hr>
    <div>
        @if (session()->has('message'))
        <div class="p-3 bg-green-300 text-green-800 rounded shadow-sm">
            {{ session('message') }}
        </div>
        @endif
    </div>
    <form wire:submit.prevent="submit">
         
            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="name" class="p-2 rounded border shadow-sm w-full" wire:model="name"
                        placeholder="Name" />
                    @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>        

            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="email" class="p-2 rounded border shadow-sm w-full" wire:model="email"
                        placeholder="Please Enter Your Email" />
                    @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div> 

            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <textarea class="p-2 rounded border shadow-sm w-full" wire:model="body"
                        placeholder="How can i help you?" ></textarea>
                    @error('body') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>

           <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <button type="submit" class="p-2 bg-green-800 text-white w-full rounded tracking-wider cursor-pointer">Submit</button>
                 </div>
             </div> 
</form>
</section>
</div>
