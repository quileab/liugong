<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Form;

class ProfileForm extends Form
{
    public string $name = '';
    public string $email = '';

    /**
     * Set the user for the form.
     */
    public function setUser(\Illuminate\Contracts\Auth\Authenticatable $user): void
    {
        $this->name = $user->name;
        $this->email = $user->email;
    }

    /**
     * Update the profile information.
     */
    public function update(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        if ($user->email !== $validated['email'] || ! $user->hasVerifiedEmail()) {
            $validated['email_verified_at'] = null;
        }

        $user->fill($validated);
        $user->save();
    }

    /**
     * Send an email verification notification.
     */
    public function sendVerification(): void
    {
        Auth::user()->sendEmailVerificationNotification();

        session()->flash('status', 'verification-link-sent');
    }
}
