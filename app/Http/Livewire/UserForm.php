<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserForm extends Component
{
    use WithFileUploads;

    public $user;
    public $roles;
    public $selectedRole = '';
    public $registration_code;
    public $name;
    public $username;
    public $password;
    public $password_confirmation;
    public $status = '';
    public $avatar;

    protected $listeners = ['refreshComponent' => '$refresh'];
    public function mount($user = null)
    {
        $this->roles = Role::select('id', 'name')->get();

        if ($user) {
            // Check if $user is already a model instance or an ID
            if (!$user instanceof User) {
                // If $user is just an ID or another value, find the user
                try {
                    $this->user = User::findOrFail($user);
                } catch (\Exception $e) {
                    session()->flash('error', 'User tidak ditemukan');
                    return redirect()->route('users.index');
                }
            } else {
                $this->user = $user;
            }

            // Set the form fields from user data
            $this->selectedRole = $this->user->role_id;
            $this->registration_code = $this->user->registration_code;
            $this->name = $this->user->name;
            $this->username = $this->user->username;
            $this->status = $this->user->status;
        }
    }

    public function render()
    {
        return view('livewire.user-form');
    }
    public function updated($propertyName)
    {
        // Reset registration_code, username, and password fields when role changes
        if ($propertyName === 'selectedRole') {
            $this->resetValidation();

            // We don't reset these values if we're editing an existing user
            if (!$this->user) {
                $this->reset(['registration_code', 'username', 'password', 'password_confirmation']);
            }
        }
    }

    public function submit(){
         // Base validation rules for all roles
         $validationRules = [
            'selectedRole' => 'required',
            'name' => 'required|string|min:3|max:100',
            'status' => 'required',
        ];

        $directorRole = Role::where('slug', 'director')->first()->id;
        $employeeRole = Role::where('slug', 'employee')->first()->id;

        // Rules for director role
        if ($this->selectedRole == $directorRole) {
            $validationRules['registration_code'] = 'required|string|unique:users,registration_code,' . ($this->user ? $this->user->id : '');
            $validationRules['username'] = 'required|string|min:3|max:100|unique:users,username,' . ($this->user ? $this->user->id : '');

            // Only require password for new users or if password is not empty during edit
            if (!$this->user || !empty($this->password)) {
                $validationRules['password'] = 'required|string|min:6|confirmed';
            }
        }

        // Rules for employee role
        if ($this->selectedRole == $employeeRole) {
            $validationRules['registration_code'] = 'required|string|unique:users,registration_code,' . ($this->user ? $this->user->id : '');
        }

        // Avatar validation
        if ($this->avatar) {
            $validationRules['avatar'] = 'image|max:2048'; // 2MB Max
        }

        $this->validate($validationRules);

        // Prepare data for DB
        $data = [
            'role_id' => $this->selectedRole,
            'name' => $this->name,
            'status' => $this->status,
        ];

        // Add role-specific data
        if ($this->selectedRole == $directorRole) {
            $data['registration_code'] = $this->registration_code;
            $data['username'] = $this->username;

            // Only update password if provided (for editing existing users)
            if (!empty($this->password)) {
                $data['password'] = Hash::make($this->password);
            }
        } elseif ($this->selectedRole == $employeeRole) {
            $data['registration_code'] = $this->registration_code;
        }

        // Create or update user
        if ($this->user) {
            $this->user->update($data);
            $message = 'Data karyawan berhasil diperbarui';
        } else {
            // For new users, ensure password is set
            if (!isset($data['password']) && $this->selectedRole == $directorRole) {
                $data['password'] = Hash::make($this->password);
            }

            $this->user = User::create($data);
            $message = 'Data karyawan berhasil ditambahkan';
        }

        // Handle avatar upload
        if ($this->avatar) {
            // Delete previous avatar if exists
            $this->user->clearMediaCollection('avatar');
            // Add new avatar
            $this->user->addMedia($this->avatar)->toMediaCollection('avatar');
        }

        // Flash message and redirect
        session()->flash('success', $message);
        return redirect()->route('users.index');
    }

}
