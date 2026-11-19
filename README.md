# Laravel Projects

Two Laravel coursework applications with separate source trees and dependencies.

| Project | What it covers |
| --- | --- |
| [MainLaravel](MainLaravel/MainLaravel/) | Laravel 8 digital storefront with categories, cart, transactions, invoices, and role-based management |
| [ProgrammingSite](ProgrammingSite/) | Laravel 9 directory for programming languages, use cases, and companies, with user interests, profiles, and a dashboard |

## Local development

Use PHP, Composer, Node.js, npm, and a local MySQL database. Check each project's `composer.json` for its PHP requirement.

From the directory of the project you want to explore, run `composer install`, copy `.env.example` to `.env`, then set the local database connection. Run `php artisan key:generate`, `php artisan migrate`, and `npm install`. Build MainLaravel's Mix assets with `npm run dev`. Build ProgrammingSite's Vite assets with `npm run build` or run its development server with `npm run dev`. Start the Laravel application with `php artisan serve`.

## Demo accounts and payments

Before running `php artisan db:seed` on a fresh database, set `SEED_ADMIN_EMAIL`, `SEED_ADMIN_PASSWORD`, `SEED_USER_EMAIL`, and `SEED_USER_PASSWORD` in the project's local `.env`. ProgrammingSite also uses `SEED_CEO_EMAIL` and `SEED_CEO_PASSWORD`. Use distinct email addresses and passwords between 12 and 72 bytes.

MainLaravel's payment example stays in IDPay sandbox mode. Set `IDPAY_API_KEY` in MainLaravel's local `.env` to try it.

## License

The [MIT License](LICENSE) covers MrEshrati's original code and documentation for both applications. The [Laravel 8 starter](https://github.com/laravel/laravel/blob/8.x/composer.json) and [Laravel 9 starter](https://github.com/laravel/laravel/blob/9.x/composer.json) declare their own MIT terms for upstream materials. Third-party course materials and media are outside this grant.
