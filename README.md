# SIPMA

Sistem Informasi Pengumuman Mahasiswa dan Arsip.

## Tech Stack

- Laravel 10
- TailwindCSS v3.3.5
- Flowbite

## Run Locally

Clone the project

```bash
  git clone https://github.com/ddim03/sipma.git
```

Go to the project directory

```bash
  cd sipma
```

Copy .env.example file
```bash
  cp .env.example .env
```

Install dependencies

```bash
  composer install
```

```bash
  pnpm install
```

Generate application key
```bash
  php artisan key:generate
```

Start the server

```bash
  pnpm dev
```

```bash
  php artisan serve
```
