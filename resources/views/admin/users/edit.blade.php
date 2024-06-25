<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Users') }}
        </h2>
    </x-slot>
    <div class="container mt-4">
        <form action="{{ route('admin.users.update', $user->id) }}" method="post">
            @csrf
            @method('put')
            <div class="row mb-4">
                <div class="col-sm-6 mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" id="email" name="email" value="{{ $user->email }}" class="form-control">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-sm-12">
                    <div>Permissions:</div>
                    <div class="d-flex flex-wrap gap-3">
                        @foreach ($permissions as $permission)
                            <div class="form-check">
                                <input type="checkbox" id="permission_{{ $permission->id }}" name="permissions[]" value="{{ $permission->id }}" class="form-check-input" 
                                    @if (in_array($permission->name, $user->roles->first()->permissions->pluck('name')->toArray())) checked @endif>
                                <label for="permission_{{ $permission->id }}" class="form-check-label">
                                    {{ $permission->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</x-app-layout>
