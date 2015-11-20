 
  $('#container').on( "click", '#Start', function(e){
       
        $('#Start_user').click();
         // alert('CLICKED 1');
    });

  $('#container').on( "click", '#Start_user', function(e){
      $('#Start').trigger(e);
      alert('CLICKED 2');
  });


  $(document).ready(function() {


          $('.tooltipped').tooltip({delay: 50});
     
         $('.modal-trigger').leanModal({
            dismissible: true, 
            opacity: .5,
            in_duration: 600,
            out_duration: 600, 
        
          });
         
             // $('.datepicker').pickadate({
             //    selectMonths: true, 
             //    selectYears: 10

             //  });

             $('.datepicker').pickadate({
               
                onSelect: function(value, ui) {
                    var today = new Date(), 
                        dob = new Date(value), 
                        age = new Date(today - dob).getFullYear() - 2015;
                    
                    $('#age').text(age);
                },
                maxDate: '+0d',
                yearRange: '1950:2015',
                selectMonths: true,
                selectYears: 10
            });

             // $('.datepicker').pickadate().on(changeDate, function(e) {
             //        selectMonths: true, 
             //        selectYears: 10
             //        var currentDate = new Date();

             //        var selectedDate = new Date(e.date.toString());
             //        var age = currentDate.getFullYear() - selectedDate.getFullYear();
             //        var m = currentDate.getMonth() - selectedDate.getMonth();

             //        if (m < 0 || (m === 0 && currentDate.getDate() < selectedDate.getDate())) {
             //            age--;
             //        }

             //        $('.datepicker').val(age);
             //    });

             // $('.datepicker').datepicker({
             //      selectMonths: true, 
             //      selectYears: 10
             //      // if (selectYears <= 1997) {
             //      //   var age = 18;
             //      //   $('#age').text(age);
             //      // };
             //  });
         
           $('ul.tabs').tabs('select_tab', 'tab_id');
           $('select').material_select();  
           $('.slider').slider({full_width: true});
           $('.parallax').parallax();
           $('.dropdown-button').dropdown({
              inDuration: 400,
              outDuration: 325,
              constrain_width: false,
              hover: true,
              gutter: 0, 
              belowOrigin: false
            });


      });

      function toggleArticleForm(x){


          if ($('#' +x).is(":hidden")) {

            $('#'+x).slideDown(1000);
          }

        }


        $(function () {
            var parent = $("#shuffle");
            var divs = parent.children();
            while (divs.length) {
                parent.append(divs.splice(Math.floor(Math.random() * divs.length), 1)[0]);
            }
        });

document.getElementById("sub").disabled = true;

$(":radio").click(function(){
      document.getElementById("sub").disabled = false;
});

    // $('#Start').click(function() {
    //       $('#Start_user').click();
    //       alert('Aw');
    // });

    // if (document.getElementById('#Start').click()) {
    //     document.getElementById('button1').click(); 
    //     alert('Aw');
    // };
    // $(function() {
    //     $('#Start').click();
        // var room_id  = document.getElementById('room_id').val();
       // var room_id = $( "#room_id" ).val();
       // var room_id = $("#txt_name").attr('value')
        // alert(room_id);


        // var admin;

        // $('#button1').trigger('click');
        // $('button1').simulate('click');

       //  function button_click(){
       //    $('#button1').click();
       //  }

       // function a_onClick() {
       //   alert('a_onClick');
       //  }
    // });

     $(document).ready(function() {
              $("#Start").live('click', function(){
                alert('you clicked me!');
            });
         });

    (function($){
        $(function(){

          $('.button-collapse').sideNav();
          $('.parallax').parallax();
          

        }); // end of document ready
      })(jQuery);
  



             
     
     