<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Todo Item') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('todos.store') }}">
                        @csrf
                            <div>
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="description" :value="__('Description')" />
                                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="description" />
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="duedate" :value="__('Due Date')" />
                                <x-text-input id="duedate" class="block mt-1 w-full" type="date" name="duedate" :value="old('duedate')" required autofocus autocomplete="duedate" />
                                <x-input-error :messages="$errors->get('duedate')" class="mt-2" />
                            </div>
                            <br>
                            <div class="flex justify-between">
                                <x-primary-button type="submit" class="ml-3 bg-green-600">
                                    {{ __('Save Task') }}
                                </x-primary-button>
                                <x-primary-button  class="ml-3"><a href="{{ route('todos.index') }}">
                                    {{ __('Back') }}</a>
                                </x-primary-button>
                            </div>


                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
