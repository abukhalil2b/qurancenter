<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-2xl text-red-600">
                عدد مرات الغياب
            </div>
            @foreach($students as $student)
            <div class="mt-2 p-1 bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between gap-1">
                <div class="p-1 text-md text-red-800">
                    {{ $student->name }}
                </div>
                <div class="p-1 text-xl text-red-800">
                    {{ $student->absenceTimes }}
                </div>
            </div>
            @endforeach

        </div>
    </div>
</x-app-layout>