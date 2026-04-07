<template>
  <section class="login-page">
    <div class="login-left">
      <div class="login-left-inner">
        <p class="login-kicker">FinTrack</p>
        <h1 class="login-title">
          Manage your money
          <span>with clarity and confidence</span>
        </h1>
        <p class="login-subtitle">
          Track cash flow, receive overspending alerts, and build a practical saving plan in
          just a few minutes.
        </p>

        <ul class="login-benefits">
          <li>Daily and monthly cash-flow reports</li>
          <li>AI suggestions to optimize spending</li>
          <li>Personal savings goals with progress tracking</li>
        </ul>

        <div class="login-quote">
          <p>"I save 30% more every month thanks to cash-flow tracking in FinTrack."</p>
          <strong>HongNgoc, Designer</strong>
        </div>
      </div>
    </div>

    <div class="login-right">
      <h2>Welcome back!</h2>
      <p>Enter your details to access your wallet.</p>

      <form class="login-form" @submit.prevent="handleLogin">
        <label>
          <span>Email</span>
          <input v-model.trim="form.email" type="email" placeholder="name@example.com" />
        </label>
        <label>
          <span>Password</span>
          <input v-model="form.password" type="password" placeholder="••••••••" />
        </label>
        <p v-if="errorMessage" class="login-error">{{ errorMessage }}</p>
        <button type="submit">Log in</button>
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
    errorMessage.value = 'Please enter both email and password.';
    return;
  }

  errorMessage.value = '';
  await router.push('/app');
};
</script>
