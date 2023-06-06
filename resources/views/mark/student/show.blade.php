<x-app-layout>
    <div class="py-12">
        <div x-data="{memorize:0,recite:0,behave:0}" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                {{ $task->title }}
            </div>

            {{ $student->name }}

            @if($mark)
            <div class="text-xl">

                <div>
                    {{ __('memorize') }}
                    {{$mark->memorize}}
                </div>
                <div>
                {{ __('recite') }}
                {{$mark->recite}}
                </div>
                <div>
                {{ __('behave') }}
                {{$mark->behave}}
                </div>
                
        
            </div>
            @endif

            <div>
                <form action="{{ route('mark.student.store') }}" method="POST">
                    @csrf

                    <!-- memorize -->
                    <div class="p-1 m-1 border rounded bg-white">
                        {{ __('memorize') }}
                        <div x-text="memorize"></div>
                        <div class="flex gap-1">
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
                        <div x-text="recite"></div>
                        <div class="flex gap-1">
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
                        <div x-text="behave"></div>
                        <div class="flex gap-1">
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

    </div>
</x-app-layout>