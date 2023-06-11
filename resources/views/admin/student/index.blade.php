<x-app-layout>

    <div class="p-1 max-w-7xl mx-auto sm:px-6 lg:px-8">

        @foreach($students as $student)
        <div class="mt-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-1 text-red-800 border-b flex gap-1 items-center">
                <a href="{{ route('student.show',$student->id) }}" class="block bg-gray-700 w-10 h-10 rounded-full">

                </a>

                <div>
                <div class="text-sm"> {{ $student->name }} </div>
                <div class="text-xs">
                    <span class="text-red-600">{{__('idcard')}}</span>
                    {{ $student->idcard }}
                </div>
                <div class="text-xs text-gray-600">
                    <span class="text-red-600">{{__('phone')}}</span>
                    {{ $student->phone }}
                </div>
                </div>
            </div>
        </div>
        @endforeach


    </div>

</x-app-layout>