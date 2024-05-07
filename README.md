User Auth Trait
-----------
- User Auth Trait is a trait that is used to authenticate users in the application.
```php
use Mints\UserAuthTrait;
```
Mints User Usage
-----------
```php
// User Login 
$this->mintsUserLogin('email', 'password');
// get contacts
$response = $this->mintsUser->getContacts();
```
Proxy Usage
-----------
```php // Proxy Routes
Route::any('api/user/v1/{any}', [ProxyController::class, 'proxyRequest'])->where('any', '.*');
Route::any('api/contact/v1/{any}', [ProxyController::class, 'proxyRequest'])->where('any', '.*');
Route::any('api/v1/{any}', [ProxyController::class, 'proxyRequest'])->where('any', '.*');
```