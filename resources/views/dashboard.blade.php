<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="max-w-sm rounded overflow-hidden shadow-lg">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">To Do Tasks</div>
                            <p class="text-gray-700 text-xl ">You have {{ $tasks }} task(s) on your To Do List.</p>
                            <div><x-primary-button> <a href="{{ route('todos.index') }}" class="bg-blue-500 text-white rounded-md text-sm">View Tasks list</a>
                            </x-primary-button></div>
                        </div>
                        {{-- <div class="px-6 py-4">
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#tag1</span>
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">#tag2</span>
                        </div> --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
