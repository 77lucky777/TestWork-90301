## Install application

```bash
git clone https://github.com/77lucky777/TestWork-90301.git
composer install
cp .env .env.example 
# настроить бд
php artisan key:generate
cd ui
npm install
```

## Start application

```bash
php artisan serve
cd front
npm run dev
```