<x-app-layout>
    <div class="py-12">


        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">

            <!-- Profile Information Section -->
            <div class="bg-white shadow-md rounded-lg">

                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 border-b pb-4 mb-4">Your Profile</h3>
                    <div class="space-y-2">
                        <p class="text-gray-700"><strong>Name:</strong> {{ $user->name }}</p>
                        <p class="text-gray-700"><strong>Email:</strong> {{ $user->email }}</p>
                    </div>

                    <!-- Option to change password -->
                    <div class="mt-8">
                    @if (session('status'))
    <div id="success-alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        {{ session('status') }}
    </div>
@endif

@if ($errors->any())
    <div id="error-alert" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                        <h4 class="text-lg font-semibold text-gray-800 mb-4">Change Password</h4>
                        <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                            @csrf
                            @method('PUT')

                            <!-- Old Password -->
                            <div>
                                <label for="old_password" class="block text-sm font-medium text-gray-600">Old Password</label>
                                <input
                                    type="password"
                                    id="old_password"
                                    name="old_password"
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-800 sm:text-sm"
                                    required>
                            </div>

                            <!-- New Password -->
                            <div>
                                <label for="new_password" class="block text-sm font-medium text-gray-600">New Password</label>
                                <input
                                    type="password"
                                    id="new_password"
                                    name="new_password"
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-800 sm:text-sm"
                                    required>
                            </div>

                            <!-- Confirm New Password -->
                            <div>
                                <label for="new_password_confirmation" class="block text-sm font-medium text-gray-600">Confirm New Password</label>
                                <input
                                    type="password"
                                    id="new_password_confirmation"
                                    name="new_password_confirmation"
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-800 sm:text-sm"
                                    required>
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-6">
                                <button
                                    type="submit"
                                    class="w-full  text-white font-semibold py-3 px-6 rounded-md transition duration-300" style="background:darkblue">
                                    Change Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
    // Auto-hide success alert after 4 seconds
    setTimeout(() => {
        const successAlert = document.getElementById('success-alert');
        if (successAlert) {
            successAlert.style.transition = "opacity 0.5s ease";
            successAlert.style.opacity = "0";
            setTimeout(() => successAlert.remove(), 500); // Fully remove after fade-out
        }
    }, 4000);

    // Auto-hide error alert after 4 seconds
    setTimeout(() => {
        const errorAlert = document.getElementById('error-alert');
        if (errorAlert) {
            errorAlert.style.transition = "opacity 0.5s ease";
            errorAlert.style.opacity = "0";
            setTimeout(() => errorAlert.remove(), 500); // Fully remove after fade-out
        }
    }, 4000);
</script>
</x-app-layout>
