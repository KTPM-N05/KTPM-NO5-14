<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đặt lại mật khẩu - Electro</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css"
    />
    <style>
      :where([class^="ri-"])::before { content: "\f3c2"; }
      body {
      background-color: #1a1f2e;
      font-family: 'Inter', sans-serif;
      }
      .auth-container {
      background-color: #22273a;
      }
      .logo {
      color: #e63946;
      font-family: 'Pacifico', serif;
      }
      .input-field {
      background-color: #f8f9fa;
      border: none;
      border-radius: 8px;
      padding: 12px 16px;
      width: 100%;
      color: #333;
      }
      .input-field:focus {
      outline: none;
      box-shadow: 0 0 0 2px rgba(230, 57, 70, 0.3);
      }
      .primary-btn {
      background-color: #e63946;
      color: white;
      border: none;
      border-radius: 8px;
      padding: 12px;
      width: 100%;
      font-weight: 500;
      cursor: pointer;
      transition: background-color 0.2s;
      }
      .primary-btn:hover {
      background-color: #d62f3d;
      }
      .link {
      color: #e63946;
      text-decoration: none;
      cursor: pointer;
      }
      .link:hover {
      text-decoration: underline;
      }
    </style>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: { primary: "#e63946", secondary: "#457b9d" },
            borderRadius: {
              none: "0px",
              sm: "4px",
              DEFAULT: "8px",
              md: "12px",
              lg: "16px",
              xl: "20px",
              "2xl": "24px",
              "3xl": "32px",
              full: "9999px",
              button: "8px",
            },
          },
        },
      };
    </script>
  </head>
  <body class="min-h-screen flex items-center justify-center p-4">
    <div class="auth-container w-full max-w-md rounded-lg p-8 shadow-lg">
      <div class="flex items-center mb-2">
        <button class="text-gray-400 hover:text-white transition-colors">
          <div class="w-8 h-8 flex items-center justify-center">
            <i class="ri-arrow-left-line ri-lg"></i>
          </div>
        </button>
      </div>
      <div class="text-center mb-6">
        <h1 class="logo text-3xl mb-3">Electro</h1>
        <p class="text-gray-300 text-sm">Đặt lại mật khẩu</p>
        <p class="text-gray-400 text-xs mt-2">
          Vui lòng nhập mật khẩu mới của bạn
        </p>
      </div>
      <form id="resetPasswordForm">
        <div class="mb-4">
          <div class="relative">
            <input
              type="password"
              id="newPassword"
              class="input-field pr-10"
              placeholder="Mật khẩu mới"
              required
            />
            <button
              type="button"
              class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700"
              data-password-toggle="newPassword"
            >
              <div class="w-6 h-6 flex items-center justify-center">
                <i class="ri-eye-off-line"></i>
              </div>
            </button>
          </div>
          <div class="text-xs text-gray-400 mt-1">
            Mật khẩu phải có ít nhất 8 ký tự
          </div>
        </div>
        <div class="mb-6">
          <div class="relative">
            <input
              type="password"
              id="confirmPassword"
              class="input-field pr-10"
              placeholder="Xác nhận mật khẩu mới"
              required
            />
            <button
              type="button"
              class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700"
              data-password-toggle="confirmPassword"
            >
              <div class="w-6 h-6 flex items-center justify-center">
                <i class="ri-eye-off-line"></i>
              </div>
            </button>
          </div>
        </div>
        <div class="mb-6">
          <button
            type="submit"
            class="primary-btn !rounded-button whitespace-nowrap"
          >
            Xác nhận
          </button>
        </div>
        <div class="text-center text-sm">
          <span class="text-gray-400">Đã nhớ mật khẩu? </span>
          <a href="#" class="link">Đăng nhập</a>
        </div>
      </form>
    </div>
    <script id="resetPasswordScript">
      document.addEventListener("DOMContentLoaded", function () {
        const resetPasswordForm = document.getElementById("resetPasswordForm");
        const newPasswordInput = document.getElementById("newPassword");
        const confirmPasswordInput = document.getElementById("confirmPassword");
        const toggleButtons = document.querySelectorAll("[data-password-toggle]");
        toggleButtons.forEach((button) => {
          button.addEventListener("click", function () {
            const inputId = this.getAttribute("data-password-toggle");
            const input = document.getElementById(inputId);
            const icon = this.querySelector("i");
            if (input.type === "password") {
              input.type = "text";
              icon.className = "ri-eye-line";
            } else {
              input.type = "password";
              icon.className = "ri-eye-off-line";
            }
          });
        });
        resetPasswordForm.addEventListener("submit", function (e) {
          e.preventDefault();
          const newPassword = newPasswordInput.value;
          const confirmPassword = confirmPasswordInput.value;
          if (newPassword.length < 8) {
            showNotification("Mật khẩu phải có ít nhất 8 ký tự", "error");
            return;
          }
          if (newPassword !== confirmPassword) {
            showNotification("Mật khẩu xác nhận không khớp", "error");
            return;
          }
          showNotification("Đặt lại mật khẩu thành công", "success");
          setTimeout(() => {
            window.location.href = "login.html";
          }, 1500);
        });
        function showNotification(message, type) {
          const notification = document.createElement("div");
          notification.className = `fixed top-4 right-4 p-4 rounded-lg text-white ${type === "error" ? "bg-red-500" : "bg-green-500"} shadow-lg transition-opacity duration-300`;
          notification.textContent = message;
          document.body.appendChild(notification);
          setTimeout(() => {
            notification.style.opacity = "0";
            setTimeout(() => notification.remove(), 300);
          }, 3000);
        }
      });
    </script>
  </body>
</html>
