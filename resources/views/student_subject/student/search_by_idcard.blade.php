<x-app-layout>
    <div class="p-1 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div>
            البحث بالرقم المدني
        </div>
        <div class="mt-2 p-1 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div>
            <form action="{{ route('student_subject.student.search_by_idcard',$subject->id) }}" method="POST">
                @csrf
                <x-text-input type="number" name="idcard" class="h-10 w-full"/>
                <x-primary-button class="mt-3 h-10">
                    بحث
                </x-primary-button>
            </form>
            </div>
            @if(isset($student))
            <div class="mt-5">
                {{ $student->name }}
            </div>

            <form action="{{ route('student_subject.student.add_student_to_subject') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $subject->id }}" name="subject_id">
                <input type="hidden" value="{{ $student->id }}" name="student_id">
            <x-primary-button>اضف إلى: {{ $subject->title }}</x-primary-button>
            </form>
            @endif
        </div>
    </div>
</x-app-layout>