<p align="center">
    <a href="https://rayhansict.com/" target="_blank">
        <img src="https://rayhansict.com/wp-content/uploads/2020/08/logo.png" width="150px">
    </a>
    <h1 align="center">Rayhan's ICT Website</h1>
</p>

---

## Contributor

-   <a href="https://github.com/rhishi-kesh" target="_blank">Rhishi kesh</a>
-   <a href="https://github.com/syful2021" target="_blank">Syful Islam</a>

## Installation

To Install & Run This Project You Have To Follow Thoose Following Steps:

```sh
git clone git@github.com:Rayhans-ICT/Rayhan-s-ICT-Website.git
```

```sh
composer install
```

Open your `.env` file and change the database name (`DB_DATABASE`) to whatever you have, username (`DB_USERNAME`) and password (`DB_PASSWORD`) field correspond to your configuration

```sh
php artisan key:generate
```

```sh
php artisan migrate
```

```sh
php artisan db:seed
```

```sh
php artisan serve
```