$(document).ready(function(){
                            $("#carouselButton").click(function(){
        if ($("#carouselButton").children("span").hasClass('fa-pause')) {
            $("#mycarousel").carousel('pause');
            $("#carouselButton").children("span").removeClass('fa-pause');
            $("#carouselButton").children("span").addClass('fa-play');
        }
        else if ($("#carouselButton").children("span").hasClass('fa-play')){
            $("#mycarousel").carousel('cycle');
            $("#carouselButton").children("span").removeClass('fa-play');
            $("#carouselButton").children("span").addClass('fa-pause');                    
        }
    });
             $("#login").click(function(){
               
                    $("#loginModal").modal('show');
  });
                     $("#reserve").click(function(){
               
                    $("#reserveModal").modal('show');
  });
                       $("#hider").click(function(){
               
                    $("#reserveModal").modal('hide');
  });
                         $("#hidel").click(function(){
               
                    $("#loginModal").modal('hide');
  });
});
  //            $("#loginButton").click(function(){
               
  //                   $("#loginModal").modal('show');
  // });            
            
        // $(document).ready(function(){
        //     $('[data-toggle="tooltip"]').tooltip();
        // });
  
  
        // $(document).ready(function(){
        //     $("#mycarousel").carousel( { interval: 2000 } );
        //     $("#carousel-pause").click(function(){
        //         $("#mycarousel").carousel('pause');
        //     });
        //     $("#carousel-play").click(function(){
        //         $("#mycarousel").carousel('cycle');
        //     });
        // });
   
function validateLoginForm() {
  var pass = document.getElementById("pass").value;
  var email = document.getElementById("email").value;
  var error = document.getElementById("error");
  var patt = /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/;
  var res = patt.test(email);
  if (email == "" || pass == "") {
    error.innerHTML = "ALL fields required js";
    return false;
  }
  else if (!res) {
    error.innerHTML = "Email format is not correct";
    return false;
  }
  else if (pass.length < 6) {
    error.innerHTML = "Password should be 6 characters long";
    return false;
  }

}