//
//
// $(document).ready(function() {
//
//
//
//     $('#calendar').fullCalendar({
//         header: {
//             left: 'prev,next',
//             center: 'title',
//             right: ''
//         },
//         defaultDate: '2018-03-12',
//         navLinks: true, // can click day/week names to navigate views
//         editable: true,
//         eventLimit: true, // allow "more" link when too many events
//         events: [
//             {
//                 title: 'Havana',
//                 start: '2018-03-01',
//                 end: '2018-03-07'
//             },
//             {
//                 title: 'Nicaro',
//                 start: '2018-03-07',
//                 end: '2018-03-16'
//             },
//             {
//                 id: 999,
//                 title: 'La Boca',
//                 start: '2018-03-16',
//                 end: '2018-03-20'
//             },
//             {
//                 id: 999,
//                 title: 'Soroa',
//                 start: '2018-03-20',
//                 end: '2018-03-24'
//             }
//         ],
//         viewDisplay : function(currentView){
//             var today = new Date();
//             var date = new Date(currentView.start);
//             if(today.getMonth() >= date.getMonth() &&
//                 today.getFullYear() >= date.getFullYear()){
//                 jQuery('.fc-button-prev').hide();
//             } else {
//                 jQuery('.fc-button-prev').show();
//             }
//         }
//
//     });
// });
//
