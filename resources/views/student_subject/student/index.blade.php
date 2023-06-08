<x-app-layout>
    <div class="p-1 max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="flex gap-3">
            @include('inc._modal_add_student')
            <x-primary-link class="w-32" href="{{ route('student_subject.student.search_by_idcard',$subject->id) }}">
                + طالب موجود
            </x-primary-link>
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
</x-app-layout>