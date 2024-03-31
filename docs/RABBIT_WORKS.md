## Примеры работы с консюмерами
### Example 1
> Базовый пример.

Запускаем наш consumer и говорим слушать:
![img_1.png](img/img_1.png)

Отправляем ему сообщение через команду.
> P.S. С помощью producer

![img.png](img/img_2.png)

consumer его получил:
![img_3.png](img/img_3.png)

Убеждаемся в этом в UI кролика:
![img.png](img/img.png)

### Example 2
> Отложенная отправка сообщений.

Запускаем соответствующий consumer:
![img.png](img/img_4.png)

Отправляем сообщение:
![img_1.png](img/img_5.png)

Что у consumer?
![img_2.png](img/img_6.png)
consumer получил успешное сообщение и ошибку, которая теперь будет бесконечно приходить.