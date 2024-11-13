<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.0.0/main.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.0.0/main.min.css" rel="stylesheet">
</head>
<body>

<div id="calendar"></div>

<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.0.0/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.0.0/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.0.0/main.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let calendarEl = document.getElementById('calendar');

        let calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: '/calendar/events', // Fetch events from the database
            selectable: true,
            editable: true,

            // Add new event
            select: function(info) {
                let title = prompt("Enter Event Title:");
                if (title) {
                    fetch('/calendar/events', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            title: title,
                            start_date: info.startStr,
                            end_date: info.endStr
                        })
                    }).then(response => response.json())
                      .then(event => calendar.addEvent(event)); // Add the new event to the calendar
                }
                calendar.unselect();
            },

            // Delete an event
            eventClick: function(info) {
                if (confirm("Are you sure you want to delete this event?")) {
                    fetch(`/calendar/events/${info.event.id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }).then(() => info.event.remove()); // Remove the event from the calendar
                }
            }
        });

        calendar.render();
    });
</script>

</body>
</html>
