<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Xác nhận mã - Electro</title>
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
        <p class="text-gray-300 text-sm">Nhập mã xác nhận</p>
        <p class="text-gray-400 text-xs mt-2">
          Mã xác nhận đã được gửi đến email của bạn
        </p>
      </div>
      <form id="verificationForm">
        <div class="mb-6">
          <div class="flex justify-between gap-2">
            <input
              type="text"
              maxlength="1"
              class="verification-input w-14 h-14 text-center text-xl font-bold bg-gray-100 rounded-lg border-none focus:ring-2 focus:ring-primary"
              required
            />
            <input
              type="text"
              maxlength="1"
              class="verification-input w-14 h-14 text-center text-xl font-bold bg-gray-100 rounded-lg border-none focus:ring-2 focus:ring-primary"
              required
            />
            <input
              type="text"
              maxlength="1"
              class="verification-input w-14 h-14 text-center text-xl font-bold bg-gray-100 rounded-lg border-none focus:ring-2 focus:ring-primary"
              required
            />
            <input
              type="text"
              maxlength="1"
              class="verification-input w-14 h-14 text-center text-xl font-bold bg-gray-100 rounded-lg border-none focus:ring-2 focus:ring-primary"
              required
            />
            <input
              type="text"
              maxlength="1"
              class="verification-input w-14 h-14 text-center text-xl font-bold bg-gray-100 rounded-lg border-none focus:ring-2 focus:ring-primary"
              required
            />
            <input
              type="text"
              maxlength="1"
              class="verification-input w-14 h-14 text-center text-xl font-bold bg-gray-100 rounded-lg border-none focus:ring-2 focus:ring-primary"
              required
            />
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
        <div class="text-center text-sm mb-4">
          <span class="text-gray-400">Không nhận được mã? </span>
          <button type="button" id="resendBtn" class="link">Gửi lại mã</button>
          <div id="countdown" class="text-gray-400 text-xs mt-1"></div>
        </div>
        <div class="text-center text-sm">
          <span class="text-gray-400">Đã nhớ mật khẩu? </span>
          <a href="#" class="link">Đăng nhập</a>
        </div>
      </form>
    </div>
    <script id="verificationScript">
      document.addEventListener("DOMContentLoaded", function () {
        const verificationForm = document.getElementById("verificationForm");
        const inputs = document.querySelectorAll(".verification-input");
        const resendBtn = document.getElementById("resendBtn");
        const countdownEl = document.getElementById("countdown");
        let countdownTime = 60;
        let countdownInterval;
        inputs.forEach((input, index) => {
          input.addEventListener("input", (e) => {
            if (e.target.value.length === 1) {
              if (index < inputs.length - 1) {
                inputs[index + 1].focus();
              }
            } else if (e.target.value.length > 1) {
              e.target.value = e.target.value.slice(0, 1);
            }
          });
          input.addEventListener("keydown", (e) => {
            if (e.key === "Backspace" && !e.target.value && index > 0) {
              inputs[index - 1].focus();
            }
          });
        });
        function startCountdown() {
          resendBtn.disabled = true;
          resendBtn.style.opacity = "0.5";
          countdownTime = 60;
          countdownInterval = setInterval(() => {
            countdownTime--;
            countdownEl.textContent = `Vui lòng đợi ${countdownTime} giây để gửi lại mã`;
            if (countdownTime <= 0) {
              clearInterval(countdownInterval);
              resendBtn.disabled = false;
              resendBtn.style.opacity = "1";
              countdownEl.textContent = "";
            }
          }, 1000);
        }
        startCountdown();
        resendBtn.addEventListener("click", () => {
          if (!resendBtn.disabled) {
            showNotification("Mã xác nhận mới đã được gửi", "success");
            startCountdown();
          }
        });
        verificationForm.addEventListener("submit", function (e) {
          e.preventDefault();
          const code = Array.from(inputs)
            .map((input) => input.value)
            .join("");
          if (code.length !== 6) {
            showNotification("Vui lòng nhập đủ mã xác nhận", "error");
            return;
          }
          showNotification("Xác nhận thành công", "success");
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
