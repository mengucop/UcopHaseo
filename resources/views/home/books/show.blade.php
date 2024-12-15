<x-home-layout>
    @section('title', 'Browse Books | ')
    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="mt-16">
                @include('layouts.partials.message-status')
                <div class="text-gray-900 dark:text-gray-100">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-8 text-gray-900 dark:text-gray-100">
                            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                                <div class="flex flex-col md:flex-row -mx-4">
                                    <div class="md:flex-1 px-4">
                                        <div class="h-[460px] rounded-lg bg-gray-300 mb-4">
                                            <img class="w-full h-full object-fill"
                                                 src="{{ asset('images/buku.jpg') }}"
                                                 alt="Book Image">
                                        </div>
                                        <div class="flex -mx-2 mb-4">
                                            <div class="w-full px-2">
                                                <form method="POST" action="{{ route('user.storeRequest', $book) }}">
                                                    @csrf
                                                    @method('POST')
                                                    <button class="w-full bg-sky-600 text-white py-2 px-4 rounded-full font-bold hover:bg-sky-700">
                                                        Reserve
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="md:flex-1 px-4 capitalize">
                                        <!-- Book Information -->
                                        <div class="mb-4">
                                            <label class="block dark:text-gray-400 text-sm font-semibold mb-2">Title:</label>
                                            <p class="dark:text-gray-200">{{ $book->title }}</p>
                                        </div>

                                        <div class="mb-4">
                                            <label class="block dark:text-gray-400 text-sm font-semibold mb-2">Author:</label>
                                            <p class="dark:text-gray-200">F. Scott Fitzgerald</p>
                                        </div>

                                        <div class="mb-4 mr-4">
                                            <label class="block dark:text-gray-400 text-sm font-semibold mb-2">Published Year:</label>
                                            <p class="dark:text-gray-200">{{ $book->publication_year }}</p>
                                        </div>

                                        <div class="mb-4 mr-4">
                                            <label class="block dark:text-gray-400 text-sm font-semibold mb-2">Publisher:</label>
                                            <p class="dark:text-gray-200">{{ $book->publisher->name }}</p>
                                        </div>

                                        <div class="mb-4 mr-4">
                                            <label class="block dark:text-gray-400 text-sm font-semibold mb-2">ISBN:</label>
                                            <p class="dark:text-gray-200">{{ $book->isbn }}</p>
                                        </div>

                                        <div class="flex justify-start ">
                                            <div class="mb-4 mr-4">
                                                <label class="block dark:text-gray-400 text-sm font-semibold mb-2">Copies:</label>
                                                <p class="dark:text-gray-200">{{ $book->copies }}</p>
                                            </div>

                                            <div class="mb-4 mr-4">
                                                <label class="block dark:text-gray-400 text-sm font-semibold mb-2">Availability:</label>
                                                <p class="dark:text-gray-200">
                                                    @if($book->copies - $book->borrowBooks->count() == 0)
                                                        Borrowed
                                                    @else
                                                        {{ $book->status }}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>

                                        @if ($book->bookCategories->isNotEmpty())
                                            <div class="mb-4">
                                                <span class="font-bold dark:text-gray-400">Book Categories:</span>
                                                <div class="flex flex-wrap items-center mt-2">
                                                    @foreach ($book->bookCategories as $bookCategory)
                                                        <button class="bg-gray-300 text-sm text-gray-700 py-2 px-2 mb-2 rounded-md whitespace-nowrap font-bold mr-2 hover:bg-gray-400">
                                                            {{ $bookCategory->category->name }}
                                                        </button>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif

                                        <div>
                                            <span class="font-bold text-xl dark:text-gray-400 ">Book Location</span>
                                            <div class="flex justify-start mt-2 ">
                                                @foreach ($book->bookLocations as $bookLocation)
                                                    <div class="mb-4 mr-4">
                                                        <label class="block dark:text-gray-400 text-sm font-semibold mb-2">Call Number:</label>
                                                        <p class="dark:text-gray-200 text-center">{{ $bookLocation->call_number }}</p>
                                                    </div>

                                                    <div class="mb-4 mr-4">
                                                        <label class="block dark:text-gray-400 text-sm font-semibold mb-2">Floor Number :</label>
                                                        <p class="dark:text-gray-200 text-center">{{ $bookLocation->floor }}</p>
                                                    </div>
                                                    <div class="mb-4 mr-4">
                                                        <label class="block dark:text-gray-400 text-sm font-semibold mb-2">Shelf Number :</label>
                                                        <p class="dark:text-gray-200 text-center">{{ $bookLocation->shelf }}</p>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</x-home-layout>
