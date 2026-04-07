<template>
  <section class="login-page">
    <div class="login-left">
      <div class="login-left-inner">
        <p class="login-kicker">FinTrack</p>
        <h1 class="login-title">
          Quan ly tai chinh
          <span>thong minh va ro rang hon</span>
        </h1>
        <p class="login-subtitle">
          Theo doi thu chi, nhan canh bao vuot ngan sach va tao ke hoach tiet kiem chi trong
          vai phut.
        </p>

        <ul class="login-benefits">
          <li>Bao cao dong tien theo ngay va thang</li>
          <li>Tro ly AI de xuat toi uu chi tieu</li>
          <li>Dong bo muc tieu tiet kiem ca nhan</li>
        </ul>

        <div class="login-quote">
          <p>"Toi da tiet kiem them 30% moi thang nho theo doi dong tien tren FinTrack."</p>
          <strong>HongNgoc, Designer</strong>
        </div>
      </div>
    </div>

    <div class="login-right">
      <h2>Chao mung tro lai!</h2>
      <p>Nhap thong tin de truy cap vi cua ban.</p>

      <form class="login-form" @submit.prevent="handleLogin">
        <label>
          <span>Email</span>
          <input v-model.trim="form.email" type="email" placeholder="name@example.com" />
        </label>
        <label>
          <span>Mat khau</span>
          <input v-model="form.password" type="password" placeholder="••••••••" />
        </label>
        <p v-if="errorMessage" class="login-error">{{ errorMessage }}</p>
        <button type="submit">Dang nhap</button>
      </form>
    </div>
  </section>
</template>

<script setup>
import { reactive, ref } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();
const errorMessage = ref('');

const form = reactive({
  email: '',
  password: '',
});

const handleLogin = async () => {
  if (!form.email || !form.password) {
    errorMessage.value = 'Vui long nhap email va mat khau.';
    return;
  }

  errorMessage.value = '';
  await router.push('/app');
};
</script>
