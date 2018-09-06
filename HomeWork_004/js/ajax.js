$("#submit").on("click", function () {
    var km = $("#km").val();
    var time = $("#time").val();
    var age = $("#age").val();
    $(document).on('change', '.select-test-1', function select() {
        return $(this).val();

    });
    $.ajax({
        url: "./form.php",
        data: {
            km: km,
            time: time,
            age: age,
            tarif: select
        }
    }).done(function (data) {
        console.log(data);
    })
});