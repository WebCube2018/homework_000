$("#submit").on("click", function () {
    var name = $("#name").val();
    var phone = $("#phone").val();
    var email = $("#email").val();
    var street = $("#street").val();
    var home = $("#home").val();
    var part = $("#part").val();
    var appt = $("#appt").val();
    var floor = $("#floor").val();
    var comment = $("#comment").val();
    var payment = $("#payment").val();
    var payment_card = $("#payment_card").val();
    var callback = $("#callback").val();

    $.ajax({
        url: "./form.php",
        data: {
            name: name,
            phone: phone,
            email: email,
            street: street,
            home: home,
            part: part,
            appt: appt,
            floor: floor,
            comment: comment,
            payment: payment,
            payment_card: payment_card,
            callback: callback,
        }
    }).done(function (data) {
        $("#message").html(data);
    })
});
