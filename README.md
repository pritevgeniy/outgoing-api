Тестовое задание на Laravel

Таблица "Исходящии" с полиморфной связью*, полями "Кому", "Текст" если есть, "Статус"
Таблица "Телефоны", поля "Номер телефона", "Активность"
Таблица "Почты", поля "Почтовый адрес", "Активность", поля настроек smtp для отправок сообщений
Таблица "СМС", поля "Номер телефона", "Активность"

* Таблица "Исходящии" полимофрна с "Телефоны", "СМС", "Почты", то есть таблица хранит отправление из разных источников
  ** Все таблицы с мягким удалением

Написать Rest API методы для
- Создания сущностей Телефонов, СМС, Почты
- Изменения сущностей Телефонов, СМС, Почты
- Удаления сущностей Телефонов, СМС, Почты
- Получения списка "Исходящих" который вернет следующие результаты
  Ид "Исходящиго", От - значение зависи от сущности Номер телефона или Адрес почты, Кому, Тест, Статус "Исходящего"


Вывод с api* в формате json(ошибки в том числе)

*GET /api/v1/outgoing* получение списка Исходящих 

*POST /api/v1/sms* Создание

*GET|PUT|DELETE /api/v1/sms/1* Получение

*POST /api/v1/phone* Создание

*GET|PUT|DELETE /api/v1/phone/1* Получение

*POST /api/v1/email* Создание

*GET|PUT|DELETE /api/v1/email/1* Получение
