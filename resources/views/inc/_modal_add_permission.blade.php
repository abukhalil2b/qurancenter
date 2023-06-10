<div class="p-3 mt-1 space-y-6">


    <x-primary-button class="w-20" x-data="" x-on:click.prevent="$dispatch('open-modal', 'create_permission')">
        + اضف
    </x-primary-button>

    <x-modal name="create_permission" :show="$errors->any()" focusable>

        <form method="post" action="{{ route('admin.permission.store') }}" class="p-2 text-[#035b62]">
            @csrf

            <div class="mt-6 flex items-center gap-1">
                <div class="text-xs">
                  الصلاحية
                </div>
                <x-text-input type="text" name="title" class="mt-1 block w-full" />
            </div>
            <x-input-error :messages="$errors->get('title')" />


            <div class="mt-6 flex items-center gap-1">
                <div class="text-xs">
                  التصنيف
                </div>
                <x-text-input type="text" name="cate" class="mt-1 block w-full" />
            </div>
            <x-input-error :messages="$errors->get('cate')" />

            <div class="mt-6 flex items-center gap-1">
                <div class="text-xs">
                  الوصف
                </div>
                <x-text-input type="text" name="description" class="mt-1 block w-full" />
            </div>
            <x-input-error :messages="$errors->get('description')" />


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