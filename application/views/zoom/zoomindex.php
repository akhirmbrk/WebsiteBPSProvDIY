<!-- Main container -->
<main>

  <header class="header header-inverse">
    <div class="header-info">
      <div class="left">
        <h1 class="header-title"><strong>Dashboard Informasi Jadwal Rapat Daring</strong></h1>
      </div>


    </div>

    <div class="header-action">
      <div class="flexbox align-items-center gap-items-4">
        <a class="text- " href="#" data-calendar="prev"><i class="ti-angle-left"></i></a>
        <span class="text-  fs-16" id="calendar-title" style="color:aliceblue"></span>
        <a class="text-" href="#" data-calendar="next"><i class="ti-angle-right"></i></a>
      </div>

      <nav class="nav">
        <a class="nav-link" href="#" data-calendar="today">Today</a>
        <a class="nav-link active" href="#" data-calendar-view="month">Month</a>
        <a class="nav-link" href="#" data-calendar-view="basicWeek">Week</a>
        <a class="nav-link" href="#" data-calendar-view="basicDay">Day</a>
        <div class="dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">More</a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#" data-calendar-view="agendaWeek">Agenda week</a>
            <a class="dropdown-item" href="#" data-calendar-view="agendaDay">Agenda day</a>
            <a class="dropdown-item" href="#" data-calendar-view="listYear">List year</a>
            <a class="dropdown-item" href="#" data-calendar-view="listMonth">List month</a>
            <a class="dropdown-item" href="#" data-calendar-view="listWeek">List week</a>
            <a class="dropdown-item" href="#" data-calendar-view="listDay">List day</a>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <div class="main-content">
    <div class="card card-body">
      <div id="calendar" data-provide="fullcalendar"></div>
    </div>
  </div>
  <!--/.main-content -->




</main>
<!-- END Main container -->