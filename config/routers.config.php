<?php

return [
    '^about$'                 => 'Pages/About',
    '^contacts$'              => 'Pages/Contact',
    '^login$'                 => 'Users/Login',
    '^profile$'               => 'Users/showMyProfile',
    '^user$'                  => 'Users/showMyProfile',

    '^user/([0-9]+)$'         => 'Users/ProfileById/$1',
    '^user/([a-z0-9-]+)$'     => 'Users/ProfileByLogin/$1',

    '^news/add$'              => 'News/Add',
    '^news/([0-9]+)$'         => 'News/ViewById/$1',
    '^news/([a-z0-9-]+)$'     => 'News/ViewCategory/$1',

    '^article/([0-9]+)$'      => 'News/ViewById/$1',

    '^$'                      => 'Index/Default',
];