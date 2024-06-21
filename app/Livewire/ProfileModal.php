<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileModal extends Component
{
    public $showModal = false;
    public $users;

    public function mount()
    {
        $this->users = User::all();
    }

    public function render()
    {
        //ログイン中のユーザーID
        $id = Auth::id(); 
        // ユーザー情報を取得
        $user = DB::table('users')
                    ->select(
                        'users.id',
                        'users.name',
                        'users.profile_text',
                        'users.profile_image',
                        'users.follow',
                        'users.follower'
                    )
                    ->where('users.id', $id)
                    ->first();
                    
        return view('livewire.profile-modal', compact('user'));
    }

    public function openModal()
    {
        $this->showModal = true;
    }
 
    public function closeModal()
    {
        $this->showModal = false;
    }

}
