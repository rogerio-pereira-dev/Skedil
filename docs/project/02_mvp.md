# MVP Overview

This document outlines the minimal viable product features for the initial launch of Skedil.

## 1. MVP Objective

Enable service providers to:

- Register clients
- Schedule one-time or recurring services
- Manage payments
- Receive automated SMS alerts

All via a simple, responsive web interface.

---

## 2. Tech Stack

- Laravel + Inertia.js
- Laravel Sail
- PostgreSQL (local), Aurora Serverless (production)
- Laravel Scheduler
- Laravel Socialite / Starter Kit / Sanctum (authentication)
- Laravel Cashier + Stripe (payments)
- Laravel Cloud (initial deployment)
- Multitenant database architecture (evaluate single vs. multi-database)

---

## 3. Core Features

- **Client Registration**
  - Required: name, phone, address, email, service price
  - Additional: frequency, notes

- **Scheduling**
  - Create/view appointments (daily and/or weekly)
  - Mark services as completed and/or paid

- **Payments**
  - Monthly summary
  - Mark as paid
  - Stripe integration via Laravel Cashier

- **SMS Alerts**
  - Service reminder (1 day before): to user(owner) and client
  - Payment reminder (1 day before): to client
  - Overdue payment alert (1 day after due): to user(owner)

- **Preferences**
  - Client - Enable/disable SMS and email alerts
  - Select client’s payment method (cash/zelle, card)
  - Send Stripe card registration link if applicable

- **Internationalization**
  - English and Spanish support (use [Laravel localization](https://laravel.com/docs/12.x/localization))
    - Default Language is English (unless user specify it)
      - Owners and clients can change that on their profile settings

- **Authentication**
  - Email/password login
  - Preferably via Laravel Socialite
  - Fallback to Laravel Starter Kit or Sanctum

- **Dashboard**
  - User (Owner)
    - Displays today’s services
    - Financial summary
    - Client count and limit
  - User (Client)
    - Next Service
    - Next Payment

- **PWA Support**
  - Installable on desktop and iOS (via Safari)

---

---

## 4. Pricing Plans

| Plan             | Price     | Clients Limit  | Features                                                           |
|------------------|-----------|----------------|-------------------------------------------------------------------|
| Basic            | $10/month | Up to 10       | Manual Scheduling, no automatic alerts                            |
| Intermediate     | $20/month | Up to 20       | Automatic Scheduling (recurrency), Includes SMS and email alerts  |
| Advanced         | $40/month | Unlimited      | Full feature access                                               |

- All users start with the Basic plan and get **15 days free**
- After trial, if no payment is made, data is **permanently deleted (hard delete) after 1 month**
  - Show alert, and send email that the trial access is ending. Lock users after trial, (in case the user wants to come back)
- Users can **upgrade or downgrade** at any time
  - Downgrade requires manual adjustment of data
- When approaching the client limit (limit - 2), a **warning is shown**
- Dashboard shows current client count and **upgrade button**
  - Upgrade should be hidden if using Advanced Plan
- All plans should be registrered in database

# Multitenancy
This project uses package `spatie/laravel-multitenancy` for multi-tenancy.

The tenant model is `App/Models/User`