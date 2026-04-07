<template>
  <section class="transactions-page">
    <header class="transaction-head-row">
      <div>
        <h3>So giao dich</h3>
        <p>Theo doi dong tien thu va chi theo tung ngay.</p>
      </div>
      <div class="head-actions">
        <button type="button" class="ghost-btn" disabled>Xuat Excel</button>
      </div>
    </header>

    <div class="transaction-filters">
      <input v-model="keyword" type="text" placeholder="Tim theo ghi chu, danh muc..." />
      <select v-model="typeFilter">
        <option value="all">Tat ca loai</option>
        <option value="income">Thu</option>
        <option value="expense">Chi</option>
      </select>
    </div>

    <div class="ledger-layout">
      <article class="panel-card ledger-card">
        <table class="ledger-table">
          <thead>
            <tr>
              <th>Ngay</th>
              <th>Danh muc</th>
              <th>Ghi chu</th>
              <th>Loai</th>
              <th class="amount-cell">So tien</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in filteredTransactions" :key="item.id">
              <td>{{ formatDate(item.transaction_date) }}</td>
              <td>{{ item.category || 'Khac' }}</td>
              <td>{{ item.note || item.title }}</td>
              <td>{{ item.type === 'income' ? 'Thu' : 'Chi' }}</td>
              <td class="amount-cell" :class="item.type === 'income' ? 'income-text' : 'expense-text'">
                {{ item.type === 'income' ? '+' : '-' }}{{ formatCurrency(item.amount) }}
              </td>
            </tr>
          </tbody>
        </table>
        <p v-if="!filteredTransactions.length" class="empty-state">Khong co giao dich phu hop bo loc.</p>
      </article>

      <aside class="panel-card add-form-card">
        <h4>Them giao dich</h4>
        <form class="transaction-form" @submit.prevent="submitForm">
          <input v-model="form.title" required placeholder="Tieu de" />
          <input v-model.number="form.amount" required type="number" min="0" placeholder="So tien" />
          <select v-model="form.type" required>
            <option value="expense">Chi tieu</option>
            <option value="income">Thu nhap</option>
          </select>
          <input v-model="form.category" placeholder="Danh muc" />
          <input v-model="form.transaction_date" required type="date" />
          <textarea v-model="form.note" rows="3" placeholder="Ghi chu"></textarea>
          <button type="submit">Luu giao dich</button>
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
  new Intl.NumberFormat('vi-VN', {
    style: 'currency',
    currency: 'VND',
  }).format(Number(value || 0));

const formatDate = (value) => {
  const date = new Date(value);
  if (Number.isNaN(date.getTime())) {
    return '--';
  }
  return new Intl.DateTimeFormat('vi-VN', {
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
