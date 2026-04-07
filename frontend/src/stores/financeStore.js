import { defineStore } from 'pinia';
import api from '../services/api';

export const useFinanceStore = defineStore('finance', {
  state: () => ({
    transactions: [],
    loading: false,
  }),
  getters: {
    incomeTotal: (state) =>
      state.transactions
        .filter((item) => item.type === 'income')
        .reduce((sum, item) => sum + Number(item.amount), 0),
    expenseTotal: (state) =>
      state.transactions
        .filter((item) => item.type === 'expense')
        .reduce((sum, item) => sum + Number(item.amount), 0),
    balance() {
      return this.incomeTotal - this.expenseTotal;
    },
  },
  actions: {
    async fetchTransactions() {
      this.loading = true;
      try {
        const { data } = await api.get('/transactions');
        this.transactions = data;
      } finally {
        this.loading = false;
      }
    },
    async addTransaction(payload) {
      const { data } = await api.post('/transactions', payload);
      this.transactions.unshift(data);
    },
  },
});