# `Food Ordering System`

The Food Ordering System is built using the Laravel framework, which harnesses the power of pure HTML, CSS, and JavaScript. This application is developed to address a longstanding challenge faced by restaurants: streamlining the ordering process that has traditionally relied on staff waiters. With this web application, customers can conveniently place orders via their mobile devices by simply scanning the QR code provided on their table, which redirects them to the website's URL. The primary objective of this application is to facilitate swift and efficient ordering, ensuring that customers receive their orders within 15 to 30 minutes.

Furthermore, the application offers dedicated panels for both staff members and administrators (restaurant owner) to manage incoming customer orders. These panels serve distinct roles within the system. The administrator panel grants full control over the entire system, whereas the staff panel is designed specifically for managing tasks related to customer orders, reservations, complaints, and other responsibilities pertinent to their roles.

# `Available Features`

- Admin panel
- Staff panel
- Order food
- Add to cart system
- Search filter function
- Inventory management
- Manage customer order

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
- Link local storage (Optional)
    ```
    php artisan storage:link    
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