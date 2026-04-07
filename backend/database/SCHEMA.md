# FinTrack Database Schema

This schema targets the core features required by the project:
- Authentication / account profile
- Wallet management
- Income and expense tracking
- Budget planning
- Saving goals
- Recurring transactions

## Table Overview

### users
Stores account and profile settings.
- id (PK)
- name
- email (unique)
- password (nullable for social auth)
- avatar_url
- currency (default: VND)
- timezone (default: Asia/Ho_Chi_Minh)
- remember_token
- created_at / updated_at

### wallets
Represents money containers (cash, bank, e-wallet, credit).
- id (PK)
- user_id (FK -> users.id, nullable)
- name
- type (cash|bank|ewallet|credit)
- balance
- currency
- color
- is_default
- is_active
- created_at / updated_at

### categories
Transaction categories by type (income/expense).
- id (PK)
- user_id (FK -> users.id, nullable)
- name
- type (income|expense)
- icon
- color
- is_system
- is_active
- created_at / updated_at

### transactions
Primary ledger for financial entries.
- id (PK)
- user_id (FK -> users.id, nullable)
- wallet_id (FK -> wallets.id, nullable)
- category_id (FK -> categories.id, nullable)
- title
- amount
- type (income|expense)
- category (legacy text field, nullable)
- transaction_date
- note
- source (manual|recurring|import)
- status (posted|pending|void)
- external_ref
- created_at / updated_at

### budgets
Monthly budget constraints per scope.
- id (PK)
- user_id (FK -> users.id, nullable)
- wallet_id (FK -> wallets.id, nullable)
- category_id (FK -> categories.id, nullable)
- month
- year
- amount_limit
- alert_threshold (percentage, default 80)
- rollover
- note
- created_at / updated_at

### saving_goals
Long-term or short-term saving targets.
- id (PK)
- user_id (FK -> users.id, nullable)
- wallet_id (FK -> wallets.id, nullable)
- name
- target_amount
- current_amount
- target_date
- status (active|completed|paused|cancelled)
- note
- created_at / updated_at

### goal_contributions
Contribution history for each saving goal.
- id (PK)
- saving_goal_id (FK -> saving_goals.id)
- transaction_id (FK -> transactions.id, nullable)
- amount
- contribution_date
- note
- created_at / updated_at

### recurring_transactions
Templates for scheduled incomes/expenses.
- id (PK)
- user_id (FK -> users.id, nullable)
- wallet_id (FK -> wallets.id, nullable)
- category_id (FK -> categories.id, nullable)
- title
- amount
- type (income|expense)
- interval (daily|weekly|monthly|yearly)
- interval_value
- next_run_date
- end_date
- is_active
- note
- created_at / updated_at

## Relationship Summary

- users 1 - N wallets
- users 1 - N categories
- users 1 - N transactions
- users 1 - N budgets
- users 1 - N saving_goals
- wallets 1 - N transactions
- categories 1 - N transactions
- saving_goals 1 - N goal_contributions
- transactions 1 - N goal_contributions (optional link)
- users 1 - N recurring_transactions

## Notes

- `transactions.category` is intentionally preserved as a legacy text field so existing API payloads continue to work while the project migrates to `category_id`.
- Foreign keys are currently nullable in this scaffold to keep development flexible before full authentication flow is enforced.
