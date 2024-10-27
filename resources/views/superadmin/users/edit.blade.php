<x-layouts.super-admin-layout>
<div class="p-6">
    <h2 class="text-2xl font-semibold mb-4">Edit User</h2>

    @if (session('success'))
        <div id="success-message" class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Method spoofing for PUT request -->

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password (leave blank to keep current password)</label>
            <input type="password" name="password" id="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
        </div>

        <div class="mb-4">
            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
            <select name="role" id="role" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                <option value="" disabled>Select a role</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="department_id" class="block text-sm font-medium text-gray-700">Department</label>
            <select name="department_id" id="department_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                <option value="" disabled>Select a department</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}" {{ $user->department_id == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Update User</button>
        </div>
    </form>
</div>

<script>
    // Hide the success message after 4 seconds
    setTimeout(() => {
        const message = document.getElementById('success-message');
        if (message) {
            message.style.transition = 'opacity 0.5s';
            message.style.opacity = '0';

            setTimeout(() => message.remove(), 500); // Remove after fade-out
        }
    }, 4000);
</script>
</x-layouts.super-admin-layout>
