<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SMS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

  <link rel="stylesheet" href="adminlte.min.css">
<style>

          body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f6f9;
        }
        .sidebar {
            width: 200px;
            height: 100vh;
            background: #003366;
            color: #fff;
            float: left;
            padding: 20px;
        }
        .topbar {
            background: #0056b3;
            color: #fff;
            padding: 15px;
            margin-left: 200px;
        }
        .content {
            margin-left: 200px;
            padding: 20px;
        }
        .card-container {
            display: flex;
            gap: 20px;
            margin-top: 20px;
            flex-wrap: wrap;
        }
        .card {
            flex: 1;
            min-width: 200px;
            background: #17a2b8;
            color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .calendar {
            background: #fff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

  :root {
    --primary: #007bff; /* switch to blue or your desired color */
  }
  .bg-primary,
  .card.bg-primary {
    background-color: var(--primary) !important;
    border-color: var(--primary) !important;
  }
  .navbar,
  .sidebar-dark-primary {
    background-color: #0056b3 !important;
  }
</style>


</head>
<body>

    <div class="sidebar">
        <h3>StudentMgmt</h3>
        <a href=""><p>Dashboard</p></a>
        <a href="models/student.php"><p>student</p></a>
        <a href="views/course/form_add_course.php"><p>Courses</p></a>
        <a href="views/enrollment/form_enroll_student.php"><p>Enrollment</p></a>
    </div>

    <div class="topbar">
        Student Management
    </div>

    <div class="content">
        <h2>Control Panel</h2>

        <div class="card-container">
            <div class="card">
                <h3>5</h3>
                <a href="models/display.php"><p>Students</p></a>
            </div>

             <div class="card" style="background: #ffc107;">
                <h3>5</h3>
                <a href="models/view_courses.php"><p>Courses</p></a>
            </div>

            <div class="card" style="background: #28a745;">
                <h3>4</h3>
                <a href="../models/view_enroll_studentcourses.php"><p>enrollment</a>
            </div>

            <div class="card" style="background: #dc3545;">
                <h3>2</h3>
                <p>Marks</p>
            </div>
        </div>

        <div class="calendar">
            <h3>Calendar</h3>
            <!-- You can integrate FullCalendar JS here -->
            <p>Calendar coming soon...</p>
        </div>
    </div>



</body>
</html>