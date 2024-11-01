# interview-backend-asiayo

## 資料庫測驗

題目一：
```sql
SELECT
    b.id as bnb_id,
    b.name as bnb_name,
    SUM(o.amount) as may_amount
FROM
    orders o
    JOIN bnbs b ON o.bnb_id = b.id
WHERE
    o.currency = 'TWD'
    AND o.created_at >= '2023-05-01'
    AND o.created_at < '2023-06-01'
GROUP BY
    b.id, b.name
ORDER BY
    may_amount DESC
LIMIT 10;
```

題目二:
- 使用 EXPLAIN 分析查詢
  - 檢查是否有使用索引
- 在 orders 資料表的 bnb_id 欄位上建立索引
- 

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