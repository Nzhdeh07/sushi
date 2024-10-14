<div style="display: none;" id="order-form" class="bg-white p-8 rounded-2xl shadow-2xl w-1/2">
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
            <textarea id="comment" name="comment" rows="4" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400" placeholder="Напишите ваш комментарий..."></textarea>
        </div>

        <!-- Поле для купона на скидку -->
        <div class="mb-6">
            <label for="coupon" class="block text-lg font-medium text-gray-700">Купон на скидку</label>
            <input type="text" id="coupon" name="coupon" class="w-full p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400" placeholder="Введите код купона...">
        </div>

        <!-- Отображение цены -->
        <div id="display-price" class="text-2xl font-bold text-gray-800 mb-6" >
            Цена: <span class="text-rose-500" id="display-price-value">0</span> руб.
        </div>

        <!-- Скрытые поля для ID и названия товара -->
        <input type="hidden" id="product-price" name="product_price" value="">
        <input type="hidden" id="product-name" name="product_name" value="">

        <div class="text-center">
            <button id="submitButton" type="submit" class="bg-rose-500  hover:bg-rose-600 text-white font-bold py-3 px-8 rounded-full shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                Отправить заказ
            </button>
        </div>
    </form>
</div>

<?php
$couponsDat = []; // Массив для хранения купонов
$coupons = get_field('cp', 'option'); // Получаем глобальное поле 'coupons' из опций

if ($coupons) {
    foreach ($coupons as $coupon_item) {
        // Получаем поля 'title' и 'dsale' для каждого элемента повторителя
        $title = esc_html($coupon_item['tl']); // Поле title, экранируем как текст
        $sale = intval($coupon_item['sl']);    // Поле dsale, приводим к целому числу

        // Добавляем купон в массив
        $couponsDat[] = [
            'title' => $title,
            'sale'  => $sale,
        ];
    }
}
?>

<script>
    jQuery(document).ready(function($) {
        const coupons = <?php echo json_encode($couponsDat, JSON_UNESCAPED_UNICODE); ?>;
        console.log(coupons);

        let originalPrice = 0; // Переменная для хранения оригинальной цены

        $('.order-button').on('click', function() {
            var productUrl = $(this).data('url');
            $('#product-name').val(productUrl);

            // Получаем цену продукта и сохраняем её в переменной
            originalPrice = parseFloat($(this).data('price'));
            $('#product-price').val(originalPrice.toFixed(2)); // Устанавливаем оригинальную цену
            $('#display-price-value').text(originalPrice.toFixed(2)); // Отображаем оригинальную цену
        });

        $('#coupon').on('input', function() {
            const couponCode = $(this).val().trim().toLowerCase(); // Приводим к нижнему регистру
            let discount = 0;
            let couponFound = false;

            // Ищем введенный купон в списке купонов
            coupons.forEach(function(coupon) {
                if (coupon.title.toLowerCase() === couponCode) { // Приводим купон к нижнему регистру
                    discount = parseFloat(coupon.sale); // Применяем скидку как число
                    couponFound = true; // Купон найден
                }
            });

            let finalPrice = originalPrice - discount; // Рассчитываем финальную цену

            // Обновляем отображение цены в зависимости от условий
            if (couponCode === '' || !couponFound) {
                $('#display-price-value').text(originalPrice.toFixed(2)); // Возвращаем оригинальную цену
                $('#product-price').val(originalPrice.toFixed(2)); // Возвращаем оригинальную цену
            } else {
                // Если купон найден, обновляем цену с учетом скидки
                $('#display-price-value').text(finalPrice > 0 ? finalPrice.toFixed(2) : 1); // Отображаем финальную цену или оригинальную
                $('#product-price').val(finalPrice > 0 ? finalPrice.toFixed(2) : 1); // Сохраняем финальную цену или оригинальную
            }
        });
    });

    document.getElementById('orderForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const submitButton = document.getElementById('submitButton');
        const formData = new FormData(this);

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



