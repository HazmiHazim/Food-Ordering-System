# `Installation`

- Clone repository
    ```
    git clone https://github.com/HazmiHazim/Food-Ordering-System.git
    ```

- Change directory
    ```
    cd YOUR-PATH-TO-PROJECT\Food-Ordering-System
    ```
    ```
    Example: Lets say Food-Ordering-System in download folder
    cd C:\Users\(Computer)\Downloads\Food-Ordering-System
    ```

- Copy sample `env` file and change configuration according to your need in ".env" file
    ```
    cp .env.example .env
    ```

- Update php & javascript libraries
    ```
    composer update
    ```
    
- Generate key
    ```
    php artisan key:generate
    ```
- Migrate database
    ```
    php artisan migrate
    ```    
- Run seeder
    ```
    php artisan db:seed
    ```

## User
```
ID : hashceo001
Pass : adminceouser

ID : hashstaff123
Pass : staffuser
```