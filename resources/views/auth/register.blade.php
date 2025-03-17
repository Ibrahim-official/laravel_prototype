<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>
    <form method="POST" action="/register">
        @csrf
            <x-form-field>
                <x-form-label for="first_name" required>First Name</x-form-label>
                    <x-form-input name="first_name" id="first_name" required></x-form-input>
                    <x-form-error name="first_name" />
            </x-form-field>

            <x-form-field>
                <x-form-label for="last_name" required>Last Name</x-form-label>
                    <x-form-input name="last_name" id="last_name" required></x-form-input>
                    <x-form-error name="last_name" />
            </x-form-field>

            <x-form-field>
                <x-form-label for="email" required>Email</x-form-label>
                    <x-form-input name="email" id="email" type="email" required></x-form-input>
                    <x-form-error name="email" />
            </x-form-field>

            <x-form-field>
                <x-form-label for="password" required>Password</x-form-label>
                    <x-form-input name="password" id="password" type="password" required></x-form-input>
                    <x-form-error name="email" />
            </x-form-field>

            <x-form-field>
                <x-form-label for="password_confirmation" required>Confirm Password</x-form-label>
                    <x-form-input name="password_confirmation" id="password_confirmation" type="password" required></x-form-input>
                    <x-form-error name="password_confirmation" />
            </x-form-field>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
                <x-form-button>Register</x-form-button>
            </div>
    </form>
    
</x-layout>