# Laravel-Buefy SPA 

> A Laravel-Vue SPA starter project template base forked from cretueusebiu/laravel-vue-spa using Bulma in place of Bootstrap leveraging the pre-made Vue components of Buefy.

## Features

- Laravel 6.0
- Vue + VueRouter + Vuex + VueI18n + ESlint 
- Pages with dynamic import and custom layouts
- Login, register, email verification and password reset
- Authentication with JWT
- Socialite integration
- Buefy + Font Awesome 5

## FURTHER DETAILS
- For more information on how this template works, see the original project repository at [cretueusebiu/laravel-vue-spa](https://github.com/cretueusebiu/laravel-vue-spa).
- The documentation here is basically copy/pasted from cretueusebiu.
- Visit [Buefy.org](https://buefy.org) for documentation on Buefy components.


## Usage

#### Development

```bash
# build and watch
npm run watch

# serve with hot reloading
npm run hot
```

#### Production

```bash
npm run production
```

## Socialite

This project comes with GitHub as an example for [Laravel Socialite](https://laravel.com/docs/5.8/socialite).

To enable the provider create a new GitHub application and use `https://example.com/api/oauth/github/callback` as the Authorization callback URL.

Edit `.env` and set `GITHUB_CLIENT_ID` and `GITHUB_CLIENT_SECRET` with the keys form your GitHub application.

For other providers you may need to set the appropriate keys in `config/services.php` and redirect url in `OAuthController.php`.

## Email Verification

To enable email verification make sure that your `App\User` model implements the `Illuminate\Contracts\Auth\MustVerifyEmail` contract.


