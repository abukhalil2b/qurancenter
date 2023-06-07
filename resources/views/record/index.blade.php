<x-app-layout>

    <div class="p-1 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <span class="text-red-800">المادة: </span>{{ $subject->title }}
        @include('inc._model_add_record')

        @foreach($records as $record)
        <div class="mt-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-3 text-md text-red-800">
                {{ $record->title }}
            </div>

            <div class="p-3 flex gap-3">
                <a class="w-32 p-1 rounded border text-center text-xs" href="{{ route('attendance.index',$record->id) }}">
                    الحضور والغياب
                </a>
                <a class="w-32 p-1 rounded border text-center text-xs" href="{{ route('task.index',['record'=>$record->id,'subject'=>$subject->id]) }}">
                    مهام الحفظ والتلاوة
                </a>

            </div>
        </div>
        @endforeach

    </div>

</x-app-layout>