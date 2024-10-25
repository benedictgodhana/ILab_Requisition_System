<x-app-layout>
    <div class="p-6">
        <h2 class="text-2xl font-semibold mb-4">Create a New Blog</h2>

        @if (session('success'))
            <div id="success-message" class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title"
                           class="mt-1 p-2 w-full border rounded-md focus:ring-2 focus:ring-blue-400"
                           required>
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Featured Image</label>
                    <input type="file" name="image" id="image"
                           class="mt-1 p-2 w-full border rounded-md focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                    <textarea name="content" id="editor"
                              class="mt-1 p-2 w-full border rounded-md focus:ring-2 focus:ring-blue-400"
                              rows="10"></textarea>
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
                        Publish
                    </button>
                    <a href="{{ route('blogs.index') }}" class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');

        // Hide the success message after 4 seconds
        setTimeout(() => {
            const message = document.getElementById('success-message');
            if (message) {
                message.style.transition = 'opacity 0.5s';
                message.style.opacity = '0';

                // Optional: Completely remove the message from the DOM after fade-out
                setTimeout(() => message.remove(), 500);
            }
        }, 4000);
    </script>
</x-app-layout>
