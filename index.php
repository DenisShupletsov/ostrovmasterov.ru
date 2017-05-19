<?php
error_reporting(E_ALL);

$path = explode('/', parse_url(trim($_SERVER['REQUEST_URI'], '/'))['path']);

switch ($path[0]) {
    case 'about':
        $title = 'О компании';
        $desciption = '';
        $content = '
        <div id="main">
            <h1>О компании</h1>
            <div class="left-block">
                <p>Информация будет доступна позже.</p>
            </div>
            <div class="right-block">
                <div class="additional-links">
                    <ul>
                        <li><a href="/contacts/#feedback">Сделать заказ</a></li>
                    </ul>
                </div>
                <img src="http://placehold.it/200x300" alt="" />
            </div>
        </div>';
        break;
    case 'gallery':
        require_once 'inc/gallery.php';
        #$title = 'О компании';
        #$desciption = 'Примеры наших работ';
        #$album = isset($path[1]) ? $path[1] : null;
        #$path = '/path/to/dir/';
        #$files = array_diff(scandir($path), array('.', '..'));
        #var_dump($files);
        #$content = gallery($album);
        break;
    case 'contacts':
        $title = 'Контактная информация';
        $desciption = 'Как нас найти на карте Южно-Сахалинска.';
        $content = '
        <div id="main">
            <h1>Контактная информация</h1>
            <div class="left-block">
                <h3>Телефон</h3>
                <p>(4242) 40-18-68, 8 914 649 9395</p>
                <h3>Адрес</h3>
                <p>г. Южно-Сахалинск, ул. Ленина 330, павильон «Дока»</p>
                <h3>Эл. почта</h3>
                <p><a href="mailto:alexander.zabegalin@yandex.ru">alexander.zabegalin@yandex.ru</a></p>
            </div>
            <div class="right-block">
                <div class="additional-links">
                    <ul>
                        <li><a href="/contacts/#feedback">Сделать заказ</a></li>
                    </ul>
                </div>
                <img src="http://placehold.it/200x300" alt="" />
            </div>
        </div>';
        break;
    case 'vitrazhi':
        $title = 'Витражи — «вечные ценности»';
        $desciption = '';
        $content = '
        <div id="main">
            <h1>Контактная информация</h1>
            <div class="left-block">
                <p>Художественный витраж, старинная разновидность монументального искусства — картины из цветного стекла пропускающего свет. Витражи вставляют в оконные рамы, ниши, делают панно, монтируют в дверные проемы, решетки, а витражный потолок украсит любой интерьер.</p>
                <p>Витраж как предмет искусства уникален, дорог и долговечен. Когда заказываешь витраж нужно помнить, что между эскизом, картоном и конечным результатом всегда есть существенное зрительное различие. Сюжет, композицию, стилистику, масштабность, общий колорит, линейный рисунок контуров может предугадать только автор, поэтому правильнее всего будет, поняв общую идею произведения, в дальнейшем довериться видению, интуиции, таланту и опыту художника-витражиста.</p>
                <p>Сегодня художники-витражисты используют огромное разнообразие цветного стекла как листового и фактурного. На современном рынке представлено цветное стекло производства Германии, Бельгии, Чехии, Франции, США. Палитра этого материала огромна — около 250 базовых цветов плюс оттенки, которые можно получить путем спекания разноцветных элементов или процессе температурной обработки. Также есть так называемое живописное стекло его фактура и цвет сочетаются настолько продуманно и артистично, что оно уже само по себе может служить объектом эстетического любование.</p>
                <p>Художественные витражи – это кропотливый ручной труд. Для детализированного рисунка, собираемого из маленьких цветных фрагментов, используют ленту из липкой медной фольги, которой обклеивают каждое стеклышко по периметру и получают возможность для спаивания стеклянных элементов, так создается витраж в технике «Тиффани». Также можно создавать более сложные формы витража сочетая несколько техник, что требует знания особых секретов технологии -это объемные витражи светильники, и тд.</p>
            </div>
            <div class="right-block">
                <div class="additional-links">
                    <ul>
                        <li><a href="/contacts/#feedback">Сделать заказ</a></li>
                    </ul>
                </div>
                <img src="http://placehold.it/200x300" alt="" />
            </div>
        </div>';
        break;
    case '':
        require_once 'inc/main_page.php';
        break;
    default:
        echo 'Ошибка.';
}

require_once 'base.php';

?>
