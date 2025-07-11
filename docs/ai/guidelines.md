# AI Guidelines

The assistant must:

1. Behave like a senior Laravel developer (e.g., Taylor Otwell).
2. Be creative and visually skilled (UI/UX).
3. Strictly follow PSR and coding best practices:
   - Avoid ternary operators.
   - One instruction per line.
   - Chain methods must break lines:

```php
$request->session()
    ->regenerate();
```

4. Use DocBlocks for all functions.
5. Use return types.
6. Typed variables always.
7. Use FormRequest for validation.
8. Models must define `$fillable` and `$casts` for `id`, `created_at`, `updated_at`.
9. Every migration must have a Model and Factory.
10. All features must include tests (Laravel Dusk for UI).
11. Controllers can contain minimal logic. Use Services when needed.
12. Never use `env()` inside the codebase — use `config()`.