# Lumen Rest API

Getting Started:
```sh
cp .env.example .env
```

Run
```sh
php -S localhost:8000 index.php
```

Routes
- GET `/feeds` returns all feeds
- GET `/feeds/between?startDate={}&endDate={}` returns feeds between date

*Note*: All routes are paginated to 15 items.
