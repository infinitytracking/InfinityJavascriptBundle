#Infinitytracking InfinityJavascriptBundle

Symfony2 Bundle to add Infinity Tracking Javascript code to your site.
Support for page tracking, number replacement, custom triggers.

The configuration you define is made available to all twig templates
 through the use of an extension within the bundle.

##Installation

Step 1) Download

The recommended method is via composer.  
Add the bundle as a dependency to your composer.json file

```json
    {
        "require": {
            "infinitytracking/infinitytracking-javascript-bundle": "dev-master"
        }
    }
```

Now tell composer to install this new requirement

```bash
php composer.phar update
```

This will be installed into your vendor directory

Step 2) Register the Bundle in your kernel

```php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Infinitytracking\Bundle\InfinityJavascriptBundle\InfinitytrackingInfinityJavascriptBundle(),
    );
}
```

Step 3) Configuration

Provide your Installation ID, along with Tracking Pool (dgrp) IDs and the 
classes you want to target in your pages.  

Elements found with the class will have their contents replaced with the
dynamically allocated phone number for this Tracking Pool

```yaml
#app/config/config.yml

infinitytracking_infinity_javascript:
    enabled: TRUE
    igrp: 19
    dgrps:
        sales:      { id: 1, 'classes':['phone_number', 'number'] }
        service:    { id: 2, 'classes':['service_phone_number'] }
```

##Include the template in your base

```smarty
{# app/Resources/views/base.html.twig #}

{% include 'InfinityJavascriptBundle:Default:base.html.twig' %}

...
{# Other JavaScript files from your head here #}
</head>
```

#Tracking

##Custom Triggers

```smarty
{% include 'InfinityJavascriptBundle:Default:customTrigger.html.twig' with  {
    'act' : 'SALE',
    'details' : {
        'txc':'GBP',
        'txv':'10.00',
        'txr':'abcd1234',
        't':'Practical Caravan ~ 6 Month Subscription'
    }
} %}
```

This will be rendered within script tags, to render without (if you are doing
 that yourself), then just render to the js template instead.

```smarty
{% include 'InfinityJavascriptBundle:Default:customTrigger.js.twig' with  {
    'act' : 'SALE',
    'details' : {
        'txc':'GBP',
        'txv':'10.00',
        'txr':'abcd1234',
        't':'Practical Caravan ~ 6 Month Subscription'
    }
} %}
```