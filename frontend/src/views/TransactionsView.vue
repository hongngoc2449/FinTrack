<template>
  <section class="transactions-page">
    <header class="transaction-head-row">
      <div>
        <h3>Transaction Ledger</h3>
        <p>Track incoming and outgoing cash every day.</p>
      </div>
      <div class="head-actions">
        <button type="button" class="ghost-btn" disabled>Export Excel</button>
      </div>
    </header>

    <div class="transaction-filters">
      <input v-model="keyword" type="text" placeholder="Search by note or category..." />
      <select v-model="typeFilter">
        <option value="all">All types</option>
        <option value="income">Income</option>
        <option value="expense">Expense</option>
      </select>
    </div>

    <div class="ledger-layout">
      <article class="panel-card ledger-card">
        <table class="ledger-table">
          <thead>
            <tr>
              <th>Date</th>
              <th>Category</th>
              <th>Note</th>
              <th>Type</th>
              <th class="amount-cell">Amount</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in filteredTransactions" :key="item.id">
              <td>{{ formatDate(item.transaction_date) }}</td>
              <td>{{ item.category || 'Other' }}</td>
              <td>{{ item.note || item.title }}</td>
              <td>{{ item.type === 'income' ? 'Income' : 'Expense' }}</td>
              <td class="amount-cell" :class="item.type === 'income' ? 'income-text' : 'expense-text'">
                {{ item.type === 'income' ? '+' : '-' }}{{ formatCurrency(item.amount) }}
              </td>
            </tr>
          </tbody>
        </table>
        <p v-if="!filteredTransactions.length" class="empty-state">No transactions match your filters.</p>
      </article>

      <aside class="panel-card add-form-card">
        <h4>Add Transaction</h4>
        <form class="transaction-form" @submit.prevent="submitForm">
          <input v-model="form.title" required placeholder="Title" />
          <input v-model.number="form.amount" required type="number" min="0" placeholder="Amount" />
          <select v-model="form.type" required>
            <option value="expense">Spending</option>
            <option value="income">Income</option>
          </select>
          <input v-model="form.category" placeholder="Category" />
          <input v-model="form.transaction_date" required type="date" />
          <textarea v-model="form.note" rows="3" placeholder="Note"></textarea>
          <button type="submit">Save Transaction</button>
        </form>
      </aside>
    </div>
  </section>
</template>

<script setup>
import { computed, onMounted, reactive, ref } from 'vue';
import { useFinanceStore } from '../stores/financeStore';

const store = useFinanceStore();
const keyword = ref('');
const typeFilter = ref('all');

const today = new Date().toISOString().slice(0, 10);

const form = reactive({
  title: '',
  amount: 0,
  type: 'expense',
  category: '',
  transaction_date: today,
  note: '',
});

const filteredTransactions = computed(() =>
  store.transactions.filter((item) => {
    const matchKeyword = `${item.title} ${item.category || ''} ${item.note || ''}`
      .toLowerCase()
      .includes(keyword.value.toLowerCase().trim());

    const matchType = typeFilter.value === 'all' || item.type === typeFilter.value;
    return matchKeyword && matchType;
  })
);

const formatCurrency = (value) =>
  new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD',
  }).format(Number(value || 0));

const formatDate = (value) => {
  const date = new Date(value);
  if (Number.isNaN(date.getTime())) {
    return '--';
  }
  return new Intl.DateTimeFormat('en-US', {
    day: '2-digit',
    month: '2-digit',
    year: 'numeric',
  }).format(date);
};

const submitForm = async () => {
  await store.addTransaction({ ...form });
  form.title = '';
  form.amount = 0;
  form.type = 'expense';
  form.category = '';
  form.transaction_date = today;
  form.note = '';
};

onMounted(() => {
  if (!store.transactions.length) {
    store.fetchTransactions();
  }
});
</script>
