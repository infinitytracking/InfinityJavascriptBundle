#Infinitytracking InfinityJavascriptBundle

Symfony2 Bundle to add Infinity Tracking Javascript code to your site.
Support for page tracking, number replacement, custom triggers.

The configuration you define is made available to all twig templates
 through the use of an extension within the bundle.

##Configure

Provide your Installation ID, along with Tracking Pool (dgrp) IDs and the 
classes you want to target in your pages.  

Elements found with the class will have their contents replaced with the
dynamically allocated phone number for this Tracking Pool


```yaml
#app/config/config.yml

infinitytracking_infinity_javascript:
    igrp: 1
    dgrps:
        sales:      { id: 1, 'classes':['phone_number', 'number'] }
        service:    { id: 2, 'classes':['service_phone_number'] }
```

##Include the template in your base

```smarty
{# app/Resources/views/base.html.twig #}

{% include 'InfinityJavascriptBundle::base.html.twig' %}

...
{# Other JavaScript files from your head here #}
</head>
```

#Tracking

##Custom Triggers

```smarty
{% include 'InfinityJavascriptBundle::CustomTrigger.html.twig' with  {
    'act' : 'SALE',
    'details' : {
        'txc':'GBP',
        'txv':'10.00',
        'txr':'abcd1234',
        't':'Practical Caravan ~ 6 Month Subscription'
    }
} %}
```