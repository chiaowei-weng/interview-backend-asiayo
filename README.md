# interview-backend-asiayo

## API 實作測驗

單一職責原則 (Single Responsibility Principle, SRP)
- OrderApiController 只負責處理訂單相關的 API 請求
- 將貨幣轉換的邏輯抽離到 OrderService 中，而不是直接在 Controller 處理

依賴反轉原則 (Dependency Inversion Principle, DIP)
- 通過依賴注入的方式使用 OrderService

## docker

```
cd docker
docker compose up -d
docker compose exec php-fpm bash
```

/var/www
```
composer install
cp .env.example .env
php artisan key:generate
php artisan test
```
