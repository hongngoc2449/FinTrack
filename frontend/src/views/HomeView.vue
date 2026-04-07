<template>
  <section class="home-page">
    <div class="hero-grid">
      <div class="hero-copy">
        <span class="hero-badge">AI-powered insights</span>
        <h1>
          Money management
          <span>made effortless</span>
        </h1>
        <p>
          Track income and expenses, build budgets, and get real-time financial suggestions
          in one app.
        </p>
        <div class="hero-actions">
          <RouterLink to="/login" class="cta-link">Start for free</RouterLink>
          <button type="button" class="watch-btn">Watch video</button>
        </div>
        <div class="hero-stats">
          <div>
            <strong>50K+</strong>
            <small>Users</small>
          </div>
          <div>
            <strong>4.8/5</strong>
            <small>Rating</small>
          </div>
        </div>
      </div>

      <div class="hero-visual">
        <img src="/references/Homepage.png" alt="Home reference" />
      </div>
    </div>

    <div class="feature-card-grid">
      <article class="feature-card">
        <h3>Visual Reports</h3>
        <p>Understand your cash flow with clear daily, weekly, and monthly charts.</p>
      </article>
      <article class="feature-card">
        <h3>AI Assistant</h3>
        <p>Analyze spending behavior and get practical budget-balancing suggestions.</p>
      </article>
      <article class="feature-card">
        <h3>Savings Goals</h3>
        <p>Set goals for shopping or travel and track progress every day.</p>
      </article>
    </div>
  </section>
</template>

<script setup>
import { RouterLink } from 'vue-router';
</script>
