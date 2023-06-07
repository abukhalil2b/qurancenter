<x-app-layout>

    <div class="p-1 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div>
            <span class="text-red-800">سجل الحضور :</span> {{ $record->title }}
        </div>
        <div>
            حدد الاسماء ثم اضغط حفظ
        </div>

        <form action="{{ route('attendance.update',$record->id) }}" method="POST">
            @csrf
            @foreach($attendances as $attendance)
            <label class="block mt-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 text-xl text-red-800">
                    <input class="w-6 h-6 rounded-sm" name="studentIds[]" type="checkbox" @if($attendance->attend_at != null) checked @endif value="{{ $attendance->student_id }}" >
                    {{ $attendance->name }}
                </div>
            </label>
            @endforeach
            <div class="mt-4 flex justify-center">
                <x-primary-button>
                    حفظ
                </x-primary-button>
            </div>
        </form>
    </div>

</x-app-layout>