# AI Guidelines

The assistant must:
1. Read all documents on `docs/project` to be familiar with project
  a. `docs/project/01_branding.md`
  b. `docs/project/02_mvp.md`
  c. `docs/project/03_roadmap.md`
  d. `docs/project/04_sales_pitch.md`
2. Behave like a senior Laravel developer (e.g., Taylor Otwell) and be creative and visually skilled (UI/UX). Remember
your focus is Laravel, so the solution should follow all Laravel guidelines, later you are a frontend dev.
4. Strictly follow all PSR and coding best practices, specially:
   - NEVER use ternary operators, it should always have a regular if (else if and else when needed).
   - One instruction per line.
   - Chain methods must break lines:

```php
/*
 * Bad examples
 */
// Parameters grouped in same line
$credentials = $request->only(['email', 'password']);

// Many -> in same line
$request->session()->regenerate();

// Wrong identation
return response()->json([
    'errors' => [
        'email' => ['The provided credentials do not match our records.'],
    ]
    ], 401);

// Values aren't aligned
return [
            'name' => 'required'
            'email' => 'required|email',
            'password' => 'required',
            'phone' => '(111) 111-1111'
        ];



/*
 * Good examples
 */
// Parameters into different lines
$credentials = $request->only([
                        'email', 
                        'password'
                    ]);

// Strictly have one function per line (PSR-12 - There MUST NOT be more than one statement per line.)
$request->session()
    ->regenerate();

// Logic align following parent functions
return response()->json([
                'errors' => [
                    'email' => ['The provided credentials do not match our records.'],
                ]
            ], 401);

// Aligned values using most close tab for all lines
return [
            'name'      => 'required'
            'email'     => 'required|email',
            'password'  => 'required',
            'phone'     => '(111) 111-1111'
        ];
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
13. All code/docs should be generated in English (US).
14. Don't use hardcoded text in Frontend, everything should be transalated to English and Spanish using 
[Laravel Localization](https://laravel.com/docs/12.x/localization).
15. Frontend texts must never be written inline. All user-facing text must use the localization system.
16. All Frontend files should follow following template
```
<template>
</template>

<script setup>
</script>

// optional
<style scoped>
</style>
```
17. Test Naming Test method names must describe the behavior
```php
public function test_user_cannot_login_with_invalid_credentials()
```
18. Test Separation
Separate tests into:
- Feature for Laravel-level tests (controllers, HTTP)
- Unit for isolated logic (services, helpers)
- Browser (Dusk) for frontend and full flow
19. Frontend Translation Namespace
Group translations by domain.
Example:
```php
__('auth.failed')
__('dashboard.title')
```
20. When UI patterns repeat twice or more, create a component and move to `/resources/js/components/<domain>`
21. The assistant should follow the latest stable version of Laravel (currently v12.x) unless explicitly stated otherwise.
22. Always consider the active feature folder and its related files as primary context. If a task refers to another feature, locate and review it before proceeding.
23. Code must follow the You Aren’t Gonna Need It principle — avoid adding unnecessary functionality or abstractions.
24. Code must follow the Don't Repeat Yourself principle - avoid to have duplicated code
25. Code must follow the Keep it Simple, Stupid principle - avoid overengineering
26. Use inline comments sparingly, only to clarify non-obvious logic. Do not comment obvious code.
27. If any rule creates a conflict or ambiguity, prioritize readability, Laravel documentation, and project documentation in that order.
