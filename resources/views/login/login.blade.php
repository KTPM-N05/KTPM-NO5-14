<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - Electro</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#dc2626",
                        secondary: "#1f2937"
                    },
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
    <style>
        :where([class^="ri-"])::before {
            content: "\f3c2";
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #1a1c23;
        }

        .hide-password-toggle::-ms-reveal,
        .hide-password-toggle::-ms-clear {
            display: none;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>

<body class="min-h-screen">
    <div class="flex min-h-screen items-center justify-center p-4">
        <div class="w-full max-w-md rounded-xl bg-[#24262d] p-8 shadow-2xl">
            <a href="{{ route('home') }}"
                class="top-30 left-100 absolute text-gray-400 transition duration-300 hover:text-white">
                <i class="ri-arrow-left-s-line align-middle text-2xl"></i>
            </a>
            <div class="mb-8 flex flex-col items-center">

                <a href="{{ route('home') }}">
                    <h1 class="text-primary mb-2 font-['Pacifico'] text-4xl">Electro</h1>
                </a>
                <p class="text-sm text-gray-400">Chào mừng bạn quay trở lại</p>
            </div>
            <form id="loginForm" class="block" action="" method="POST">
                <div class="space-y-6">
                    <div>
                        <label for="email" class="mb-2 block text-sm font-medium text-white">Email hoặc số điện
                            thoại</label>
                        <div class="relative">
                            <div
                                class="absolute inset-y-0 left-0 flex h-full w-10 items-center justify-center text-white/70">
                                <i class="ri-user-line text-lg"></i>
                            </div>
                            <input type="text" id="email" name="email"
                                class="w-full rounded-xl border border-white/20 bg-white/10 py-3 pl-10 pr-4 text-sm text-white placeholder-white/50 focus:border-white/30 focus:outline-none focus:ring-2 focus:ring-white/30"
                                placeholder="Nhập email hoặc số điện thoại của bạn">
                        </div>
                        <p id="emailError" class="mt-1 hidden text-sm text-red-400">Vui lòng nhập email hoặc số điện
                            thoại hợp lệ</p>
                    </div>
                    <div>
                        <label for="password" class="mb-2 block text-sm font-medium text-white">Mật khẩu</label>
                        <div class="relative">
                            <div
                                class="absolute inset-y-0 left-0 flex h-full w-10 items-center justify-center text-white/70">
                                <i class="ri-lock-line text-lg"></i>
                            </div>
                            <input type="password" id="password" name="password"
                                class="hide-password-toggle w-full rounded-xl border border-white/20 bg-white/10 py-3 pl-10 pr-10 text-sm text-white placeholder-white/50 focus:border-white/30 focus:outline-none focus:ring-2 focus:ring-white/30"
                                placeholder="Nhập mật khẩu của bạn">
                            <button type="button" id="togglePassword"
                                class="absolute inset-y-0 right-0 flex h-full w-10 items-center justify-center text-white/70">
                                <i class="ri-eye-line text-lg" id="passwordIcon"></i>
                            </button>
                        </div>
                        <p id="passwordError" class="mt-1 hidden text-sm text-red-400">Mật khẩu phải có ít nhất 6 ký tự
                        </p>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="relative mr-2 inline-block h-5 w-10 select-none align-middle">
                                <input type="checkbox" id="remember" name="remember"
                                    class="checked:border-primary checked:bg-primary peer absolute block h-5 w-5 cursor-pointer appearance-none rounded-full border-2 border-white/20 bg-white/10 checked:right-0">
                                <label for="remember"
                                    class="peer-checked:bg-primary/20 block h-5 cursor-pointer overflow-hidden rounded-full bg-white/20"></label>
                            </div>
                            <label for="remember" class="cursor-pointer text-sm text-white">Ghi nhớ đăng nhập</label>
                        </div>
                        <a href="#" class="text-sm font-medium text-white hover:text-white/80">Quên mật khẩu?</a>
                    </div>
                    <button type="submit"
                        class="bg-primary hover:bg-primary/90 w-full whitespace-nowrap rounded-xl py-3 text-sm font-medium text-white transition duration-300">Đăng
                        nhập</button>


                </div>
            </form>
            <div class="mt-8 text-center">
                <p class="text-sm text-white/70">Chưa có tài khoản? <a href="{{ route('register') }}"
                        class="text-primary font-medium hover:text-white/80">Đăng ký ngay</a></p>
            </div>
        </div>
    </div>
    <script id="formValidation">
        document.addEventListener("DOMContentLoaded", function() {
            const emailInput = document.getElementById("email");
            const passwordInput = document.getElementById("password");
            const emailError = document.getElementById("emailError");
            const passwordError = document.getElementById("passwordError");
            let loginAttempts = 0;
            const loginForm = document.getElementById("loginForm");
            if (loginForm) {
                loginForm.addEventListener("submit", function(e) {
                    e.preventDefault();
                    let isValid = true;
                    emailError.classList.add("hidden");
                    passwordError.classList.add("hidden");
                    const emailValue = emailInput.value.trim();
                    if (!emailValue) {
                        emailError.textContent = "Vui lòng nhập email hoặc số điện thoại";
                        emailError.classList.remove("hidden");
                        isValid = false;
                    } else if (
                        !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailValue) &&
                        !/^[0-9]{10}$/.test(emailValue)
                    ) {
                        emailError.textContent = "Email hoặc số điện thoại không hợp lệ";
                        emailError.classList.remove("hidden");
                        isValid = false;
                    }
                    if (!passwordInput.value) {
                        passwordError.textContent = "Vui lòng nhập mật khẩu";
                        passwordError.classList.remove("hidden");
                        isValid = false;
                    } else if (passwordInput.value.length < 6) {
                        passwordError.textContent = "Mật khẩu phải có ít nhất 6 ký tự";
                        passwordError.classList.remove("hidden");
                        isValid = false;
                    }
                    if (isValid) {
                        if (
                            emailValue === "admin@example.com" &&
                            passwordInput.value === "password123"
                        ) {
                            showNotification("success", "Đăng nhập thành công!");
                            setTimeout(() => {
                                window.location.href = "/dashboard";
                            }, 1500);
                        } else {
                            loginAttempts++;
                            if (loginAttempts >= 3) {
                                showNotification(
                                    "error",
                                    "Bạn đã nhập sai thông tin quá nhiều lần. Vui lòng thử lại sau.",
                                );
                                loginForm.reset();
                                loginAttempts = 0;
                            } else {
                                showNotification(
                                    "error",
                                    `Thông tin đăng nhập không chính xác. Còn ${3 - loginAttempts} lần thử.`,
                                );
                            }
                        }
                    }
                });
            }

            function showNotification(type, message) {
                const notification = document.createElement("div");
                notification.className =
                    `fixed top-4 right-4 p-4 rounded-xl text-white ${type === "success" ? "bg-green-500" : "bg-red-500"} transition-opacity duration-300`;
                notification.textContent = message;
                document.body.appendChild(notification);
                setTimeout(() => {
                    notification.style.opacity = "0";
                    setTimeout(() => {
                        notification.remove();
                    }, 300);
                }, 3000);
            }
        });
    </script>
    <script id="passwordToggle">
        document.addEventListener("DOMContentLoaded", function() {
            const togglePassword = document.getElementById("togglePassword");
            const password = document.getElementById("password");
            const passwordIcon = document.getElementById("passwordIcon");
            if (togglePassword && password && passwordIcon) {
                togglePassword.addEventListener("click", function() {
                    const type =
                        password.getAttribute("type") === "password" ? "text" : "password";
                    password.setAttribute("type", type);
                    if (type === "password") {
                        passwordIcon.classList.remove("ri-eye-off-line");
                        passwordIcon.classList.add("ri-eye-line");
                    } else {
                        passwordIcon.classList.remove("ri-eye-line");
                        passwordIcon.classList.add("ri-eye-off-line");
                    }
                });
            }
        });
    </script>
</body>

</html>
