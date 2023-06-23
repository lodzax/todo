<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todo Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-primary-button  class="ml-3"><a href="{{ route('todos.create') }}">
                    {{ __('Add Todo Item') }}</a>
                </x-primary-button>
                <div class="p-6 text-gray-900">
{{-- TABLE  --}}
                <table class="border-collapse table-auto w-full text-sm">
                    <thead>
                        <tr>
                            <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Title</th>
                            <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Created At</th>
                            <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Updated At</th>
                            <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Due At</th>
                            <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        {{-- populate our post data --}}
                        @foreach ($todos as $item)
                            <tr>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $item->title }}</td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $item->created_at->diffForHumans() }}</td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $item->updated_at->diffForHumans() }}</td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ \Carbon\Carbon::parse($item->duedate)->format('D d M Y') }}</td>
                                <td class="text-sm text-right">
                                    <div class="flex justify-around">
                                    <a href="{{ route('todos.show', $item->id) }}"><img src="{{ url('/icons/eye.svg') }}" /></a> &nbsp;
                                    <a href="{{ route('todos.edit', $item->id) }}"><img src="{{ url('icons/pencil-square.svg') }}" /></a> &nbsp;
                                    {{-- add delete button using form tag --}}
                                    <form method="post" action="{{ route('todos.destroy', $item->id) }}" class="inline">
                                        @csrf
                                        @method('delete')
                                        <button class="hover:bg-red-500"><img src="{{ url('/icons/trash.svg') }}" /></button>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

{{-- TABLE  --}}

{{--
                    @foreach ( $todos as $item )

                    <div class="max-w-sm rounded overflow-hidden shadow-lg">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">{{ $item->title }}</div>
                            <p class="text-gray-700 text-base">{{ $item->description }}</p>
                        </div>
                        <div class="px-6 py-4">
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">Created: {{ $item->created_at }}</span>
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">Due: {{ $item->duedate }}</span>
                        </div>
                    </div>

                    @endforeach


                    <div class="max-w-sm rounded overflow-hidden shadow-lg">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">Card Title2</div>
                            <p class="text-gray-700 text-base">This is the content of the card. It can be anything you want, such as a description or some additional details.</p>
                        </div>
                        <div class="px-6 py-4">
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#tag1</span>
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">#tag2</span>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
