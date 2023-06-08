<x-app-layout>

    <div class="p-1 max-w-7xl mx-auto sm:px-6 lg:px-8">

        @include('inc._modal_add_task')
        <div class="p-3">
            <div class=" text-blue-400">{{ $record->title }}</div>
            <div class="text-xs text-gray-400">{{ $subject->title }}</div>
        </div>
        @foreach($tasks as $task)
        <div class="mt-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-3 text-md text-red-800">
                {{ $task->title }}
            </div>

            <div class="p-3 mt-2 flex gap-3">

                <a class="w-52 p-1 rounded border text-center text-sm" href="{{ route('mark.student.index',['task'=>$task->id,'subject'=>$subject->id]) }}">
                    نقاط الطلاب في هذه المهمة
                </a>

            </div>
        </div>
        @endforeach

    </div>

</x-app-layout>