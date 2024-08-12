<?php

use Livewire\Volt\Component;
use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Hash;

new
#[Title('Register')]
class extends Component {

    #[Rule('required|string|max:255|unique:users')]
    public string $name = '';

    #[Rule('required|email|unique:users')]
    public string $email = '';

    #[Rule('required|confirmed')]
    public string $password = '';

    #[Rule('required')]
    public string $password_confirmation = '';

    public function register()
    {
        $data = $this->validate();

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
