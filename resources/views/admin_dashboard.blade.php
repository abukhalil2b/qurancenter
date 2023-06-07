<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @include('inc._model_add_teacher')

            @foreach($teachers as $teacher)
            <div class="mt-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 text-red-800 border-b">
                   <div class="text-xl"> {{ $teacher->name }} </div>
                   <div class="text-xl"> {{ $teacher->idcard }} </div>
                   <div class="text-sm text-gray-600"> {{ $teacher->phone }} </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</x-app-layout>