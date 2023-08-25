

    <!-- Scripts -->
    <script src="<?php echo base_url(); ?>assets/js/core.min.js" data-provide="sweetalert"></script>
    <script src="<?php echo base_url(); ?>assets/js/app.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/script.min.js"></script>


    <script>
      app.ready(function() {

        var calendar = $('#calendar');



        /* initialize the calendar
        -----------------------------------------------------------------*/

        calendar.fullCalendar({
          header: false,
          defaultDate: '<?php echo date("Y-m-d");?>',
          editable: true,
          droppable: true, // this allows things to be dropped onto the calendar
          navLinks: true, // can click day/week names to navigate views
          eventLimit: true, // allow "more" link when too many events
          events: {
            url: '<?php echo base_url(); ?>index.php/zoomorder/evenn',
            error: function() {
              app.toast("Couldn't load events. Please try again later.");
            }
          },
          viewRender: function(view, element) {
            $('#calendar-title').text( calendar.fullCalendar('getView').title );
          }
        });



        /* handle change view
        -----------------------------------------------------------------*/

        $('[data-calendar-view]').on('click', function(){
          var view = $(this).data('calendar-view');
          calendar.fullCalendar('changeView', view);

          makeViewActive($(this));
        });

        var makeViewActive = function(e) {
          $(e).closest('.nav').find('.nav-link.active, .dropdown-item.active').removeClass('active');
          $(e).addClass('active');
          if ( $(e).hasClass('dropdown-item') ) {
            $(e).closest('.dropdown').children('.nav-link').addClass('active');
          }
        }



        /* handle caledar actions
        -----------------------------------------------------------------*/

        $('[data-calendar]').on('click', function(){
          var action = $(this).data('calendar');

          switch(action) {
            case 'today':
              calendar.fullCalendar('today');
              break;

            case 'next':
              calendar.fullCalendar('next');
              break;

            case 'prev':
              calendar.fullCalendar('prev');
              break;
          }
        });



        // Once edit button clicked, close the event details modal and open edit modal
        //
        $('#open-modal-edit').on('click', function(){
          $('#modal-view-event').one('hidden.bs.modal', function () {
            $('#modal-edit-event').modal('show');
          });
          $('#modal-view-event').modal('hide');
        });

      });
    </script>

  </body>
</html>
