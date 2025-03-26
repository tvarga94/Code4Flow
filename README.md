---

## Laravel CSV Refactor Challenge

This project is a **modern refactoring** of a legacy procedural PHP script using the Laravel Framework (PHP 8.2+). It maintains all original functionality while showcasing best practices in modern PHP development.

---

## Task Description

**Refactor the provided legacy PHP script** into a modern, well-structured application while keeping its original behavior intact.

The original script:
- Processes document records from a CSV file
- Filters them based on command-line parameters
- Displays formatted results in a table

---

## Requirements

- Apply modern **PHP 8.x** features
- Use **Object-Oriented Programming**
- Follow **Clean Code Principles**
- Implement **SOLID Design Principles**
- Keep the **original functionality**

---

## Example Usage

# Clone the repository
```bash
git clone git@github.com:tvarga94/Code4Flow.git
```

# Install Laravel and other dependencies
```bash
composer install
```

```bash
php artisan documents:process invoice 1 12500

