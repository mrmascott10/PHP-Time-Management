// NEW PROJECT MODAL START
$("#new_project_btn").click(function () {
    $('#newProjectModal').css("display", "block");
});

$(".new_project_close").click(function () {
    $('#newProjectModal').css("display", "none");
});
// NEW PROJECT MODAL END

// DELETE JOB START
$(document).ready(function () {
    $(".delete-btn").click(function () {
        var jobId = $(this).attr('id');

        $.ajax({
            type: "POST",
            url: "timeManagementPHP.php",
            data: {
                "jobId": jobId
            },
            success: function (data) {
                location.reload();
            }
        });
    });
});


$('.check').attr('disabled', true); //  make checkbox disabled when page is started

// COMPLETE TASK START
function compTask(id) {
    if ($('#tr-' + id).css('color') === 'rgb(0, 0, 0)') { //    black
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


// ADD PROJECT START
function newProjectFunction() {
    var project_title = $('#project_title').val();
    var client_name = $('#client_name').val();
    var cost_hour = $('#cost_hour').val();
    var completion_date = $('#completion_date').val();
    var time_spent = $('#time_spent').val();
    var time_spent_min = $('#time_spent_min').val();
    var new_proj_description = $('#new_proj_description').val();
    var new_project_submit = $('#new_project_submit').val();
    $.ajax({
        type: "POST",
        url: "timeManagementPHP.php",
        data: {
            "project_title": project_title,
            "client_name": client_name,
            "cost_hour": cost_hour,
            "completion_date": completion_date,
            "time_spent": time_spent,
            "time_spent_min": time_spent_min,
            "new_proj_description": new_proj_description,
            "new_project_submit": new_project_submit
        },
        success: function(data) {
            location.reload();
        }
    })
}
// ADD PROJECT END