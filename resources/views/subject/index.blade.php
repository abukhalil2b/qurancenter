<x-app-layout>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        @foreach($subjects as $subject)
        <div class="p-1 mt-1 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="text-xl"> {{ $subject->title }} </div>
            <div class="text-sm text-gray-600"> {{ $subject->teacher->name }} </div>
        </div>
        @endforeach

    </div>

</x-app-layout>