<main>
    <header class="header header-inverse" style="background-image: url(<?= base_url('assets/img/bg/bluehead.png') ?>);">
        <div class="header-info">
            <div class="left">
                <h2 class="header-title" style="font-family: 'Acme', sans-serif;
						 font-size: 55px;
						  color: #444448;

text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;"><strong>
                        <?php echo $content;
                        ?>
                    </strong></h2>
            </div>
        </div>

        <?php
        if (isset($dash)) { ?>
            <div class="header-action">
                <div class="flexbox align-items-center gap-items-4">
                    <a class="text- " href="#" data-calendar="prev" style="color:#9597a5;"><i class="ti-angle-left"></i></a>
                    <span class="text-  fs-16" id="calendar-title" style="color:#9597a5;"></span>
                    <a class="text-" href="#" data-calendar="next" style="color:#9597a5;"><i class="ti-angle-right"></i></a>
                </div>

                <nav class="nav">
                    <a class="nav-link" style="color: #9597a5;" href="#" data-calendar="today">Today</a>
                    <a class="nav-link active" style="color: #9597a5;" href="#" data-calendar-view="month">Month</a>
                    <a class="nav-link" href="#" style="color: #9597a5;" data-calendar-view="basicWeek">Week</a>
                    <a class="nav-link" href="#" style="color: #9597a5;" data-calendar-view="basicDay">Day</a>
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" style="color: #9597a5;" data-toggle="dropdown" href="#">More</a>
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
        <?php }
        ?>
</main>