# Генератор полисов сервиса онлайн-страхования

## Описание

Генератор страховых полисов из полученных данных в формате Json. После обработки данных, выдается Json с ссылкой на Страховой полис в формате PDF.
Для генерации страхового полиса, используется заранее подготовленный шаблон страховой компании, который с помощью библиотеки 
<a href="https://github.com/PHPOffice/PhpSpreadsheet">PhpSpreadsheet</a> заполняется и сохраняется на сервере в формате PDF.

## Установка:

1. docker-compose up --build -d
2. docker exec -it php bash
3. composer install
