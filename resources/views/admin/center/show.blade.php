<x-app-layout>

    <div class="p-1 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="text-red-800 text-2xl">
            {{ $center->title }}
        </div>

        <div class="mt-5 flex gap-2">

            <a class="w-32 p-1 rounded border text-center text-xs" href="{{ route('admin.teacher.index',$center->id) }}">
                المعلمين
            </a>

            <a class="w-32 p-1 rounded border text-center text-xs" href="{{ route('admin.student.index',$center->id) }}">
                الطلاب
            </a>

            <a class="w-32 p-1 rounded border text-center text-xs" href="{{ route('admin.task.index',$center->id) }}">
                المهام
            </a>

        </div>

    </div>

</x-app-layout>