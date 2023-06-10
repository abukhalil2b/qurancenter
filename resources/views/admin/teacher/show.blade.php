<x-app-layout>

    <div class="p-1 max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="mt-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-3 text-md text-red-800 flex gap-2 items-center">
            <img src="{{ asset('avatar.png') }}" alt="whatsapp" width="40" class="rounded-full">
                {{ $teacher->name }}
            </div>
            <div class="p-3 text-md text-red-800 flex gap-2 items-center">
              
                {{ $teacher->phone }}
            </div>
            @include('inc._modal_edit_teacher')
        </div>


    </div>

</x-app-layout>