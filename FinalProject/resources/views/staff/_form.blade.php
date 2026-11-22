@csrf

<div class="mb-4">
    <label for="name" class="block font-medium text-gray-700">
        Username
    </label>

    <input type="text"
           name="name"
           id="name"
           value="{{ old('name', $staff->name ?? '') }}"
           class="mt-1 block w-full rounded border-gray-300">

    @error('name')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="full_name" class="block font-medium text-gray-700">
        Full Name
    </label>

    <input type="text"
           name="full_name"
           id="full_name"
           value="{{ old('full_name', $staff->full_name ?? '') }}"
           class="mt-1 block w-full rounded border-gray-300">

    @error('full_name')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="email" class="block font-medium text-gray-700">
        Email
    </label>

    <input type="email"
           name="email"
           id="email"
           value="{{ old('email', $staff->email ?? '') }}"
           class="mt-1 block w-full rounded border-gray-300">

    @error('email')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="password" class="block font-medium text-gray-700">
        Password
    </label>

    <input type="password"
           name="password"
           id="password"
           class="mt-1 block w-full rounded border-gray-300">

    @if (isset($staff))
        <p class="mt-1 text-sm text-gray-500">
            Leave blank to keep the current password.
        </p>
    @endif

    @error('password')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="password_confirmation"
           class="block font-medium text-gray-700">
        Confirm Password
    </label>

    <input type="password"
           name="password_confirmation"
           id="password_confirmation"
           class="mt-1 block w-full rounded border-gray-300">
</div>

<div class="mb-4">
    <label for="role" class="block font-medium text-gray-700">
        Role
    </label>

    <select name="role"
            id="role"
            class="mt-1 block w-full rounded border-gray-300">
        <option value="staff"
            {{ old('role', $staff->role ?? 'staff') === 'staff' ? 'selected' : '' }}>
            Staff
        </option>

        <option value="admin"
            {{ old('role', $staff->role ?? '') === 'admin' ? 'selected' : '' }}>
            Administrator
        </option>
    </select>

    @error('role')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="avatar" class="block font-medium text-gray-700">
        Avatar
    </label>

    <input type="file"
           name="avatar"
           id="avatar"
           accept=".jpg,.jpeg,.png,.webp"
           class="mt-1 block w-full rounded border-gray-300">

    @error('avatar')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<button type="submit"
        class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
    {{ $buttonText }}
</button>

<a href="{{ route('staff.index') }}"
   class="ml-2 rounded bg-gray-500 px-4 py-2 text-white hover:bg-gray-600">
    Cancel
</a>