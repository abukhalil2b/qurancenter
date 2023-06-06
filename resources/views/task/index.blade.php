<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @include('inc._model_add_task')
            <div class="p-3">
                <div class=" text-blue-400">{{ $record->title }}</div>
                <div class="text-xs text-gray-400">{{ $subject->title }}</div>
            </div>
            @foreach($tasks as $task)
            <div class="mt-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 text-xl text-red-800">
                    {{ $task->title }}
                </div>

                <div class="p-3 mt-2 flex gap-3">

                    <a class="w-24 p-1 rounded border text-center text-sm" 
                    href="{{ route('mark.student.index',['task'=>$task->id,'subject'=>$subject->id]) }}">
                        النقاط لهذه المهمة
                    </a>
                   
                </div>
            </div>
            @endforeach

        </div>
    </div>
</x-app-layout>