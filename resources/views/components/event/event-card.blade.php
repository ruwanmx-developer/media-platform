<div class="event-card">
    <div class="row">
        <div class="col-8 date">
            {{ $event->event_date }}
        </div>
        <div class="col-4 star">
            <i class="bi bi-star-fill"></i>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="name">
                {{ $event->name }}
            </div>
            <div class="organizer">
                {{ $event->organizer }}
            </div>
        </div>
    </div>
</div>
