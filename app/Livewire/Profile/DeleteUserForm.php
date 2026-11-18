<?php

namespace App\Livewire\Profile;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DeleteUserForm extends Component
{
    public string $password = '';

    public function deleteUser(): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        $user = Auth::user();

        Auth::guard('web')->logout();
        session()->invalidate();
        session()->regenerateToken();

        $user->delete();

        $this->redirect('/');
    }

    public function render(): View
    {
        return view('livewire.profile.delete-user-form');
    }
}
