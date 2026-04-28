@props(['tenants'])

@if($tenants->isEmpty())

    {{-- Empty state --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm py-24 text-center">
        <svg class="mx-auto mb-4 text-gray-300 w-12 h-12" fill="none" stroke="currentColor"
             stroke-width="1.5" viewBox="0 0 24 24">
            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
            <circle cx="9" cy="7" r="4"/>
            <path d="M23 21v-2a4 4 0 00-3-3.87"/>
            <path d="M16 3.13a4 4 0 010 7.75"/>
        </svg>
        <p class="text-sm text-gray-400 mb-4">No tenants found.</p>
        <a href="{{ route('tenants.create') }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-violet-600 text-white
                  text-sm font-semibold rounded-xl hover:bg-violet-700 transition-colors">
            Add your first tenant
        </a>
    </div>

@else

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100">
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Tenant</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Property</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Rent</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Lease Period</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Status</th>
                    <th class="px-5 py-3"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($tenants as $tenant)
                    <x-tenant-stats :tenants="$tenants" />
                @endforeach
            </tbody>
        </table>
    </div>

    <p class="text-xs text-gray-400 text-right mt-3">
        Showing {{ $tenants->count() }} tenant{{ $tenants->count() !== 1 ? 's' : '' }}
    </p>

@endif