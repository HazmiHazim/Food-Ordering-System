# `Online Food Ordering System`
Online food 

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

- Install php & javascript libraries
    ```
    composer install
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

# `Authentication`

- Admin
    ```
    ID: hashceo001
    ```
    ```
    Password: adminceouser
    ```

- Staff
    ```
    ID: hashstaff123
    ```
    ```
    Password: staffuser
    ```