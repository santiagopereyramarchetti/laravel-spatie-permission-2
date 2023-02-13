<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg pt-4 p-4">
                <div class="flex justify-end">
                    <a href="{{route('admin.users.index')}}" class="px-4 py-2 bg-green-600 hover:bg-green-400 rounded-md text-white">Back</a>
                </div>
                <div class="relative overflow-x-auto w-1/2">
                    <div class="flex flex-col p-2 bg-slate-100">
                        <div>Name: {{ $user->name }}</div>
                        <div>Email: {{ $user->email }}</div>
                    </div>
                    
                    <div class="mt-6 p-5 bg-slate-100">
                        <h2 class="text-2xl font-semibold">Role</h2>
                        <div class="flex space-x-2 mt-4 p-2">
                            @if ($user->roles)
                                @foreach ($user->roles as $user_role)
                                <form method="POST" action="{{route('admin.users.roles.remove', [$user->id, $user_role->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" type="submitt">{{ $user_role->name }}</button>
                                </form>
                                @endforeach
                            @endif
                        </div>
                        <div class="mas-w-xl mt-6">
                            <form method="POST" action="{{ route('admin.users.roles', $user->id) }}">
                                @csrf
                                <div class="sm:col-span-6">
                                    <label for="role"
                                        class="block text-sm font-medium text-gray-700">Roles</label>
                                    <select id="role" name="role" autocomplete="roles-name"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('permission') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                <div class="sm:col-span-6 pt-5">
                                    <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md hover:text-white">Assign</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="mt-6 p-5 bg-slate-100">
                        <h2 class="text-2xl font-semibold">Permissions</h2>
                        <div class="flex space-x-2 mt-4 p-2">
                            @if ($user->permissions)
                                @foreach ($user->permissions as $user_permission)
                                <form method="POST" action="{{route('admin.users.permissions.revoke', [$user->id, $user_permission->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" type="submitt">{{ $user_permission->name }}</button>
                                </form>
                                @endforeach
                            @endif
                        </div>
                        <div class="mas-w-xl mt-6">
                            <form method="POST" action="{{ route('admin.users.permissions', $user->id) }}">
                                @csrf
                                <div class="sm:col-span-6">
                                    <label for="permission"
                                        class="block text-sm font-medium text-gray-700">Permission</label>
                                    <select id="permission" name="permission" autocomplete="permission-name"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @foreach ($permissions as $permission)
                                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('permission') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                <div class="sm:col-span-6 pt-5">
                                    <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md hover:text-white">Assign</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
