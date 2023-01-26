@extends("layout")

@section("content")

    <header class="mb-8">
        <h1 class="text-3xl font-bold">Innlegg: {{ $post->id }} av {{ $post->name }}</h1>

        <form class="mt-4" action="{{ route('posts.destroy', $post) }}" method="post">
            @csrf
            @method('DELETE')

            <button
                type="submit"
                class="inline-flex items-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
            >
                Slett innlegget
            </button>
        </form>
    </header>

    <section>
        <div class="bg-white p-4 border border-gray-100 rounded-md shadow-md">
            <div class="flex justify-between items-center">
                <h2 class="text-base font-medium text-gray-900">{{ $post->name }}</h2>
                <span class="text-sm text-gray-500">{{ $post->created_at->format("d.m.Y H:i") }}</span>
            </div>

            <div class="mt-2 text-gray-700 text-sm">
                {!! nl2br(strip_tags($post->text)) !!}
            </div>

        </div>

    </section>

@endsection
