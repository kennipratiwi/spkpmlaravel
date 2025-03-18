<form wire:submit.prevent="submit">
    <div class="row">
        <div class="col-md-8">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">{{ $user ? 'Edit' : 'Masukan' }} Data Karyawan</h5>

                    <!-- Name field - always visible -->
                    <div class="form-group">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" wire:model="name" placeholder="Nama" required>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- NIP field - visible for director and employee -->
                    @if (
                        $selectedRole == \App\Models\Role::where('slug', 'director')->first()->id ||
                            $selectedRole == \App\Models\Role::where('slug', 'employee')->first()->id)
                        <div class="form-group">
                            <label class="form-label">NIP Karyawan</label>
                            <input type="text" class="form-control" wire:model="registration_code"
                                placeholder="NIP Pegawai" required>
                            @error('registration_code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif

                    <!-- Username field - visible only for director -->
                    @if ($selectedRole == \App\Models\Role::where('slug', 'director')->first()->id)
                        <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" wire:model="username" placeholder="Nama user"
                                required>
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password fields - visible only for director -->
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" wire:model="password" placeholder=""
                                {{ !$user ? 'required' : '' }}>
                            <small
                                class="form-text text-muted">{{ $user ? 'Biarkan kosong jika tidak ingin mengubah password' : '' }}</small>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Ulangi Password</label>
                            <input type="password" class="form-control" wire:model="password_confirmation"
                                placeholder="" {{ !$user ? 'required' : '' }}>
                        </div>
                    @endif

                    <!-- Avatar upload field - for all roles -->
                   {{-- <div class="form-group">
                        <label class="form-label">Foto Profil</label>
                        <input type="file" class="form-control" wire:model="avatar" accept="image/*">
                        @error('avatar')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        @if ($avatar)
                            <div class="mt-2">
                                <img src="{{ $avatar->temporaryUrl() }}" alt="Preview"
                                    style="max-width: 200px; max-height: 200px;">
                            </div>
                        @elseif ($user && $user->getFirstMediaUrl('avatar'))
                            <div class="mt-2">
                                <img src="{{ $user->getFirstMediaUrl('avatar') }}" alt="Current Avatar"
                                    style="max-width: 200px; max-height: 200px;">
                                <p class="mt-1">Current profile photo</p>
                            </div>
                        @endif
                    </div>--}}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Role & Status</h5>
                    <div class="form-group">
                        <label class="form-label">Role</label>
                        <select class="form-control" wire:model.live="selectedRole">
                            <option value="">-- Pilih Role --</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('selectedRole')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select class="form-control" wire:model="status">
                            <option value="">-- Pilih Status --</option>
                            <option value="0">Nonaktif</option>
                            <option value="1">Aktif</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('users.index') }}" class="btn btn-danger">
                        <i class="fas fa-arrow-circle-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>