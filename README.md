# FinTrack

A starter project structure for a personal finance management app using:
- Laravel (API backend)
- Vue 3 + Vite (frontend)

## Project Structure

```
HCI-FinTrack/
|-- backend/                # Laravel API
|   |-- app/
|   |   |-- Http/Controllers/Api/TransactionController.php
|   |   `-- Models/Transaction.php
|   |-- database/migrations/2026_04_07_000000_create_transactions_table.php
|   |-- routes/api.php
|   |-- composer.json
|   `-- .env.example
|-- frontend/               # Vue app (Vite)
|   |-- src/
|   |   |-- assets/base.css
|   |   |-- router/index.js
|   |   |-- services/api.js
|   |   |-- stores/financeStore.js
|   |   |-- views/DashboardView.vue
|   |   |-- views/TransactionsView.vue
|   |   |-- App.vue
|   |   `-- main.js
|   |-- index.html
|   |-- package.json
|   |-- vite.config.js
|   `-- .env.example
`-- README.md
```

## How To Use This Scaffold

### Backend (Laravel API)

The `backend` folder currently provides architecture scaffold files:
- API route definition
- Transaction model
- Transaction controller
- Initial migration

To run a full Laravel app, initialize a standard Laravel project and then merge these scaffold files into it.

### Frontend (Vue)

Requirements: Node.js 20+

```bash
cd frontend
npm install
npm run dev
```

Frontend runs by default at: `http://localhost:5173`

## Current Scope

- Transaction API scaffold (CRUD endpoints)
- Vue pages for Dashboard and Transactions
- Pinia store and Axios service for API integration

## Next Suggested Steps

1. Add authentication (Laravel Sanctum + login UI).
2. Add categories and monthly budgeting tables.
3. Add charts for spending trends on dashboard.
