var initial_value = 72000000;

$(document).ready(function() {
    getApplicantCount();
});

function getApplicantCount() {
    $.ajax({
        url: "includes/ajax.php",
        method: "POST",
        data: {
            applicant_count: 1,
        },
        success: function(result) {
            data = $.parseJSON(result);

            $("#result_registered").html((parseInt(initial_value) + parseInt(data["total_account_registered"])).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            $("#result_verified").html((parseInt(initial_value) + parseInt(data["total_account_verified"])).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

            setTimeout(() => { getApplicantCount(); }, 1000);
        }
    });
}