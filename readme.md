Initialiser un nouveau projet Laravel 5.8 avec la commande composer create-project --prefer-dist laravel/laravel BioTourist "5.8.*"
Dézipper le dossier github dans ce nouveau dossier Laravel BioTourist
Ecraser les fichiers déjà existants
composer require "laravelcollective/html":"^5.8.0"
ou
composer update
Faire la migration de la db avec la commande

php artisan migrate --path="database\migrations\2014_10_12_000000_create_users_table.php"
php artisan migrate --path="database\migrations\2014_10_12_100000_create_password_resets_table.php"
php artisan migrate --path="database\migrations\2016_01_24_140352_create_regions_table.php"
php artisan migrate --path="database\migrations\2020_01_15_131139_create_ads_table.php"
php artisan migrate --path="database\migrations\2020_01_15_132025_create_messages_table.php"
php artisan migrate --path="database\migrations\2020_01_15_135308_create_uploads_table.php"
php artisan migrate --path="database\migrations\2020_03_04_154413_create_tickets_table.php"
php artisan migrate --path="database\migrations\2020_03_04_154442_create_comments_table.php"
php artisan migrate --path="database\migrations\2020_03_04_154501_create_categories_table.php"
php artisan migrate --path="database\migrations\2020_03_11_132106_create_products_table.php".

pour le Web
php artisan migrate --path="database/migrations/2014_10_12_000000_create_users_table.php"
php artisan migrate --path="database/migrations/2014_10_12_100000_create_password_resets_table.php"
php artisan migrate --path="database/migrations/2016_01_24_140352_create_regions_table.php"
php artisan migrate --path="database/migrations/2020_01_15_131139_create_ads_table.php"
php artisan migrate --path="database/migrations/2020_01_15_132025_create_messages_table.php"
php artisan migrate --path="database/migrations/2020_01_15_135308_create_uploads_table.php"
php artisan migrate --path="database/migrations/2020_03_04_154413_create_tickets_table.php"
php artisan migrate --path="database/migrations/2020_03_04_154442_create_comments_table.php"
php artisan migrate --path="database/migrations/2020_03_04_154501_create_categories_table.php"
php artisan migrate --path="database/migrations/2020_03_11_132106_create_products_table.php"


seed
php artisan db:seed

martin@chezlui.fr
vendeur

dupont@chezlui.fr
user

durand@chezlui.fr
admin
