<x-app-layout>
    <div class="p-6">
        <h2 class="text-2xl font-semibold mb-4">Edit Blog</h2>

        <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}"
                       class="mt-1 p-2 w-full border rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Change Featured Image</label>
                <input type="file" name="image" id="image" class="mt-1 p-2 w-full border rounded-md">

                @if ($blog->image)
                    <div class="mt-2">
                        <p class="text-sm">Current Image:</p>
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" class="h-32 object-cover">
                    </div>
                @endif
            </div>

            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea name="content" id="editor" class="mt-1 p-2 w-full border rounded-md" rows="10">{{ old('content', $blog->content) }}</textarea>
            </div>

            <div class="flex justify-end space-x-2">
                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md">Update</button>
                <a href="{{ route('blogs.index') }}" class="px-4 py-2 bg-gray-300 rounded-md">Cancel</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
</x-app-layout>
