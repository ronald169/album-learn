<?php

use Livewire\Volt\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\Rule;
use Mary\Traits\Toast;

new class extends Component
{
    use Toast;

    public User $user;
    public int $pagination;
    public string $email;
    public bool $adult;

    public function mount(): void
    {
        // if (Auth::id() !== $this->user->id) {
        //     abort(403);
        // }

        $this->user = Auth::user();

        $this->fill($this->user);
    }

    public function save(): void
    {
        $data = $this->validate([
            'email' => [
                'required', 'email',
                Rule::unique('users')->ignore($this->user->id),
            ],
            'pagination' => 'required|integer|min:3|max:20',
            'adult' => 'required|boolean',
        ]);

        $this->user->update($data);

        $this->success(__('Profile updated with success.'), redirectTo: '/');
    }

    public function deleteAccount(): void
    {
        $this->user->delete();
        $this->success(__('Account deleted with success.'));
    }

}; ?>

<div>
    <x-card class="h-screen flex items-center justify-center" title="{{__('Update profile')}}">
        <x-form wire:submit="save">
            <x-input label="{{__('E-mail')}}" value="{{ $email }}" wire:model="email" icon="o-envelope" inline />
            <x-range
                wire:model.live.debounce="pagination"
                label="Pagination ({{ $pagination }})"
                min="3"
                max="20"
                step="1"
                hint="{{__('Between 3 and 20')}}"
                class="range-accent"/>
            <x-checkbox label="{{ __('I am an adult') }}" wire:model="adult"/>

            <x-slot:actions>
                <x-button
                    label="{{__('Delete account')}}"
                    icon="c-hand-thumb-down"
                    wire:confirm="{{__('Are you sure to delete your account?')}}"
                    wire:click="deleteAccount"
                    class="btn-warning" />
                <x-button label="{{__('Save')}}" icon="o-paper-airplane" spinner="save" type="submit" class="btn-primary" />
            </x-slot:actions>
        </x-form>
    </x-card>
</div>
