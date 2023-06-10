<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex gap-1">
                <a class="w-52 p-1 rounded border text-center text-xs" href="{{ route('admin.center.index') }}">
                    الملتقيات والمراكز
                </a>

                <a class="w-52 p-1 rounded border text-center text-xs" href="{{ route('admin.permission.index') }}">
                   الصلاحيات
                </a>
                
            </div>

        </div>
    </div>
</x-app-layout>