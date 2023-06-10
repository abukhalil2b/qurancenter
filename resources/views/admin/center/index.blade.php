<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- centers -->
            @include('inc._modal_add_center')

            @foreach($centers as $center)
            <div class="mt-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-1 text-red-800 border-b">
                    <div class="text-xl"> 
                        <a href="{{ route('admin.center.show',$center->id) }}">{{ $center->title }}</a>
                        </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</x-app-layout>