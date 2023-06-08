<x-app-layout>
<div class="p-1 max-w-7xl mx-auto sm:px-6 lg:px-8">

@foreach($students as $student)
<div class="mt-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <a href="{{ route('mark.student.show',['task'=>$task->id,'student'=>$student->id,'subject'=>$subject->id]) }}" class="block p-3 text-md text-red-800">
        {{ $student->name }}
    </a>
    <div>
        @if( ! $student->mark)
        <div class="text-xs text-red-600 bg-red-50 p-1">
            لم يتم تقييمه
        </div>
        @else
        <div class="text-xs text-green-600 bg-green-50 p-1">
            تم تقييمه
        </div>
        @endif
    </div>
</div>
@endforeach

</div>
</x-app-layout>