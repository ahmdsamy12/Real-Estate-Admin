# 🏠 Real Estate Admin Dashboard

A modern, fully-responsive Real Estate Admin Dashboard built with **Laravel 11** and **Tailwind CSS 3**.  
No database required — all data is served from static PHP arrays.

## 📁 Project Structure

```
real-estate-admin/
├── app/Http/Controllers/
│   ├── Controller.php
│   ├── DashboardController.php   ← stats + recent properties
│   └── PropertyController.php    ← 8 static property records
├── resources/views/
│   ├── layouts/app.blade.php     ← master shell
│   ├── components/               ← stat-card, property-card, status-badge, page-header
│   ├── includes/                 ← sidebar, navbar, footer
│   └── pages/                    ← dashboard, properties, property-detail
├── routes/web.php
├── resources/css/app.css         ← Tailwind + custom classes
├── resources/js/app.js           ← sidebar toggle, search/filter, gallery
├── composer.json
├── package.json
├── tailwind.config.js
└── vite.config.js
```

---

## 🛣️ Routes

| URI                | Name               | Page               |
| ------------------ | ------------------ | ------------------ |
| `/`                | `dashboard`        | Dashboard          |
| `/properties`      | `properties.index` | Properties listing |
| `/properties/{id}` | `properties.show`  | Property detail    |

---

## 🎨 Tech Stack

- **Laravel 11** · **Blade Templates & Components** · **Tailwind CSS 3**
- **Bootstrap Icons 1.11** · **Vite 5** · **Inter font**
