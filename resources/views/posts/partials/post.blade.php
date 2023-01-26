<div class="bg-white p-4 border border-gray-100 rounded-md shadow-md">
    <div class="flex justify-between items-center">
        <h2 class="text-base font-medium text-gray-900">{{ $post->name }}</h2>
        <div>
            <span class="text-sm text-gray-500">{{ $post->created_at->format("d.m.Y H:i") }}</span>
            <span class="text-xs text-gray-400">({{ $post->created_at->diffForHumans(short: true) }})</span>
        </div>
    </div>

    <div class="mt-2">
        <p class="text-gray-700 text-sm">{{ \Illuminate\Support\Str::limit($post->text, 150) }}</p>
    </div>

    <div class="mt-2">
        <a href="{{ route("posts.show", $post) }}" class="text-blue-500 text-sm underline">Les hele innlegget</a>
    </div>
</div>
