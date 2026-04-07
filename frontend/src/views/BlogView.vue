<template>
  <section class="blog-page">
    <article class="featured-post">
      <img src="/references/Blog.png" alt="Blog reference" />
      <div>
        <span class="tag">Noi bat</span>
        <h1>Cach lap ngan sach 50/30/20 de toi uu hoa dong tien cua ban</h1>
        <p>
          Quy tac 50/30/20 la phuong phap don gian giup ban quan ly thu nhap hieu qua ma
          khong can that lung buoc bung qua muc.
        </p>
        <a href="#">Doc tiep</a>
      </div>
    </article>

    <h2>Bai viet moi nhat</h2>
    <div class="blog-grid">
      <article class="blog-card">
        <img src="/references/Blog.png" alt="Post cover" />
        <p class="meta">Tai chinh • 26/12/2025</p>
        <h3>5 meo tiet kiem khi di du lich nuoc ngoai</h3>
        <p>Kham pha cach tan huong chuyen di ma van bao ve vi tien cua ban.</p>
        <a href="#">Doc them</a>
      </article>
      <article class="blog-card">
        <img src="/references/Homepage.png" alt="Post cover" />
        <p class="meta">Dau tu • 25/12/2025</p>
        <h3>Dau tu ETF cho nguoi moi bat dau</h3>
        <p>Huong dan co ban de bat dau danh muc dau tu tu dong an toan.</p>
        <a href="#">Doc them</a>
      </article>
      <article class="blog-card">
        <img src="/references/Features.png" alt="Post cover" />
        <p class="meta">Cap nhat app • 20/12/2025</p>
        <h3>Ra mat tinh nang tro ly AI moi</h3>
        <p>Phan tich giong noi va goi y tiet kiem theo tung nhom chi tieu.</p>
        <a href="#">Doc them</a>
      </article>
    </div>

    <div class="newsletter-panel">
      <h3>Dang ky nhan tin</h3>
      <p>Nhan meo tai chinh hang tuan vao hop thu cua ban.</p>
      <form @submit.prevent>
        <input type="email" placeholder="Email cua ban..." />
        <button type="submit">Dang ky</button>
      </form>
    </div>
  </section>
</template>
