<template>
  <section class="blog-page">
    <article class="featured-post">
      <img src="/references/Blog.png" alt="Blog reference" />
      <div>
        <span class="tag">Featured</span>
        <h1>How to apply the 50/30/20 rule to optimize your cash flow</h1>
        <p>
          The 50/30/20 rule is a simple method that helps you manage income effectively
          without making your lifestyle too restrictive.
        </p>
        <a href="#">Read article</a>
      </div>
    </article>

    <h2>Latest posts</h2>
    <div class="blog-grid">
      <article class="blog-card">
        <img src="/references/Blog.png" alt="Post cover" />
        <p class="meta">Finance • 12/26/2025</p>
        <h3>5 saving tips for international travel</h3>
        <p>Enjoy your trip while still protecting your budget.</p>
        <a href="#">Read more</a>
      </article>
      <article class="blog-card">
        <img src="/references/Homepage.png" alt="Post cover" />
        <p class="meta">Investing • 12/25/2025</p>
        <h3>ETF investing for beginners</h3>
        <p>A practical guide to starting a simple and safe long-term portfolio.</p>
        <a href="#">Read more</a>
      </article>
      <article class="blog-card">
        <img src="/references/Features.png" alt="Post cover" />
        <p class="meta">App update • 12/20/2025</p>
        <h3>Launching the new AI Assistant</h3>
        <p>Voice-aware analysis and personalized savings suggestions by category.</p>
        <a href="#">Read more</a>
      </article>
    </div>

    <div class="newsletter-panel">
      <h3>Subscribe to newsletter</h3>
      <p>Get weekly finance tips delivered to your inbox.</p>
      <form @submit.prevent>
        <input type="email" placeholder="Your email..." />
        <button type="submit">Subscribe</button>
      </form>
    </div>
  </section>
</template>
