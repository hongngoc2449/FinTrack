<template>
  <div v-if="isAppLayout" class="app-shell">
    <aside class="sidebar">
      <div class="brand">
        <h1>FinTrack</h1>
        <p>Smart finance management</p>
      </div>

      <nav class="sidebar-nav">
        <RouterLink to="/app">Overview</RouterLink>
        <RouterLink to="/app/transactions">Transactions</RouterLink>
        <a href="#" class="disabled-link" @click.prevent>Budgets</a>
        <a href="#" class="disabled-link" @click.prevent>AI Assistant</a>
      </nav>

      <div class="premium-card">
        <h3>FinTrack Premium</h3>
        <p>Unlock advanced reports and real-time cash flow forecasting.</p>
        <button type="button">Upgrade now</button>
      </div>
    </aside>

    <div class="workspace">
      <header class="workspace-top">
        <div>
          <h2>{{ pageTitle }}</h2>
          <p>{{ todayText }}</p>
        </div>

        <div class="top-actions">
          <label class="search-box">
            <span>⌕</span>
            <input v-model="searchText" type="text" placeholder="Search notes or amounts..." />
          </label>
          <RouterLink class="notify-btn" to="/login" aria-label="Account">◎</RouterLink>
        </div>
      </header>

      <main class="workspace-body">
        <RouterView />
      </main>
    </div>
  </div>

  <div v-else-if="isAuthLayout" class="auth-layout">
    <RouterView />
  </div>

  <div v-else class="marketing-shell">
    <header class="marketing-header">
      <RouterLink to="/" class="logo-link">FinTrack</RouterLink>
      <nav class="marketing-nav">
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/features">Features</RouterLink>
        <RouterLink to="/blog">Blog</RouterLink>
      </nav>
      <div class="marketing-actions">
        <RouterLink to="/login" class="ghost-link">Log in</RouterLink>
        <RouterLink to="/login" class="cta-link">Try for free</RouterLink>
      </div>
    </header>

    <main class="marketing-main">
      <RouterView />
    </main>

    <footer class="marketing-footer">
      <section class="footer-grid">
        <div>
          <h4>FinTrack</h4>
          <p>A finance platform that helps you control cash flow and reach savings goals.</p>
        </div>
        <div>
          <h5>Product</h5>
          <a href="#">Features</a>
          <a href="#">Premium Plan</a>
          <a href="#">API Developer</a>
        </div>
        <div>
          <h5>Company</h5>
          <a href="#">About</a>
          <a href="#">Careers</a>
          <a href="#">Contact</a>
        </div>
        <div>
          <h5>Newsletter</h5>
          <p>Get weekly finance tips.</p>
          <div class="footer-subscribe">
            <input type="email" placeholder="Your email..." />
            <button type="button">Send</button>
          </div>
        </div>
      </section>
      <div class="footer-bottom">© {{ footerYear }} FinTrack. All rights reserved.</div>
    </footer>
  </div>
</template>

<script setup>
import { computed, ref } from 'vue';
import { RouterLink, RouterView, useRoute } from 'vue-router';

const route = useRoute();
const searchText = ref('');
const footerYear = new Date().getFullYear();

const isAppLayout = computed(() => route.meta.layout === 'app');
const isAuthLayout = computed(() => route.meta.layout === 'auth');

const pageTitle = computed(() => route.meta.title || 'Welcome back');

const todayText = computed(() =>
  new Intl.DateTimeFormat('en-US', {
    weekday: 'long',
    day: '2-digit',
    month: '2-digit',
    year: 'numeric',
  }).format(new Date())
);
</script>
