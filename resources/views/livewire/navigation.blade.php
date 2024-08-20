<?php

use Livewire\Volt\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

new class extends Component {

    public function logout(): void
    {
        Auth::guard('web')->logout();

        Session::invalidate();
        Session::regenerateToken();

        $this->redirect('/');
    }

}; ?>

<div>
    <x-menu activate-by-route>

        {{-- User --}}
        @if($user = auth()->user())
            <x-menu-separator />

            <x-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="-mx-2 !-my-2 rounded">
                <x-slot:actions>
                    <x-button icon="o-power" wire:click="logout" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff" no-wire-navigate />
                </x-slot:actions>
            </x-list-item>

            <x-menu-separator />


        @else
            <x-menu-item title="{{__('Login')}}" icon="o-user" link="/login" />
            <x-menu-item title="{{__('Register')}}" icon="o-user-plus" link="{{route('register')}}" route="register" />
        @endif

        <x-menu-item title="Hello" icon="o-sparkles" link="/" />
            <x-menu-sub title="{{__('Images')}}" icon="o-photo">
                <x-menu-item title="{{__('Add image')}}" icon="o-plus" link="{{route('images.create')}}" />
            </x-menu-sub>
        </x-menu>
</div>
