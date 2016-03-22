$(document).ready(function(){
    $('.entertain_box .video_wrap').click(function(){
        var elemClicked = $(this).attr('class');
      //  alert("element clicked "+elemClicked);
        var clickedIndex = elemClicked.substring(((elemClicked.length) - 1), elemClicked.length);
      //  alert("clicked index "+clickedIndex);
        $('.vid_ctrl'+clickedIndex).click(function() {
           // $(this).get(0).pause();
          // $('.video_'+clickedIndex).get(0).pause();
            document.getElementsByClassName(elemClicked).pause();

        });

       /* $("video").each(function(){
            $(this).get(0).pause();
        });*/
    })
})


function rate() {

    var x = 0;
    if (document.getElementById("ratecheck1").checked == true) {

        // var x = document.getElementById("ratecheck1").checked;
        x++;
    }
    if (document.getElementById("ratecheck2").checked == true) {
        //var x = document.getElementById("ratecheck2").checked;
        x++;
    }
    if (document.getElementById("ratecheck3").checked == true) {
        // var x = document.getElementById("ratecheck3").checked;
        x++;
    }
    if (document.getElementById("ratecheck4").checked == true) {
        // var x = document.getElementById("ratecheck4").checked;
        x++;
    }
    if (document.getElementById("ratecheck5").checked == true) {
        //  var x = document.getElementById("ratecheck5").checked;
        x++;
    }
    var videoId = document.getElementById("videoIdInput").value;
    var videoRate = x;
    if (videoRate ==0)
    {
        alert("Invalid Rating Detected!");
    }
    else
    {

    var param = videoId +"|"+ videoRate;

    alert(param);

    $.ajax({
        type: 'POST',
        url: 'users/getUserVideoRate',
        data: {'videoId': param}
    });

    }



    function maxsizepop(){

        alert('NB: maximum file size allowed is 32MB');


    }
//    $(document).ready(function() {
//        $(".entertain_box").load("users/index");
//        var refreshId = setInterval(function() {
//            $(".entertain_box").load('users/index');
//        }, 9000);
//        $.ajaxSetup({ cache: false });
//    });
//alert('after ajax operation');
//        }



}
/*

function getNewAdmin() {
   // alert('am in javascript');


   var id =document.getElementById("tid").value;
    var fullname= document.getElementById("tfullname").value;
    var phoneno= document.getElementById("tphoneno").value;
    var email=  document.getElementById("temail").value;
    var date_added = document.getElementById("tdate").value;

    var username=document.getElementById("tusername").value;
    var password=   document.getElementById("tpassword").value;
    var password2=   document.getElementById("tpassword2").value;

   // alert(date_added);


  //  var videoRate = x;
    if (id =="" || username =="" ||password=="" ||fullname=="" ||email=="" ||phoneno=="")
    {
        alert("One of the Fields is empty!");
    }
    else if (password != password2)
    {
        alert("Password Mismatch!");

    }
    else
    {
        alert("correct");
        var param = id +"|"+  fullname +"|"+ phoneno +"|"+ email +"|"+ date_added +"|"+ username +"|"+ password  ;

        alert(param);

        $.ajax({
            type: 'POST',
            url: 'users/getUserVideoRate',
            data: {'videoId': param}
        });

    }
}
*/











