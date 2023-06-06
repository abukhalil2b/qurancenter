<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @foreach($students as $student)
            <div class="mt-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('mark.student.show',['task'=>$task->id,'student'=>$student->id,'subject'=>$subject->id]) }}" class="block p-3 text-xl text-red-800">
                    {{ $student->name }}
                </a>
            </div>
            @endforeach

        </div>
    </div>
</x-app-layout>