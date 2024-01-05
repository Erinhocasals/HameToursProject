<?php

namespace App\Http\Livewire;

use App\Models\Template;
use Illuminate\Http\Request;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class ProfileUpdateRoles extends Component
{
    public function render()
    {
        $roles = Role::whereNotIn('name', ['admin', 'editor', 'super-admin', 'client'])->where('enabled', '=', true)->get();
        //$roles = Role::all();
        return view('livewire.profile-update-roles', compact('roles'));
    }

    public function update($roleId) {
        $role = Role::findOrFail($roleId);
        $user = auth()->user();

        if ($role->name == 'bank' || $role->name == 'messenger') {
            if (!$user->kyc) {
                session()->flash('error', 'Debe llenar primeramente los datos KYC.');
            }
            else {
                if ($user->kyc->approved == false) {
                    session()->flash('error', 'Debe esperar la confirmación de aprobación de sus datos KYC.');
                }
                else {
                    if ($user->hasRole($role->name)) {
                        $user->removeRole($role->name);
                    }
                    else {
                        $user->assignRole($role->name);
                    }
                }
            }
        }
        else {
            if ($user->hasRole($role->name)) {
                $user->removeRole($role->name);
            }
            else {
                $user->assignRole($role->name);
            }
        }

        $user->save();
        //$this->emitTo('profile-bank-role-options', '$refresh');
        $this->emit('message-' . $role->id);

        return redirect(request()->header('Referer'));
    }
}
