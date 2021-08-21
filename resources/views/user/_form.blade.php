<div class="mb-3">
    <label for="name">Name</label>
    <input type="text" name="name" id="name"
           class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $user->name) }}" autofocus>
    @error('name')
    <small class="invalid-feedback" role="alert">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label for="email">Email</label>
    <input type="email" name="email" id="email"
           class="form-control @error('email') is-invalid @enderror"
           value="{{ old('email', $user->email) }}" autofocus>
    @error('email')
    <small class="invalid-feedback" role="alert">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label for="role">Role</label>
    <select name="role" id="role"
            class="form-select @error('role') is-invalid @enderror">
        <option value="admin"
            {{ (old('role') == 'admin') ? 'selected' : '' }}
            {{ ($user->role == 'admin') ? 'selected' : '' }}>Admin</option>
        <option value="agent"
            {{ (old('role') == 'agent') ? 'selected' : '' }}
            {{ ($user->role == 'agent') ? 'selected' : '' }}>Agent</option>
        <option value="customer"
            {{ (old('role') == 'customer') ? 'selected' : '' }}
            {{ ($user->role == 'customer') ? 'selected' : '' }}>Customer</option>
    </select>
    @error('role')
    <small class="invalid-feedback" role="alert">{{ $message }}</small>
    @enderror
</div>
