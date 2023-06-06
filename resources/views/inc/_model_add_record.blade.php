<div class="p-3 mt-1 space-y-6">


    <x-primary-button class="w-20" x-data="" x-on:click.prevent="$dispatch('open-modal', 'create_record')">
        + سجل
    </x-primary-button>

    <x-modal name="create_record" :show="$errors->any()" focusable>

        <form method="post" action="{{ route('record.store') }}" class="p-2 text-[#035b62]">
            @csrf

            <div class="mt-6 flex items-center gap-1">

                <div class="text-xs w-64">
                    فتح السجل بتاريخ:( {{ date('d-m-Y') }} )
                </div>

            </div>

            <input type="hidden" value="{{ $subject->id }}" name="subject_id">

            <div class="mt-6 flex justify-between">
                <x-secondary-button x-on:click="$dispatch('close')" class="w-14">
                    إلغ
                </x-secondary-button>

                <x-primary-button class="ml-3 w-14">
                    حفظ
                </x-primary-button>
            </div>


        </form>
    </x-modal>
</div>