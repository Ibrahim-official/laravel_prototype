<x-layout>
    <x-slot:heading>
        Create Job
    </x-slot:heading>
    <form method="POST" action="/jobs">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base/7 font-semibold text-gray-900">Create a new Job</h2>
            <p class="mt-1 text-sm/6 text-gray-600">We just need a handful of details from you.</p>

            <x-form-field>
                <x-form-label for="title">Title</x-form-label>
                    <x-form-input name="title" id="title" placeholder="CEO" required></x-form-input>
                    <x-form-error name="title" />
            </x-form-field>
    
            <x-form-field>
                <x-form-label for="salary">Salary</x-form-label>
                    <x-form-input name="salary" id="salary" placeholder="$50,000 USD Per Year" required></x-form-input>
                    <x-form-error name="salary" />
            </x-form-field>
    
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/jobs" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
                <x-form-button>Save</x-form-button>
            </div>
        </form>
        
    </x-layout>