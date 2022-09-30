## SQLアンチパターン検証

## 環境セットアップ
以下手順を実行する。

```
docker-compose up -d --build

docker-compose run --rm anti_node install

docker-compose run --rm anti_node run dev

docker-compose run --rm anti_composer install

docker exec -it anti-php-fpm php artisan migrate --seed

docker exec -it anti-php-fpm php artisan storage:link
```

## 第2章.ナイーブツリー
### ナイーブツリー

* サンプル
    * http://localhost:58081/naive-tree/naive-tree/naive-tree

### 閉包テーブル

* サンプル
    * http://localhost:58081/naive-tree/closure-table