## Token generator
https://it-tools.tech/token-generator?length=128

# Laravel Glide Image URL Generator Example

This example demonstrates how to generate signed image URLs using the [Glide Laravel Package](https://glide.thephpleague.com/) in a Laravel project.

---

## Installation

Require the package via Composer (replace with your actual package name if needed):

```bash
composer require hoavi/glide-laravel
```

# Configuration
Add Configuration to `.env`
```
HOAVI_GLIDE_SIGN_KEY=your-sign-key-here
```

Example Route Usage in `routes/web.php`

```
use League\Glide\Urls\UrlBuilderFactory;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $config = config('hoavi-glide-laravel');
    $signKey = $config['sign_key'];
    $baseUrl = $config['base_url'];
    $routePath = $config['route'];

    $path = $routePath . '/1/grand-palace.jpg';

    $urlBuilder = UrlBuilderFactory::create($baseUrl, $signKey);

    $url = $urlBuilder->getUrl($path, [
        'w' => 220,
        'h' => 200,
        'fit' => 'crop',
    ]);

    dd($url);

    return view('welcome');
});
```

Next, add a demo image to `storage/app/public/image/1/grand-palace.jpg`.