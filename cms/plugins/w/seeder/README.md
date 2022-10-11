# Seeder for OctoberCMS

## Installation
1. Copy files to `plugins/w/seeder` directory

## Seeding

### Seed from migration seeder class
```php
Seeder::seed(RainLab\User\Models\User::class, plugins_path('rainlab/user/seeds/user.json'));
```

### Seed from CLI
```shell
php artisan seeder:seed 
```
- Seed must have model name delimited by '_' and prefixed by priority etc. `1_Rainlab_User_Models_User.json` and that file must be in '/seeds' folder in plugin root 
  
If you want to seed only specific seeds, add them into separate `/seeds` subfolder (example - `/seeds/test1`) , run
```shell script
php artisan wezeo:seed test1
```
and now only seeds inside `seeds/test1` subfolder in any plugin will be seeded
    
## Examples
 - Seed `RainLab\Blog\Models\Post`
    ```json
    {
        "title": "Testovný článok",
        "slug": "testovny-clanok",
        "content": "Testovný obsah",
        "published": 1,
        "published_at": "yesterday",
        "user": {
            "id": 1
        },
        "featured_images": [
            {
                "file": "storage/wezeo.png"
            },
            {
                "filename": "ocms-logo.png",
                "url": "https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/OctoberCMS.png/220px-OctoberCMS.png"
            },
            {
                "filename": "ocms-logo.png",
                "url": "https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/OctoberCMS.png/220px-OctoberCMS.png"
            }
        ]
    }
    ```
