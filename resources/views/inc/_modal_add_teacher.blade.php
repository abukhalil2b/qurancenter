<div class="p-3 mt-1 space-y-6">


    <x-primary-button class="w-20" x-data="" x-on:click.prevent="$dispatch('open-modal', 'create_teacher')">
        + معلم
    </x-primary-button>

    <x-modal name="create_teacher" :show="$errors->any()" focusable>

        <form method="post" action="{{ route('teacher.store') }}" class="p-2 text-[#035b62]">
            @csrf
            
            <div class="mt-6 flex items-center gap-1">
                <div class="text-xs">
                    الرقم المدني
                </div>
                <x-text-input type="number" name="idcard" class="mt-1 block w-full" />
            </div>
            <x-input-error :messages="$errors->get('idcard')" />

            <div class="mt-6 flex items-center gap-1">
                <div class="text-xs">
                    الهاتف
                </div>
                <x-text-input type="number" name="phone" class="mt-1 block w-full" />
            </div>
            <x-input-error :messages="$errors->get('phone')" />

            <div class="mt-6 flex items-center gap-1">
                <div class="text-xs">
                    الاسم
                </div>
                <x-text-input type="text" name="name" class="mt-1 block w-full" />
            </div>
            <x-input-error :messages="$errors->get('name')" />

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