<div class="row">
    <div class="col-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-center align-items-center flex-column">
                    <div class="avatar avatar-2xl">
<img class="img-md rounded-circle"
     src="{{ $form->photo
            ? (is_string($form->photo)
                ? asset('storage/' . $form->photo)
                : $form->photo->temporaryUrl())
            : asset('images/default-avatar.png') }}"
     alt="Foto Profil"
     width="150"
     height="150">
                    </div>
                    <div class="mt-2">
                        <label for="profile-photo" class="btn btn-outline-primary btn-sm" style="cursor: pointer;">
                            <i class="bi bi-camera"></i> Ganti Foto
                        </label>
                        <input wire:model="form.photo" type="file" id="profile-photo" class="d-none" accept="image/*">
                    </div>
                    <h3 class="mt-3">{{ $form->nama }}</h3>
                    <p class="text-small text-muted">{{ ucfirst($form->role->value ?? 'petani') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-8">
        <div class="card">
            <div class="card-body">
                <form wire:submit="save">
                    <!-- Nama -->
                    <div class="form-group mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input wire:model="form.nama" type="text" id="nama" class="form-control" placeholder="Nama Lengkap">
                        @error('form.nama')
                            <small class="d-block mt-1 text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input wire:model="form.email" type="email" id="email" class="form-control" placeholder="Email aktif">
                        @error('form.email')
                            <small class="d-block mt-1 text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Telepon -->
                    <div class="form-group mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input wire:model="form.telepon" type="text" id="telepon" class="form-control" placeholder="08xxxxxxxxxx">
                        @error('form.telepon')
                            <small class="d-block mt-1 text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="row">

                        <div class="col-6">

                    <!-- Kecamatan -->
                    <div class="form-group mb-3">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <input wire:model="kecamatanUser" type="text" id="kecamatan" class="form-control" disabled>
                    </div>
                        </div>

                        <div class="col-6">

                    <!-- Desa -->
                    <div class="form-group mb-3">
                        <label for="desa" class="form-label">Desa</label>
                        <input wire:model="desaUser" type="text" id="desa" class="form-control" disabled>
                    </div>
                        </div>

                    </div>

                    <!-- Password -->
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input wire:model="form.password" type="password" id="password" class="form-control" placeholder="Kosongkan jika tidak diganti">
                        @error('form.password')
                            <small class="d-block mt-1 text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
