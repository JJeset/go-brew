// js/subscription-ajax.js

jQuery(document).ready(function ($) {
  // Обработчик клика по кнопке оформления подписки
  $(".button_formalize").on("click", function (e) {
    e.preventDefault();

    var button = $(this);
    var originalText = button.find("span").text();

    // Показываем состояние загрузки
    button.prop("disabled", true);
    button.find("span").text(subscription_ajax.loading_text);
    button.addClass("loading");

    // Отправляем AJAX запрос
    $.ajax({
      url: subscription_ajax.ajax_url,
      type: "POST",
      data: {
        action: "add_subscription_to_cart",
        nonce: subscription_ajax.nonce,
      },
      success: function (response) {
        if (response.success) {
          // Перенаправляем на страницу оформления заказа
          window.location.href = response.data.checkout_url;
        } else {
          // Показываем ошибку
          alert(response.data.message || subscription_ajax.error_text);

          // Возвращаем кнопку в исходное состояние
          button.prop("disabled", false);
          button.find("span").text(originalText);
          button.removeClass("loading");
        }
      },
      error: function () {
        // Обработка ошибки AJAX
        alert(subscription_ajax.error_text);

        // Возвращаем кнопку в исходное состояние
        button.prop("disabled", false);
        button.find("span").text(originalText);
        button.removeClass("loading");
      },
    });
  });
});

// Дополнительные стили для состояния загрузки
jQuery(document).ready(function ($) {
  // Добавляем CSS стили через JavaScript
  $("<style>")
    .prop("type", "text/css")
    .html(
      `
            .button_formalize.loading {
                opacity: 0.7;
                cursor: not-allowed;
            }
            .button_formalize.loading:hover {
                transform: none;
            }
        `
    )
    .appendTo("head");
});
