@extends("layout")

@section("content")
    <header class="mb-8">
        <h1 class="text-3xl font-bold">Gjesteboken!</h1>
        <p class="mt-2 text-lg">Hei og velkommen til min hjemmeside, legg gjerne igjen en kommentar i gjesteboken!</p>

        <a href="{{ route("posts.create") }}"
           class="mt-4 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
        >
            Skriv innlegg
        </a>
    </header>

    <section class="space-y-4">
        <header>
            <div class="flex justify-between items-end">
                <h1 class="text-3xl font-bold">Innlegg</h1>
                <div>
                    <div class="text-sm text-red-500 underline">
                        @if($sort === "desc")
                            <a href="{{ route("posts.index",["sort" => "asc"]) }}">Eldste først</a>
                        @else
                            <a href="{{ route("posts.index",["sort" => "desc"]) }}">Nyeste først</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mt-2">
                <form action="{{ route('posts.index') }}" method="get">
                    <input
                        type="search"
                        name="search"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        placeholder="Søk"
                        value="{{ request("search") }}"
                    >
                </form>
            </div>
        </header>

        @foreach($posts as $post)
            @include("posts.partials.post",["post" => $post])
        @endforeach

        <div>
            {{ $posts->links() }}
        </div>
    </section>
@endsection
