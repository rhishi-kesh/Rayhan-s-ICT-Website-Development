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
cd Rayhan-s-ICT-Website-Development
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
php artisan storage:link
```

```sh
php artisan db:seed
```
Open `app/Providers/AppServiceProvider.php` file and uncomment the following text
<p>
// view()->share('companyInformation', CompanyInformation::first()); <br>
// view()->share('course', Course::where('is_active', '0')->where('is_footer','0')->get()); <br>
// view()->share('topbanner', TopAdvertising::where('is_active', '0')->first()); <br>
</p>

```sh
php artisan optimize
```

```sh
php artisan serve
```
For Admin Login `http://127.0.0.1:8000/admin` <br>
Admin gmail = `admin@gmail.com` & password = `admin`
