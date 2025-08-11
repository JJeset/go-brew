(function () {
  document.addEventListener("click", burgerInit);

  // Закрываем меню при изменении размера окна
  window.addEventListener("resize", function () {
    if (window.innerWidth > 992) {
      document.body.classList.remove("body--opened-menu");
    }
  });

  // Закрываем меню при клике вне его области
  document.addEventListener("click", function (e) {
    if (document.body.classList.contains("body--opened-menu")) {
      const navMenu = document.querySelector(".nav-menu");
      const headerActions = document.querySelector(".header-actions");
      const burgerIcon = document.querySelector(".burger-icon");

      // Проверяем, что клик не по меню, не по header-actions и не по бургеру
      if (
        !navMenu.contains(e.target) &&
        !headerActions.contains(e.target) &&
        !burgerIcon.contains(e.target)
      ) {
        document.body.classList.remove("body--opened-menu");
      }
    }
  });

  // Закрываем меню при нажатии ESC
  document.addEventListener("keydown", function (e) {
    if (
      e.key === "Escape" &&
      document.body.classList.contains("body--opened-menu")
    ) {
      document.body.classList.remove("body--opened-menu");
    }
  });

  function burgerInit(e) {
    const burgerIcon = e.target.closest(".burger-icon");
    const burgerNavLink = e.target.closest(".menu-item");

    if (!burgerIcon && !burgerNavLink) return;
    if (document.documentElement.clientWidth > 992) return;

    // Переключаем состояние меню при клике на бургер
    if (burgerIcon) {
      e.preventDefault();
      toggleMenu();
    }

    // Закрываем меню при клике на ссылку навигации
    if (burgerNavLink) {
      setTimeout(() => {
        document.body.classList.remove("body--opened-menu");
      }, 100);
    }
  }

  function toggleMenu() {
    if (!document.body.classList.contains("body--opened-menu")) {
      document.body.classList.add("body--opened-menu");
    } else {
      document.body.classList.remove("body--opened-menu");
    }
  }
})();
