
<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quên mật khẩu - Electro</title>
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
        <p class="text-gray-300 text-sm">Khôi phục mật khẩu của bạn</p>
      </div>
      <form id="forgotPasswordForm">
        <div class="mb-4">
          <label for="emailOrPhone" class="block text-gray-300 mb-2 text-sm"
            >Email hoặc số điện thoại</label
          >
          <input
            type="text"
            id="emailOrPhone"
            class="input-field"
            placeholder="Nhập email hoặc số điện thoại"
            required
          />
        </div>
        <div class="mb-6">
          <button
            type="submit"
            class="primary-btn !rounded-button whitespace-nowrap"
          >
            Gửi mã xác nhận
          </button>
        </div>
        <div class="text-center text-sm">
          <span class="text-gray-400">Đã nhớ mật khẩu? </span>
          <a href="#" class="link">Đăng nhập</a>
        </div>
      </form>
    </div>
    <script id="forgotPasswordScript">
      document.addEventListener("DOMContentLoaded", function () {
        const forgotPasswordForm = document.getElementById("forgotPasswordForm");
        forgotPasswordForm.addEventListener("submit", function (e) {
          e.preventDefault();
          const userEmail = document.getElementById("emailOrPhone").value;
          if (!userEmail) {
            showNotification("Vui lòng nhập email hoặc số điện thoại", "error");
            return;
          }
          showNotification("Mã xác nhận đã được gửi đến " + userEmail, "success");
          setTimeout(() => {
            window.location.href = "reset-password.html";
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
