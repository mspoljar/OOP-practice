<x-app-layout>
    <x-slot name="header">
        @foreach ($pictures as $picture)
            <img src="/images/{{Auth::user()->id}}/{{$picture->path}}" height="200" width="200">
            <br>
            <a onclick="return confirm('{{__('Are you sure you want to delete')}} {{$picture->path}}');"  href="/picture/delete/{{$picture->id}}"><button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" id="delete"><input type="submit" value="{{__('Delete')}}"></button></a>
            <a href="/picture/change/{{$picture->id}}"><button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"><input type="submit" value="{{__('Change')}}"></button></a>
        @endforeach
        {{$pictures->links()}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <a href="/picture/upload">Picture upload</a>
            </div>
        </div>
    </div>
</x-app-layout>