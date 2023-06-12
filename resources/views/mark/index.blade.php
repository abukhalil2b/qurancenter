<x-app-layout>

    <div class="p-1 max-w-7xl mx-auto sm:px-6 lg:px-8">
     
        @foreach($studentMarks as $studentMark)
        <div class="mt-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="flex justify-between">
                <div class="p-1 text-md text-red-800 flex justify-between">
                    {{ $studentMark->name }}
                </div>
                <div class="p-1 text-md text-red-800 flex justify-between">
                   <div>المجموع: {{ $studentMark->totalPoints }}</div>
                </div>
            </div>

        </div>
        @endforeach

    </div>

</x-app-layout>