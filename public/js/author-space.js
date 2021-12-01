$(document).ready(function () {

    $("#tableQCM").find("input[type='checkbox']").click(function () {
        //check if checkbox is checked
        if ($(this).is(':checked')) {
            console.log("checked");
            $('.sendNewSms').removeAttr('disabled'); //enable input

        } else {
            $('.sendNewSms').attr('disabled', true); //disable input
        }
    });
})