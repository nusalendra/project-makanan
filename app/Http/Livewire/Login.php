<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Login extends Component
{
    public $users, $email, $passwordField, $name,$password;
    public $registerForm = false;
    public function render()
    {
        return view('livewire.login');
    }
    public function register()
    {
        $this->registerForm = !$this->registerForm;
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->passwordField = '';
    }

    public function registerStore()
    {

       $this->password = Hash::make($this->password); 

       $data= User::create([
        'name' => $this->name, 
        'email' => $this->email,
        'password' => $this->password,
        'isUser' => true,
        'isPelayan' => false,
        'isKoki' => false,
        'isKasir' => false,
        'isAdmin' =>false
        ]);

        // dd($data);
        session()->flash('message', 'Registrasi berhasil, masuk ke halaman Login');
        $this->resetInputFields();
        $this->register();
    }

   
}
