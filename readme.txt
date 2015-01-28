=== PWP Lytebox ===
Contributors: polkan
Tags: lightbox, lytebox, light box, popup images, modal window images
Requires at least: 3.5.0
Tested up to: 4.1
Stable tag: 1.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

The fast and simple way to make all links pointing to images open in popup modal window.

== Description ==

The fast and simple way to make all links pointing to images open in popup modal window.

Plugin uses light-weight Lytebox js-project by Markus F. Hay (http://lytebox.com, Creative Commons Attribution 3.0 License).

After activate, plugin will make modal-window-openable every link <a href="...image">...</a> found in post (or page, or custom post) content.

To prevent links to be treated by plugin put "?" symbol on its end.
a href="image.jpg"   opens in modal window
a href="image.jpg?"  standard behaviour
You can put name of picture to show in modal window in "title" arrtibute
a href="image.jpg" title="Picture name"
You can put description of picture to show in modal window in "data-description" arrtibute
можно задать более подробное описание, используя параметр data-description
a href="image.jpg" title="Picture name" data-description="This picture is..."

++++++

Плагин может использоваться на любом Wordpress-сайте.
Создавался для использования с автоматическими интернет-магазинами на базе плагина <a href="http://p-api-shop.ru">P-API-Shop</a>.

Находит в контенте все ссылки, которые ведут на изображения и делает их открывающимися в модальном окне

Чтобы сделать исключение, добавьте знак ? в конец адреса картинки
a href="image.jpg"   откроется в модальном окне
a href="image.jpg?"  откроется стандартно
Подпись для картинки в модальном окне берется из атрибута title
a href="image.jpg" title="Картинка 1"
Можно задать более подробное описание изображения, используя параметр data-description
a href="image.jpg" title="Картинка 1" data-description="На этой картинке изображено..."

