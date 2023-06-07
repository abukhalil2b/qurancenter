<x-app-layout>

    <div class="p-1 max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="mt-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-3 text-md text-red-800 flex gap-2 items-center">
            <img src="{{ asset('avatar.png') }}" alt="whatsapp" width="40" class="rounded-full">
                {{ $student->name }}
            </div>
            <div class="p-3 text-md text-red-800 flex gap-2 items-center">
                <a href="https://wa.me/{{ $student->phone }}" class="block w-5 h-5 bg-green-400 rounded-full" target="self">
                    <img src="{{ asset('whatsapp.png') }}" alt="whatsapp">
                </a>
                {{ $student->phone }}
            </div>
            @include('inc._model_edit_student')
        </div>

        <div class="mt-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-3 text-md text-gray-800">
                عدد مرات الغياب
                {{ $absentCount }}
            </div>
        </div>

        <div class="mt-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-3 text-md text-gray-800">
                تقييم التلاوة
                {{ $reciteCount }}
            </div>
            <div class="p-3 text-md text-gray-800">
                تقييم الحفظ
                {{ $memorizeCount }}
            </div>
            <div class="p-3 text-md text-gray-800">
                تقييم الإنضباط
                {{ $behaveCount }}
            </div>
            <div class="p-3 text-md text-red-800">
                المجموع
                {{ $reciteCount + $memorizeCount + $behaveCount }}
            </div>
        </div>

    </div>

</x-app-layout>