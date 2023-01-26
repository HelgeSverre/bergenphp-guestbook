@extends("layout")

@section("content")

    <header class="mb-8 text-center">
        <h1 class="text-3xl font-bold">Skriv ett nytt innlegg!</h1>
    </header>

    <section class="my-8 bg-white p-4 border border-gray-100 rounded-md shadow-md">
        <form action="{{ route("posts.store") }}" method="post">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Navn</label>
                <div class="mt-1">
                    <input
                        type="text"
                        name="name"
                        id="name"
                        placeholder="Person McPersonface"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        value="{{ old("name") }}"
                    >
                </div>

                @error("name")
                <span class="text-red-600 text-sm my-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <label for="text" class="block text-sm font-medium text-gray-700">Tekst</label>
                <div class="mt-1">
                    <textarea
                        rows="10"
                        name="text"
                        id="text"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    >{{ old("text") }}</textarea>
                </div>

                @error("text")
                <span class="text-red-600 text-sm my-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <button
                    type="submit"
                    class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                >
                    Send!
                </button>
            </div>

        </form>

    </section>
@endsection
