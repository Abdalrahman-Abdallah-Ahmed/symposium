<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Conferences') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul class="list-disc pl-4 space-y-2">
                        @foreach ($conferences as $conference)
                            <li class="flex items-center gap-2">

                                {{-- Star status --}}
                                @auth
                                    @php
                                        $isFavorited = auth()->user()
                                            ->favoriteConferences
                                            ->contains($conference->id);
                                    @endphp

                                    @if ($isFavorited)
                                        <form action="{{ route('conferences.unfavorite', $conference) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="text-yellow-500 text-lg">
                                                ★
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('conferences.favorite', $conference) }}" method="POST">
                                            @csrf

                                            <button type="submit" class="text-gray-400 text-lg">
                                                ☆
                                            </button>
                                        </form>
                                    @endif
                                @endauth


                                {{-- Conference link --}}
                                <a href="{{ route('conferences.show', $conference->id) }}"
                                    class="hover:underline text-blue-600">
                                    {{ $conference->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>