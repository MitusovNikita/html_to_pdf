<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
//подключаем автозагрузчик
include_once 'dompdf/autoload.inc.php';
//подключаем класс библиотеки
use Dompdf\Dompdf;
//создаемэкземпляр класса
$d=new Dompdf();
//создаем пустую переменную
$html='';
//пример приема данных
$table='<table border="1">
<tbody>
<tr>
<td>1</td>
<td>2</td>
</tr>
<tr>
<td>3</td>
<td>4</td>
</tr>
</tbody>
</table>';
//склеиваем все данные
$html=$table;
//генерируем имя файла с уникальным ключем
$name=date("Y-m-d-H-i-s").uniqid().'.pdf';
//обрабатываем данные с помощью библиотеки DOMPDF
$d->loadHtml($html);
//устанавливаем ориентацию листа portrait || landscape
$d->setPaper('A4','portrait');
//отображаем готовый PDF
$d->render();
//записываем PDF в файл
file_put_contents(getenv('DOCUMENT_ROOT')."/projects/html_to_pdf/pdf/$name", $d->output());
//можно отправить ответ после AJAX Запроса с ссылкой на файл. у на
//echo '<div onclick="window.open(\''."/pdf/{$name}".'\')"><i class="oi-cloud-download"></i> Скачать файл</div>';
