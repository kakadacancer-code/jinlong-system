<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Welcome Message -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    🔧 Welcome Admin: <strong>{{ Auth::user()->name }}</strong>
                </div>
            </div>

            <!-- Admin Info Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Admin Information</h3>
                    <table class="w-full text-sm text-gray-600">
                        <tr class="border-b">
                            <td class="py-2 font-medium">Name</td>
                            <td class="py-2">{{ Auth::user()->name }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 font-medium">Email</td>
                            <td class="py-2">{{ Auth::user()->email }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 font-medium">Role</td>
                            <td class="py-2">
                                <span class="bg-red-100 text-red-600 px-2 py-1 rounded-full text-xs font-semibold">
                                    {{ Auth::user()->role }}
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>