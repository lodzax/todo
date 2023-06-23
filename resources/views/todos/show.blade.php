<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Task Details') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Title' }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ $todo->title }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Description' }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ $todo->description }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Due Date' }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ $todo->duedate }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Created At' }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ $todo->created_at }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Updated At' }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ $todo->updated_at }}
                        </p>
                    </div>
                   <x-primary-button> <a href="{{ route('todos.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">BACK</a>
                   </x-primary-button>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
