@extends('admin.master')

@section('content')
<div class="main_content_iner ">
    <div class="container-fluid p-0 ">
        <div class="row ">
            <div class="col-12">
                <div class="dashboard_header mb_50">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="dashboard_header_title">
                                <h3>Lịch làm việc toàn khoa</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div id='calendar'></div>
            </div>
        </div>
    </div>
</div>

<script>
    
  // Lấy ngày hiện tại
 //  var curDay = curDate.getDate();
 //       // Lấy tháng hiện tại
 //       var curMonth = curDate.getMonth() + 1;
 //       // Lấy năm hiện tại
 //       var curYear = curDate.getFullYear();
       
       // if(nam%4==0) a[1]=29;
       // for(int i=0;i<(thang-1);i++) songay+=a[i];
       // songay+=ngay;
       // thu=songay%7;
       
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
    height: '80%',
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
    },
    defaultView: 'dayGridMonth',
    defaultDate: '2022-09-27',
    navLinks: true, // can click day/week names to navigate views
    editable: true,
    eventLimit: true, // allow "more" link when too many events
    events: [

      //Worktime Doctors
        // {
        //   title: 'All Day Event',
        //   start: curYear + '-' + curMonth + '-' + curDay,
        //   color: '#9267FF' // override!
        // },
      //   {
    //     title: 'Long Event',
    //     start: '2020-05-07',
    //     end: '2020-05-10',
    //     color: '#4BE69D' // override!
    //   },
    //   {
    //     groupId: 999,
    //     title: 'Repeating Event',
    //     start: '2020-05-09T16:00:00',
    //     color: '#9267FF' // override!
    //   },
    //   {
    //     groupId: 999,
    //     title: 'Repeating Event',
    //     start: '2020-05-16T16:00:00',
    //     color: '#F13D80' // override!
    //   },
    //   {
    //     title: 'Conference',
    //     start: '2020-05-11',
    //     end: '2020-05-13',
    //     color: '#9267FF' // override!
    //   },
    @foreach ($calendars as $calendar)
      {
        title: '{{ $calendar->name }}',
        start: '{{ $calendar->day_time }}',
        //end: '2020-05-12T12:30:00',
        color: '#9267FF' // override!
      },
     @endforeach 
    ]
  });

  calendar.render();
});



</script>


@endsection