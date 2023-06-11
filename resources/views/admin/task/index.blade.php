<x-app-layout>

    <div class="p-1 max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="text-2xl text-red-800">
    {{ $center->title }}
</div>

        @foreach($subjectsWithTasks as $subject)
        <div class="mt-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-1 bg-slate-300 text-black">
                مهام مادة: {{ $subject->title }}
            </div>
            @foreach($subject->tasks as $task)
            <div class="p-1 text-md text-red-800 flex justify-between">
                {{ $task->title }}
            </div>
            @endforeach

        </div>
        @endforeach

    </div>

</x-app-layout>