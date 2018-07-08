// NEW PROJECT MODAL START
var new_project_modal = document.getElementById('newProjectModal');
var new_project_btn = document.getElementById("new_project_btn");
var new_project_close = document.getElementsByClassName("new_project_close")[0];
new_project_btn.onclick = function() {
    new_project_modal.style.display = "block";
}
new_project_close.onclick = function() {
    new_project_modal.style.display = "none";
}
    // new project modal ajax
// NEW PROJECT MODAL END

// DELETE JOB START
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
// DELETE JOB END
        
// COMPLETED TASK START
        function compTask(id)  {
            //Changing styling
            if ($('#complete-' + id).prop('checked')) {
                document.getElementById('tr' + id).style.color = "green";
            } else {
                document.getElementById('tr' + id).style.color = "black";
            }
        }
//COMPLETED TASK END
    
// PAID TASK START
        function paidTask(id) {
            // FUTURE: After selecting both then unselecting complete, paid stays selected.
            document.getElementById('complete-' + id).disabled = false;
            document.getElementById('paid-' + id).click(function () {
                return false;
            });
            if ($('#complete-' + id).prop('checked')) {
                document.getElementById('tr' + id).style.color = "green";
                document.getElementById('paid-' + id).click(function () {
                    return true;
                });
            }
            if ($('#paid-' + id).prop('checked') && $('#complete-' + id).prop('checked')) {
                document.getElementById('tr' + id).style.color = "gray";
            }
            else {
                document.getElementById('tr' + id).style.color = "black";
            }
        }
//PAID TASK END