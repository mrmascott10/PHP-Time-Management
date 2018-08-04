// NEW PROJECT MODAL START
var new_project_btn = $("#new_project_btn");

$("#newProjectModal").click(function() {
    $(this).css("display", "block");
});

$(".new_project_close").click(function() {
    $(this).css("display", "none");
});
// NEW PROJECT MODAL END

// DELETE JOB START
$(document).ready(function() {
        $(".delete-btn").click(function() {
            var jobId = $(this).attr('id');
            
             $.ajax({
                type: "POST",
                url: "timeManagementPHP.php",
                data: {
                    "jobId": jobId,
                },
                success: function(data) {
                   location.reload();
                }
            });
        });
    });


$('.check').attr('disabled', true); //  make checkbox disabled when page is started

// COMPLETE TASK START
 function compTask(id) {
     
     if($('#tr-' + id).css('color') === 'rgb(0, 0, 0)') { //    black
         $('#tr-' + id).css("color", "rgb(39, 134, 39)"); //    green
     } else if ($('#tr-' + id).css('color') === 'rgb(39, 134, 39)') {
         $('#tr-' + id).css('color', 'rgb(0, 0, 0)');
     } else if ($('#tr-' + id).css('color') === 'rgb(128, 128, 128)') { //  grey
         $('#tr-' + id).css('color', 'rgb(0, 0, 0)');
         $('#paid-' + id).prop('checked') == false;
     }
     
     $('#paid-' + id).attr('disabled', false);
 }
// COMPLETE TASK END

// PAID TASK START
function paidTask(id) {    
    $('#tr-' + id).css("color", "rgb(128, 128, 128)");
    // TODO: When complete and paid are checked and then paid is unchecked the colour needs to go back to green.
 }
// PAID TASK END