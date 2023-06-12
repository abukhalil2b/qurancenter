<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="mt-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-3 text-red-800 border-b flex justify-between">
                {{ $loggedUser->center->title }}
            </div>
           <div class="p-3 mt-2 flex gap-3">

            @if(auth()->user()->hasPermission('student.index'))
           <a class="w-32 p-1 rounded border text-center text-xs" href="{{ route('student.index') }}">الطلاب</a>
           @endif

           @if(auth()->user()->hasPermission('student.absence_count'))
           <a class="w-32 p-1 rounded border text-center text-xs" href="{{ route('student.absence_count') }}">مرات الغياب</a>
           @endif
           </div>
        </div>

            @include('inc._modal_add_subject')

            @foreach($subjects as $subject)
            <div class=" bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 text-red-800 border-b flex justify-between">
                    <div>
                        <div class="text-xl"> {{ $subject->title }} </div>
                        <div class="text-sm text-gray-600"> {{ $subject->teacher->name }} </div>
                    </div>
                    @include('inc._modal_edit_subject')
                </div>

                <div class="p-3 mt-2 flex gap-3">
                    <a class="w-52 p-1 rounded border text-center text-xs" href="{{ route('student_subject.student.index',$subject->id) }}">
                        الطلاب المسجلين في هذه المادة
                    </a>
                    <a class="w-52 p-1 rounded border text-center text-xs" href="{{ route('record.index',$subject->id) }}">
                        السجل اليومي
                    </a>
                    <a class="w-52 p-1 rounded border text-center text-xs" href="{{ route('subject.tasks',$subject->id) }}">
                        المهام المسجلة في هذه المادة  
                    </a>
                    <a class="w-52 p-1 rounded border text-center text-xs" href="{{ route('subject.marks',$subject->id) }}">
                        نقاط الطلاب في هذه المادة 
                    </a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</x-app-layout>