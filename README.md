## Installation

Add to your `composer.json`

~~~
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/inveteratus/acme-components.git"
    }
]
~~~

Then run:

~~~
composer require acme/components dev-main
~~~

Install acme with:

~~~
php artisan acme:install
~~~

Add to your `resources/js/app.json`

~~~
import './bootstrap'
import Alpine from "alpinejs"

import Acme from './acme';
Object.keys(Acme).forEach((name) => {
    Alpine.data(name, Acme[name])
})

import persist from "@alpinejs/persist"
Alpine.plugin(persist)

Alpine.start()
~~~

Add to your `resources/css/app.css`

~~~
@import "tailwindcss/base";
@import "tailwindcss/components";
@import "tailwindcss/utilities";

@import "@fontsource/ibm-plex-sans";
@import "bootstrap-icons/font/bootstrap-icons.css";

@import "./acme/acme.css";
~~~

Add to your `routes/web.php`

~~~
Route::prefix('')->group(__DIR__ . '/acme.php');
~~~

Finally, run

~~~
npm run dev
~~~
