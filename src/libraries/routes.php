<?php
/*
 * Home page, optionally redirects if the theme doesn't have a front.php
 */
getRoute()->get('/', array('GeneralController', 'home'));



/*
 * Action endpoints
 * All action endpoints follow the same convention.
 * Everything in []'s are optional
 * /action/{id}[/{additional}]
 */
getRoute()->post('/action/([a-zA-Z0-9]+)/(photo)/create', array('ActionController', 'create'), EpiApi::external); // post an action


/*
 * Photo endpoints
 * All photo endpoints follow the same convention.
 * Everything in []'s are optional
 * /photo/{id}[/{additional}]
 */
getRoute()->get('/photo/([a-zA-Z0-9]+)/edit', array('PhotoController', 'edit')); // edit form for a photo (/photo/{id}/edit)
getRoute()->get('/photo/([a-zA-Z0-9]+)/create/([a-z0-9]+)/([0-9]+)x([0-9]+)x?(.*).jpg', array('PhotoController', 'create')); // create a version of a photo (/photo/create/{id}/{options}.jpg)
getRoute()->get('/photo/([a-zA-Z0-9]+)/view/?(.+)?', array('PhotoController', 'photo')); // view a photo (/photo/{id}/view[/{options}])
getRoute()->post('/photo/([a-zA-Z0-9]+)/update', array('PhotoController', 'update')); // update a photo (/photo/{id}/update
getRoute()->post('/photo/upload', array('PhotoController', 'uploadPost')); // upload a photo
getRoute()->get('/photos/upload', array('PhotoController', 'upload')); // view the upload photo form
getRoute()->get('/photos/view/?(.+)?', array('PhotoController', 'photos')); // view all photos / optionally filter (/photos[/{options})

/*
 * Tag endpoints
 * All tag endpoints follow the same convention.
 * Everything in []'s are optional
 * /tag[s][/{id}/]{action}.json
 */
getRoute()->get('/tags/view', array('TagController', 'tags')); // view tags

/*
 * User endpoints
 * All user endpoints follow the same convention.
 * Everything in []'s are optional
 * /user/{action}.json
 */
getRoute()->get('/user/logout', array('UserController', 'logout')); // logout

/*
 * OAuth endpoints
 * All oauth endpoints follow the same convention.
 * /v{version}/oauth/{action}
 */
getRoute()->get('/v[1]/oauth/authorize', array('OAuthController', 'authorize'));
getRoute()->post('/v[1]/oauth/authorize', array('OAuthController', 'authorizePost'));
getRoute()->post('/v[1]/oauth/token/access', array('OAuthController', 'tokenAccess'));
getRoute()->post('/v[1]/oauth/token/request', array('OAuthController', 'tokenRequest'));
getRoute()->get('/v[1]/oauth/test', array('OAuthController', 'test'));
getRoute()->get('/v[1]/oauth/flow', array('OAuthController', 'flow'));

/*
 * Error endpoints
 * All error endpoints follow the same convention.
 * /error/{code}
 */
getRoute()->get('/error/403', array('GeneralController', 'error403'));
getRoute()->get('/error/404', array('GeneralController', 'error404'));

