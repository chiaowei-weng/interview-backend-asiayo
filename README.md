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