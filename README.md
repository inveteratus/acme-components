## Installation

Add to your composer.json

~~~
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/inveteratus/acme-components.git"
    }
]
~~~

~~~
composer require acme/components dev-main
~~~

Add to your `resources/js/app.json`

~~~
import './bootstrap'
import Alpine from "alpinejs"

import toggleDarkMode from "./acme/dark.js"
Alpine.data('toggleDarkMode', toggleDarkMode)

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
