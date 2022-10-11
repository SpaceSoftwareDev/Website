# CORS plugin for OctoberCMS

## Installation
1. Add `wapi/cors` to projects composer.json
2. If you will use authorization (JWT), paste this code to .htaccess
```
RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
```
3. DONE!