<div>
<div class="bg-indigo-900 text-center py-4 lg:px-4">
  <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
    <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">New</span>
    <span class="font-semibold mr-2 text-left flex-auto">USERS</span>    
  </div>
</div>

@if (session()->has('message'))
<div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3" role="alert">
  <p class="font-bold">User Message</p>
  <p class="text-sm">{{ session('message') }}</p>
</div>
@endif

@if($updateMode)
    @include('livewire.update')
@else
    @include('livewire.create')
@endif
<div class="rounded border-4 p-10 m-5">

<table class="table-auto">
  <thead>
    <tr>
      <th class="w-1/2 px-4 py-2">Name</th>
      <th class="w-full px-4 py-2">Email</th>
      <th class="w-1/4 px-4 py-2">Action</th>
    </tr>
  </thead>
  <tbody>    
  @if (count($users)==0)
    <tr><td colspan="3" class="text-center"> NO RECORD FOUND! </td> </tr>  
  @endif
   @foreach ($users as $user)
    <tr>
      <td class="border px-4 py-4">{{$user->name}}</td>
      <td class="border px-4 py-4">{{$user->email}}</td>
      <td class="border px-4 py-4"> <div class="flex w-full"><button  wire:click="edit({{ $user->id }})" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-full" href="">Edit</button>&nbsp;<button onclick="confirm('Are you sure you want to delete this user?') || event.stopImmediatePropagation()"  wire:click="delete({{ $user->id }})" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded-full" href="">Delete</button>      
</div></td>
    </tr>
@endforeach
  </tbody>
</table>
</div>
</div>
