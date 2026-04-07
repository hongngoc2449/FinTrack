<template>
  <section class="dashboard-page">
    <div class="kpi-grid">
      <article class="metric-card">
        <p class="metric-label">Total Balance</p>
        <h3>{{ formatCurrency(store.balance) }}</h3>
      </article>

      <article class="metric-card">
        <p class="metric-label">Total Income</p>
        <h3 class="income-text">{{ formatCurrency(store.incomeTotal) }}</h3>
      </article>

      <article class="metric-card">
        <p class="metric-label">Total Expenses</p>
        <h3 class="expense-text">{{ formatCurrency(store.expenseTotal) }}</h3>
      </article>

      <article class="metric-card plan-card">
        <p class="metric-label">Monthly Plan</p>
        <h3>{{ spentRatio }}%</h3>
        <div class="progress-track">
          <span :style="{ width: `${spentRatio}%` }"></span>
        </div>
      </article>
    </div>

    <div class="dashboard-main-grid">
      <article class="panel-card analysis-panel">
        <header class="panel-header">
          <h3>Cash Flow Analysis</h3>
          <div class="panel-tabs">
            <button type="button" class="active">Week</button>
            <button type="button" disabled>Month</button>
          </div>
        </header>

        <div class="bar-chart" v-if="weeklyData.length">
          <div v-for="item in weeklyData" :key="item.day" class="bar-col">
            <div class="bar-stack">
              <span class="income-bar" :style="{ height: `${item.incomeHeight}%` }"></span>
              <span class="expense-bar" :style="{ height: `${item.expenseHeight}%` }"></span>
            </div>
            <small>{{ item.day }}</small>
          </div>
        </div>
      </article>

      <article class="panel-card recent-panel">
        <header class="panel-header">
          <h3>Recent Transactions</h3>
        </header>
        <p v-if="store.loading" class="empty-state">Loading data...</p>
        <ul v-else-if="latestTransactions.length" class="recent-list">
          <li v-for="item in latestTransactions" :key="item.id">
            <div>
              <strong>{{ item.title }}</strong>
              <small>{{ formatDate(item.transaction_date) }}</small>
            </div>
            <b :class="item.type === 'income' ? 'income-text' : 'expense-text'">
              {{ item.type === 'income' ? '+' : '-' }}{{ formatCurrency(item.amount) }}
            </b>
          </li>
        </ul>
        <p v-else class="empty-state">No transactions yet.</p>
      </article>
    </div>
  </section>
</template>

<script setup>
import { computed, onMounted } from 'vue';
import { useFinanceStore } from '../stores/financeStore';

const store = useFinanceStore();

const latestTransactions = computed(() => store.transactions.slice(0, 5));

const weeklyData = computed(() => {
  const days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
  const base = days.map((day) => ({ day, income: 0, expense: 0 }));

  store.transactions.slice(0, 20).forEach((item) => {
    const date = new Date(item.transaction_date);
    if (Number.isNaN(date.getTime())) {
      return;
    }

    const jsDay = date.getDay();
    const index = jsDay === 0 ? 6 : jsDay - 1;
    if (item.type === 'income') {
      base[index].income += Number(item.amount || 0);
    } else {
      base[index].expense += Number(item.amount || 0);
    }
  });

  const maxValue = Math.max(
    1,
    ...base.map((item) => Math.max(item.income, item.expense))
  );

  return base.map((item) => ({
    ...item,
    incomeHeight: Math.round((item.income / maxValue) * 100),
    expenseHeight: Math.round((item.expense / maxValue) * 100),
  }));
});

const spentRatio = computed(() => {
  if (!store.incomeTotal) {
    return 0;
  }
  return Math.min(100, Math.round((store.expenseTotal / store.incomeTotal) * 100));
});

const formatCurrency = (value) =>
  new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD',
  }).format(Number(value || 0));

const formatDate = (value) => {
  const date = new Date(value);
  if (Number.isNaN(date.getTime())) {
    return 'Unknown date';
  }
  return new Intl.DateTimeFormat('en-US', {
    day: '2-digit',
    month: '2-digit',
  }).format(date);
};

onMounted(() => {
  if (!store.transactions.length) {
    store.fetchTransactions();
  }
});
</script>
