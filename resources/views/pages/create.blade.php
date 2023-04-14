<x-app-layout>
    <x-slot name="header" >
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Page') }}
            </h2>
            <x-link-button href="{{route('pages.index')}}">Back</x-link-button>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
               {{-- @livewire('pages.create-edit') --}}
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
        .create( document.querySelector( '#editor' ), {
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    'blockQuote',
                    'undo',
                    'redo'
                ]
            },
            language: 'en',
            removeButtons: 'image'
        } )
        .catch( error => {
            console.error( error );
        } );

    </script>
</x-app-layout>
{{-- @push('head') --}}

    {{-- @endpush --}}
