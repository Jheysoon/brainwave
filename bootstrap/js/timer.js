
$(document).ready(function() {
  $('#icon1').hide();
  $('#icon2').hide();
  $('#icon3').hide();
  $('#icon4').hide();
})


var count=30;
var easy = 10;
var mod = 10;
var hard = 5;

var counter=setInterval(timer, 1000); 
  function timer()
  {
   
    document.getElementById("timer").innerHTML=count; 

    if (count <= 0) {

      $("#icon1").show("slow");
      $("#icon2").show("slow");
      $("#icon3").show("slow");
      $("#icon4").show("slow");
      var checked = $('input:radio[name=group1]:checked').val();

       if (checked == 'correct') {
          var score = 10;
          document.getElementById('score').innerHTML = score;
        }else if(checked == 'wrong') {
          var score = 0;
           document.getElementById('score').innerHTML = score;
        } 
      
      clearInterval(counter);
       document.getElementById("sub").disabled = true;

      // $("#pagination").click(function(){});
      $('#pagination').trigger('click');

    };
    
     --count;

    document.getElementById("sub").onclick = function() {
      document.getElementById("correct").disabled = true;
      document.getElementById("test2").disabled = true;
      document.getElementById("test3").disabled = true;
      document.getElementById("test4").disabled = true;

      

    }
  }
