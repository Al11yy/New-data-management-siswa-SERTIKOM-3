# Task: Change white text and placeholders to black in forms

## Information Gathered

-   Forms use glass-card backgrounds which are light (bg-white/5 in light mode).
-   Inputs have `text-white` and `placeholder:text-white/30`, making text invisible on light backgrounds.
-   Need to change to `text-black` and `placeholder:text-black/50` for better contrast.

## Plan

-   Edit all create and edit forms to replace `text-white` with `text-black` and `placeholder:text-white/30` with `placeholder:text-black/50`.
-   Update the text-input component as it's used across forms.

## Files to Edit

-   resources/views/tahun_ajar/create.blade.php
-   resources/views/tahun_ajar/edit.blade.php
-   resources/views/siswa/create.blade.php
-   resources/views/siswa/edit.blade.php
-   resources/views/kelas/create.blade.php
-   resources/views/kelas/edit.blade.php
-   resources/views/jurusan/create.blade.php
-   resources/views/jurusan/edit.blade.php
-   resources/views/components/text-input.blade.php
-   resources/views/auth/register.blade.php
-   resources/views/auth/login.blade.php
-   resources/views/auth/forgot-password.blade.php
-   resources/views/profile/partials/delete-user-form.blade.php

## Followup Steps

-   Test the forms to ensure text is visible.
-   Check for any other forms that might need updates.
