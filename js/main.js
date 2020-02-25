(function () {
  // phone masked
  $('.my-phone').mask("+7 (999)-999-99-99");

  // Отправка заявки
  var orderForm = $(".js-order-form");

  orderForm.submit(function () {
    var _this = $(this);

    $.ajax({
      type: "POST",
      url: "./mail.php",
      data: _this.serialize()
    }).done(function () {
      _this.find("input").attr('disabled', 'disabled');

      setTimeout(function () {
        _this.find("input").removeAttr('disabled');
      }, 2000);

      $(this).find("input").val("");

      alert("Спасибо за заявку! Скоро мы с вами свяжемся.");

      orderForm.trigger("reset");
    });
    return false;
  });
}());
