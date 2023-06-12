<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                طلاب: <span class="text-red-800"> {{ $center->title }} </span> <span class="text-stone-800 border rounded-full w-8 h-8 inline-flex justify-center items-center"> {{ count( $students ) }} </span>
            </div>
            @foreach($students as $student)
            <div class="mt-2 p-1 bg-white overflow-hidden shadow-sm sm:rounded-lg flex items-center gap-1">
                <a href="{{ route('student.show',$student->id) }}" class="block bg-gray-700 w-8 h-8 rounded-full">

                </a>
                <div class="p-1 text-md text-red-800">
                    {{ $student->name }}
                </div>
            </div>
            @endforeach

        </div>
    </div>
</x-app-layout>