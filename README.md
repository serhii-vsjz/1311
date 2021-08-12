
## Запуск проекта

- слонировать проект

    git clone https://github.com/serhii-vsjz/1311.git
- перейти в папку с проектом

    cd 1311
- поднять docker контейнер 

    docker-compose up -d 
- Запустить миграции

    docker exec uoa_php php artisan migrate
- Заполнить базу начальными данными(города и раены)
  
    docker exec uoa_php php artisan db:seed
- Приложение должно быть доступно в браузере на localhost

    http://localhost/
