<template>
  <section class="features-page">
    <header class="section-head">
      <h1>Financial technology at your fingertips</h1>
      <p>
        Explore a toolkit that helps you take control of your money, from basic expense
        tracking to advanced investment analysis.
      </p>
    </header>

    <div class="feature-row">
      <article>
        <h2>Clear and detailed reporting</h2>
        <p>See exactly where your money comes from and where it goes with live dashboards.</p>
        <ul>
          <li>Real-time income and expense charts</li>
          <li>Breakdowns by category and wallet</li>
          <li>Export reports to PDF and Excel</li>
        </ul>
      </article>
      <div class="visual-card">
        <img src="/references/Features.png" alt="Features reference" />
      </div>
    </div>

    <div class="feature-row reverse">
      <article>
        <h2>Smart AI assistant</h2>
        <p>Get overspending alerts and one-tap recommendations to optimize your budget.</p>
        <ul>
          <li>Suggestions to reduce unnecessary costs</li>
          <li>End-of-month balance forecasting</li>
          <li>Goal reminders to stay on track</li>
        </ul>
      </article>
      <div class="visual-card glow-card">
        <div class="mini-panel">
          <h4>AI Assistant</h4>
          <p>Food expenses are 15% above target. Suggested cut: 500,000 VND this week.</p>
          <button type="button">Adjust budget</button>
        </div>
      </div>
    </div>

    <div class="cta-strip">
      <h3>Ready to take control of your finances?</h3>
      <RouterLink to="/login" class="cta-link">Create a free account</RouterLink>
    </div>
  </section>
</template>

<script setup>
import { RouterLink } from 'vue-router';
</script>
