<?php

$title = 'Главная страница';

$desciption = 'Заказать витраж, печать на плитке, авторскую мебель в Южно-Сахалинске';

$class = 'main-page';

$dir = '/uploads/gallery/';
$previewDir = $dir.'preview/';

$images = [
    ['img' => 'colorit2.jpg', 'title' => 'Витраж в Кукольном театре',],
    ['img' => 'colorit5.jpg','title' => 'Витраж на окне',],
    ['img' => 'colorit8.jpg','title' => 'Витражный светильник',],
    ['img' => 'colorit9.jpg','title' => 'Люстра декорированная витражем',],
    ['img' => 'colorit4.jpg','title' => 'Межкомнатные двери с мозаикой',],
    ['img' => 'mebel3.jpg','title' => 'Авторский стул',],
];

$content = [];
foreach ($images as $item) {
    $color = rand(1, 3);
    $content[] = sprintf('
    <div class="item t%1$d"><a href="%3$sfull/%4$s" data-lightbox="roadtrip" data-title="%5$s"><img src="%2$s%4$s" alt="" /><span>%5$s</span></a></div>', $color, $previewDir, $dir, $item['img'], $item['title']);
}
$content = array_chunk($content, 2);
foreach ($content as &$item) $item = implode('', $item);
$content = implode('</div><div class="column">', $content);
$content = sprintf('<div class="works"><h1><a href="/gallery/">Наши работы</a></h1><div class="column">%s</div></div>', $content);

$service = '
<div class="bwidth">
    <div class="services">
        <a href="/gallery/vitrazhi/" class="item i1">
            <img src="/uploads/images/service1.jpg" alt="" />
            <span class="name">Витражи</span>
            <p>«Тиффани» и «фьюзинг» - технологии, по которым изготавливается большинство современных витражей.</p>
        </a>
        <a href="/gallery/photoprint/" class="item i2">
            <img src="/uploads/images/service2.jpg" alt="" />
            <span class="name">Фотопечать</span>
            <p>Фотоплитка из стекла, керамики, печать фото, картин, изготовление сувениров.</p>
        </a>
        <a href="/gallery/mebel/" class="item i3">
            <img src="/uploads/images/service3.jpg" alt="" />
            <span class="name">Авторская мебель</span>
            <p>Изготовление авторской мебели в рустикальном стиле: беседки, банные комплексы, базы отдыха, кафе.</p>
        </a>
    </div>
</div>';

$seo = '
<div class="text">
    <b>Витражи</b>
    <p>Технология Фьюзинга (от английского fuse), также известна как Техника спекания. Фьюзинг стекла даёт возможность использовать витражи различной формы, структуры и толщины, витражи могут иметь радиус. Рисунок при технике Фьюзинг никогда не повторяется.</p>
    <b>Фотопечать</b>
    <p></p>
    <b>Авторская мебель</b>
    <p></p>
</div>';

?>
