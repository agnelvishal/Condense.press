# Lumen Rest API


Run
```
php -S localhost:8000 index.php
```
index.php is located at rest-api/public

Routes
- GET `/feeds` returns all feeds
- GET `/feeds/between?startDate={}&endDate={}` returns feeds between date

*Note*: All routes are paginated to 15 items.
