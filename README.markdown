Node.js and Drupal OAuth credential sharing
===========================================

Companion project for [node-drupaloauth](http://github.com/hugowetterberg/node-drupaloauth) that contains a sample implementation of a credential store that publishes consumer and access token information for node-drupaloauth.

A code sample for making a test call is also included in client_call.php.

Disclaimer
----------

Needless to say it's very dangerous to give out consumer and access tokens like this. In this sample we're checking that the request comes from the local server. But a script like this should either be behind a firewall or protected by https and a strong password or other access control.