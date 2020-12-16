<x-app-layout>
    <x-slot name="header">
        <form action="/picture/save" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="picture" id="picture" accept=".png, .jpg, .jpeg">
        <br>
        <label for="picname">{{__('Enter the picture name')}}</label>
        <br>
        <input type="text" name="picname" id="picname">
        <br>
        <input type="hidden" name="id" value="{{Auth::user()->id}}">
        <div class="input-group mb-3">
        <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"><input type="submit" value="{{__('Upload')}}"></button>
        </div>
        </form>

        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</x-slot>
</x-app-layout>