<?php
namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;

class ContactUs extends Component
{
    public $name;
    public $email;
    public $body;
  
    public function submit()
    {
        $validatedData = $this->validate([
            'name' => 'required|min:6',
            'email' => 'required|email',
            'body' => 'required',
        ]);
  
        Contact::create($validatedData);
        $this->name  = '';
        $this->email = '';
        $this->body  = '';
        
        session()->flash('message', 'Message Sent successfully 😁');
        //return redirect()->to('/contact-us');
    }
  
    public function render()
    {
        return view('livewire.contact-us');
    }
}