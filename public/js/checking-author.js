$(document).ready(function () {
    var dataAddBenefit = {}, dataDelBenefit = {};
    $("#tableUser2Author").find("input[type='checkbox']").each(function (e) {
        $(this).change(function () {
            if (this.checked) {
                dataAddBenefit[e] = $(this).attr('id');
                console.log(dataAddBenefit);
            } else {
                dataDelBenefit[e] = $(this).attr('id');
                console.log(dataDelBenefit); 
            }
        });
    });
})