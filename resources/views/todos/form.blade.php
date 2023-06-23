<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($todo) ? 'Edit Task Details' : 'Create New Task' }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- don't forget to add multipart/form-data so we can accept file in our form --}}
                    <form method="post" action="{{ isset($todo) ? route('todos.update', $todo->id) : route('todos.store') }}" class="mt-6 space-y-6" class="mt-6 space-y-6">
                        @csrf
                        {{-- add @method('put') for edit mode --}}
                        @isset($todo)
                            @method('put')
                        @endisset

                        <div>
                            <x-input-label for="title" value="Title" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="$todo->title ?? old('title')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label for="description" value="Description" />
                            {{-- use textarea-input component that we will create after this --}}
                            <x-textarea-input id="description" name="description" class="mt-1 block w-full" required autofocus>{{ $todo->description ?? old('description') }}</x-textarea-input>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <div>
                            <x-input-label for="duedate" value="Due date" />
                            <x-text-input id="duedate" name="duedate" type="date" class="mt-1 block w-full" :value="$todo->duedate ?? old('duedate')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('duedate')" />

                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Update Task') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
