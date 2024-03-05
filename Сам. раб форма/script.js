        // Функция для установки cookie
        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + value + expires + "; path=/";
        }

        // Функция для получения значения cookie по имени
        function getCookie(name) {
            var nameEQ = name + "=";
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = cookies[i];
                while (cookie.charAt(0) == ' ') {
                    cookie = cookie.substring(1, cookie.length);
                }
                if (cookie.indexOf(nameEQ) == 0) {
                    return cookie.substring(nameEQ.length, cookie.length);
                }
            }
            return null;
        }

        // Функция для очистки cookie
        function clearCookie(name) {
            document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
        }

        // Функция для вывода данных из cookie на страницу
        function displayDataFromCookie() {
            var nameValue = getCookie('name');
            var emailValue = getCookie('email');
            var dobDayValue = getCookie('dob-day');
            var dobMonthValue = getCookie('dob-month');
            var dobYearValue = getCookie('dob-year');

            var output = "Имя: " + nameValue + "<br>";
            output += "Эл. почта: " + emailValue + "<br>";
            output += "Дата рождения: " + dobDayValue + " " + dobMonthValue + " " + dobYearValue + "<br>";

            document.getElementById('output').innerHTML = output;
        }

        // Событие при отправке формы
        document.querySelector('form').addEventListener('submit', function (e) {
            e.preventDefault(); // Предотвратить отправку формы
            var nameValue = document.getElementById('name').value;
            var emailValue = document.getElementById('email').value;
            var dobDayValue = document.getElementById('dob-day').value;
            var dobMonthValue = document.getElementById('dob-month').value;
            var dobYearValue = document.getElementById('dob-year').value;

            // Установка значений в cookie
            setCookie('name', nameValue, 7); // Хранить данные в cookie на 7 дней
            setCookie('email', emailValue, 7);
            setCookie('dob-day', dobDayValue, 7);
            setCookie('dob-month', dobMonthValue, 7);
            setCookie('dob-year', dobYearValue, 7);

            // Отображение данных из cookie
            displayDataFromCookie();
        });

        // Событие при загрузке страницы
        window.addEventListener('load', function () {
            // Отображение данных из cookie при загрузке страницы
            displayDataFromCookie();
        });

        // Событие при клике на кнопку "Очистить cookie"
        document.getElementById('clearCookieButton').addEventListener('click', function () {
            // Очистка cookie
            clearCookie('name');
            clearCookie('email');
            clearCookie('dob-day');
            clearCookie('dob-month');
            clearCookie('dob-year');

            // Отображение данных из cookie (теперь они должны быть пустыми)
            displayDataFromCookie();
        });
