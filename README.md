# Laravel Projects

Two Laravel coursework applications with separate source trees and dependencies.

| Project | What it covers |
| --- | --- |
| [MainLaravel](MainLaravel/MainLaravel/) | Laravel 8 digital storefront with categories, cart, transactions, invoices, and role-based management |
| [ProgrammingSite](ProgrammingSite/) | Laravel 9 directory for programming languages, use cases, and companies, with user interests, profiles, and a dashboard |

## Local development

Use PHP, Composer, Node.js, npm, and a local MySQL database. Check each project's `composer.json` for its PHP requirement.

From the directory of the project you want to explore, run `composer install`, copy `.env.example` to `.env`, then set the local database connection. Run `php artisan key:generate`, `php artisan migrate`, and `npm install`. Build MainLaravel's Mix assets with `npm run dev`. Build ProgrammingSite's Vite assets with `npm run build` or run its development server with `npm run dev`. Start the Laravel application with `php artisan serve`.

Review the sample seeders and payment configuration before exercising those features. Use local data and development credentials.
