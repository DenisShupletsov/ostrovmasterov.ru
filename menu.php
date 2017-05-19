<div class="menu">
    <?
    $menu = [
        ['slug' => '/contacts/', 'title' => 'Контактная информация',],
        ['slug' => '/gallery/', 'title' => 'Наши работы',],
        ['slug' => '/about/', 'title' => 'О компании',],
        ['slug' => '/', 'title' => 'Главная',],
    ];
    $link = '<div><a href="%2$s">%1$s</a></div>';
    $sel = '<div><span>%1$s</span></div>';
    foreach ($menu as $item) {
        $template = $path[0] != trim($item['slug'], '/') ? 'link' : 'sel';
        echo sprintf(${$template}, $item['title'], $item['slug']);
    }
    ?>
</div>