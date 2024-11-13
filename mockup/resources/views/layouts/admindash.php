<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planning Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<style>
    /* Sidebar Toggle Button */
    .toggle-button {
        display: none;
        position: fixed;
        top: 10px;
        left: 10px;
        background-color: #333;
        color: white;
        padding: 10px;
        font-size: 18px;
        border: none;
        cursor: pointer;
        z-index: 1000;
    }

    /* Sidebar */
    .sidebar {
        width: 250px;
        background-color: #333;
        color: white;
        position: fixed;
        height: 100%;
        padding-top: 20px;
        transition: all 0.3s ease;
    }

    .sidebar h2 {
        text-align: center;
        color: #f4f4f4;
        margin-bottom: 20px;
    }

    .sidebar nav a {
        display: block;
        padding: 15px;
        color: #f4f4f4;
        text-decoration: none;
        text-align: center;
    }

    .sidebar nav a:hover,
    .sidebar nav a.active {
        background-color: #575757;
    }

    /* Main content styling */
    .main-content {
        margin-left: 250px;
        padding: 20px;
    }

    /* Responsive layout */
    @media (max-width: 768px) {
        .toggle-button {
            display: block;
        }

        .sidebar {
            display: none;
        }

        .sidebar.active {
            display: block;
            position: fixed;
            width: 250px;
            height: 100%;
            z-index: 1000;
        }

        .main-content {
            margin-left: 0;
        }
    }

    /* Dashboard Content */
    .navbar {
        background-color: #555;
        color: white;
        padding: 10px;
        display: flex;
        justify-content: space-between;
    }

    .navbar input {
        padding: 5px;
        margin-right: 10px;
    }

    .card {
        background-color: #f4f4f4;
        padding: 20px;
        border-radius: 5px;
        margin-top: 20px;
    }
</style>

<body>
    <!-- Sidebar Toggle button -->
    <button class="toggle-button">☰ Menu</button>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Planning</h2>
        <nav>
            <a href="#tasks" class="active">Tasks</a>
            <a href="#calendar">Calendar</a>
            <a href="#notes">Notes</a>
            <a href="#reminders">Reminders</a>
            <a href="#settings">Settings</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <header class="navbar">
            <div class="navbar-left">
                <h1>Planning Dashboard</h1>
            </div>
            <div class="navbar-right">
                <input type="text" placeholder="Search..." class="form-control d-inline-block w-50">
                <button class="btn btn-light ms-2">Profile</button>
            </div>
        </header>

        <!-- Dashboard Widgets -->
        <section class="content">
            <!-- Task Management Section -->
            <div id="tasks" class="card">
                <h3>Tasks</h3>
                <ul>
                    <li>
                        Complete project report 
                        <button class="btn btn-sm btn-success ms-2" title="Mark as Done">
                            <i class="bi bi-check-circle"></i> Done
                        </button>
                    </li>
                    <li>
                        Team meeting at 3 PM 
                        <button class="btn btn-sm btn-warning ms-2" title="Edit Task">
                            <i class="bi bi-pencil-square"></i> Edit
                        </button>
                    </li>
                    <li>
                        Prepare slides for presentation 
                        <button class="btn btn-sm btn-danger ms-2" title="Delete Task">
                            <i class="bi bi-trash-fill"></i> Delete
                        </button>
                    </li>
                </ul>
            </div>

            <!-- Calendar Section -->
            <div id="calendar" class="card">
    <h3>Calendar</h3>
    <p>Upcoming Events:</p>
    <ul>
        <li>Project deadline - Nov 20</li>
        <li>Team outing - Nov 25</li>
    </ul>
    <a href="http://127.0.0.1:8000/calendar" class="btn btn-primary mt-2" title="View Full Calendar">
    <i class="bi bi-calendar2-date"></i> View Full Calendar
</a>

</div>



            <!-- Notes Section -->
            <div id="notes" class="card">
                <h3>Notes</h3>
                <p>Meeting notes and important reminders can go here.</p>
                <button class="btn btn-secondary mt-2" title="Add New Note">
                    <i class="bi bi-sticky"></i> Add New Note
                </button>
            </div>

            <!-- Reminders Section -->
            <div id="reminders" class="card">
                <h3>Reminders</h3>
                <ul>
                    <li>Check emails at 10 AM</li>
                    <li>Submit weekly report by EOD</li>
                </ul>
                <button class="btn btn-warning mt-2" title="Set New Reminder">
                    <i class="bi bi-alarm"></i> Set New Reminder
                </button>
            </div>
        </section>
    </div>

    <!-- JavaScript for Sidebar Toggle and Tooltips -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggleButton = document.querySelector('.toggle-button');
            const sidebar = document.querySelector('.sidebar');

            // Toggle sidebar visibility
            toggleButton.addEventListener("click", () => {
                sidebar.classList.toggle("active");
            });

            // Initialize Bootstrap tooltips
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'));
            const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
</body>
</html>
