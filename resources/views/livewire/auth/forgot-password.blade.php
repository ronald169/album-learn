<?php

use Livewire\Volt\Component;
use Illuminate\Support\Facades\Password;

new class extends Component {

    public string $email = '';

    public function sendPasswordResetLink()
    {
        $this->validate([
            'email' => ['required', 'string', 'email']
        ]);

        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));
        }

        $this->reset('email');

        session()->flash('status', __($status));
    }

}; ?>

<div>
    <x-card class="h-screen flex items-center justify-center" title="{{__('Password renewal')}}" subtitle="{{__('Forget your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.')}}" shadow separator>
        <x-session-status class="mb-4" :status="session('status')" />
        <x-form wire:submit="sendPasswordResetLink">
            <x-input label="{{__('E-mail')}}" wire:model="email" icon="o-envelope" />

            <x-slot:actions>
                <x-button label="{{__('Email Password Reset Link')}}" type="submit" icon="o-paper-airplane" class="btn-primary" />
            </x-slot:actions>

        </x-form>

    </x-card>
</div>
