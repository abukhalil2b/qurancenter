<x-app-layout>

    <div class="p-1 max-w-7xl mx-auto sm:px-6 lg:px-8">
      
        @include('inc._modal_add_permission')

        @foreach($permissions as $permission)
        <div class="mt-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-3 text-md text-red-800">
                {{ $permission->slug }}
            </div>
        </div>
        @endforeach

    </div>

</x-app-layout>