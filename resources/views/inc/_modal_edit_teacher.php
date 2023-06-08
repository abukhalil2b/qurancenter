<div class="p-3 mt-1 space-y-6">


    <div class="text-xs p-1 cursor-pointer" x-data="" x-on:click.prevent="$dispatch('open-modal', 'edit_teacher{{ $teacher->id }}')">
       تعديل
    </div>

    <x-modal name="edit_teacher{{ $teacher->id }}" :show="$errors->any()" focusable>

        <form method="post" action="{{ route('teacher.update',$teacher->id) }}" class="p-2 text-[#035b62]">
            @csrf

            <div class="mt-6 flex items-center gap-1">
                <div class="text-xs">
                    الهاتف
                </div>
                <x-text-input type="number" name="phone" class="mt-1 block w-full" value="{{ $teacher->phone }}" />
            </div>
            <x-input-error :messages="$errors->get('phone')" />

            <div class="mt-6 flex items-center gap-1">
                <div class="text-xs">
                    الاسم
                </div>
                <x-text-input type="text" name="name" class="mt-1 block w-full" value="{{ $teacher->name }}" />
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