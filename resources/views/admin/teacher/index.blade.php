<x-app-layout>

    <div class="p-1 max-w-7xl mx-auto sm:px-6 lg:px-8">

        @foreach($teachers as $teacher)
        <div class="mt-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-1 text-red-800 border-b">
                <div class="text-sm"> {{ $teacher->name }} </div>
                <div class="text-xs">
                    <span class="text-red-600">{{__('idcard')}}</span>
                    {{ $teacher->idcard }}
                </div>
                <div class="text-xs text-gray-600">
                    <span class="text-red-600">{{__('phone')}}</span>
                    {{ $teacher->phone }}
                </div>

                <div>
                    <a href="{{ route('admin.permission.user.index',$teacher->id) }}">
                        الصلاحيات
                    </a>
                </div>
            </div>
        </div>
        @endforeach


    </div>

</x-app-layout>