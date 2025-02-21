<x-layout>
    <x-slot:heading>
        Jobs Listings
    </x-slot:heading>
    Welcome to Jobs Page. Here's the job stuff...: <br><br>


@foreach ($jobs as $job)
    <li>    
        <a href="/job/{{ $job['id'] }}" class="hover:text-blue-500 hover:underline">
            <b>{{ $job['title'] }}:</b> Pays {{ $job['salary'] }} per year. 
        </a>
    </li>
@endforeach

</x-layout>