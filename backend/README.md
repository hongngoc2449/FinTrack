# FinTrack Backend

Backend architecture and database/API scaffold for the FinTrack personal finance platform.

## Overview

This directory contains a Laravel-style backend structure focused on:
- Finance domain modeling (users, wallets, categories, transactions, budgets, goals)
- Database schema design through migration files
- Initial API scaffold for transaction CRUD

Current status:
- Domain and schema are defined.
- Transaction API scaffold is implemented.
- Full Laravel runtime bootstrap is not included yet in this folder.

## Directory Structure

```
backend/
├── app/
│   ├── Http/Controllers/Api/
│   │   └── TransactionController.php
│   └── Models/
│       ├── User.php
│       ├── Wallet.php
│       ├── Category.php
│       ├── Transaction.php
│       ├── Budget.php
│       ├── SavingGoal.php
│       ├── GoalContribution.php
│       └── RecurringTransaction.php
├── database/
│   ├── migrations/
│   └── SCHEMA.md
├── routes/
│   └── api.php
├── composer.json
└── .env.example
```

## Implemented API (Scaffold)

Defined in [backend/routes/api.php](backend/routes/api.php):

- `GET /api/transactions`
- `POST /api/transactions`
- `GET /api/transactions/{id}`
- `PUT /api/transactions/{id}`
- `DELETE /api/transactions/{id}`

Controller: [backend/app/Http/Controllers/Api/TransactionController.php](backend/app/Http/Controllers/Api/TransactionController.php)

## Database Schema Modules

Detailed schema: [backend/database/SCHEMA.md](backend/database/SCHEMA.md)

Core tables:
- `users`
- `wallets`
- `categories`
- `transactions`
- `budgets`
- `saving_goals`
- `goal_contributions`
- `recurring_transactions`

### Migration Inventory

- [backend/database/migrations/2026_04_07_000000_create_transactions_table.php](backend/database/migrations/2026_04_07_000000_create_transactions_table.php)
- [backend/database/migrations/2026_04_07_000001_create_users_table.php](backend/database/migrations/2026_04_07_000001_create_users_table.php)
- [backend/database/migrations/2026_04_07_000002_create_wallets_table.php](backend/database/migrations/2026_04_07_000002_create_wallets_table.php)
- [backend/database/migrations/2026_04_07_000003_create_categories_table.php](backend/database/migrations/2026_04_07_000003_create_categories_table.php)
- [backend/database/migrations/2026_04_07_000004_create_budgets_table.php](backend/database/migrations/2026_04_07_000004_create_budgets_table.php)
- [backend/database/migrations/2026_04_07_000005_create_saving_goals_table.php](backend/database/migrations/2026_04_07_000005_create_saving_goals_table.php)
- [backend/database/migrations/2026_04_07_000006_create_goal_contributions_table.php](backend/database/migrations/2026_04_07_000006_create_goal_contributions_table.php)
- [backend/database/migrations/2026_04_07_000007_create_recurring_transactions_table.php](backend/database/migrations/2026_04_07_000007_create_recurring_transactions_table.php)
- [backend/database/migrations/2026_04_07_000008_add_transaction_foreign_keys.php](backend/database/migrations/2026_04_07_000008_add_transaction_foreign_keys.php)

## Domain Models

Model files:
- [backend/app/Models/User.php](backend/app/Models/User.php)
- [backend/app/Models/Wallet.php](backend/app/Models/Wallet.php)
- [backend/app/Models/Category.php](backend/app/Models/Category.php)
- [backend/app/Models/Transaction.php](backend/app/Models/Transaction.php)
- [backend/app/Models/Budget.php](backend/app/Models/Budget.php)
- [backend/app/Models/SavingGoal.php](backend/app/Models/SavingGoal.php)
- [backend/app/Models/GoalContribution.php](backend/app/Models/GoalContribution.php)
- [backend/app/Models/RecurringTransaction.php](backend/app/Models/RecurringTransaction.php)

Each model includes:
- `fillable` mapping for request-safe assignment
- typed `casts` for decimals/dates/booleans
- Eloquent relationships between finance entities

## How To Integrate Into Full Laravel App

Because this folder is scaffold-first, integrate it into a complete Laravel runtime project using this flow:

1. Create a full Laravel app bootstrap.
2. Copy/merge these folders into that app:
	- `app/Models`
	- `app/Http/Controllers/Api`
	- `database/migrations`
	- `routes/api.php`
3. Configure environment variables (`.env`) for your database.
4. Run migrations.
5. Start the API server and connect frontend `VITE_API_URL`.

## Known Limitations (Current Scaffold)

- Authentication middleware is not wired yet.
- Only transaction endpoints are exposed for now.
- No service/repository layer yet.
- No automated tests yet.

## Recommended Next Backend Steps

1. Add auth (Sanctum or JWT) and protect API routes.
2. Create CRUD endpoints for wallets, categories, budgets, and goals.
3. Add recurring transaction scheduler/command.
4. Add request classes and API resource transformers.
5. Add feature tests and migration tests.

## Notes

- `transactions.category` (string) is retained for backward compatibility while moving toward normalized `category_id` usage.
- Foreign keys in this scaffold are nullable to support incremental development before strict auth ownership is enforced.
