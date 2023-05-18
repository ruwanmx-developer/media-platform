<a class="no-link" href="{{ route('view-event', ['id' => $event->id]) }}">
    <div class="event-card">
        <div class="date">
            <div><span> {{ \Carbon\Carbon::parse($event->event_date)->format('l') }}</span><br>
                {{ \Carbon\Carbon::parse($event->event_date)->format('d') }}</div>
        </div>
        <div class="title">
            {{ $event->name }}
        </div>
    </div>
</a>
