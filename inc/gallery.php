<?php

//Функции для работы файловой базы данных
/*
function getFilesFromFolder($passToFolder)
{
  return array_diff(scandir($passToFolder), ['.', '..', '.DS_Store']);
}

function getDescription($dir, $name, $desciptionFile = '/description.txt')
{
  $desciptionFilePath = $dir.$name.$desciptionFile;
  return file_get_contents($desciptionFilePath, NULL, NULL);
}

function galleryList($dir, $files, $coverType, $content = [])
{
  foreach ($files as $name) {
    $previewDir = sprintf('%s%s/preview/', $dir, $name);
    $passToFolder = $previewDir;
    $imagesList = getFilesFromFolder($passToFolder);
    $randomImagesKey = array_rand($imagesList, 1);
    if ($coverType == 'first') {
      $nameOfImage = array_shift($imagesList);
      $key = array_search($nameOfImage , $imagesList);
    }
    if ($coverType == 'random') {
      $key = $randomImagesKey;
    }
    $desciptionFileContent = getDescription($dir, $name);
    $color = rand(1, 3);
    $previewDir = trim($previewDir, '.');
    $content[] = sprintf('
    <a href="/gallery/%s" class="album-gallery t%s"><img src="%s%s" alt="" /><span class="name">%s</span></a>', $name, $color, $previewDir, $imagesList[$key], $desciptionFileContent);
  }
  return $content;
}

function galleryItem($title, $dir, $files, $coverType, $path, $content = [])
{
  foreach ($files as $name) {
    $desciptionFileContent = getDescription($dir, $name);
    if ($name == $path[1]) {
      $title = sprintf('%s / %s', $title, $desciptionFileContent);
      $previewDir = sprintf('%s%s/preview/', $dir, $name);
      $passToFolder = $previewDir;
      $imagesList = getFilesFromFolder($passToFolder);
      foreach ($imagesList as $imagesName) {
        $color = rand(1, 3);
        $previewDir = trim($previewDir, ".");
        $imageFilePath = $previewDir.$imagesName;
        $content[] = sprintf('
        <a href="#" class="album-gallery t%s"><img src="%s" alt="" /><span class="name"></span></a>',$color, $imageFilePath);
      }
    }
  }
  return [$content, $title];
}
*/

$title = 'Наши работы';
$caption = 'Наши работы';
$desciption = 'Примеры наших работ';
$album = isset($path[1]) ? $path[1] : null;
//Важные переменные для работы файловой базы данных
/*
$dir = './uploads/works/';
$passToFolder = $dir;
$files = getFilesFromFolder($passToFolder);
*/
# Тип обложки: first || random
$coverType = 'first';
$login = 'root';
$password = 'root';
$host = 'localhost';
$databaseName = 'ostrov_masterov';

$mysqli = new mysqli($host, $login, $password, $databaseName);
if ($mysqli->connect_errno) {
    echo "Извините, возникла проблема на сайте";
    echo "Ошибка: Не удалсь создать соединение с базой MySQL и вот почему: \n";
    echo "Номер_ошибки: " . $mysqli->connect_errno . "\n";
    echo "Ошибка: " . $mysqli->connect_error . "\n";
    exit;
}

if ($album == NULL) {
  //$content = galleryList($dir, $files, $coverType);
  $sql = 'SELECT album.name, album.folderName, images.preview, images.cover FROM album LEFT JOIN images USING(id_album) WHERE cover = "1"';
  if (!$result = $mysqli->query($sql)) {
      echo "Извините, возникла проблема в работе сайта.";
      echo "Ошибка: Наш запрос не удался и вот почему: \n";
      echo "Запрос: " . $sql . "\n";
      echo "Номер_ошибки: " . $mysqli->errno . "\n";
      echo "Ошибка: " . $mysqli->error . "\n";
      exit;
  }

  while ($description = $result->fetch_assoc()) {
        $color = rand(1, 3);
        $content[] = sprintf('
        <a href="%s" class="album-gallery t%s"><img src="/uploads/gallery/preview/%s" alt="" /><span class="name">%s</span></a>', $description['folderName'], $color, $description['preview'], $description['name']);
  }
}
else{
  //$content = galleryItem($title, $dir, $files, $coverType, $path);
  $sql = sprintf('SELECT folderName, images.id_album, album.id_album, preview, full  FROM album, images WHERE images.id_album = album.id_album AND album.folderName = "%s"', $path[1]);
  if (!$result = $mysqli->query($sql)) {
      echo "Извините, возникла проблема в работе сайта.";
      echo "Ошибка: Наш запрос не удался и вот почему: \n";
      echo "Запрос: " . $sql . "\n";
      echo "Номер_ошибки: " . $mysqli->errno . "\n";
      echo "Ошибка: " . $mysqli->error . "\n";
      exit;
  }
  while ($img = $result->fetch_assoc()) {
    $color = rand(1, 3);
    $content[] = sprintf('
    <a href="../uploads/gallery/full/%s" class="album-gallery t%s" data-lightbox="roadtrip"><img src="/uploads/gallery/preview/%s" alt="" /><span class="name"></span></a>', $img['full'], $color, $img['preview']);
  }
}

$result->free();
$mysqli->close();

$content = implode($content);
$content = sprintf('
<div class="bwidth"><div id="main"><h1>%s</h1><div class="gallery">%s</div></div></div>', $caption, $content);


?>
