<x-app-layout>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <!-- Profile Information Section -->
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold">Your Profile</h3>
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>

                    <!-- Option to change password -->
                    <div class="mt-6">
                        <h4 class="text-lg font-semibold">Change Password</h4>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            @method('PUT')

                            <!-- Old Password -->
                            <div class="mt-4">
                                <label for="old_password" class="block text-sm font-medium text-gray-700">Old Password</label>
                                <input type="password" id="old_password" name="old_password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>

                            <!-- New Password -->
                            <div class="mt-4">
                                <label for="new_password" class="block text-sm font-medium text-gray-700">New Password</label>
                                <input type="password" id="new_password" name="new_password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>

                            <!-- Confirm New Password -->
                            <div class="mt-4">
                                <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                                <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>

                            <div class="mt-6">
                                <button type="submit" class="px-4 py-2 bg-blue-600  rounded-md hover:bg-blue-700" style="background:navy;color:white;width:100%">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
