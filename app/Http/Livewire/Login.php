<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $users, $username, $email, $passwordField, $name,$password;
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
        $this->username = '';
        $this->password = '';
        $this->passwordField = '';
    }
//sek jajal tak gawe ng kene wa
    public function registerStore()
    {

       $this->password = Hash::make($this->password); 

       $data= User::create([
        'name' => $this->name, 
        'email' => $this->email,
        'username' => $this->username,
        'password' => $this->password,
        'role' => 'Pengguna'
        ]);

        // dd($data);
        session()->flash('message', 'Registrasi berhasil, masuk ke halaman Login');
        $this->resetInputFields();
        $this->register();
    }

    public function LoginStore(){
        $this->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt(['username' => $this->username, 'password'=> $this->password])){
            if(Auth::user()->role == 'Pengguna'){
                return redirect()->route('homepages'); 
            } 
            elseif(Auth::user()->role == 'Kasir'){
                return redirect()->route('kasir'); 
            } 
            elseif(Auth::user()->role == 'Pelayan'){
                return redirect()->route('homepelayan'); 
            } 
            elseif(Auth::user()->role == 'Koki'){
                return redirect()->route('homekoki'); 
            } 
            elseif(Auth::user()->role == 'Pemilik'){
                return redirect()->route('homeadmin'); 
            }
        }
        // elseif(Auth::attempt(['username' => $this->username, 'password'=> $this->password])){
        //     return redirect()->route('kasir');
        // }
    }

   
}
