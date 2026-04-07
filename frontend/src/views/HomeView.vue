<template>
  <section class="home-page">
    <div class="hero-grid">
      <div class="hero-copy">
        <span class="hero-badge">Tich hop AI thong minh</span>
        <h1>
          Quan ly tai chinh
          <span>chua bao gio de the</span>
        </h1>
        <p>
          Theo doi thu chi, lap ngan sach va nhan goi y tai chinh theo thoi gian thuc trong
          mot ung dung duy nhat.
        </p>
        <div class="hero-actions">
          <RouterLink to="/login" class="cta-link">Bat dau mien phi</RouterLink>
          <button type="button" class="watch-btn">Xem video</button>
        </div>
        <div class="hero-stats">
          <div>
            <strong>50K+</strong>
            <small>Nguoi dung</small>
          </div>
          <div>
            <strong>4.8/5</strong>
            <small>Danh gia</small>
          </div>
        </div>
      </div>

      <div class="hero-visual">
        <img src="/references/Homepage.png" alt="Home reference" />
      </div>
    </div>

    <div class="feature-card-grid">
      <article class="feature-card">
        <h3>Bao cao truc quan</h3>
        <p>Bieu do dong tien theo ngay, tuan va thang voi thao tac don gian.</p>
      </article>
      <article class="feature-card">
        <h3>Tro ly AI</h3>
        <p>Phan tich hanh vi chi tieu va de xuat cach can doi ngan sach.</p>
      </article>
      <article class="feature-card">
        <h3>Muc tieu tiet kiem</h3>
        <p>Dat muc tieu mua sam, du lich va theo doi tien do theo ngay.</p>
      </article>
    </div>
  </section>
</template>

<script setup>
import { RouterLink } from 'vue-router';
</script>
