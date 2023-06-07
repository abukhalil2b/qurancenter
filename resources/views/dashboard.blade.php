<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @include('inc._model_add_subject')

            @foreach($subjects as $subject)
            <div class="mt-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 text-red-800 border-b">
                   <div class="text-xl"> {{ $subject->title }} </div>
                   <div class="text-sm text-gray-600"> {{ $subject->teacher->name }} </div>
                </div>

                <div class="p-3 mt-2 flex gap-3">
                    <a class="w-52 p-1 rounded border text-center text-xs" href="{{ route('student_subject.student.index',$subject->id) }}">
                       قائمة الطلاب المسجلين في هذه المادة
                    </a>
                    <a class="w-52 p-1 rounded border text-center text-xs" href="{{ route('record.index',$subject->id) }}">
                        قائمة سجلات الحضور والغياب
                    </a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</x-app-layout>