<?php

use Livewire\Volt\Component;
use App\Models\User;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Hash;

new
#[Title('Register')]
class extends Component {

    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public function register()
    {
        $data = $this->validate([
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        auth()->login($user);

        request()->session()->regenerate();

        return redirect('/');
    }

}; ?>

<div>
    <x-card class="h-screen flex items-center justify-center" title="{{__('Register')}}" shadow seperator>
        <x-form wire:submit="register">
            <x-input label="{{__('Name')}}" wire:model='name' icon='o-user' inline/>
            <x-input label="{{__('E-mail')}}" wire:model='email' icon='o-envelope' inline/>
            <x-input label="{{__('Password')}}" type='password' wire:model='password' icon='o-key' inline/>
            <x-input label="{{__('Confirm Password')}}" type='password' wire:model='password_confirmation' icon='o-key' inline/>

            <x-slot:actions>
                <x-button label="{{__('Already registered?')}}" class="btn-ghost" link='/login' />
                <x-button label="{{__('Register')}}" type="submit" icon="o-paper-airplane" class="btn-primary" spinner="login" />
            </x-slot:actions>
        </x-form>

    </x-card>
</div>
