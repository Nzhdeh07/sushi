<!-- Скрытое содержимое для модального окна -->
<div id="modal-basket" style="display: none;" class="grid gap-5 bg-white p-8 rounded-xl shadow-2xl">
    <h2 class="text-3xl font-bold mb-6 text-center">Содержимое корзины</h2>
    <div id="cart-content" class="grid gap-3">Загрузка...</div>

    <!-- Поле для купона на скидку -->
    <div>
        <label for="coupon" class="block text-lg font-medium text-gray-700">Купон на скидку</label>
        <input type="text" id="coupon" name="coupon"
               class="w-full p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400"
               placeholder="Введите код купона...">
    </div>

    <!-- Отображение цены -->
    <div id="display-price" class="text-2xl font-bold text-gray-800 ">
        Цена: <span class="text-rose-500" id="display-price-value">0</span> руб.
    </div>

    <!-- Форма для оформления заказа -->
    <div id="order-form">
        <h2 class="text-3xl font-bold mb-6 text-center">Оформить заказ</h2>
        <form id="orderForm" action="<?php echo get_template_directory_uri(); ?>/send-order.php" method="post">
            <!-- Поле для телефона -->
            <div class="mb-6">
                <label for="phone" class="block text-lg font-medium text-gray-700">Телефон</label>
                <input type="tel" id="phone" name="phone"
                       pattern="[\+]?[\d\s\-\(\)]{7,15}"
                       placeholder="+375332225544"
                       class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400"
                       required>
            </div>

            <!-- Поле для комментария -->
            <div class="mb-6">
                <label for="comment" class="block text-lg font-medium text-gray-700">Комментарий</label>
                <textarea id="comment" name="comment" rows="4"
                          class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400"
                          placeholder="Напишите ваш комментарий..."></textarea>
            </div>


            <!-- Скрытые поля для ID и названия товара -->
            <input type="hidden" id="product-price" name="product_price" value="">
            <input type="hidden" id="product-name" name="product_name" value="">

            <div class="text-center">
                <button id="submitButton" type="submit"
                        class="bg-rose-500 hover:bg-rose-600 text-white font-bold py-3 px-8 rounded-full shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                    Отправить заказ
                </button>
            </div>
        </form>
    </div>
</div>


<div id="cart-modal" class="fancybox-content items-center bg-white p-4 rounded-2xl shadow-2xl " style="display: none;">
    <h2 class="text-3xl font-bold mb-2 text-center">Товар добавлен</h2>
    <p>Товар успешно добавлен в корзину!</p>
    <div class="flex justify-center py-2">
        <button id="close-modal-button"
                class="fancybox-close bg-rose-500 hover:bg-rose-600 text-white font-bold py-2 px-6 rounded-full shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
            Закрыть
        </button>
    </div>
</div>


<?php
$couponsDat = []; // Массив для хранения купонов
$coupons = get_field('coupons', 'option'); // Получаем глобальное поле 'coupons' из опций

if ($coupons) {
    foreach ($coupons as $coupon_item) {
        // Получаем поля 'title' и 'dsale' для каждого элемента повторителя
        $title = esc_html($coupon_item['coupon-title']); // Поле title, экранируем как текст
        $sale = intval($coupon_item['coupon-discount']);    // Поле dsale, приводим к целому числу

        // Добавляем купон в массив
        $couponsDat[] = [
            'title' => $title,
            'sale' => $sale,
        ];
    }
}
?>


<script>
    let totalPrice = 0; // Переменная для хранения общей суммы

    // Функция для добавления товара в корзину
    function addToCart(productId, productName, productPrice, productImage) {
        let cart = JSON.parse(sessionStorage.getItem("cart")) || {};

        if (cart[productId]) {
            cart[productId].quantity += 1;
        } else {
            cart[productId] = {
                name: productName,
                price: productPrice,
                image: productImage,
                quantity: 1
            };
        }
        sessionStorage.setItem("cart", JSON.stringify(cart));
        // Открытие модального окна через Fancybox
        $.fancybox.open({
            src: '#cart-modal',
            type: 'inline', // Убедитесь, что указали тип, если необходимо
            opts: { // Используйте opts для передачи опций
                closeButton: false, // Отключаем стандартную кнопку закрытия
                afterShow: () => { // Используем afterShow вместо reveal
                    const closeButton = document.querySelector('.fancybox-close');
                    if (closeButton) {
                        closeButton.addEventListener('click', () => {
                            $.fancybox.close(); // Закрыть модальное окно при клике
                        });
                    }
                }
            }
        });

    }

    // Функция для изменения количества товара
    function changeQuantity(productId, change) {
        let cart = JSON.parse(sessionStorage.getItem("cart")) || {};

        if (cart[productId]) {
            cart[productId].quantity += change;
            // Убедимся, что количество не отрицательное
            if (cart[productId].quantity < 1) {
                cart[productId].quantity = 1; // Минимальное количество 1
            }
            sessionStorage.setItem("cart", JSON.stringify(cart));
            getCart(); // Обновляем отображение корзины
        }
    }


    // Функция для удаления товара из корзины
    function removeFromCart(productId) {
        let cart = JSON.parse(sessionStorage.getItem("cart")) || {};

        if (cart[productId]) {
            delete cart[productId];
        }

        sessionStorage.setItem("cart", JSON.stringify(cart));
        getCart();
    }


    function getCart() {
        let cart = JSON.parse(sessionStorage.getItem("cart")) || {};
        let cartContentDiv = document.getElementById("cart-content");
        let cartItems = [];
        totalPrice = 0; // Сброс общей суммы

        for (let productId in cart) {
            let item = cart[productId];
            let itemTotalPrice = item.price * item.quantity; // Подсчет цены для текущего товара
            totalPrice += itemTotalPrice; // Добавляем цену текущего товара к общей сумме

            cartItems.push(`
                <div class="grid grid-cols-[60px_1fr] gap-3">
                    <img class="h-[60px] object-cover" src="${item.image}" alt="${item.name}"">
                    <div class="flex justify-between">
                    <div class="flex flex-col">
                            <p>${item.name}</p>
                      <div class="flex  font-bold">${itemTotalPrice.toFixed(2)} руб.</div>
                        <div class="flex gap-3 items-center">
                            <button onclick="changeQuantity('${productId}', -1)" class="px-2 bg-rose-500 rounded-md overflow-hidden text-white flex items-center justify-center text-xl">&minus;</button>

                            <span id="quantity-${productId}">${item.quantity}</span>

                            <button onclick="changeQuantity('${productId}', 1)" class="px-2 bg-green-700 rounded-md overflow-hidden text-white flex items-center justify-center text-xl">+</button>
                            <button onclick="removeFromCart('${productId}')" class="px-2 py-0.5 bg-gray-300 rounded-xl overflow-hidden flex items-center justify-center ">Удалить</button>
                        </div>
                        </div>
                    </div>

                </div>
            `);
        }

        cartContentDiv.innerHTML = cartItems.length > 0 ? cartItems.join('') : 'Корзина пуста.';
        document.getElementById("display-price-value").innerText = totalPrice.toFixed(2); // Обновляем общую цену
        document.getElementById("display-product-name").innerText = cartItems.length > 0 ? "Ваши товары" : "Корзина пуста.";
    }


    // Функция для очистки всей корзины
    function clearCart() {
        sessionStorage.removeItem("cart");
    }


    jQuery(document).ready(function ($) {
        const coupons = <?php echo json_encode($couponsDat, JSON_UNESCAPED_UNICODE); ?>;
        console.log(coupons);

        let originalPrice = 0;

        $('.order-button').on('click', function () {
            const productId = this.getAttribute('data-productId');
            const productName = this.getAttribute('data-ptitle');
            const productPrice = this.getAttribute('data-price');
            const productImage = this.getAttribute('data-img');

            var productUrl = $(this).data('url');
            $('#product-name').val(productUrl);

            // Получаем цену продукта и сохраняем её в переменной
            originalPrice = parseFloat($(this).data('price'));
            $('#product-price').val(originalPrice.toFixed(2)); // Устанавливаем оригинальную цену
            $('#display-price-value').text(originalPrice.toFixed(2)); // Отображаем оригинальную цену

            addToCart(productId, productName, productPrice, productImage);
        });


        $('#coupon').on('input', function () {
            const couponCode = $(this).val().trim().toLowerCase();
            let discount = 0;
            let couponFound = false;

            // Ищем введенный купон в списке купонов
            coupons.forEach(function (coupon) {
                if (coupon.title.toLowerCase() === couponCode) {
                    discount = parseFloat(coupon.sale);
                    couponFound = true;
                }
            });

            let finalPrice = totalPrice - discount; // Используем totalPrice вместо originalPrice

            if (couponCode === '' || !couponFound) {
                $('#display-price-value').text(totalPrice.toFixed(2));
                $('#product-price').val(totalPrice.toFixed(2));
            } else {
                $('#display-price-value').text(finalPrice > 0 ? finalPrice.toFixed(2) : 1);
                $('#product-price').val(finalPrice > 0 ? finalPrice.toFixed(2) : 1);
            }
        });

    });

    document.getElementById('orderForm').addEventListener('submit', function (event) {
        event.preventDefault();
        const submitButton = document.getElementById('submitButton');
        const formData = new FormData(this);

        // Получение корзины из sessionStorage
        let cart = JSON.parse(sessionStorage.getItem("cart")) || {};
        let totalPrice = 0; // Переменная для хранения общей стоимости заказа

        // Перебираем товары в корзине и добавляем их в FormData
        for (let productId in cart) {
            let item = cart[productId];
            formData.append('product_name[]', item.name); // Добавляем имя товара
            formData.append('product_quantity[]', item.quantity); // Добавляем количество товара
            formData.append('product_price[]', item.price); // Добавляем цену товара
        }
        // Добавляем общую цену в FormData
        formData.append('total_price', parseFloat(document.getElementById("display-price-value").innerText) || 0);

        fetch('<?php echo get_template_directory_uri(); ?>/send-order.php', {
            method: 'POST',
            body: formData
        })
            .then(response => {
                if (response.ok) {
                    submitButton.textContent = 'Заказ отправлен';
                    submitButton.classList.remove('bg-rose-500', 'hover:bg-rose-600');
                    submitButton.classList.add('bg-green-500', 'text-white');

                    setTimeout(() => {
                        submitButton.textContent = 'Отправить заказ';
                        submitButton.classList.remove('bg-green-500');
                        submitButton.classList.add('bg-rose-500', 'hover:bg-rose-600');
                        document.getElementById('orderForm').reset();
                        document.querySelector('.f-button.is-close-btn').click();
                    }, 1000);
                } else {
                    alert('Ошибка при отправке заказа. Попробуйте еще раз.');
                }
            })
            .catch(error => {
                console.error('Ошибка:', error);
                alert('Ошибка при отправке заказа. Попробуйте еще раз.');
            });
    });


</script>



