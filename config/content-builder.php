<?php

return [
        'content_css' => Config('app.url').('/vendor/content-builder/assets/minimalist-basic/content-bootstrap.css'),
        'contentbuilder_css' => Config('app.url').('/vendor/content-builder/contentbuilder/contentbuilder.css'),
        'bootstrapcdn_css' => ('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'),
        'googlefont_css' => ('https://fonts.googleapis.com/css?family=Lato'),


    'jquery' => Config('app.url').('/vendor/content-builder/contentbuilder/jquery.min.js'),
    'jquery-ui' => Config('app.url').('/vendor/content-builder/contentbuilder/jquery-ui.min.js'),
    'contentbuilder-src' => Config('app.url').('/vendor/content-builder/contentbuilder/contentbuilder.js'),
    'saveimages' => Config('app.url').('/vendor/content-builder/contentbuilder/saveimages.js'),


    'default' => [
        "snippetFile" => "/vendor/content-builder/assets/minimalist-basic/snippets.html",
        "snippetOpen" => false,
        "toolbar" => "left",
        "iconselect" => "/vendor/content-builder/assets/ionicons/selecticon.html",
    ],

    // Custom

];
