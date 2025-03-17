<x-layout>
    <x-slot:heading>
        Log In
    </x-slot:heading>
    <form method="POST" action="/login">
        @csrf
        <x-form-field>
            <x-form-label for="email" required>Email</x-form-label>
                <x-form-input name="email" id="email" type="email" :value="old('email')" required></x-form-input>
                <x-form-error name="email" />
        </x-form-field>

        <x-form-field>
            <x-form-label for="password" required>Password</x-form-label>
                <x-form-input name="password" id="password" type="password" required></x-form-input>
                <x-form-error name="email" />
        </x-form-field>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
            <x-form-button>Log In</x-form-button>
        </div>
    </form>
    
</x-layout>