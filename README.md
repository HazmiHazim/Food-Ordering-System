# `Online Food Ordering System`

The Online Food Ordering System is built using the Laravel framework, which harnesses the power of pure HTML, CSS, and JavaScript. This application is developed to address a longstanding challenge faced by restaurants: streamlining the ordering process that has traditionally relied on staff waiters. With this web application, customers can conveniently place orders via their mobile devices by simply scanning the QR code provided on their table, which redirects them to the website's URL. The primary objective of this application is to facilitate swift and efficient ordering, ensuring that customers receive their orders within 15 to 30 minutes.

Furthermore, the application offers dedicated panels for both staff members and administrators (restaurant owner) to manage incoming customer orders. These panels serve distinct roles within the system. The administrator panel grants full control over the entire system, whereas the staff panel is designed specifically for managing tasks related to customer orders, reservations, complaints, and other responsibilities pertinent to their roles.

For ordering process, customers begin by choosing a table in the restaurant. They need to scan the QR code affixed to their table to access the system. Customers can then browse the menu and add items to their cart before finalizing their order. Once the food selection is complete, users confirm their cart's contents. To ensure efficient service, customers must also enter their table number, which is displayed at their table, allowing the staff to locate and serve the food. After completing the order, users receive a successful notification and QR code for payment, which is done at the counter, as the system does not support online payments.

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