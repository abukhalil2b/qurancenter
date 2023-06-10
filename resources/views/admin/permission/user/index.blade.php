<x-app-layout>

    <div class="p-1 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div>
            {{ $user->name }}
        </div>

        <form action="{{ route('admin.permission.user.update',$user->id) }}" method="POST">
            @csrf

            @foreach($userPermissions as $permission)
            <label class="mt-2 block bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 text-md text-red-800">
                    <input type="checkbox" value="{{ $permission->id }}" name="permissionIds[]" @if( $permission->allow ) checked @endif>
                    {{ $permission->title }}
                </div>
            </label>
            @endforeach

            <x-primary-button class="mt-4">
                تحديث
            </x-primary-button>
        </form>

    </div>

</x-app-layout>