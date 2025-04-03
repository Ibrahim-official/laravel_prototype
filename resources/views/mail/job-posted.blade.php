<h2>
    {{ $job->title }}
</h2>

<p>
    Congrats! Your job is now live at our website.
</p>

<p>
    <a href="{{ url('/jobs/' . $job->id) }}">View your Job Listings</a>
</p>