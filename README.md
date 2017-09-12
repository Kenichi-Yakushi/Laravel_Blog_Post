# Laravel_Blog_Post

ターミナルでコピー＆ペーストして、データベース作成してください。

```shell
mysql -uroot -proot

create database blog_prac_laravel;

grant all on blog_prac_laravel.* to dbuser@localhost identified by "wmiesdiocm3262";
```

composer install をターミナルのcomposer.jsonのある階層で叩く

http://qiita.com/pugiemonn/items/3d000ac0486987dd92df

.envファイルを作成する

```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=blog_prac_laravel
DB_USERNAME=dbuser
DB_PASSWORD=wmiesdiocm3262
```

artisanディレクトリのある階層で
php artisan key:generate

http://qiita.com/YU81/items/d1b2100aae53d2088a2c

php artisan migrate

## URL
ログイン画面が最初に出ます。

ログイン画面
http://192.168.33.15/laravel/public/

トップページ
http://192.168.33.15/laravel/public/post

まだログイン画面は実装できていないです。
