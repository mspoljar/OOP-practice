<x-app-layout>
    <x-slot name="header">
        <form action="/picture/update" method="post">
            @csrf
        <input type="text" name="name" id="name" value="{{trim($picture->path,'.jpg')}}">
        <input type="hidden" name="id" value="{{$picture->id}}">
        <br>
        <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"><input type="submit" value="{{__('Change')}}"></button>
        </form>
    </x-slot>
</x-app-layout>