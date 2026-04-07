<template>
  <section class="features-page">
    <header class="section-head">
      <h1>Cong nghe tai chinh trong tam tay ban</h1>
      <p>
        Kham pha bo cong cu giup ban lam chu dong tien, tu theo doi chi tieu co ban den
        phan tich dau tu nang cao.
      </p>
    </header>

    <div class="feature-row">
      <article>
        <h2>Bao cao truc quan va chi tiet</h2>
        <p>Hieu ro dong tien dang di dau ve dau nhan dashboard cap nhat tung giay.</p>
        <ul>
          <li>Bieu do thu chi theo thoi gian thuc</li>
          <li>Thong ke theo danh muc va vi</li>
          <li>Xuat bao cao dinh dang PDF/Excel</li>
        </ul>
      </article>
      <div class="visual-card">
        <img src="/references/Features.png" alt="Features reference" />
      </div>
    </div>

    <div class="feature-row reverse">
      <article>
        <h2>Tro ly AI thong minh</h2>
        <p>Nhan canh bao chi tieu qua da va de xuat toi uu ngan sach trong 1 cham.</p>
        <ul>
          <li>Goi y cat giam chi phi</li>
          <li>Du doan so du cuoi thang</li>
          <li>Nhac nho muc tieu tiet kiem</li>
        </ul>
      </article>
      <div class="visual-card glow-card">
        <div class="mini-panel">
          <h4>Tro ly AI</h4>
          <p>Chi phi an uong vuot muc 15%. Goi y giam 500.000d/tuan.</p>
          <button type="button">Dieu chinh ngan sach</button>
        </div>
      </div>
    </div>

    <div class="cta-strip">
      <h3>San sang lam chu tai chinh?</h3>
      <RouterLink to="/login" class="cta-link">Tao tai khoan mien phi</RouterLink>
    </div>
  </section>
</template>

<script setup>
import { RouterLink } from 'vue-router';
</script>
