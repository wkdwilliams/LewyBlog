<?php

namespace App;

class Config
{
    // Database connection details
    const DB_HOST     = 'localhost';
    const DB_NAME     = 'lewyblog';
    const DB_USER     = 'lewy';
    const DB_PASSWORD = '';

    // If false - custom error handling such as a 404 page will display
    const SHOW_ERRORS = true;

    // Blog settings
    const BLOG_NAME         = "Lewis Williams";
    const BLOG_DESCRIPTION  = "A blog showcasing the nerdy side of my life <i class='fas fa-code'></i>. Now I'd like to take a minute, just sit right there and I'll tell you how I became the prince of a town called Bel Air.";
    const IMAGES_ON_MOBILE  = false;
}
