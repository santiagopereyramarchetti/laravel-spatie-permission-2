<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg pt-4">
                <div class="flex justify-end">
                    <a href="{{route('admin.permissions.create')}}" class="px-4 py-2 bg-green-600 hover:bg-green-400 rounded-md text-white">Create</a>
                </div>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $permission->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-end">
                                            <div class="flex space-x-2">
                                                <a class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md" href="{{route('admin.permissions.edit', $permission->id)}}">Edit</a>
                                                <form method="POST" action="{{route('admin.permissions.destroy', $permission->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" type="submitt">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
