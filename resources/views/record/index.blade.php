<x-app-layout>
    <div class="p-3">
        {{ $subject->title }}
    </div>
    <div class="px-3">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @include('inc._model_add_record')

            @foreach($records as $record)
            <div class="mt-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 text-xl text-red-800">
                    {{ $record->title }}
                </div>

                <div class="p-3 flex gap-3">
                    <a class="w-24 p-1 rounded border text-center text-sm" href="{{ route('attendance.index',$record->id) }}">
                        الحضور
                    </a>
                    <a class="w-24 p-1 rounded border text-center text-sm" href="{{ route('task.index',['record'=>$record->id,'subject'=>$subject->id]) }}">
                        المهام
                    </a>

                </div>
            </div>
            @endforeach

        </div>
    </div>
</x-app-layout>