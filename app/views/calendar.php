<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHPeros | Calendar</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="public/plugins/fullcalendar/main.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="public/css/adminlte.min.css">
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="public/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI -->
    <script src="public/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="public/js/adminlte.min.js"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="public/plugins/moment/moment.min.js"></script>
    <script src="public/plugins/fullcalendar/main.js"></script>

    <script>
        <?php
        $user_id = "";
        $rol = 0;
        $events = "";
        $date_start = null;
        $date_end = null;
        $str = "";
        if (isset($_SESSION["userData"])) {
            $rol = $_SESSION["userData"]["role_id"];
            if ($rol == 1) {
                $user_id = $_SESSION["userData"]["user_id"];
                $str = "SELECT c.id_class as id_class, c.name as nombre_clase, c.color as color_clase, sch.time_start as date_start, sch.time_end as date_end, sch.day as date_day
                    FROM `students` st INNER JOIN `enrollment` enr ON enr.id_student = st.id INNER JOIN `courses` cou ON enr.id_course = cou.id_course INNER JOIN `class` c ON cou.id_course = c.id_course INNER JOIN `schedule` sch ON c.id_schedule = sch.id_schedule
                    WHERE st.id = " . $user_id . ";";
            } elseif ($rol == 2) {
                $user_id = $_SESSION["userData"]["user_id"];
                $str = "SELECT c.id_class as id_class, c.name as nombre_clase, c.color as color_clase, sch.time_start as date_start, sch.time_end as date_end, sch.day as date_day  \n"
                    . "FROM `courses` cou INNER JOIN `class` c ON cou.id_course = c.id_course INNER JOIN `teachers` t ON c.id_teacher = t.id_teacher INNER JOIN `schedule` sch ON c.id_schedule = sch.id_schedule\n"
                    . "WHERE t.id_teacher = " . $user_id . ";";
            } elseif ($rol == 3) {
                $user_id = $_SESSION["userData"]["user_id"];
                $str = "SELECT c.id_class as id_class, c.name as nombre_clase, c.color as color_clase, sch.time_start as date_start, sch.time_end as date_end, sch.day as date_day
                    FROM `courses` cou INNER JOIN `class` c ON cou.id_course = c.id_course INNER JOIN `schedule` sch ON c.id_schedule = sch.id_schedule
                    WHERE 1";
            }
        }
        if ($user_id !== "") {
            $a = new Mysql();

            $result = $a->select_all($str);


            $index = count($result);
            foreach ($result as $clase) {
                $date_start = date_parse($clase["date_day"] . " " . $clase["date_start"]);
                $date_end = date_parse($clase["date_day"] . " " . $clase["date_end"]);

                $events .= "{
                            title: \"" . $clase["nombre_clase"] . "\",
                            start: new Date(" .  $date_start["year"] . ", " .  $date_start["month"] - 1 . ", " .  $date_start["day"] . "," .  $date_start["hour"] . ", " .  $date_start["minute"] . "),
                            end: new Date(" .  $date_end["year"] . ", " .  $date_end["month"] - 1 . ", " .  $date_end["day"] . "," .  $date_end["hour"] . ", " .  $date_end["minute"] . "),
                            backgroundColor: \"" . $clase["color_clase"] . "\",
                            borderColor: \"" . $clase["color_clase"] . "\"
                          }";
                if ($index > 1) {
                    $events .= ",\n";
                }
                $index--;
            }
        }
        if (isset($_SESSION["userData"])) { ?>
            var rol = <?php echo $_SESSION["userData"]["role_id"]; ?>;
            var user_id = <?php echo $user_id; ?>;
            var rol = <?php echo $rol; ?>;
        <?php } ?>

        var eventos = JSON.stringify(<?php echo $events ?>);
    </script>

    <!--<script script defer src="public/js/calendar.js"></script>-->
</head>

<body>

    <!-- Navbar -->
    <?php include("includes/navbar.php"); ?>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <?php include("includes/asidebar.php"); ?>
    <!-- /. main Sidebar Container -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Calendar</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/calendar">Home</a></li>
                            <li class="breadcrumb-item active">Calendar</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body p-0">
                                <!-- THE CALENDAR -->
                                <div id="calendar"></div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Page specific script -->
    <script>
        $(function() {
            $(".wrapper").css("height", "100%");
            $(".main-sidebar").css("position", "fixed");


            /* initialize the external events
                       -----------------------------------------------------------------*/
            function ini_events(ele) {
                ele.each(function() {
                    // create an Event Object (https://fullcalendar.io/docs/event-object)
                    // it doesn't need to have a start or end
                    var eventObject = {
                        title: $.trim($(this).text()), // use the element's text as the event title
                    };

                    // store the Event Object in the DOM element so we can get to it later
                    $(this).data("eventObject", eventObject);

                    // make the event draggable using jQuery UI
                    $(this).draggable({
                        zIndex: 1070,
                        revert: true, // will cause the event to go back to its
                        revertDuration: 0, //  original position after the drag
                    });
                });
            }

            ini_events($("#external-events div.external-event"));

            /* initialize the calendar
                       -----------------------------------------------------------------*/
            //Date for the calendar events (dummy data)
            var date = new Date();
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();

            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendar.Draggable;

            var containerEl = document.getElementById("external-events");
            var checkbox = document.getElementById("drop-remove");
            var calendarEl = document.getElementById("calendar");

            // initialize the external events
            // -----------------------------------------------------------------
            /*
              new Draggable(containerEl, {
                itemSelector: ".external-event",
                eventData: function (eventEl) {
                  return {
                    title: eventEl.innerText,
                    backgroundColor: window
                      .getComputedStyle(eventEl, null)
                      .getPropertyValue("background-color"),
                    borderColor: window
                      .getComputedStyle(eventEl, null)
                      .getPropertyValue("background-color"),
                    textColor: window
                      .getComputedStyle(eventEl, null)
                      .getPropertyValue("color"),
                  };
                },
              });
                */

            var calendar = new Calendar(calendarEl, {
                headerToolbar: {
                    left: "prev,next today",
                    center: "title",
                    right: "dayGridMonth,timeGridWeek,timeGridDay",
                },
                themeSystem: "bootstrap",
                //Random default events
                events: [
                    <?php echo $events ?>
                ],
                editable: false,
                droppable: false, // this allows things to be dropped onto the calendar !!!
                drop: function(info) {
                    // is the "remove after drop" checkbox checked?
                    if (checkbox.checked) {
                        // if so, remove the element from the "Draggable Events" list
                        info.draggedEl.parentNode.removeChild(info.draggedEl);
                    }
                },
            });

            calendar.render();
            // $('#calendar').fullCalendar()

            /* ADDING EVENTS */
            var currColor = "#3c8dbc"; //Red by default
            // Color chooser button
            $("#color-chooser > li > a").click(function(e) {
                e.preventDefault();
                // Save color
                currColor = $(this).css("color");
                // Add color effect to button
                $("#add-new-event").css({
                    "background-color": currColor,
                    "border-color": currColor,
                });
            });
            $("#add-new-event").click(function(e) {
                e.preventDefault();
                // Get value and make sure it is not null
                var val = $("#new-event").val();
                if (val.length == 0) {
                    return;
                }

                // Create events
                var event = $("<div />");
                event
                    .css({
                        "background-color": currColor,
                        "border-color": currColor,
                        color: "#fff",
                    })
                    .addClass("external-event");
                event.text(val);
                $("#external-events").prepend(event);

                // Add draggable funtionality
                ini_events(event);

                // Remove event from text input
                $("#new-event").val("");
            });
        });
    </script>
</body>

</html>
