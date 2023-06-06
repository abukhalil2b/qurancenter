<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @include('inc._model_add_subject')

            @foreach($subjects as $subject)
            <div class="mt-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 text-xl text-red-800">
                    {{ $subject->title }}
                </div>

                <div class="p-3 mt-2 flex gap-3">
                    <a class="w-24 p-1 rounded border text-center text-sm" href="{{ route('student_subject.student.index',$subject->id) }}">الطلاب</a>
                    <a class="w-24 p-1 rounded border text-center text-sm" href="{{ route('record.index',$subject->id) }}">السجلات</a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</x-app-layout>