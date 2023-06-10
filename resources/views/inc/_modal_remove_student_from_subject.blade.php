<div class="p-3 mt-1 space-y-6">


    <div class="text-red-400 cursor-pointer" x-data="" x-on:click.prevent="$dispatch('open-modal', 'remove_student_from_subject{{ $subject->id }}')">
    إزالة الطالب من المادة
    </div>

    <x-modal name="remove_student_from_subject{{ $subject->id }}" :show="$errors->any()" focusable>
        
        <form method="post" action="{{ route('subject.remove_student',$subject->id) }}" class="p-2 text-[#035b62]">
            @csrf

            <div class="text-2xl text-red-400 ">
                تأكيد إزالة الطالب من المادة
                <input type="hidden" name="student_id" value="{{ $student->id }}">
            </div>

            <div class="mt-6 flex justify-between">
                <x-secondary-button x-on:click="$dispatch('close')" class="w-14">
                    إلغ
                </x-secondary-button>

                <x-danger-button class="ml-3 w-14">
                تأكيد
                </x-danger-button>
            </div>


        </form>
    </x-modal>
</div>