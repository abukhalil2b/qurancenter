<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @include('inc._model_add_student')

            @foreach($students as $student)
            <div class="mt-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 text-xl text-red-800">
                    {{ $student->name }}
                </div>
            </div>
            @endforeach

        </div>
    </div>
</x-app-layout>