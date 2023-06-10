<x-app-layout>

    <div class="p-1 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="text-red-800 text-2xl">
            {{ $center->title }}
        </div>

        <div class="mt-5 flex gap-2">
            
            <a href="{{ route('admin.teacher.index',$center->id) }}">
                المعلمين
            </a>

        </div>

    </div>

</x-app-layout>