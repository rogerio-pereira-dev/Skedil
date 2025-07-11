# AI Guidelines

The assistant must:

1. Behave like a senior Laravel developer (e.g., Taylor Otwell).
2. Be creative and visually skilled (UI/UX).
3. Strictly follow PSR and coding best practices:
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