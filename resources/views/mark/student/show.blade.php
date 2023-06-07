<x-app-layout>


    <div x-data="{memorize:{{ $memorize }},recite:{{ $recite }},behave:{{ $behave }}}" class="p-1 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div>
            <div>
                <span class="text-red-800">الطالب</span>
                {{ $student->name }}
            </div>

            <div>
                <span class="text-red-800">المهمة</span>
                {{ $task->title }}
            </div>
        </div>



        @if( ! $mark)
        <div class="text-red-600 bg-red-50">
            لم يتم تقييمه
        </div>
        @endif

        <div class="mt-4">
            <form action="{{ route('mark.student.store') }}" method="POST">
                @csrf

                <!-- memorize -->
                <div class="p-1 m-1 border rounded bg-white">
                    {{ __('memorize') }}
                    <span x-text="memorize" class="text-red-800 font-bold font-sans"></span>
                    <div class="mt-2 flex gap-1">
                        <div @click="memorize = 0" class="option">0</div>
                        <div @click="memorize = 1" class="option">1</div>
                        <div @click="memorize = 2" class="option">2</div>
                        <div @click="memorize = 3" class="option">3</div>
                        <div @click="memorize = 4" class="option">4</div>
                        <div @click="memorize = 5" class="option">5</div>
                    </div>
                </div>

                <!-- recite -->
                <div class="p-1 m-1 border rounded bg-white">
                    {{ __('recite') }}
                    <span x-text="recite" class="text-red-800 font-bold font-sans"></span>
                    <div class="mt-2 flex gap-1">
                        <div @click="recite = 0" class="option">0</div>
                        <div @click="recite = 1" class="option">1</div>
                        <div @click="recite = 2" class="option">2</div>
                        <div @click="recite = 3" class="option">3</div>
                        <div @click="recite = 4" class="option">4</div>
                        <div @click="recite = 5" class="option">5</div>
                    </div>
                </div>

                <!-- memorize -->
                <div class="p-1 m-1 border rounded bg-white">
                    {{ __('behave') }}
                    <span x-text="behave" class="text-red-800 font-bold font-sans"></span>
                    <div class="mt-2 flex gap-1">
                        <div @click="behave = 0" class="option">0</div>
                        <div @click="behave = 1" class="option">1</div>
                        <div @click="behave = 2" class="option">2</div>
                        <div @click="behave = 3" class="option">3</div>
                        <div @click="behave = 4" class="option">4</div>
                        <div @click="behave = 5" class="option">5</div>
                    </div>
                </div>

        </div>

        <input type="hidden" value="{{ $student->id }}" name="student_id">
        <input type="hidden" value="{{ $task->id }}" name="task_id">
        <input type="hidden" value="{{ $subject->id }}" name="subject_id">
        <input type="hidden" x-model="memorize" name="memorize">
        <input type="hidden" x-model="recite" name="recite">
        <input type="hidden" x-model="behave" name="behave">
        <x-primary-button class="mt-3">
            حفظ
        </x-primary-button>
        </form>
    </div>


</x-app-layout>