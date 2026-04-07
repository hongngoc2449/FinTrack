<template>
  <div v-if="isAppLayout" class="app-shell">
    <aside class="sidebar">
      <div class="brand">
        <h1>FinTrack</h1>
        <p>Quan ly tai chinh thong minh</p>
      </div>

      <nav class="sidebar-nav">
        <RouterLink to="/app">Tong quan</RouterLink>
        <RouterLink to="/app/transactions">Giao dich</RouterLink>
        <a href="#" class="disabled-link" @click.prevent>Ngan sach</a>
        <a href="#" class="disabled-link" @click.prevent>Tro ly AI</a>
      </nav>

      <div class="premium-card">
        <h3>FinTrack Premium</h3>
        <p>Mo khoa bao cao nang cao va du doan dong tien theo thoi gian thuc.</p>
        <button type="button">Nang cap ngay</button>
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
            <input v-model="searchText" type="text" placeholder="Tim ghi chu, so tien..." />
          </label>
          <RouterLink class="notify-btn" to="/login" aria-label="Tai khoan">◎</RouterLink>
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
        <RouterLink to="/">Trang chu</RouterLink>
        <RouterLink to="/features">Tinh nang</RouterLink>
        <RouterLink to="/blog">Blog</RouterLink>
      </nav>
      <div class="marketing-actions">
        <RouterLink to="/login" class="ghost-link">Dang nhap</RouterLink>
        <RouterLink to="/login" class="cta-link">Dung thu ngay</RouterLink>
      </div>
    </header>

    <main class="marketing-main">
      <RouterView />
    </main>

    <footer class="marketing-footer">
      <section class="footer-grid">
        <div>
          <h4>FinTrack</h4>
          <p>Nen tang quan ly tai chinh giup ban kiem soat dong tien va dat muc tieu tiet kiem.</p>
        </div>
        <div>
          <h5>San pham</h5>
          <a href="#">Tinh nang</a>
          <a href="#">Goi Premium</a>
          <a href="#">API Developer</a>
        </div>
        <div>
          <h5>Cong ty</h5>
          <a href="#">Ve chung toi</a>
          <a href="#">Tuyen dung</a>
          <a href="#">Lien he</a>
        </div>
        <div>
          <h5>Dang ky nhan tin</h5>
          <p>Nhan meo tai chinh hang tuan.</p>
          <div class="footer-subscribe">
            <input type="email" placeholder="Email cua ban..." />
            <button type="button">Gui</button>
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

const pageTitle = computed(() => route.meta.title || 'Xin chao, ban');

const todayText = computed(() =>
  new Intl.DateTimeFormat('vi-VN', {
    weekday: 'long',
    day: '2-digit',
    month: '2-digit',
    year: 'numeric',
  }).format(new Date())
);
</script>
