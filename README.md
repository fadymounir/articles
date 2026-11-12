# 📘 Senior Backend Engineer Interview Bible

> **English + العربية** · 113 topics · 397 Q&A · 2026 Edition

A bilingual reference and interactive PHP web app for preparing for **senior PHP / Laravel / Backend / Software Engineer** interviews. Built specifically to go beyond rote definitions and answer like a senior — with production context, trade-offs, common mistakes, and follow-up questions.

---

## 🚀 Quick start

```bash
cd /home/fady/Desktop/interview_question
php -S 127.0.0.1:8000
```
Open <http://127.0.0.1:8000> — sidebar lists every topic, search filters live, theme & language toggle in the top bar.

## 📁 Project structure

```
.
├── index.php                  # Home (topic grid by Part)
├── topic.php?slug=...         # Single focused topic page (illustration + Q&A)
├── assets/
│   ├── css/style.css          # Dark + light theme, RTL for Arabic
│   └── js/app.js              # Theme toggle, language toggle, sidebar search
├── includes/
│   ├── header.php             # Sticky top nav + sidebar
│   ├── footer.php
│   ├── render.php             # Q&A render helpers
│   └── illustrations.php      # ~113 inline SVG diagrams
└── data/
    ├── topics.php             # Aggregator
    └── part*-*.php            # One file per Part (PHP arrays)
```

## ✨ Features

- **113 topics across 20 Parts** — PHP, Laravel, Databases, Redis, Docker, System Design, Architecture, Linux, CI/CD, Async, Security, Observability, Messaging, Microservices, Kubernetes, Networking, Modern Data, AI/LLM, Modern Laravel, Interview Tactics
- **Bilingual content** — every question, answer, code example, tip, and follow-up in both English and Arabic
- **Themable** — dark / light mode toggle (persisted)
- **RTL support** — switches direction when language is Arabic
- **Inline SVG illustrations** for every topic — auto-themed via CSS variables
- **Senior framing** — each Q&A includes `❌ Don't say` and `✔️ Senior tip` callouts where relevant
- **Sidebar with live search** — filter by title, slug, or description in either language

## 🗂 Table of contents

- [Part I — PHP](#part-i--php) — 7 topics  
  &nbsp;&nbsp;<sub>الجزء الأول — PHP</sub>
- [Part II — Laravel](#part-ii--laravel) — 17 topics  
  &nbsp;&nbsp;<sub>الجزء الثاني — Laravel</sub>
- [Part III — Databases](#part-iii--databases) — 15 topics  
  &nbsp;&nbsp;<sub>الجزء الثالث — قواعد البيانات</sub>
- [Part IV — Redis](#part-iv--redis) — 4 topics  
  &nbsp;&nbsp;<sub>الجزء الرابع — Redis</sub>
- [Part V — Docker](#part-v--docker) — 3 topics  
  &nbsp;&nbsp;<sub>الجزء الخامس — Docker</sub>
- [Part VI — System Design](#part-vi--system-design) — 8 topics  
  &nbsp;&nbsp;<sub>الجزء السادس — System Design</sub>
- [Part VII — Architecture](#part-vii--architecture) — 9 topics  
  &nbsp;&nbsp;<sub>الجزء السابع — البنية</sub>
- [Part VIII — Linux](#part-viii--linux) — 1 topic  
  &nbsp;&nbsp;<sub>الجزء الثامن — Linux</sub>
- [Part IX — CI/CD](#part-ix--cicd) — 1 topic  
  &nbsp;&nbsp;<sub>الجزء التاسع — CI/CD</sub>
- [Part X — Async & Concurrency](#part-x--async--concurrency) — 4 topics  
  &nbsp;&nbsp;<sub>الجزء العاشر — Async و Concurrency</sub>
- [Part XI — Security](#part-xi--security) — 5 topics  
  &nbsp;&nbsp;<sub>الجزء الحادي عشر — الأمان</sub>
- [Part XII — Observability](#part-xii--observability) — 4 topics  
  &nbsp;&nbsp;<sub>الجزء الثاني عشر — Observability</sub>
- [Part XIII — Messaging & Events](#part-xiii--messaging--events) — 5 topics  
  &nbsp;&nbsp;<sub>الجزء الثالث عشر — Messaging و Events</sub>
- [Part XIV — Microservices](#part-xiv--microservices) — 5 topics  
  &nbsp;&nbsp;<sub>الجزء الرابع عشر — Microservices</sub>
- [Part XV — Kubernetes & Cloud](#part-xv--kubernetes--cloud) — 4 topics  
  &nbsp;&nbsp;<sub>الجزء الخامس عشر — Kubernetes و Cloud</sub>
- [Part XVI — Networking](#part-xvi--networking) — 3 topics  
  &nbsp;&nbsp;<sub>الجزء السادس عشر — الشبكات</sub>
- [Part XVII — Modern Data](#part-xvii--modern-data) — 5 topics  
  &nbsp;&nbsp;<sub>الجزء السابع عشر — البيانات الحديثة</sub>
- [Part XVIII — AI & LLM](#part-xviii--ai--llm) — 5 topics  
  &nbsp;&nbsp;<sub>الجزء الثامن عشر — AI و LLM</sub>
- [Part XIX — Modern Laravel](#part-xix--modern-laravel) — 5 topics  
  &nbsp;&nbsp;<sub>الجزء التاسع عشر — Laravel الحديث</sub>
- [Part XX — Interview Tactics](#part-xx--interview-tactics) — 3 topics  
  &nbsp;&nbsp;<sub>الجزء العشرون — تكتيكات المقابلة</sub>

---

## Part I — PHP

<sub>الجزء الأول — PHP</sub>

### 🐘 PHP Fundamentals

**Slug:** `php-fundamentals` · **AR:** أساسيات PHP

> Types, comparison, PHP 8 features, common pitfalls  
> *الأنواع، المقارنات، مميزات PHP 8، الأخطاء الشائعة*

#### ❓ What kind of language is PHP?

<sub>**AR:** ما نوع لغة PHP؟</sub>

**Answer (EN):**

PHP is a **dynamically typed, interpreted server-side scripting language** that is compiled to **opcodes** and executed by the **Zend VM**. PHP 8+ added a **JIT** that compiles hot paths to native code.

<details><summary>الإجابة بالعربي</summary>

لغة PHP هي لغة **سكربتية ديناميكية** تُنفّذ على السيرفر، يتم تحويلها إلى **Opcodes** ثم تُنفّذها **Zend VM**. ومنذ PHP 8 أضيف لها **JIT** الذي يُحوّل أجزاء الكود المتكررة إلى Machine Code مباشرة.

</details>

> ✔️ **Senior tip:** Saying "PHP is interpreted" is incomplete. The senior answer is: *interpreted with a compilation step to opcodes, executed by the Zend VM, with optional JIT*.
>
> ✔️ **نصيحة Senior:** لا تقل فقط "PHP لغة مفسّرة". الإجابة الصحيحة: *مفسّرة مع خطوة تحويل إلى Opcodes تُنفّذها Zend VM، وقد تتحول جزئيًا إلى Machine Code عبر JIT*.

---

#### ❓ Difference between == and ===

<sub>**AR:** الفرق بين == و ===</sub>

**Answer (EN):**

`==` compares values after *type juggling*. `===` compares value **and** type — strict comparison.

<details><summary>الإجابة بالعربي</summary>

`==` يقارن القيم بعد *تحويل النوع*. أما `===` فيقارن القيمة **والنوع** معًا — مقارنة صارمة.

</details>

```php
var_dump(0 == "abc");   // false in PHP 8 (was true in PHP 7!)
var_dump("1" == 1);     // true
var_dump("1" === 1);    // false
```

> ✔️ **Senior tip:** Always use `===` in business logic. PHP 7 had infamous quirks (`0 == "abc"` was true!). PHP 8 fixed many of them.
>
> ✔️ **نصيحة Senior:** استخدم دائمًا `===` في منطق العمل. PHP 7 كان فيها مفارقات شهيرة (`0 == "abc"` كانت true!). PHP 8 صلّحت كثيرًا منها.

**Follow-up questions:**

- What does strict_types=1 do?
- Why is 0 == "abc" false in PHP 8 but true in PHP 7?
- Difference between is_numeric() and ctype_digit()?

---

#### ❓ What are PHP 8 new features?

<sub>**AR:** ما هي مميزات PHP 8؟</sub>

**Answer (EN):**

- **JIT compiler** — limited gain for I/O-bound apps
- **Named arguments** and **constructor property promotion**
- **Match expression** (strict, returns value)
- **Enums** (8.1), **readonly properties** (8.1), **readonly classes** (8.2)
- **Fibers** (8.1) — primitive for async libraries (Swoole, AmphP, ReactPHP)
- **First-class callable syntax** `strlen(...)`
- **Asymmetric visibility** and **property hooks** (8.4)

<details><summary>الإجابة بالعربي</summary>

- **JIT** — فائدته محدودة في تطبيقات I/O
- **Named arguments** و **Constructor property promotion**
- **Match expression** (صارم ويُرجع قيمة)
- **Enums** (8.1) و **readonly properties** (8.1) و **readonly classes** (8.2)
- **Fibers** (8.1) — أساس مكتبات Async مثل Swoole و AmphP
- **First-class callable syntax** `strlen(...)`
- **Asymmetric visibility** و **Property hooks** في 8.4

</details>

---

#### ❓ include vs require vs include_once vs require_once

<sub>**AR:** الفرق بين include و require و include_once و require_once</sub>

<table><tr><th>Construct</th><th>If file missing</th><th>Repeat allowed?</th> <tr><tr><td>include</td><td>Warning; script continues</td><td>Yes</td> <tr><tr><td>require</td><td>Fatal error</td><td>Yes</td> <tr><tr><td>include_once / require_once</td><td>Same as above</td><td>No (tracked by realpath)</td> <tr> <table>

In modern PHP, prefer **Composer autoload (PSR-4)** over manual includes.

<details><summary>تفاصيل بالعربي</summary>

<table><tr><th>الأمر</th><th>عند فقد الملف</th><th>يسمح بالتكرار؟</th> <tr><tr><td>include</td><td>تحذير ويستمر السكربت</td><td>نعم</td> <tr><tr><td>require</td><td>خطأ Fatal</td><td>نعم</td> <tr><tr><td>include_once / require_once</td><td>نفس السابق</td><td>لا (يُتتبَّع عبر realpath)</td> <tr> <table>

في PHP الحديثة، استخدم **Composer autoload (PSR-4)** بدلاً من Include اليدوي.

</details>

---

#### ❓ Pass by value vs pass by reference

<sub>**AR:** التمرير بالقيمة مقابل التمرير بالمرجع</sub>

**Answer (EN):**

By default PHP passes by value. Use `&` to pass by reference. **Objects are handles** — modifying an object property even when passed by value mutates the original; references are still different from object handles.

<details><summary>الإجابة بالعربي</summary>

افتراضيًا PHP تُمرّر بالقيمة. استخدم `&` للتمرير بالمرجع. **الكائنات Handles** — أي إن تعديل خاصية كائن حتى لو تم تمريره بالقيمة سيُعدّل الأصلي، لكن المرجع شيء مختلف عن مقبض الكائن.

</details>

```php
function add(&$x) { $x++; }
$a = 1;
add($a);   // $a is now 2
```

---

#### ❓ Common mistakes seniors avoid

<sub>**AR:** الأخطاء الشائعة التي يتجنبها Seniors</sub>

**Answer (EN):**

- Using `==` instead of `===`
- Forgetting `declare(strict_types=1);`
- Suppressing errors with `@`
- Calling `extract()` on user input
- Storing secrets in code instead of `.env` + secret manager
- N+1 queries in Eloquent
- Doing HTTP calls inside DB transactions

<details><summary>الإجابة بالعربي</summary>

- استخدام `==` بدلاً من `===`
- نسيان `declare(strict_types=1);`
- إخفاء الأخطاء بـ `@`
- استدعاء `extract()` على Input المستخدم
- تخزين الـ Secrets في الكود بدلاً من `.env` + Secret Manager
- N+1 Queries في Eloquent
- عمل HTTP Calls داخل DB Transactions

</details>

---

### 🧱 OOP — Object-Oriented Programming

**Slug:** `php-oop` · **AR:** البرمجة الكائنية

> 4 pillars, abstract vs interface, composition vs inheritance, traits  
> *الأركان الأربعة، Abstract vs Interface، Composition vs Inheritance*

#### ❓ What are the 4 OOP pillars?

<sub>**AR:** ما هي الأركان الأربعة للـ OOP؟</sub>

**Answer (EN):**

- **Encapsulation:** hide internal state, expose through methods.
- **Inheritance:** reuse via `extends`.
- **Polymorphism:** one interface, many implementations.
- **Abstraction:** model only what matters via abstract classes / interfaces.

<details><summary>الإجابة بالعربي</summary>

- **التغليف (Encapsulation):** إخفاء الحالة الداخلية وكشف الـ Methods فقط.
- **الوراثة (Inheritance):** إعادة الاستخدام عبر `extends`.
- **تعدد الأشكال (Polymorphism):** نفس الواجهة، تطبيقات مختلفة.
- **التجريد (Abstraction):** نمذجة ما يهم فقط عبر Abstract classes / Interfaces.

</details>

---

#### ❓ Abstract class vs Interface

<sub>**AR:** الفرق بين Abstract Class و Interface</sub>

<table><tr><th>Abstract Class</th><th>Interface</th> <tr><tr><td>Can contain implementation</td><td>Only contracts (PHP 8 allows default constants)</td> <tr><tr><td>Single inheritance</td><td>Multiple implementations allowed</td> <tr><tr><td>Can have properties/state</td><td>No state</td> <tr><tr><td>Use when classes share behavior</td><td>Use when classes share a contract only</td> <tr> <table>

<details><summary>تفاصيل بالعربي</summary>

<table><tr><th>Abstract Class</th><th>Interface</th> <tr><tr><td>يمكن أن تحتوي على تنفيذ</td><td>عقود فقط (PHP 8 تسمح بثوابت)</td> <tr><tr><td>وراثة واحدة</td><td>تطبيقات متعددة مسموحة</td> <tr><tr><td>يمكن أن تحتوي على Properties</td><td>لا State</td> <tr><tr><td>استخدمها عندما تتشارك Classes في السلوك</td><td>استخدمه عندما يتشارك Classes في العقد فقط</td> <tr> <table>

</details>

> ✔️ **Senior tip:** Program to interfaces. Use abstract classes only when there is real shared implementation.
>
> ✔️ **نصيحة Senior:** برمج للـ Interfaces. استخدم Abstract Classes فقط عندما يكون هناك تنفيذ مشترك حقيقي.

---

#### ❓ Composition vs Inheritance

<sub>**AR:** Composition vs Inheritance</sub>

**Answer (EN):**

**Favor composition over inheritance.** Inheritance creates tight coupling and fragile base classes. Composition (injecting collaborators) lets you swap behavior at runtime.

<details><summary>الإجابة بالعربي</summary>

**فضّل Composition على Inheritance.** الوراثة تُنشئ ترابطًا قويًا و Fragile Base Classes. أما Composition (حقن المتعاونين) فيسمح بتبديل السلوك في وقت التشغيل.

</details>

```php
// Inheritance (tight)
class PdfReport extends Report {}

// Composition (flexible)
class Report {
    public function __construct(private Exporter $exporter) {}
}
```

---

#### ❓ What are Traits?

<sub>**AR:** ما هي Traits؟</sub>

**Answer (EN):**

Horizontal reuse of methods across classes. Useful but easily abused — they hide dependencies. Prefer composition for non-trivial behavior.

<details><summary>الإجابة بالعربي</summary>

إعادة استخدام أفقية للـ Methods بين الـ Classes. مفيدة لكن يُساء استخدامها — تُخفي الـ Dependencies. فضّل Composition للسلوك المعقد.

</details>

---

#### ❓ Late Static Binding

<sub>**AR:** ما هو Late Static Binding؟</sub>

**Answer (EN):**

`self::` refers to the class where the method was defined. `static::` refers to the class that was called at runtime.

<details><summary>الإجابة بالعربي</summary>

`self::` تشير للـ Class التي عُرّفت فيها الـ Method. `static::` تشير للـ Class التي استُدعيت في وقت التشغيل.

</details>

```php
class A {
    public static function create() { return new static(); }
}
class B extends A {}
B::create(); // returns B, not A
```

---

#### ❓ Magic methods you should know

<sub>**AR:** الـ Magic Methods التي يجب معرفتها</sub>

**Answer (EN):**

`__construct`, `__destruct`, `__get`, `__set`, `__call`, `__callStatic`, `__invoke`, `__toString`, `__isset`, `__unset`, `__clone`, `__serialize`/`__unserialize`. Laravel Eloquent uses `__get`/`__call` heavily.

<details><summary>الإجابة بالعربي</summary>

`__construct` و `__destruct` و `__get` و `__set` و `__call` و `__callStatic` و `__invoke` و `__toString` و `__isset` و `__unset` و `__clone` و `__serialize`/`__unserialize`. Laravel Eloquent تستخدم `__get`/`__call` بكثرة.

</details>

---

### 🧩 SOLID Principles

**Slug:** `php-solid` · **AR:** مبادئ SOLID

> Single Responsibility, Open/Closed, Liskov, Interface Segregation, Dependency Inversion  
> *المبادئ الخمسة للتصميم النظيف*

#### ❓ S — Single Responsibility Principle

<sub>**AR:** S — مبدأ المسؤولية الواحدة</sub>

**Answer (EN):**

A class should have **one reason to change** — not "do one thing", but answer to one stakeholder.

<details><summary>الإجابة بالعربي</summary>

الـ Class يجب أن يكون لها **سبب واحد للتغيير** — ليس "تفعل شيئًا واحدًا"، بل أن تُجيب عن حاجة جهة واحدة فقط.

</details>

> ❌ **Don't say:** A `UserController` that validates, persists, sends email, and writes audit logs.
>
> ❌ **لا تقل:** الـ `UserController` يتحقق من البيانات ويحفظها ويرسل البريد ويسجل Audit Logs.

> ✔️ **Senior tip:** Split into `UserController`, `UserService`, `Mailer`, `AuditLogger`.
>
> ✔️ **نصيحة Senior:** قسّمها إلى `UserController` و `UserService` و `Mailer` و `AuditLogger`.

---

#### ❓ O — Open/Closed Principle

<sub>**AR:** O — مبدأ Open/Closed</sub>

**Answer (EN):**

Open for extension, closed for modification. Add new behavior by adding new classes — not by editing existing ones.

<details><summary>الإجابة بالعربي</summary>

مفتوح للتوسيع، مغلق للتعديل. أضف سلوكًا جديدًا بإضافة Classes جديدة — لا بتعديل القديمة.

</details>

```php
interface PaymentMethod { public function pay(int $amount): void; }
class Stripe implements PaymentMethod { /* ... */ }
class Paypal implements PaymentMethod { /* ... */ }
// Add Adyen? New class — don't touch existing ones.
```

---

#### ❓ L — Liskov Substitution Principle

<sub>**AR:** L — مبدأ Liskov</sub>

**Answer (EN):**

Subtypes must be substitutable for their base types *without breaking behavior*. Classic violation: a `Square` extending `Rectangle` overriding `setWidth` to also change height.

<details><summary>الإجابة بالعربي</summary>

يجب أن يكون من الممكن استبدال الـ Subtype مكان الـ Base Type بدون كسر السلوك. مثال شهير: `Square` ترث من `Rectangle` وتعيد تعريف `setWidth` ليُغيّر الارتفاع أيضًا.

</details>

---

#### ❓ I — Interface Segregation Principle

<sub>**AR:** I — مبدأ Interface Segregation</sub>

**Answer (EN):**

Many small interfaces beat one fat interface. Clients should not depend on methods they do not use.

<details><summary>الإجابة بالعربي</summary>

عدة Interfaces صغيرة أفضل من Interface واحدة ضخمة. لا يجب أن يعتمد الـ Client على Methods لا يستخدمها.

</details>

---

#### ❓ D — Dependency Inversion Principle

<sub>**AR:** D — مبدأ Dependency Inversion</sub>

**Answer (EN):**

High-level modules depend on **abstractions**, not on concretions. The Service Container in Laravel implements this. **DI is not DIP** — DI is the technique, DIP is the principle.

<details><summary>الإجابة بالعربي</summary>

الـ Modules عالية المستوى تعتمد على **تجريدات**، لا على تطبيقات. Service Container في Laravel يطبّق هذا المبدأ. **DI ≠ DIP** — الـ DI تقنية، أما DIP فمبدأ.

</details>

> ✔️ **Senior tip:** Don't recite definitions. Anchor each principle to a real refactor you did.
>
> ✔️ **نصيحة Senior:** لا تردد التعريفات. اربط كل مبدأ بإعادة هيكلة حقيقية قمت بها.

---

### 🎨 Design Patterns

**Slug:** `php-patterns` · **AR:** أنماط التصميم

> Singleton, Factory, Strategy, Observer, Decorator, Adapter, Repository  
> *الأنماط الأكثر سؤالاً في مقابلات Senior*

#### ❓ Singleton

<sub>**AR:** Singleton</sub>

**Answer (EN):**

Single shared instance. **Often overused** — it is global state in disguise. Prefer Service Container singleton bindings.

<details><summary>الإجابة بالعربي</summary>

نسخة واحدة مشتركة. **يساء استخدامه كثيرًا** — فهو Global State متخفي. فضّل Singleton عبر Service Container.

</details>

---

#### ❓ Factory

<sub>**AR:** Factory</sub>

**Answer (EN):**

Encapsulates object creation. Use when construction logic is non-trivial (e.g. picking a payment gateway by config).

<details><summary>الإجابة بالعربي</summary>

يُغلّف منطق إنشاء الكائنات. استخدمه عندما يكون المنطق معقدًا (مثلاً اختيار Payment Gateway حسب Config).

</details>

```php
class PaymentGatewayFactory {
    public function make(string $type): PaymentGateway {
        return match ($type) {
            'stripe' => app(StripeGateway::class),
            'paypal' => app(PaypalGateway::class),
        };
    }
}
```

---

#### ❓ Strategy

<sub>**AR:** Strategy</sub>

**Answer (EN):**

Encapsulates interchangeable algorithms behind a common interface. Used for shipping calculators, tax rules, sort orders. Replaces sprawling `if/else` blocks.

<details><summary>الإجابة بالعربي</summary>

يُغلّف خوارزميات قابلة للتبديل خلف Interface مشتركة. يُستخدم لحساب الشحن، قواعد الضرائب، الترتيب. يُلغي `if/else` الكثيرة.

</details>

---

#### ❓ Observer

<sub>**AR:** Observer</sub>

**Answer (EN):**

One-to-many notification: subject notifies observers. Laravel Events are observers.

<details><summary>الإجابة بالعربي</summary>

إعلام One-to-Many: الـ Subject يُعلم الـ Observers. Laravel Events هي مثال على Observer Pattern.

</details>

---

#### ❓ Decorator

<sub>**AR:** Decorator</sub>

**Answer (EN):**

Wrap an object to add behavior without modifying it. Laravel middleware pipeline is decorator-style.

<details><summary>الإجابة بالعربي</summary>

يُغلّف كائنًا لإضافة سلوك دون تعديله. Laravel Middleware Pipeline مثال جيد.

</details>

---

#### ❓ Adapter

<sub>**AR:** Adapter</sub>

**Answer (EN):**

Make two incompatible interfaces work together. Wrap a legacy SDK behind a clean PSR interface.

<details><summary>الإجابة بالعربي</summary>

يجعل واجهتين غير متوافقتين تعملان معًا. مثل تغليف SDK قديم خلف Interface نظيفة.

</details>

---

#### ❓ Repository

<sub>**AR:** Repository</sub>

**Answer (EN):**

Abstract data access. In Laravel, opinions differ — many seniors say *Eloquent is already a Repository*. Use it only when you need to swap data sources or test without ORM.

<details><summary>الإجابة بالعربي</summary>

تجريد للوصول إلى البيانات. في Laravel، الآراء متباينة — كثير من الـ Seniors يقولون *Eloquent بالفعل Repository*. استخدمه فقط عند الحاجة لتبديل مصدر البيانات أو الاختبار بدون ORM.

</details>

---

#### ❓ Builder

<sub>**AR:** Builder</sub>

**Answer (EN):**

Step-by-step construction of complex objects. Laravel Query Builder is a real-world example.

<details><summary>الإجابة بالعربي</summary>

إنشاء كائنات معقدة خطوة بخطوة. Laravel Query Builder مثال حقيقي.

</details>

---

#### ❓ Command

<sub>**AR:** Command</sub>

**Answer (EN):**

Wrap a request as an object. Laravel `php artisan` commands and Bus dispatches are Command Pattern.

<details><summary>الإجابة بالعربي</summary>

يُغلّف طلبًا في كائن. `php artisan` commands و Bus dispatches أمثلة.

</details>

---

### 📦 Composer

**Slug:** `php-composer` · **AR:** Composer

> Dependency manager, PSR-4 autoloading, version constraints  
> *مدير الـ Dependencies والـ Autoloading*

#### ❓ What is Composer?

<sub>**AR:** ما هو Composer؟</sub>

**Answer (EN):**

The de-facto PHP package manager. Manages **dependencies** and **autoloading** via PSR-4. It does *not* install PHP extensions.

<details><summary>الإجابة بالعربي</summary>

مدير الباكدجات الأساسي في PHP. يدير الـ **Dependencies** والـ **Autoloading** عبر PSR-4. *لا* يُثبت إضافات PHP.

</details>

---

#### ❓ composer.json vs composer.lock

<sub>**AR:** الفرق بين composer.json و composer.lock</sub>

**Answer (EN):**

`composer.json` declares *desired* versions (constraints). `composer.lock` records the *exact* versions installed — commit it for app repos, but NOT for libraries.

<details><summary>الإجابة بالعربي</summary>

`composer.json` يحدد الإصدارات المطلوبة (Constraints). `composer.lock` يُسجّل الإصدارات المُثبّتة فعلاً — اعمل له Commit في تطبيقاتك، لكن لا في الـ Libraries.

</details>

---

#### ❓ Version constraints

<sub>**AR:** Version Constraints</sub>

**Answer (EN):**

- `^1.2` — >=1.2 <2.0 (caret)
- `~1.2` — >=1.2 <1.3 (tilde)
- `1.*` — wildcard
- `>=1.2,<1.5` — explicit range

<details><summary>الإجابة بالعربي</summary>

- `^1.2` — >=1.2 <2.0 (caret)
- `~1.2` — >=1.2 <1.3 (tilde)
- `1.*` — wildcard
- `>=1.2,<1.5` — مدى صريح

</details>

---

#### ❓ PSR-4 Autoloading

<sub>**AR:** PSR-4 Autoloading</sub>

**Answer (EN):**

Map a namespace prefix to a directory. `App\Services\UserService` resolves to `app/Services/UserService.php`.

<details><summary>الإجابة بالعربي</summary>

يُربط بادئة Namespace بمجلد. `App\Services\UserService` يُحلّ إلى `app/Services/UserService.php`.

</details>

```php
"autoload": {
  "psr-4": { "App\\": "app/" }
}
```

---

#### ❓ Production install flags

<sub>**AR:** أوامر التثبيت للـ Production</sub>

**Answer (EN):**

Skip dev packages and generate fast classmap:

<details><summary>الإجابة بالعربي</summary>

تخطّى Dev Packages واصنع Classmap سريع:

</details>

```php
composer install --no-dev --optimize-autoloader --classmap-authoritative
```

> ✔️ **Senior tip:** Never run `composer update` in production — only `install` from the lock file.
>
> ✔️ **نصيحة Senior:** لا تستخدم `composer update` في الـ Production — فقط `install` من lock file.

---

### 🧠 PHP Memory Management

**Slug:** `php-memory` · **AR:** إدارة الذاكرة في PHP

> Reference counting, Copy-On-Write, Garbage Collection, Stack vs Heap  
> *إدارة الذاكرة و COW و Garbage Collector*

#### ❓ How does PHP manage memory per request?

<sub>**AR:** كيف تدير PHP الذاكرة في كل Request؟</sub>

**Answer (EN):**

PHP-FPM uses a **request-scoped memory model**: each request gets a memory arena that is wiped at the end. That is why PHP "leaks" usually only matter inside a single request.

<details><summary>الإجابة بالعربي</summary>

PHP-FPM يستخدم نموذج ذاكرة **محصور بالطلب**: كل Request له Memory Arena تُمسح في النهاية. لهذا فإن Memory Leaks غالبًا تهم داخل Request واحد فقط.

</details>

---

#### ❓ Reference Counting + Copy-On-Write

<sub>**AR:** Reference Counting + Copy-On-Write</sub>

**Answer (EN):**

Each zval tracks a refcount. Assignment does NOT copy until a write occurs.

<details><summary>الإجابة بالعربي</summary>

كل zval يحمل عداد مراجع (RefCount). الإسناد لا ينسخ حتى تحدث عملية كتابة.

</details>

```php
$a = range(1, 1_000_000);
$b = $a;       // No copy
$b[0] = 99;    // NOW the array is copied
```

---

#### ❓ Circular References & the Cycle Collector

<sub>**AR:** Circular References و Cycle Collector</sub>

**Answer (EN):**

RefCount cannot free cycles. PHP runs a cycle collector when the buffer fills. Tune via `gc_enable()` / `gc_collect_cycles()`.

<details><summary>الإجابة بالعربي</summary>

الـ RefCount لا يستطيع تحرير الحلقات (Cycles). PHP يشغّل Cycle Collector عندما يمتلئ الـ Buffer. يمكن التحكم عبر `gc_enable()` و `gc_collect_cycles()`.

</details>

```php
class A { public $b; }
class B { public $a; }
$a = new A(); $b = new B();
$a->b = $b; $b->a = $a; // circular — handled by GC
```

---

#### ❓ Generators and memory

<sub>**AR:** الـ Generators والذاكرة</sub>

**Answer (EN):**

Generators stream values lazily — essential for large datasets.

<details><summary>الإجابة بالعربي</summary>

الـ Generators تنتج القيم بشكل كسول — ضرورية للبيانات الكبيرة.

</details>

```php
function bigFile($path) {
    $h = fopen($path, 'r');
    while (($line = fgets($h)) !== false) yield $line;
}
foreach (bigFile('huge.csv') as $line) { /* O(1) memory */ }
```

---

#### ❓ How to debug memory issues?

<sub>**AR:** كيف تُصلح مشاكل الذاكرة؟</sub>

**Answer (EN):**

`memory_get_usage(true)`, `memory_get_peak_usage(true)`, Blackfire, Xdebug, `php -d memory_limit=...`. In queues, restart workers after N jobs to mitigate leaks (Horizon does this automatically).

<details><summary>الإجابة بالعربي</summary>

استخدم `memory_get_usage(true)` و `memory_get_peak_usage(true)` و Blackfire و Xdebug. في Queues، أعِد تشغيل Workers بعد عدد معين من Jobs (Horizon يفعل ذلك تلقائيًا).

</details>

---

### ⚡ PHP Performance

**Slug:** `php-performance` · **AR:** أداء PHP

> OPcache, JIT, PHP-FPM tuning, profiling  
> *تحسين الأداء وضبط PHP-FPM*

#### ❓ Top knobs to make PHP fast in production

<sub>**AR:** أهم المفاتيح لتسريع PHP في الإنتاج</sub>

**Answer (EN):**

1. Enable **OPcache** with `opcache.validate_timestamps=0` in prod
2. Use **preloading** (PHP 7.4+) for hot classes
3. Tune **PHP-FPM** pool (`pm = static` or `dynamic`, right `max_children`)
4. Avoid **N+1**; eager load with `with()`
5. Cache aggressively (Redis, HTTP cache, route cache)
6. Move slow work to **queues**
7. Use **connection pooling** (PgBouncer for Postgres)

<details><summary>الإجابة بالعربي</summary>

1. فعّل **OPcache** مع `opcache.validate_timestamps=0` في الإنتاج
2. استخدم **Preloading** (PHP 7.4+) للـ Classes الساخنة
3. اضبط **PHP-FPM Pool** بشكل صحيح
4. تجنب **N+1**; استخدم `with()`
5. اعمل Cache بقوة (Redis, HTTP Cache, Route Cache)
6. انقل العمل البطيء إلى **Queues**
7. استخدم **Connection Pooling** (PgBouncer لـ Postgres)

</details>

---

#### ❓ What is OPcache?

<sub>**AR:** ما هو OPcache؟</sub>

**Answer (EN):**

OPcache caches compiled opcodes in **shared memory**, eliminating repeated lexical analysis, parsing, and compilation. Reduces CPU and request latency.

<details><summary>الإجابة بالعربي</summary>

OPcache يحفظ Opcodes المُجمَّعة في **Shared Memory**، فيُلغي تكرار Lexer/Parser/Compiler. يقلل من استهلاك CPU ويُسرّع Requests.

</details>

```php
; php.ini
opcache.memory_consumption=256
opcache.max_accelerated_files=20000
opcache.validate_timestamps=0   ; production
opcache.revalidate_freq=0
opcache.jit_buffer_size=128M
opcache.preload=/var/www/preload.php
```

---

#### ❓ What is JIT and does it help Laravel?

<sub>**AR:** ما هو JIT وهل يفيد Laravel؟</sub>

**Answer (EN):**

JIT (PHP 8+) compiles hot opcodes to **machine code**. Helps CPU-bound work (math, loops). **Doesn't help much for Laravel** because most time is spent on I/O (DB, Redis, HTTP).

<details><summary>الإجابة بالعربي</summary>

JIT (PHP 8+) يُحوّل Opcodes الساخنة إلى **Machine Code**. يفيد العمليات الحسابية والـ Loops. **لا يفيد Laravel كثيرًا** لأن معظم الوقت يضيع في I/O (Database, Redis, HTTP).

</details>

---

#### ❓ PHP-FPM sizing

<sub>**AR:** ضبط PHP-FPM</sub>

**Answer (EN):**

Rule of thumb: `max_children ≈ (RAM available − OS − DB) / avg request memory`. Monitor `listen.backlog`, `slowlog`, and queue depth.

<details><summary>الإجابة بالعربي</summary>

قاعدة عامة: `max_children ≈ (RAM المتاح − OS − DB) / متوسط ذاكرة Request`. راقب `listen.backlog` و `slowlog` وعمق الـ Queue.

</details>

---

#### ❓ Profiling tools

<sub>**AR:** أدوات تحليل الأداء</sub>

**Answer (EN):**

Blackfire, Tideways, Xdebug profile, Clockwork (Laravel), Laravel Telescope. For production tracing: **OpenTelemetry** + Jaeger/Tempo.

<details><summary>الإجابة بالعربي</summary>

Blackfire و Tideways و Xdebug Profile و Clockwork و Laravel Telescope. للـ Production Tracing: **OpenTelemetry** + Jaeger/Tempo.

</details>

---

## Part II — Laravel

<sub>الجزء الثاني — Laravel</sub>

### 🔄 Request Lifecycle

**Slug:** `lv-lifecycle` · **AR:** دورة حياة الطلب

> From public/index.php to terminating middleware  
> *من index.php حتى Terminating Middleware*

#### ❓ Explain the Laravel request lifecycle (senior answer)

<sub>**AR:** اشرح دورة حياة الـ Request في Laravel</sub>

**Answer (EN):**

The request enters via `public/index.php`, which bootstraps the application container. The HTTP Kernel registers **bootstrappers** (env, config, exception handler, facades, service providers). **Service providers** are then *registered* then *booted*. Global middleware runs, the router matches the request, route middleware runs, the controller is resolved from the container with its dependencies, the response is built and sent, and finally **terminating middleware** runs after the response is delivered.

public/index.php → Bootstrap App → HTTP Kernel → Global Middleware → Router → Route Middleware → Controller → Response → Terminating Middleware

<details><summary>الإجابة بالعربي</summary>

الطلب يدخل عبر `public/index.php` الذي يُمهّد الـ Application Container. الـ HTTP Kernel يُسجّل الـ **Bootstrappers** (env, config, exception handler, facades, service providers). الـ **Service Providers** تُسجَّل ثم تُشغَّل (boot). تعمل Global Middleware، يُطابق الـ Router الطلب، تعمل Route Middleware، يُحلّ الـ Container الـ Controller مع Dependencies، يُبنى الـ Response ويُرسَل، وفي النهاية تعمل **Terminating Middleware**.

</details>

<details><summary>تفاصيل بالعربي</summary>

public/index.php → Bootstrap → HTTP Kernel → Global Middleware → Router → Route Middleware → Controller → Response → Terminating

</details>

> ✔️ **Senior tip:** Don't just say "Controller then Model." Mention boot → service providers → middleware → container resolution → terminating middleware.
>
> ✔️ **نصيحة Senior:** لا تقل فقط "Controller ثم Model". اذكر boot ثم service providers ثم middleware ثم container resolution ثم terminating middleware.

---

### 📦 Service Container

**Slug:** `lv-container` · **AR:** Service Container

> IoC, automatic resolution, bindings  
> *IoC والـ Bindings و Automatic Resolution*

#### ❓ What is the Service Container?

<sub>**AR:** ما هو Service Container؟</sub>

**Answer (EN):**

An **IoC container** that manages class dependencies and performs *automatic resolution* via reflection. It is the heart of Laravel.

<details><summary>الإجابة بالعربي</summary>

هو **IoC Container** يدير Class Dependencies ويقوم بـ *Automatic Resolution* عبر Reflection. هو قلب Laravel.

</details>

---

#### ❓ bind vs singleton vs instance vs scoped

<sub>**AR:** الفرق بين bind و singleton و instance و scoped</sub>

**Answer (EN):**

- `bind` — new instance each resolve
- `singleton` — same instance for the request lifetime
- `instance` — pre-built object you hand to the container
- `scoped` — per request scope (useful with Octane)

<details><summary>الإجابة بالعربي</summary>

- `bind` — Instance جديدة في كل Resolve
- `singleton` — نفس الـ Instance خلال عمر الـ Request
- `instance` — كائن جاهز تُعطيه للـ Container
- `scoped` — Scope لكل Request (مهم مع Octane)

</details>

---

#### ❓ Contextual binding

<sub>**AR:** Contextual Binding</sub>

**Answer (EN):**

Bind different implementations based on the class consuming them.

<details><summary>الإجابة بالعربي</summary>

اربط تطبيقات مختلفة حسب الـ Class المستهلك.

</details>

```php
$this->app->when(VideoController::class)
          ->needs(Filesystem::class)
          ->give(fn() => Storage::disk('s3'));
```

---

### 🔌 Service Providers

**Slug:** `lv-providers` · **AR:** Service Providers

> register() vs boot(), deferred providers  
> *register vs boot والـ Deferred Providers*

#### ❓ register() vs boot()

<sub>**AR:** الفرق بين register و boot</sub>

**Answer (EN):**

**register():** only bind into the container. Do NOT use other services here — they may not be registered yet. **boot():** runs after all providers registered; safe to use other services, define routes, events, view composers, etc.

<details><summary>الإجابة بالعربي</summary>

**register():** فقط للـ Bindings. لا تستخدم Services أخرى — قد لا تكون مُسجَّلة بعد. **boot():** يعمل بعد تسجيل كل الـ Providers؛ آمن لاستخدام Services أخرى وتعريف Routes و Events و View Composers.

</details>

---

#### ❓ Deferred providers

<sub>**AR:** Deferred Providers</sub>

**Answer (EN):**

Implement `DeferrableProvider` + `provides()`. The provider only loads when one of its services is requested — speeds up boot.

<details><summary>الإجابة بالعربي</summary>

نفّذ `DeferrableProvider` + `provides()`. الـ Provider يُحمَّل فقط عند طلب أحد Services الخاصة به — يُسرّع الـ Boot.

</details>

---

### 🚦 Middleware

**Slug:** `lv-middleware` · **AR:** Middleware

> Global, route, before/after, terminable  
> *الأنواع و before/after و Terminable*

#### ❓ What is middleware?

<sub>**AR:** ما هو Middleware؟</sub>

**Answer (EN):**

HTTP layer that intercepts requests and responses. Implemented as a **pipeline** (chain of decorators).

<details><summary>الإجابة بالعربي</summary>

طبقة HTTP تعترض Requests و Responses. مُنفّذة كـ **Pipeline** (سلسلة Decorators).

</details>

---

#### ❓ Global vs route vs group middleware

<sub>**AR:** الفرق بين Global و Route و Group middleware</sub>

**Answer (EN):**

**Global** runs on every request (CORS, trim strings). **Group** applied to a set of routes (`web`, `api`). **Route-level** applies to individual routes.

<details><summary>الإجابة بالعربي</summary>

**Global** يعمل في كل Request (CORS, trim strings). **Group** يُطبَّق على مجموعة Routes (`web`, `api`). **Route-level** يُطبَّق على Route واحد.

</details>

---

#### ❓ Before vs after middleware

<sub>**AR:** الفرق بين Before و After Middleware</sub>

**Answer (EN):**

Code before `$next($request)` runs before the controller; after it runs after.

<details><summary>الإجابة بالعربي</summary>

الكود قبل `$next($request)` يعمل قبل الـ Controller، والذي بعده يعمل بعد.

</details>

```php
public function handle($request, Closure $next) {
    // before
    $response = $next($request);
    // after
    return $response;
}
```

---

#### ❓ Terminable middleware

<sub>**AR:** Terminable Middleware</sub>

**Answer (EN):**

Has a `terminate()` method that runs *after* the response is sent to the client — great for logging or async cleanup.

<details><summary>الإجابة بالعربي</summary>

يحتوي على `terminate()` يعمل *بعد* إرسال الـ Response — مفيد للتسجيل والـ Cleanup.

</details>

---

### 🗺 Routing

**Slug:** `lv-routing` · **AR:** Routing

> Route model binding, caching, resource controllers  
> *Route Model Binding والـ Caching*

#### ❓ Route model binding

<sub>**AR:** Route Model Binding</sub>

**Answer (EN):**

Auto-resolve a model instance from a route parameter.

<details><summary>الإجابة بالعربي</summary>

يُحلّ Laravel كائن Model تلقائيًا من Route Parameter.

</details>

```php
Route::get('/users/{user}', fn(User $user) => $user);
// Custom key
Route::get('/posts/{post:slug}', fn(Post $post) => $post);
```

---

#### ❓ Route caching

<sub>**AR:** Route Caching</sub>

**Answer (EN):**

`php artisan route:cache` serializes all routes for fast lookup. **Don't use closures** in routes if you want this.

<details><summary>الإجابة بالعربي</summary>

`php artisan route:cache` يُسلسل كل الـ Routes لتسريع البحث. **لا تستخدم Closures** في Routes إذا أردت ذلك.

</details>

---

#### ❓ Resource controllers

<sub>**AR:** Resource Controllers</sub>

**Answer (EN):**

Auto-generate the 7 RESTful routes: index, create, store, show, edit, update, destroy.

<details><summary>الإجابة بالعربي</summary>

يُنتج تلقائيًا 7 Routes RESTful: index, create, store, show, edit, update, destroy.

</details>

```php
Route::resource('posts', PostController::class);
```

---

### ✅ Validation

**Slug:** `lv-validation` · **AR:** Validation

> Inline, Form Requests, custom rules  
> *Inline و Form Requests و Rules مخصصة*

#### ❓ Three ways to validate

<sub>**AR:** ثلاث طرق للـ Validation</sub>

**Answer (EN):**

- Inline `$request->validate([...])`
- `Validator::make()` facade
- **Form Requests** — recommended for non-trivial validation

<details><summary>الإجابة بالعربي</summary>

- Inline `$request->validate([...])`
- `Validator::make()`
- **Form Requests** — موصى بها للـ Validation المعقد

</details>

---

#### ❓ Form Request example

<sub>**AR:** مثال Form Request</sub>

**Answer (EN):**

Combine authorization and validation in one class.

<details><summary>الإجابة بالعربي</summary>

تجمع التحقق من الصلاحية والـ Validation في Class واحدة.

</details>

```php
class StoreUserRequest extends FormRequest {
    public function authorize(): bool {
        return $this->user()->can('create', User::class);
    }
    public function rules(): array {
        return [
            'email' => ['required','email','unique:users'],
            'password' => ['required', Password::min(8)->mixedCase()->numbers()],
        ];
    }
}
```

---

### 💎 Eloquent ORM

**Slug:** `lv-eloquent` · **AR:** Eloquent ORM

> Active Record, N+1, relationships, scopes  
> *Active Record و N+1 والعلاقات*

#### ❓ What pattern is Eloquent?

<sub>**AR:** ما هو نمط Eloquent؟</sub>

**Answer (EN):**

Eloquent implements the **Active Record** pattern — each model wraps a DB row and contains both data and persistence behavior.

<details><summary>الإجابة بالعربي</summary>

Eloquent تطبيق لنمط **Active Record** — كل Model يُغلّف صف في DB ويحتوي على البيانات وسلوك الحفظ.

</details>

---

#### ❓ N+1 problem

<sub>**AR:** مشكلة N+1</sub>

**Answer (EN):**

Lazy loading inside a loop fires one query per iteration. Solution: eager load with `with()`.

<details><summary>الإجابة بالعربي</summary>

Lazy Loading داخل Loop يُطلق Query لكل عنصر. الحل: Eager Loading عبر `with()`.

</details>

```php
// Bad: N+1
foreach (Post::all() as $post) {
    echo $post->author->name;
}
// Good: eager load
foreach (Post::with('author')->get() as $post) {
    echo $post->author->name;
}
```

> ✔️ **Senior tip:** Enable `Model::preventLazyLoading()` in local/staging to catch this in dev.
>
> ✔️ **نصيحة Senior:** فعّل `Model::preventLazyLoading()` في local/staging للكشف المبكر.

---

#### ❓ Relationship types

<sub>**AR:** أنواع العلاقات</sub>

**Answer (EN):**

`hasOne`, `hasMany`, `belongsTo`, `belongsToMany`, `hasManyThrough`, `morphTo`, `morphMany`, `morphedByMany`.

<details><summary>الإجابة بالعربي</summary>

`hasOne` و `hasMany` و `belongsTo` و `belongsToMany` و `hasManyThrough` و `morphTo` و `morphMany` و `morphedByMany`.

</details>

---

#### ❓ Local & global scopes

<sub>**AR:** Local و Global Scopes</sub>

**Answer (EN):**

**Local:** `scopePublished()` on the model. **Global:** implement `Scope` and attach in `booted()`.

<details><summary>الإجابة بالعربي</summary>

**Local:** `scopePublished()` على Model. **Global:** نفّذ `Scope` وأرفقه في `booted()`.

</details>

---

#### ❓ Mass assignment protection

<sub>**AR:** حماية Mass Assignment</sub>

**Answer (EN):**

Use `$fillable` (whitelist) or `$guarded = []` with care. Mass assignment vulnerabilities ship to production frequently.

<details><summary>الإجابة بالعربي</summary>

استخدم `$fillable` (whitelist) أو `$guarded = []` بحذر. ثغرات Mass Assignment تُنشر في الإنتاج كثيرًا.

</details>

---

#### ❓ When NOT to use Eloquent

<sub>**AR:** متى لا تستخدم Eloquent؟</sub>

**Answer (EN):**

- Bulk inserts (use `DB::insert` with chunks)
- Reporting queries (raw SQL with `DB::select`)
- Heavy transformations (database views)

<details><summary>الإجابة بالعربي</summary>

- Bulk Inserts (استخدم `DB::insert` مع Chunks)
- Reporting Queries (Raw SQL)
- تحويلات ثقيلة (Database Views)

</details>

---

### 📡 Events & Listeners

**Slug:** `lv-events` · **AR:** Events & Listeners

> Decouple side effects, sync vs queued  
> *فصل التأثيرات الجانبية*

#### ❓ When to use events

<sub>**AR:** متى تستخدم Events؟</sub>

**Answer (EN):**

Decouple side effects from your core flow. On `OrderPlaced`, listeners send confirmation email, update analytics, notify warehouse.

<details><summary>الإجابة بالعربي</summary>

افصل التأثيرات الجانبية عن منطقك الأساسي. على `OrderPlaced`، Listeners ترسل البريد وتحدث الـ Analytics وتُنبه المخزن.

</details>

---

#### ❓ Sync vs queued listeners

<sub>**AR:** Sync vs Queued Listeners</sub>

**Answer (EN):**

Implement `ShouldQueue` on the listener for async dispatch. Sync listeners run inline — they fail the request if they fail.

<details><summary>الإجابة بالعربي</summary>

نفّذ `ShouldQueue` على Listener للتنفيذ غير المتزامن. Sync Listeners تعمل Inline — وفشلها يُفشل الـ Request.

</details>

---

#### ❓ Model events vs domain events

<sub>**AR:** Model Events vs Domain Events</sub>

**Answer (EN):**

Eloquent fires `creating`, `created`, `updating`, etc. These are *persistence* events — tightly coupled to the model. Domain events should be raised from services, not models.

<details><summary>الإجابة بالعربي</summary>

Eloquent يُطلق `creating` و `created` و `updating`... هذه أحداث *حفظ* مرتبطة بالـ Model. أحداث الـ Domain يجب رفعها من Services، لا من Models.

</details>

---

### 📬 Queues & Jobs

**Slug:** `lv-queues` · **AR:** Queues & Jobs

> Async work, retries, idempotency, Horizon  
> *العمل غير المتزامن و Retries و Horizon*

#### ❓ Why use queues?

<sub>**AR:** لماذا نستخدم Queues؟</sub>

**Answer (EN):**

Move slow / unreliable work off the request path: emails, third-party API calls, image processing, report generation.

<details><summary>الإجابة بالعربي</summary>

انقل العمل البطيء وغير الموثوق خارج Request: البريد، استدعاءات APIs خارجية، معالجة الصور، تقارير.

</details>

---

#### ❓ Drivers

<sub>**AR:** الـ Drivers</sub>

**Answer (EN):**

`sync`, `database`, `redis`, `sqs`, `beanstalkd`. **Redis** and **SQS** dominate production.

<details><summary>الإجابة بالعربي</summary>

`sync` و `database` و `redis` و `sqs` و `beanstalkd`. **Redis** و **SQS** هما الأكثر استخدامًا في الإنتاج.

</details>

---

#### ❓ Job idempotency

<sub>**AR:** Job Idempotency</sub>

**Answer (EN):**

Workers can retry. Make jobs idempotent — guard with a DB unique key, idempotency token, or `WithoutOverlapping` middleware.

<details><summary>الإجابة بالعربي</summary>

Workers قد تعيد المحاولة. اجعل Jobs idempotent — احمها بـ DB Unique Key أو Idempotency Token أو `WithoutOverlapping` middleware.

</details>

---

#### ❓ Retries, backoff, failed jobs

<sub>**AR:** Retries و Backoff و Failed Jobs</sub>

**Answer (EN):**

`$tries`, `$backoff`, `$timeout`, `$maxExceptions`. Use **failed_jobs** table + `queue:retry`. Long-term: alert on dead-letter growth.

<details><summary>الإجابة بالعربي</summary>

`$tries` و `$backoff` و `$timeout` و `$maxExceptions`. استخدم جدول **failed_jobs** + `queue:retry`. على المدى الطويل: نبه على نمو Dead Letter.

</details>

---

#### ❓ Horizon

<sub>**AR:** Horizon</sub>

**Answer (EN):**

Dashboard + supervisor for Redis queues — autoscaling, metrics, failure notifications.

<details><summary>الإجابة بالعربي</summary>

لوحة تحكم + Supervisor لـ Redis Queues — Autoscaling و Metrics وإشعارات الفشل.

</details>

---

#### ❓ Job batching, chains, unique jobs

<sub>**AR:** Job Batching و Chains و Unique Jobs</sub>

**Answer (EN):**

`Bus::batch()`, `Bus::chain()`, `ShouldBeUnique`. Used for fan-out workflows.

<details><summary>الإجابة بالعربي</summary>

`Bus::batch()` و `Bus::chain()` و `ShouldBeUnique`. تُستخدم في Workflows من نوع Fan-out.

</details>

---

### 🔔 Notifications

**Slug:** `lv-notifications` · **AR:** Notifications

> Mail, SMS, Slack, broadcast, push  
> *البريد و SMS و Slack و Push*

#### ❓ What's the Notifications system?

<sub>**AR:** ما هو نظام Notifications؟</sub>

**Answer (EN):**

A unified API to send messages across channels: mail, database, SMS (Vonage), Slack, broadcast (websockets), push.

<details><summary>الإجابة بالعربي</summary>

API موحَّد لإرسال رسائل عبر قنوات مختلفة: بريد، Database، SMS (Vonage)، Slack، Broadcast، Push.

</details>

---

#### ❓ via() method

<sub>**AR:** method via()</sub>

**Answer (EN):**

Decide channels per notifiable user.

<details><summary>الإجابة بالعربي</summary>

تحدد القنوات لكل مستخدم.

</details>

```php
public function via($notifiable): array {
    return $notifiable->prefers_sms ? ['vonage'] : ['mail','database'];
}
```

---

### 🔐 Authentication

**Slug:** `lv-authn` · **AR:** Authentication

> Guards, providers, password hashing  
> *Guards و Providers والتشفير*

#### ❓ Guards and providers

<sub>**AR:** Guards و Providers</sub>

**Answer (EN):**

**Guards:** how users are authenticated per request (session, token, JWT). **Providers:** how users are fetched (eloquent, database).

<details><summary>الإجابة بالعربي</summary>

**Guards:** كيفية التحقق من المستخدم لكل Request (session, token, JWT). **Providers:** كيفية جلب المستخدم (eloquent, database).

</details>

---

#### ❓ Password hashing

<sub>**AR:** تشفير كلمات السر</sub>

**Answer (EN):**

Bcrypt (default) or Argon2id. **Never** store plain or md5/sha1.

<details><summary>الإجابة بالعربي</summary>

Bcrypt (الافتراضي) أو Argon2id. **لا تخزن** كلمة سر صريحة أو md5/sha1.

</details>

---

#### ❓ Remember tokens, password resets

<sub>**AR:** Remember Tokens و Password Resets</sub>

**Answer (EN):**

Use built-in flows. Rolling your own is risky.

<details><summary>الإجابة بالعربي</summary>

استخدم Flows المُدمجة. كتابة Flow خاصة بك محفوفة بالمخاطر.

</details>

---

### 🛡 Authorization

**Slug:** `lv-authz` · **AR:** Authorization

> Gates, Policies, roles & permissions  
> *Gates و Policies والصلاحيات*

#### ❓ Gates vs Policies

<sub>**AR:** Gates vs Policies</sub>

**Answer (EN):**

**Gates:** closure-based, good for global checks. **Policies:** class-based per model.

<details><summary>الإجابة بالعربي</summary>

**Gates:** Closure للتحقق العام. **Policies:** Class لكل Model.

</details>

---

#### ❓ Roles vs Permissions

<sub>**AR:** Roles vs Permissions</sub>

**Answer (EN):**

Don't hardcode role checks. Check **permissions**. Roles are bundles of permissions. `spatie/laravel-permission` is the de-facto.

<details><summary>الإجابة بالعربي</summary>

لا تربط الكود بأسماء Roles. تحقق من **Permissions**. الـ Roles هي مجموعات Permissions. `spatie/laravel-permission` هي المكتبة المعتمدة.

</details>

---

### 🎫 Sanctum

**Slug:** `lv-sanctum` · **AR:** Sanctum

> SPA cookies, mobile tokens  
> *SPA Cookies و Mobile Tokens*

#### ❓ When to use Sanctum?

<sub>**AR:** متى تستخدم Sanctum؟</sub>

**Answer (EN):**

SPAs on same domain (cookie-based session auth), or mobile clients with simple personal access tokens. **Not OAuth2.**

<details><summary>الإجابة بالعربي</summary>

SPAs على نفس الـ Domain (Cookie Session Auth)، أو Mobile Clients مع Personal Access Tokens بسيطة. **ليست OAuth2.**

</details>

---

#### ❓ SPA flow

<sub>**AR:** تدفق SPA</sub>

**Answer (EN):**

`/sanctum/csrf-cookie` → login → cookie session → API requests stateful via `auth:sanctum` middleware.

<details><summary>الإجابة بالعربي</summary>

`/sanctum/csrf-cookie` → login → Cookie Session → API Requests Stateful عبر `auth:sanctum`.

</details>

---

### 🛂 Passport

**Slug:** `lv-passport` · **AR:** Passport

> Full OAuth2 server  
> *OAuth2 Server كامل*

#### ❓ When to use Passport?

<sub>**AR:** متى تستخدم Passport؟</sub>

**Answer (EN):**

Full **OAuth2 server**: authorization code, client credentials, refresh tokens. Use when you expose your API to third-party apps.

<details><summary>الإجابة بالعربي</summary>

OAuth2 Server كامل: Authorization Code و Client Credentials و Refresh Tokens. استخدمه عند فتح API لتطبيقات Third-party.

</details>

---

#### ❓ Sanctum vs Passport — senior answer

<sub>**AR:** Sanctum vs Passport — إجابة Senior</sub>

**Answer (EN):**

Pick Sanctum unless you actually need OAuth2 (third-party clients, scopes, consent screens). Sanctum is lighter and covers ~90% of real apps.

<details><summary>الإجابة بالعربي</summary>

اختر Sanctum إلا إذا كنت بحاجة فعلية لـ OAuth2 (Third-party، Scopes، Consent Screens). Sanctum أخف ويُغطي ~90% من التطبيقات.

</details>

---

### 🔄 API Resources

**Slug:** `lv-resources` · **AR:** API Resources

> Transformation layer between models and JSON  
> *طبقة تحويل بين Models و JSON*

#### ❓ Why use Resources?

<sub>**AR:** لماذا نستخدم Resources؟</sub>

**Answer (EN):**

Hide internal columns, compute derived fields, handle relations conditionally.

<details><summary>الإجابة بالعربي</summary>

إخفاء الأعمدة الداخلية، حساب حقول مشتقة، تمرير العلاقات بشكل شرطي.

</details>

```php
class UserResource extends JsonResource {
    public function toArray($r): array {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'posts' => PostResource::collection($this->whenLoaded('posts')),
        ];
    }
}
```

---

### ⚡ Caching

**Slug:** `lv-caching` · **AR:** Caching

> Strategies, tags, stampedes  
> *استراتيجيات وتاجات وعواصف*

#### ❓ Common cache patterns

<sub>**AR:** أنماط Caching الشائعة</sub>

**Answer (EN):**

- **Cache-aside (lazy):** read cache; miss → fetch → store
- **Write-through:** write to cache and DB together
- **Write-behind:** async DB write
- **TTL + jitter** to prevent stampedes

<details><summary>الإجابة بالعربي</summary>

- **Cache-aside (Lazy):** اقرأ من Cache؛ Miss → اجلب → احفظ
- **Write-through:** اكتب لـ Cache و DB معًا
- **Write-behind:** Write للـ DB غير متزامن
- **TTL + Jitter** لمنع الـ Stampedes

</details>

---

#### ❓ Cache::remember()

<sub>**AR:** Cache::remember()</sub>

**Answer (EN):**

Helper that handles read-or-fetch-and-store.

<details><summary>الإجابة بالعربي</summary>

Helper يجمع اقرأ-أو-اجلب-واحفظ.

</details>

```php
$user = Cache::remember("user.$id", 600, fn() => User::find($id));
```

---

#### ❓ Cache tags

<sub>**AR:** Cache Tags</sub>

**Answer (EN):**

Only Redis/Memcached. `Cache::tags(['users'])->flush()` invalidates a group.

<details><summary>الإجابة بالعربي</summary>

تعمل فقط مع Redis/Memcached. `Cache::tags(['users'])->flush()` يُلغي مجموعة.

</details>

---

#### ❓ Cache stampede

<sub>**AR:** Cache Stampede</sub>

**Answer (EN):**

When TTL expires, many concurrent requests refill → overwhelms DB. Use `Cache::lock()` or `remember` with a single-flight lock.

<details><summary>الإجابة بالعربي</summary>

عند انتهاء TTL، طلبات متزامنة كثيرة تحاول إعادة التحميل → تُغرق DB. استخدم `Cache::lock()` أو Single-flight Lock.

</details>

---

### 🧪 Testing

**Slug:** `lv-testing` · **AR:** Testing

> Unit, Feature, Dusk, factories, fakes  
> *Unit و Feature و Dusk و Factories*

#### ❓ Unit vs Feature vs Browser tests

<sub>**AR:** Unit vs Feature vs Browser Tests</sub>

**Answer (EN):**

**Unit:** isolated class without framework. **Feature:** exercises HTTP layer with the container. **Browser (Dusk):** end-to-end through a real browser.

<details><summary>الإجابة بالعربي</summary>

**Unit:** Class معزول بدون Framework. **Feature:** يختبر طبقة HTTP مع Container. **Browser (Dusk):** End-to-End بمتصفح حقيقي.

</details>

---

#### ❓ Database for tests

<sub>**AR:** قاعدة بيانات الاختبارات</sub>

**Answer (EN):**

`RefreshDatabase` uses transactions per test. Use real DB (Postgres/MySQL), **not SQLite**, for production parity.

<details><summary>الإجابة بالعربي</summary>

`RefreshDatabase` يستخدم Transactions لكل Test. استخدم DB حقيقية (Postgres/MySQL)، **لا SQLite**، للتوافق مع Production.

</details>

---

#### ❓ Factories & Seeders

<sub>**AR:** Factories و Seeders</sub>

**Answer (EN):**

Factories generate models with fake data; use states for variants. Seeders set up baseline reference data.

<details><summary>الإجابة بالعربي</summary>

Factories تُنشئ Models ببيانات وهمية؛ استخدم States للتنويعات. Seeders تُعد بيانات أساسية.

</details>

---

#### ❓ Mocks vs Fakes

<sub>**AR:** Mocks vs Fakes</sub>

**Answer (EN):**

Laravel ships fakes: `Bus::fake()`, `Queue::fake()`, `Notification::fake()`, `Event::fake()`, `Storage::fake()`, `Http::fake()`. Prefer fakes over hand-rolled mocks.

<details><summary>الإجابة بالعربي</summary>

Laravel توفر Fakes جاهزة. فضّل Fakes على Mocks اليدوية.

</details>

---

## Part III — Databases

<sub>الجزء الثالث — قواعد البيانات</sub>

### 🗄 SQL Fundamentals

**Slug:** `db-sql` · **AR:** أساسيات SQL

> DDL/DML/DCL/TCL, joins, group by, window functions  
> *أنواع الأوامر والـ Joins و Window Functions*

#### ❓ DDL vs DML vs DCL vs TCL

<sub>**AR:** الفرق بين DDL و DML و DCL و TCL</sub>

**Answer (EN):**

**DDL:** CREATE/ALTER/DROP. **DML:** SELECT/INSERT/UPDATE/DELETE. **DCL:** GRANT/REVOKE. **TCL:** BEGIN/COMMIT/ROLLBACK/SAVEPOINT.

<details><summary>الإجابة بالعربي</summary>

**DDL:** CREATE/ALTER/DROP. **DML:** SELECT/INSERT/UPDATE/DELETE. **DCL:** GRANT/REVOKE. **TCL:** BEGIN/COMMIT/ROLLBACK/SAVEPOINT.

</details>

---

#### ❓ JOIN types

<sub>**AR:** أنواع JOIN</sub>

**Answer (EN):**

INNER, LEFT, RIGHT, FULL OUTER, CROSS, SELF, LATERAL (Postgres). Most filters belong on the `ON` clause, not `WHERE`, when using outer joins.

<details><summary>الإجابة بالعربي</summary>

INNER و LEFT و RIGHT و FULL OUTER و CROSS و SELF و LATERAL (Postgres). معظم الفلاتر يجب أن تكون في `ON` لا `WHERE` مع Outer Joins.

</details>

---

#### ❓ GROUP BY + HAVING

<sub>**AR:** GROUP BY + HAVING</sub>

**Answer (EN):**

`WHERE` filters rows before aggregation; `HAVING` filters groups after aggregation.

<details><summary>الإجابة بالعربي</summary>

`WHERE` يفلتر الصفوف قبل التجميع؛ `HAVING` يفلتر المجموعات بعد التجميع.

</details>

---

#### ❓ Window functions

<sub>**AR:** Window Functions</sub>

**Answer (EN):**

Don't collapse rows — compute per-row across a window.

<details><summary>الإجابة بالعربي</summary>

لا تُدمج الصفوف — تحسب لكل صف عبر نافذة.

</details>

```php
SELECT user_id, amount,
       SUM(amount) OVER (PARTITION BY user_id ORDER BY created_at) AS running_total
FROM transactions;
```

---

#### ❓ CTE vs subquery

<sub>**AR:** CTE vs Subquery</sub>

**Answer (EN):**

CTEs improve readability. In Postgres ≥12, CTEs are inlined by default (no longer optimization fences).

<details><summary>الإجابة بالعربي</summary>

CTEs تُحسّن القراءة. في Postgres ≥12 تُدمج افتراضيًا (لم تعد حواجز للـ Optimizer).

</details>

---

#### ❓ Set operations

<sub>**AR:** العمليات على المجموعات</sub>

**Answer (EN):**

`UNION` (dedup), `UNION ALL` (keep duplicates, faster), `INTERSECT`, `EXCEPT`.

<details><summary>الإجابة بالعربي</summary>

`UNION` (يزيل التكرار)، `UNION ALL` (يحتفظ بالتكرار وأسرع)، `INTERSECT`، `EXCEPT`.

</details>

---

### 🐘 PostgreSQL

**Slug:** `db-postgresql` · **AR:** PostgreSQL

> JSONB, VACUUM, WAL, connection pooling  
> *JSONB و VACUUM و WAL و PgBouncer*

#### ❓ Why pick PostgreSQL?

<sub>**AR:** لماذا تختار PostgreSQL؟</sub>

**Answer (EN):**

Full ACID, MVCC, rich types (JSONB, arrays, ranges), GIST/GIN indexes, mature partitioning, logical replication, partial/expression indexes, transactional DDL.

<details><summary>الإجابة بالعربي</summary>

ACID كامل، MVCC، أنواع غنية (JSONB, Arrays, Ranges)، فهارس GIST/GIN، Partitioning ناضج، Logical Replication، Partial/Expression Indexes، DDL داخل Transaction.

</details>

---

#### ❓ JSONB vs JSON

<sub>**AR:** JSONB vs JSON</sub>

**Answer (EN):**

**JSONB:** binary, indexed, queryable, slightly slower to write. **JSON:** raw text. Use JSONB 99% of the time.

<details><summary>الإجابة بالعربي</summary>

**JSONB:** Binary و Indexed و Queryable، أبطأ قليلاً في الكتابة. **JSON:** نص خام. استخدم JSONB 99% من الوقت.

</details>

---

#### ❓ VACUUM & bloat

<sub>**AR:** VACUUM و Bloat</sub>

**Answer (EN):**

MVCC leaves dead tuples; **autovacuum** reclaims space. Tune for high-churn tables (lower `autovacuum_vacuum_scale_factor`). Watch `pg_stat_user_tables`.

<details><summary>الإجابة بالعربي</summary>

MVCC تترك Dead Tuples؛ **Autovacuum** يستعيد المساحة. اضبط للجداول كثيرة التحديث. راقب `pg_stat_user_tables`.

</details>

---

#### ❓ WAL (Write-Ahead Log)

<sub>**AR:** WAL</sub>

**Answer (EN):**

Every change is written to WAL before data files — provides durability and powers replication and PITR (Point-In-Time Recovery).

<details><summary>الإجابة بالعربي</summary>

كل تغيير يُكتب لـ WAL قبل ملفات البيانات — يضمن الـ Durability ويُمكّن Replication و PITR.

</details>

---

#### ❓ Connection pooling

<sub>**AR:** Connection Pooling</sub>

**Answer (EN):**

Postgres connections are expensive (process per connection). Use **PgBouncer** in transaction mode in front of Postgres.

<details><summary>الإجابة بالعربي</summary>

اتصالات Postgres مكلفة (Process لكل اتصال). استخدم **PgBouncer** في وضع Transaction أمام Postgres.

</details>

---

### 🐬 MySQL

**Slug:** `db-mysql` · **AR:** MySQL

> InnoDB, clustered indexes, isolation, utf8mb4  
> *InnoDB والـ Clustered Indexes و utf8mb4*

#### ❓ InnoDB vs MyISAM

<sub>**AR:** InnoDB vs MyISAM</sub>

**Answer (EN):**

Use InnoDB. MyISAM has no transactions, no row-level locks, no crash recovery. InnoDB is default since 5.5.

<details><summary>الإجابة بالعربي</summary>

استخدم InnoDB. MyISAM لا يدعم Transactions ولا Row Locks ولا Crash Recovery. InnoDB افتراضي منذ 5.5.

</details>

---

#### ❓ Clustered vs secondary indexes

<sub>**AR:** Clustered vs Secondary Indexes</sub>

**Answer (EN):**

InnoDB stores rows physically by the primary key (clustered). Secondary indexes store PK as the row pointer — long PKs bloat all indexes.

<details><summary>الإجابة بالعربي</summary>

InnoDB يخزن الصفوف فيزيائيًا حسب PK (Clustered). Secondary Indexes تخزن PK كمؤشر — PK طويلة تنفخ كل الفهارس.

</details>

---

#### ❓ Default isolation level?

<sub>**AR:** الـ Isolation Level الافتراضي؟</sub>

**Answer (EN):**

REPEATABLE READ (different from Postgres' READ COMMITTED). MySQL avoids phantom reads via **gap locks**.

<details><summary>الإجابة بالعربي</summary>

REPEATABLE READ (مختلف عن Postgres الذي يستخدم READ COMMITTED). MySQL يتجنب Phantom Reads عبر **Gap Locks**.

</details>

---

#### ❓ utf8 vs utf8mb4

<sub>**AR:** utf8 vs utf8mb4</sub>

**Answer (EN):**

Always use `utf8mb4` (real UTF-8, supports emoji and full BMP). Legacy `utf8` is 3-byte only.

<details><summary>الإجابة بالعربي</summary>

استخدم دائمًا `utf8mb4` (UTF-8 حقيقي يدعم Emoji). `utf8` القديم 3 بايت فقط.

</details>

---

### 💸 Transactions

**Slug:** `db-transactions` · **AR:** Transactions

> Atomic units of work, savepoints, pitfalls  
> *وحدات العمل الذرية والـ Savepoints*

#### ❓ What is a transaction?

<sub>**AR:** ما هو Transaction؟</sub>

**Answer (EN):**

An atomic unit of work — either all statements commit or none.

<details><summary>الإجابة بالعربي</summary>

وحدة عمل ذرية — كل العبارات تُحفظ أو لا شيء.

</details>

```php
BEGIN;
  UPDATE accounts SET balance = balance - 100 WHERE id = 1;
  UPDATE accounts SET balance = balance + 100 WHERE id = 2;
COMMIT;
```

---

#### ❓ Common pitfall: long transactions

<sub>**AR:** فخ شائع: Transactions طويلة</sub>

**Answer (EN):**

They hold locks and bloat MVCC. Keep them short. **Never** do HTTP calls or queue dispatch inside an open transaction.

<details><summary>الإجابة بالعربي</summary>

تحبس Locks وتُضخم MVCC. اجعلها قصيرة. **لا تفعل أبدًا** HTTP Calls أو Dispatch Jobs داخل Transaction مفتوحة.

</details>

---

#### ❓ Savepoints & nested transactions

<sub>**AR:** Savepoints والـ Nested Transactions</sub>

**Answer (EN):**

Most engines don't truly nest. Laravel's `DB::transaction` uses savepoints for nesting. Inner failure rolls back to its savepoint.

<details><summary>الإجابة بالعربي</summary>

معظم Engines لا تدعم Nesting حقيقي. Laravel `DB::transaction` تستخدم Savepoints. فشل الـ Inner يُرجع للـ Savepoint.

</details>

---

### 💎 ACID Properties

**Slug:** `db-acid` · **AR:** خصائص ACID

> Atomicity, Consistency, Isolation, Durability — and BASE  
> *الخصائص الأربع — مع BASE و CAP*

#### ❓ Explain ACID — senior answer

<sub>**AR:** اشرح ACID — إجابة Senior</sub>

**Answer (EN):**

**A — Atomicity:** all-or-nothing. **C — Consistency:** constraints and invariants hold before and after. **I — Isolation:** concurrent txns appear serial. **D — Durability:** committed data survives crashes (WAL + fsync).

In production payments, ACID guarantees money is never deducted without being credited — even during failures.

<details><summary>الإجابة بالعربي</summary>

**A — Atomicity:** الكل أو لا شيء. **C — Consistency:** القيود تبقى صحيحة قبل وبعد. **I — Isolation:** Transactions المتزامنة تظهر متتابعة. **D — Durability:** البيانات تبقى بعد الأعطال (WAL + fsync).

في أنظمة الدفع، ACID يضمن ألا يُخصم المال دون قَيد له — حتى أثناء الأعطال.

</details>

> ❌ **Don't say:** ACID means Atomicity Consistency Isolation Durability.
>
> ❌ **لا تقل:** ACID = Atomicity Consistency Isolation Durability.

> ✔️ **Senior tip:** Connect each property to a production scenario, e.g. "Durability is what saves the bank when the database crashes mid-transfer."
>
> ✔️ **نصيحة Senior:** اربط كل خاصية بسيناريو إنتاجي، مثلاً "Durability هي ما يُنقذ البنك إذا تعطلت DB في منتصف التحويل".

---

#### ❓ What is BASE?

<sub>**AR:** ما هو BASE؟</sub>

**Answer (EN):**

**B**asically **A**vailable, **S**oft state, **E**ventual consistency. Tradeoff in distributed NoSQL stores (DynamoDB, Cassandra). Often paired with CAP discussions.

<details><summary>الإجابة بالعربي</summary>

**B**asically **A**vailable و **S**oft state و **E**ventual consistency. Tradeoff في NoSQL الموزعة (DynamoDB, Cassandra). كثيرًا ما يُذكر مع CAP.

</details>

---

#### ❓ CAP theorem

<sub>**AR:** نظرية CAP</sub>

**Answer (EN):**

Under network partitions, choose between Consistency and Availability. RDBMS are typically CP; many NoSQL are AP.

<details><summary>الإجابة بالعربي</summary>

تحت Network Partition، اختر بين Consistency و Availability. RDBMS غالبًا CP؛ كثير من NoSQL AP.

</details>

---

### 🔒 Isolation Levels

**Slug:** `db-isolation` · **AR:** مستويات العزل

> Read Uncommitted, Read Committed, Repeatable Read, Serializable  
> *المستويات الأربعة و SSI*

#### ❓ The four isolation levels

<sub>**AR:** مستويات العزل الأربعة</sub>

<table><tr><th>Level</th><th>Dirty Read</th><th>Non-repeatable</th><th>Phantom</th> <tr><tr><td>Read Uncommitted</td><td>✓</td><td>✓</td><td>✓</td> <tr><tr><td>Read Committed</td><td>✗</td><td>✓</td><td>✓</td> <tr><tr><td>Repeatable Read</td><td>✗</td><td>✗</td><td>✓ (✗ in MySQL via gap locks)</td> <tr><tr><td>Serializable</td><td>✗</td><td>✗</td><td>✗</td> <tr> <table>

<details><summary>تفاصيل بالعربي</summary>

<table><tr><th>المستوى</th><th>Dirty Read</th><th>Non-repeatable</th><th>Phantom</th> <tr><tr><td>Read Uncommitted</td><td>✓</td><td>✓</td><td>✓</td> <tr><tr><td>Read Committed</td><td>✗</td><td>✓</td><td>✓</td> <tr><tr><td>Repeatable Read</td><td>✗</td><td>✗</td><td>✓ (✗ في MySQL بـ Gap Locks)</td> <tr><tr><td>Serializable</td><td>✗</td><td>✗</td><td>✗</td> <tr> <table>

</details>

---

#### ❓ Defaults

<sub>**AR:** الافتراضيات</sub>

**Answer (EN):**

PostgreSQL → **Read Committed**. MySQL InnoDB → **Repeatable Read**.

<details><summary>الإجابة بالعربي</summary>

PostgreSQL → **Read Committed**. MySQL InnoDB → **Repeatable Read**.

</details>

---

#### ❓ Serializable in Postgres

<sub>**AR:** Serializable في Postgres</sub>

**Answer (EN):**

Implemented via **SSI** (Serializable Snapshot Isolation). Detects conflicts and retries; no global lock.

<details><summary>الإجابة بالعربي</summary>

مُنفّذ عبر **SSI** (Serializable Snapshot Isolation). يكتشف التعارضات ويُعيد المحاولة؛ بدون Global Lock.

</details>

---

### 🌀 MVCC

**Slug:** `db-mvcc` · **AR:** MVCC

> Multi-Version Concurrency Control  
> *التحكم بالتزامن متعدد النسخ*

#### ❓ What is MVCC?

<sub>**AR:** ما هو MVCC؟</sub>

**Answer (EN):**

Multi-Version Concurrency Control: writers don't block readers because each transaction sees a snapshot. Each row has visibility metadata (`xmin`/`xmax` in Postgres).

<details><summary>الإجابة بالعربي</summary>

Multi-Version Concurrency Control: Writers لا يحبسون Readers لأن كل Transaction ترى Snapshot. كل صف له metadata رؤية (`xmin`/`xmax` في Postgres).

</details>

---

#### ❓ Cost of MVCC

<sub>**AR:** تكلفة MVCC</sub>

**Answer (EN):**

Dead row versions accumulate until vacuumed (Postgres) or purged (InnoDB undo logs grow with long transactions).

<details><summary>الإجابة بالعربي</summary>

نسخ الصفوف الميتة تتراكم حتى يتم Vacuum (Postgres) أو Purge (InnoDB Undo Logs تكبر مع Transactions الطويلة).

</details>

---

### 🔐 Locks

**Slug:** `db-locks` · **AR:** الـ Locks

> Row vs table, shared vs exclusive, advisory  
> *أنواع الـ Locks و SELECT FOR UPDATE*

#### ❓ Row vs table; shared vs exclusive

<sub>**AR:** Row vs Table؛ Shared vs Exclusive</sub>

**Answer (EN):**

**Shared (S):** multiple readers OK. **Exclusive (X):** one writer. InnoDB uses row-level locks via the clustered index.

<details><summary>الإجابة بالعربي</summary>

**Shared (S):** Readers متعددون. **Exclusive (X):** Writer واحد. InnoDB يستخدم Row Locks عبر Clustered Index.

</details>

---

#### ❓ SELECT ... FOR UPDATE

<sub>**AR:** SELECT ... FOR UPDATE</sub>

**Answer (EN):**

Acquires a row exclusive lock. Use for "read-then-update" patterns.

<details><summary>الإجابة بالعربي</summary>

يحصل على Row Exclusive Lock. استخدمه لنمط "اقرأ ثم حدّث".

</details>

```php
BEGIN;
SELECT * FROM wallets WHERE id = 1 FOR UPDATE;
-- safely compute new balance
UPDATE wallets SET balance = ? WHERE id = 1;
COMMIT;
```

---

#### ❓ Advisory locks

<sub>**AR:** Advisory Locks</sub>

**Answer (EN):**

Application-defined locks (Postgres `pg_advisory_lock`). Useful for cron-style "only one worker runs this".

<details><summary>الإجابة بالعربي</summary>

Locks يُعرّفها التطبيق (`pg_advisory_lock`). مفيدة لـ Cron "Worker واحد فقط ينفذ".

</details>

---

#### ❓ Optimistic vs pessimistic locking

<sub>**AR:** Optimistic vs Pessimistic Locking</sub>

**Answer (EN):**

**Pessimistic:** lock the row. **Optimistic:** version column; UPDATE with `WHERE version = ?`; retry on mismatch. Optimistic wins under low contention.

<details><summary>الإجابة بالعربي</summary>

**Pessimistic:** اقفل الصف. **Optimistic:** عمود Version؛ UPDATE مع `WHERE version = ?` وأعِد المحاولة. Optimistic أفضل عند Contention منخفض.

</details>

---

### ☠️ Deadlocks

**Slug:** `db-deadlocks` · **AR:** Deadlocks

> Detection, avoidance, retry strategies  
> *الاكتشاف والتجنب وإعادة المحاولة*

#### ❓ What is a deadlock?

<sub>**AR:** ما هو Deadlock؟</sub>

**Answer (EN):**

Two transactions each hold a lock the other needs. The engine kills one (the victim) and you retry.

<details><summary>الإجابة بالعربي</summary>

كل Transaction تحبس قفلًا تحتاجه الأخرى. الـ Engine يقتل واحدة (الضحية) وأنت تُعيد المحاولة.

</details>

---

#### ❓ How to avoid

<sub>**AR:** كيف تتجنب</sub>

**Answer (EN):**

- Always lock rows in the **same order** across code paths
- Keep transactions short
- Use the smallest scope possible (row, not table)
- Retry deadlock victims (40001/1213) with backoff

<details><summary>الإجابة بالعربي</summary>

- اقفل الصفوف بنفس **الترتيب** في كل مكان
- اجعل Transactions قصيرة
- استخدم أصغر Scope (صف لا جدول)
- أعِد محاولة Deadlocks (40001/1213) مع Backoff

</details>

---

### 📑 Indexes

**Slug:** `db-indexes` · **AR:** الفهارس

> B-Tree, GIN, GiST, BRIN, composite, partial  
> *أنواع الفهارس والـ Composite و Partial*

#### ❓ B-Tree (the default)

<sub>**AR:** B-Tree (الافتراضي)</sub>

**Answer (EN):**

Balanced tree, supports equality and range. The bread and butter index.

<details><summary>الإجابة بالعربي</summary>

شجرة متوازنة، تدعم Equality و Range. الفهرس الأساسي.

</details>

---

#### ❓ Hash, GIN, GiST, BRIN (Postgres)

<sub>**AR:** Hash و GIN و GiST و BRIN</sub>

**Answer (EN):**

- **Hash:** equality only
- **GIN:** inverted index — JSONB, arrays, full-text
- **GiST:** geometric/range types
- **BRIN:** very small index for naturally ordered huge tables (time-series)

<details><summary>الإجابة بالعربي</summary>

- **Hash:** Equality فقط
- **GIN:** Inverted Index — JSONB و Arrays و Full-text
- **GiST:** أنواع هندسية/Range
- **BRIN:** فهرس صغير جدًا لجداول ضخمة مرتبة طبيعيًا (Time-series)

</details>

---

#### ❓ Composite index column order

<sub>**AR:** ترتيب أعمدة الـ Composite Index</sub>

**Answer (EN):**

Leftmost prefix rule. `(a,b,c)` serves `(a)`, `(a,b)`, `(a,b,c)` — not `(b)` alone.

<details><summary>الإجابة بالعربي</summary>

قاعدة Leftmost Prefix. `(a,b,c)` يخدم `(a)` و `(a,b)` و `(a,b,c)` — لا `(b)` وحده.

</details>

---

#### ❓ Covering indexes

<sub>**AR:** Covering Indexes</sub>

**Answer (EN):**

Include all columns needed by a query so the index alone answers it.

<details><summary>الإجابة بالعربي</summary>

يحتوي على كل أعمدة Query حتى يُجيب عليها الفهرس وحده.

</details>

---

#### ❓ Partial & expression indexes (Postgres)

<sub>**AR:** Partial و Expression Indexes</sub>

**Answer (EN):**

Index only matching rows or computed values.

<details><summary>الإجابة بالعربي</summary>

يفهرس فقط الصفوف المطابقة أو القيم المحسوبة.

</details>

```php
CREATE INDEX ON orders(user_id) WHERE status = 'pending';
CREATE INDEX ON users (LOWER(email));
```

---

#### ❓ Common index mistakes

<sub>**AR:** أخطاء الفهارس الشائعة</sub>

**Answer (EN):**

- Indexing low-cardinality columns (booleans alone — useless)
- Functions wrapping the column (`WHERE LOWER(x)=...` kills the index)
- Too many indexes — every write pays

<details><summary>الإجابة بالعربي</summary>

- فهرسة أعمدة Low Cardinality (Booleans وحدها — بلا فائدة)
- Functions تغلف العمود (`WHERE LOWER(x)=...` يقتل الفهرس)
- فهارس كثيرة — كل Write يدفع الثمن

</details>

---

### 🔍 EXPLAIN ANALYZE

**Slug:** `db-explain` · **AR:** EXPLAIN ANALYZE

> Reading query plans, BUFFERS, fixing slow queries  
> *قراءة الـ Plan وإصلاح الـ Queries البطيئة*

#### ❓ What does EXPLAIN show?

<sub>**AR:** ماذا يُظهر EXPLAIN؟</sub>

**Answer (EN):**

The planner's plan: scan types (seq, index, bitmap), join methods (nested loop, hash, merge), estimated and actual rows, cost, time.

<details><summary>الإجابة بالعربي</summary>

خطة المُخطّط: أنواع المسح (Seq, Index, Bitmap)، طرق Join (Nested Loop, Hash, Merge)، الصفوف المتوقعة والفعلية، التكلفة، الوقت.

</details>

---

#### ❓ Reading it

<sub>**AR:** قراءة الـ Plan</sub>

**Answer (EN):**

- **Seq Scan** on large tables → missing index
- **Big diff** between estimated and actual rows → `ANALYZE`, fix stats
- **Nested Loop** on huge inputs → consider hash join
- **Sort/Spill to disk** → bump `work_mem` or add an index supporting the sort

<details><summary>الإجابة بالعربي</summary>

- **Seq Scan** على جداول كبيرة → فهرس مفقود
- **فرق كبير** بين Estimated و Actual rows → نفّذ `ANALYZE`
- **Nested Loop** على Inputs ضخمة → فكر في Hash Join
- **Sort/Spill to disk** → ارفع `work_mem` أو أضف فهرسًا للترتيب

</details>

---

#### ❓ EXPLAIN (ANALYZE, BUFFERS)

<sub>**AR:** EXPLAIN (ANALYZE, BUFFERS)</sub>

**Answer (EN):**

Adds buffer hits/reads — reveals cache effectiveness. Use BUFFERS in real diagnostics.

<details><summary>الإجابة بالعربي</summary>

يُظهر Buffer Hits/Reads — يكشف فعالية الـ Cache. استخدم BUFFERS في التشخيص الحقيقي.

</details>

---

### ⚡ Query Optimization

**Slug:** `db-query-opt` · **AR:** تحسين الاستعلامات

> Sargable predicates, keyset pagination, batching  
> *Predicates قابلة للفهرسة و Keyset Pagination*

#### ❓ Senior optimization checklist

<sub>**AR:** قائمة Senior للتحسين</sub>

**Answer (EN):**

1. Reproduce with EXPLAIN ANALYZE BUFFERS
2. Confirm the right indexes — composite, partial, covering
3. Check selectivity; rewrite predicates so they are **sargable**
4. Cut `SELECT *` — fetch only needed columns
5. Avoid OR; use UNION ALL when each branch is selective
6. Use **LIMIT** with stable ordering for keyset pagination
7. Batch in chunks; avoid per-row updates from the app
8. Consider materialized views / summary tables for heavy reads

<details><summary>الإجابة بالعربي</summary>

1. أعِد إنتاج المشكلة مع EXPLAIN ANALYZE BUFFERS
2. تأكد من وجود الفهارس المناسبة
3. تحقق من Selectivity؛ اجعل Predicates قابلة للفهرسة (**Sargable**)
4. تخلص من `SELECT *`
5. تجنب OR؛ استخدم UNION ALL
6. استخدم **LIMIT** مع ترتيب ثابت لـ Keyset Pagination
7. اعمل Batch؛ تجنب التحديثات لكل صف
8. فكر في Materialized Views للقراءات الثقيلة

</details>

---

#### ❓ Keyset pagination vs OFFSET

<sub>**AR:** Keyset Pagination vs OFFSET</sub>

**Answer (EN):**

OFFSET scans and discards rows — O(N). Keyset (`WHERE id > ? ORDER BY id LIMIT 50`) is O(log N). Always prefer keyset for deep paging.

<details><summary>الإجابة بالعربي</summary>

OFFSET يمسح ويتجاهل الصفوف — O(N). Keyset (`WHERE id > ? ORDER BY id LIMIT 50`) هو O(log N). فضّله للـ Pagination العميق.

</details>

---

### 🔪 Partitioning

**Slug:** `db-partitioning` · **AR:** Partitioning

> Range, list, hash strategies  
> *استراتيجيات Range و List و Hash*

#### ❓ Why partition?

<sub>**AR:** لماذا Partitioning؟</sub>

**Answer (EN):**

Manage huge tables: faster vacuum, faster maintenance, partition pruning at query time, easy data retention (DROP old partitions).

<details><summary>الإجابة بالعربي</summary>

إدارة الجداول الضخمة: Vacuum أسرع، صيانة أسهل، Partition Pruning أثناء الـ Query، حذف بيانات قديمة بسهولة.

</details>

---

#### ❓ Strategies

<sub>**AR:** الاستراتيجيات</sub>

**Answer (EN):**

- **Range:** time-series (per month)
- **List:** by region/tenant
- **Hash:** even distribution

<details><summary>الإجابة بالعربي</summary>

- **Range:** Time-series (شهري)
- **List:** حسب Region/Tenant
- **Hash:** توزيع متساوٍ

</details>

---

#### ❓ Partitioning ≠ Sharding

<sub>**AR:** Partitioning ≠ Sharding</sub>

**Answer (EN):**

Partitioning is one DB, many tables. Sharding is many independent DBs.

<details><summary>الإجابة بالعربي</summary>

Partitioning = DB واحد بجداول كثيرة. Sharding = عدة DBs مستقلة.

</details>

---

### 🔁 Replication

**Slug:** `db-replication` · **AR:** Replication

> Sync vs async, logical vs physical  
> *متزامن وغير متزامن و Logical و Physical*

#### ❓ Sync vs async

<sub>**AR:** Sync vs Async</sub>

**Answer (EN):**

**Async:** primary doesn't wait — faster, risk losing recent writes if primary fails. **Sync:** primary waits for replica ack — safer, higher latency.

<details><summary>الإجابة بالعربي</summary>

**Async:** Primary لا ينتظر — أسرع، خطر فقدان آخر Writes إذا تعطل Primary. **Sync:** Primary ينتظر تأكيد Replica — أأمن لكن أبطأ.

</details>

---

#### ❓ Logical vs physical replication

<sub>**AR:** Logical vs Physical Replication</sub>

**Answer (EN):**

**Physical (streaming WAL):** byte-for-byte. **Logical:** per-table, allows different schemas; used for upgrades and CDC.

<details><summary>الإجابة بالعربي</summary>

**Physical (Streaming WAL):** Byte لـ Byte. **Logical:** لكل جدول، يسمح بمخططات مختلفة؛ يُستخدم للترقيات و CDC.

</details>

---

#### ❓ Read replicas in Laravel

<sub>**AR:** Read Replicas في Laravel</sub>

**Answer (EN):**

Laravel supports separate read/write connections. Beware **replication lag**: read-after-write may miss. Force write connection when needed.

<details><summary>الإجابة بالعربي</summary>

Laravel يدعم اتصالات Read/Write منفصلة. احذر من **Replication Lag**: Read-after-write قد يفشل. أجبر Write Connection عند الحاجة.

</details>

```php
'mysql' => [
  'read'  => ['host' => ['replica1','replica2']],
  'write' => ['host' => ['primary']],
],
```

---

### 🪓 Sharding

**Slug:** `db-sharding` · **AR:** Sharding

> Horizontal split, consistent hashing, tradeoffs  
> *التقسيم الأفقي و Consistent Hashing*

#### ❓ What is sharding?

<sub>**AR:** ما هو Sharding؟</sub>

**Answer (EN):**

Splitting data across independent DB instances by a shard key (user_id, tenant_id, geo). Each shard is a full DB. Read/write scales horizontally.

<details><summary>الإجابة بالعربي</summary>

تقسيم البيانات على DBs مستقلة بمفتاح Sharding (user_id, tenant_id, geo). كل Shard هو DB كامل. Read/Write يتسع أفقيًا.

</details>

---

#### ❓ Costs

<sub>**AR:** التكاليف</sub>

**Answer (EN):**

- Cross-shard joins are painful
- Cross-shard transactions need 2PC or sagas
- Rebalancing is hard — use **consistent hashing** or directory-based mapping
- Schema migrations multiply by shard count

<details><summary>الإجابة بالعربي</summary>

- Cross-shard joins مؤلمة
- Cross-shard transactions تحتاج 2PC أو Sagas
- Rebalancing صعب — استخدم **Consistent Hashing**
- Schema Migrations تتضاعف بعدد Shards

</details>

> ✔️ **Senior tip:** Don't shard until you must. Try vertical scaling, read replicas, partitioning, and caching first.
>
> ✔️ **نصيحة Senior:** لا تعمل Sharding إلا عند الضرورة. جرّب Vertical Scaling و Read Replicas و Partitioning و Caching أولاً.

---

## Part IV — Redis

<sub>الجزء الرابع — Redis</sub>

### 🟥 Redis Overview

**Slug:** `redis-overview` · **AR:** نظرة عامة على Redis

> In-memory store, why it's fast, data types  
> *مخزن في الذاكرة وأنواع البيانات*

#### ❓ What is Redis?

<sub>**AR:** ما هو Redis؟</sub>

**Answer (EN):**

In-memory data structure store. Single-threaded command execution, persistent options (RDB snapshots, AOF), replication, clustering, scripting (Lua), pub/sub, streams.

<details><summary>الإجابة بالعربي</summary>

مخزن هياكل بيانات في الذاكرة. تنفيذ Single-threaded للأوامر، خيارات Persistence (RDB Snapshots, AOF)، Replication، Clustering، Lua Scripting، Pub/Sub، Streams.

</details>

---

#### ❓ Why is Redis fast?

<sub>**AR:** لماذا Redis سريع؟</sub>

**Answer (EN):**

- In-memory
- Single-threaded command loop — no lock contention
- Efficient encodings (ziplist, listpack, intset)
- Optimized network model (epoll)

<details><summary>الإجابة بالعربي</summary>

- في الذاكرة
- Single-threaded Loop — لا Lock Contention
- تشفيرات فعّالة (ziplist, listpack, intset)
- نموذج شبكة محسّن (epoll)

</details>

---

#### ❓ Core data types

<sub>**AR:** أنواع البيانات الأساسية</sub>

**Answer (EN):**

Strings, Lists, Sets, Sorted Sets (ZSET — leaderboards!), Hashes, Streams (Kafka-lite), HyperLogLog (cardinality), Bitmaps, Geospatial.

<details><summary>الإجابة بالعربي</summary>

Strings و Lists و Sets و Sorted Sets (ZSET — Leaderboards!) و Hashes و Streams و HyperLogLog و Bitmaps و Geospatial.

</details>

---

### 💾 Persistence

**Slug:** `redis-persistence` · **AR:** Persistence

> RDB snapshots vs AOF log  
> *RDB Snapshots vs AOF Log*

#### ❓ Persistence options

<sub>**AR:** خيارات Persistence</sub>

**Answer (EN):**

**RDB:** periodic snapshots. **AOF:** log every write (fsync policies: always / everysec / no). Production often uses **both**. RDB is small/fast to load; AOF is durable.

<details><summary>الإجابة بالعربي</summary>

**RDB:** Snapshots دورية. **AOF:** Log لكل Write (fsync: always / everysec / no). Production يستخدم غالبًا **الاثنين**. RDB صغير وسريع التحميل؛ AOF أكثر Durable.

</details>

---

#### ❓ Eviction policies

<sub>**AR:** سياسات Eviction</sub>

**Answer (EN):**

`noeviction`, `allkeys-lru`, `volatile-lru`, `allkeys-lfu`, `volatile-lfu`, `allkeys-random`, `volatile-ttl`. For caches, **allkeys-lfu** often wins.

<details><summary>الإجابة بالعربي</summary>

`noeviction` و `allkeys-lru` و `volatile-lru` و `allkeys-lfu` و `volatile-lfu` و `allkeys-random` و `volatile-ttl`. للـ Caches، **allkeys-lfu** غالبًا الأفضل.

</details>

---

### 🌀 Caching Patterns

**Slug:** `redis-caching` · **AR:** أنماط Caching

> Stampede, invalidation, versioned keys  
> *Stampede و Invalidation و Versioned Keys*

#### ❓ Cache stampede / dog-pile

<sub>**AR:** Cache Stampede / Dog-pile</sub>

**Answer (EN):**

Key expires → many requests hit the DB simultaneously. Mitigations: distributed lock (`SET NX EX`) so only one rebuilds, TTL jitter, stale-while-revalidate, request coalescing.

<details><summary>الإجابة بالعربي</summary>

Key ينتهي → طلبات كثيرة تضرب DB في نفس الوقت. الحلول: Distributed Lock (`SET NX EX`) ليُعيد البناء واحد فقط، TTL Jitter، Stale-while-revalidate.

</details>

---

#### ❓ Cache invalidation strategies

<sub>**AR:** استراتيجيات Invalidation</sub>

**Answer (EN):**

- **TTL:** simple, eventually correct
- **Write-through / write-behind**
- **Event-driven invalidation** (publish on model events)
- **Versioned keys:** `user:123:v17` — bump version on update

<details><summary>الإجابة بالعربي</summary>

- **TTL:** بسيط
- **Write-through / Write-behind**
- **Event-driven** (نشر عند Model events)
- **Versioned Keys:** `user:123:v17` — ارفع النسخة عند التحديث

</details>

---

### 🌐 Cluster, Sentinel, Locks

**Slug:** `redis-cluster` · **AR:** Cluster و Sentinel و Locks

> High availability and distributed locks  
> *High Availability و Distributed Locks*

#### ❓ Redis Cluster vs Sentinel

<sub>**AR:** Redis Cluster vs Sentinel</sub>

**Answer (EN):**

**Sentinel:** HA + automatic failover, single shard. **Cluster:** sharded across nodes via 16384 hash slots, supports failover. Use Cluster when one node can't fit the data.

<details><summary>الإجابة بالعربي</summary>

**Sentinel:** HA + Failover تلقائي، Shard واحد. **Cluster:** مُقسّم على Nodes عبر 16384 Hash Slot، يدعم Failover. استخدم Cluster عندما لا تكفي Node واحدة.

</details>

---

#### ❓ When NOT to use Redis

<sub>**AR:** متى لا تستخدم Redis؟</sub>

**Answer (EN):**

- As source of truth for transactional data
- Complex queries / joins
- Datasets that don't fit in RAM (cost > value)

<details><summary>الإجابة بالعربي</summary>

- كمصدر حقيقة للبيانات المعاملاتية
- Queries معقدة أو Joins
- بيانات لا تتسع في RAM (التكلفة أكبر من الفائدة)

</details>

---

#### ❓ Distributed locks (Redlock)

<sub>**AR:** Distributed Locks (Redlock)</sub>

**Answer (EN):**

Redlock has known correctness debates. For single-region, simple `SET key val NX PX ttl` + fencing token covers most cases. Always design for the lock to expire safely.

<details><summary>الإجابة بالعربي</summary>

Redlock عليه نقاشات حول الدقة. لمنطقة واحدة، `SET key val NX PX ttl` + Fencing Token يكفي لمعظم الحالات. صمم دائمًا بحيث ينتهي القفل بأمان.

</details>

---

#### ❓ Pipelining vs Transactions vs Lua

<sub>**AR:** Pipelining vs Transactions vs Lua</sub>

**Answer (EN):**

**Pipeline:** batch, no atomicity. **MULTI/EXEC:** atomic batch. **Lua scripts:** atomic + conditional logic server-side (great for check-and-set).

<details><summary>الإجابة بالعربي</summary>

**Pipeline:** Batch بدون Atomicity. **MULTI/EXEC:** Batch ذرية. **Lua:** ذرية + منطق شرطي على Server (ممتازة لـ Check-and-set).

</details>

---

## Part V — Docker

<sub>الجزء الخامس — Docker</sub>

### 🐳 Docker Basics

**Slug:** `docker-basics` · **AR:** أساسيات Docker

> Containers, images, namespaces, cgroups  
> *Containers و Images و Namespaces*

#### ❓ What is a container?

<sub>**AR:** ما هو Container؟</sub>

**Answer (EN):**

A process tree isolated by Linux **namespaces** (pid, net, mnt, uts, ipc, user) and constrained by **cgroups** (CPU, memory, IO). Containers share the host kernel — they are **not VMs**.

<details><summary>الإجابة بالعربي</summary>

شجرة Processes معزولة عبر Linux **Namespaces** (pid, net, mnt, uts, ipc, user) ومُقيدة بـ **cgroups** (CPU, memory, IO). تشارك Kernel المضيف — ليست VMs.

</details>

---

#### ❓ Image vs Container

<sub>**AR:** Image vs Container</sub>

**Answer (EN):**

**Image:** immutable blueprint (layers). **Container:** running instance with a writable layer on top.

<details><summary>الإجابة بالعربي</summary>

**Image:** مخطط ثابت (طبقات). **Container:** Instance يعمل بطبقة قابلة للكتابة في الأعلى.

</details>

---

### 📄 Dockerfile Best Practices

**Slug:** `docker-dockerfile` · **AR:** أفضل ممارسات Dockerfile

> Multi-stage builds, layer caching, security  
> *Multi-stage و Layer Caching والأمان*

#### ❓ Best practices

<sub>**AR:** أفضل الممارسات</sub>

**Answer (EN):**

- **Multi-stage builds** — small final images
- Order layers from least → most changing for cache hits
- Use specific tags, not `:latest`
- Run as a non-root user
- One process per container
- Use `.dockerignore` to keep context small

<details><summary>الإجابة بالعربي</summary>

- **Multi-stage Builds** — Images نهائية صغيرة
- رتب الطبقات من الأقل تغيّرًا للأكثر للحصول على Cache
- استخدم Tags محددة، لا `:latest`
- شغل كـ User غير Root
- Process واحد لكل Container
- استخدم `.dockerignore`

</details>

---

#### ❓ Example PHP-FPM Dockerfile

<sub>**AR:** مثال Dockerfile لـ PHP-FPM</sub>

**Answer (EN):**

Multi-stage build with Composer:

<details><summary>الإجابة بالعربي</summary>

Multi-stage Build مع Composer:

</details>

```php
FROM composer:2 AS deps
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-interaction --prefer-dist

FROM php:8.3-fpm-alpine
RUN docker-php-ext-install pdo_pgsql opcache
WORKDIR /var/www
COPY --from=deps /app/vendor ./vendor
COPY . .
USER www-data
CMD ["php-fpm"]
```

---

### 🔧 Volumes, Networks, Production

**Slug:** `docker-prod` · **AR:** Volumes و Networks والإنتاج

> Storage, networking, production tips  
> *التخزين والشبكات ونصائح الإنتاج*

#### ❓ Volumes vs bind mounts

<sub>**AR:** Volumes vs Bind Mounts</sub>

**Answer (EN):**

**Volumes:** Docker-managed, portable, ideal for data. **Bind mounts:** map a host path — great for dev, risky in prod.

<details><summary>الإجابة بالعربي</summary>

**Volumes:** يديرها Docker، Portable، مثالية للبيانات. **Bind Mounts:** تربط مسار Host — جيدة للتطوير، خطرة في Production.

</details>

---

#### ❓ Docker networks

<sub>**AR:** شبكات Docker</sub>

**Answer (EN):**

`bridge` (default per host), `host` (no isolation), `overlay` (multi-host Swarm/K8s), `none`.

<details><summary>الإجابة بالعربي</summary>

`bridge` (افتراضي لكل Host)، `host` (بدون عزل)، `overlay` (Multi-host Swarm/K8s)، `none`.

</details>

---

#### ❓ Production tips

<sub>**AR:** نصائح الإنتاج</sub>

**Answer (EN):**

- Set resource limits — prevent noisy neighbors
- Health checks (HTTP / TCP)
- Read-only root filesystem; tmpfs for caches
- Scan images (Trivy, Grype)
- Sign & verify images (Sigstore / Cosign)

<details><summary>الإجابة بالعربي</summary>

- اضبط Resource Limits — لمنع Noisy Neighbors
- Health Checks (HTTP / TCP)
- Read-only Root Filesystem؛ tmpfs للـ Caches
- افحص Images (Trivy, Grype)
- وقّع وتحقق من Images (Sigstore / Cosign)

</details>

---

## Part VI — System Design

<sub>الجزء السادس — System Design</sub>

### 🔗 URL Shortener (TinyURL / Bitly)

**Slug:** `sd-url-shortener` · **AR:** URL Shortener

> Key generation, storage, redirect path  
> *توليد المفتاح والتخزين ومسار التوجيه*

#### ❓ Requirements

<sub>**AR:** المتطلبات</sub>

**Answer (EN):**

**Functional:** shorten URL, redirect, custom alias, analytics. **Non-functional:** ~100:1 read:write, very low redirect latency, 99.99% availability.

<details><summary>الإجابة بالعربي</summary>

**وظيفية:** تقصير URL، توجيه، Alias مخصص، تحليلات. **غير وظيفية:** 100:1 قراءة:كتابة، Latency منخفض جدًا، 99.99% Availability.

</details>

---

#### ❓ Capacity estimation

<sub>**AR:** تقدير السعة</sub>

**Answer (EN):**

500M new URLs / month → ~200 writes/sec. Reads ~20K/sec. 10-year storage: ~60B URLs. With ~500B/record → ~30TB.

<details><summary>الإجابة بالعربي</summary>

500 مليون URL جديد شهريًا → ~200 Write/ثانية. القراءات ~20K/ثانية. تخزين 10 سنوات: ~60B URL. مع ~500 بايت/سجل → ~30TB.

</details>

---

#### ❓ Key generation

<sub>**AR:** توليد المفتاح</sub>

**Answer (EN):**

- **Base62** of an auto-increment ID (predictable; avoid)
- **Pre-generated key pool** in a key-gen service (clean, scalable)
- **Hash + collision retry** (MD5/SHA-1 truncated)

<details><summary>الإجابة بالعربي</summary>

- **Base62** لـ Auto-increment ID (متوقّع؛ تجنبه)
- **Pre-generated Key Pool** في Key-gen Service (نظيف وقابل للتوسع)
- **Hash + Collision Retry** (MD5/SHA-1 مقصوصة)

</details>

---

#### ❓ Storage & redirect path

<sub>**AR:** التخزين ومسار التوجيه</sub>

**Answer (EN):**

Key-value friendly: DynamoDB / Cassandra. Or partitioned Postgres by key prefix. Redirect path: CDN edge → cache (Redis) → DB. Use 301 (cacheable) for stable mappings, 302 for fresh analytics.

<details><summary>الإجابة بالعربي</summary>

Key-value مناسب: DynamoDB / Cassandra. أو Postgres مُقسّم. مسار التوجيه: CDN Edge → Cache (Redis) → DB. استخدم 301 (Cacheable) للروابط الثابتة، و 302 للتحليلات الحية.

</details>

---

### 🛒 Amazon (E-commerce)

**Slug:** `sd-amazon` · **AR:** Amazon

> Catalog, search, inventory, orders, saga  
> *الكتالوج والبحث والمخزون و Saga*

#### ❓ Core services

<sub>**AR:** الخدمات الأساسية</sub>

**Answer (EN):**

Catalog, Search, Cart, Pricing, Inventory, Orders, Payments, Shipping, Reviews, Recommendations, Notifications, Identity.

<details><summary>الإجابة بالعربي</summary>

الكتالوج، البحث، السلة، التسعير، المخزون، الطلبات، الدفع، الشحن، التقييمات، التوصيات، الإشعارات، الهوية.

</details>

---

#### ❓ Catalog & Search

<sub>**AR:** الكتالوج والبحث</sub>

**Answer (EN):**

Catalog → Postgres / DynamoDB. Search → **Elasticsearch / OpenSearch**. Catalog change events sync to the search index via CDC.

<details><summary>الإجابة بالعربي</summary>

الكتالوج → Postgres / DynamoDB. البحث → **Elasticsearch / OpenSearch**. تغييرات الكتالوج تتزامن مع فهرس البحث عبر CDC.

</details>

---

#### ❓ Inventory consistency

<sub>**AR:** اتساق المخزون</sub>

**Answer (EN):**

Hot-spot risk on popular SKUs. Reserve stock at "add to cart" with TTL, or commit at order placement using SELECT FOR UPDATE / optimistic version columns. Watch for oversells under partition.

<details><summary>الإجابة بالعربي</summary>

خطر Hot-spot على SKUs الشهيرة. احجز المخزون عند "إضافة للسلة" مع TTL، أو احفظ عند الطلب باستخدام SELECT FOR UPDATE. احذر Oversells تحت Partition.

</details>

---

#### ❓ Order placement = Saga

<sub>**AR:** إنشاء الطلب = Saga</sub>

**Answer (EN):**

Distributed transaction across cart, inventory, payment, shipping. Use an orchestrator saga with compensating actions.

<details><summary>الإجابة بالعربي</summary>

Transaction موزعة عبر السلة والمخزون والدفع والشحن. استخدم Orchestrator Saga مع Compensating Actions.

</details>

---

### 💬 WhatsApp

**Slug:** `sd-whatsapp` · **AR:** WhatsApp

> WebSocket, message flow, E2E encryption  
> *WebSocket وتدفق الرسائل والتشفير*

#### ❓ Core problem

<sub>**AR:** المشكلة الأساسية</sub>

**Answer (EN):**

Billions of users, billions of messages/day, real-time delivery, group chats, end-to-end encryption, offline delivery.

<details><summary>الإجابة بالعربي</summary>

مليارات المستخدمين، مليارات الرسائل يوميًا، توصيل لحظي، Group Chats، تشفير End-to-End، توصيل Offline.

</details>

---

#### ❓ Connection model

<sub>**AR:** نموذج الاتصال</sub>

**Answer (EN):**

Persistent connections via **WebSocket** / XMPP-like protocol. Connection managers (stateful) keep socket → user mapping. Sticky routing.

<details><summary>الإجابة بالعربي</summary>

اتصالات مستمرة عبر **WebSocket** / بروتوكول شبيه بـ XMPP. Connection Managers تحتفظ بربط Socket → User. Sticky Routing.

</details>

---

#### ❓ Message flow

<sub>**AR:** تدفق الرسائل</sub>

**Answer (EN):**

Sender → connection node → queue → receiver's connection node (if online) → device. If offline, store in inbox; deliver on reconnect; clear after ack.

<details><summary>الإجابة بالعربي</summary>

المرسل → Connection Node → Queue → Connection Node للمستقبل (إن كان Online) → الجهاز. إن كان Offline، خزّن في Inbox؛ سلّم عند إعادة الاتصال؛ امسح بعد ACK.

</details>

---

#### ❓ E2E encryption

<sub>**AR:** تشفير E2E</sub>

**Answer (EN):**

Signal Protocol (Double Ratchet). Server never holds plaintext or keys.

<details><summary>الإجابة بالعربي</summary>

بروتوكول Signal (Double Ratchet). Server لا يحمل أبدًا النص الخام أو المفاتيح.

</details>

---

### 🚗 Uber

**Slug:** `sd-uber` · **AR:** Uber

> Geo-index, dispatch, surge pricing  
> *الفهارس الجغرافية و Dispatch و Surge*

#### ❓ Core problem

<sub>**AR:** المشكلة الأساسية</sub>

**Answer (EN):**

Match riders to nearby drivers in real time, with ETAs, surge pricing, payments, and trip tracking.

<details><summary>الإجابة بالعربي</summary>

مطابقة الركاب مع سائقين قريبين في الوقت الفعلي مع ETAs و Surge Pricing والدفع وتتبع الرحلة.

</details>

---

#### ❓ Geo-index

<sub>**AR:** Geo Index</sub>

**Answer (EN):**

Drivers stream location every few seconds. Server indexes by **geohash / S2 cells / H3 hexagons**. Spatial query: "drivers in cell + neighbors".

<details><summary>الإجابة بالعربي</summary>

السائقون يبثون موقعهم كل ثوانٍ. Server يفهرسهم عبر **geohash / S2 / H3**. استعلام مكاني: "سائقون في خلية + جيرانها".

</details>

---

#### ❓ Dispatch

<sub>**AR:** Dispatch</sub>

**Answer (EN):**

Stream platform (Kafka) + matching service that holds in-memory state per region (DISCO at Uber). Match → notify driver → confirm → trip created.

<details><summary>الإجابة بالعربي</summary>

Stream Platform (Kafka) + Matching Service مع State في الذاكرة لكل منطقة (DISCO عند Uber). Match → إشعار للسائق → تأكيد → إنشاء الرحلة.

</details>

---

#### ❓ Surge pricing & payments

<sub>**AR:** Surge Pricing والدفع</sub>

**Answer (EN):**

Real-time demand/supply ratio per cell. Async ledger updates with idempotency keys; eventual consistency to user-facing receipt.

<details><summary>الإجابة بالعربي</summary>

نسبة Demand/Supply لحظية لكل خلية. تحديثات Ledger غير متزامنة مع Idempotency Keys؛ Eventual Consistency للإيصال.

</details>

---

### 🏨 Booking (Hotels / Flights)

**Slug:** `sd-booking` · **AR:** Booking

> Search, inventory locking, supplier APIs  
> *البحث وقفل المخزون و APIs الموردين*

#### ❓ Core problem

<sub>**AR:** المشكلة الأساسية</sub>

**Answer (EN):**

Search inventory, hold seats/rooms, prevent double-booking, support cancellations and refunds.

<details><summary>الإجابة بالعربي</summary>

البحث في المخزون، حجز المقاعد/الغرف، منع Double-booking، دعم الإلغاءات والاستردادات.

</details>

---

#### ❓ Inventory locking

<sub>**AR:** قفل المخزون</sub>

**Answer (EN):**

Short-lived holds (5–10 min) — atomic decrement (Redis Lua) or DB row lock. Expire automatically if the user doesn't pay.

<details><summary>الإجابة بالعربي</summary>

حجوزات قصيرة المدى (5-10 دقائق) — Atomic Decrement (Redis Lua) أو DB Row Lock. تنتهي تلقائيًا إن لم يدفع المستخدم.

</details>

---

#### ❓ Supplier integration

<sub>**AR:** دمج الموردين</sub>

**Answer (EN):**

Hexagonal architecture; adapter per supplier. Use sagas for partner failures.

<details><summary>الإجابة بالعربي</summary>

Hexagonal Architecture؛ Adapter لكل مورد. استخدم Sagas لفشل الشركاء.

</details>

---

### 📨 Notification Service

**Slug:** `sd-notification` · **AR:** Notification Service

> Email, SMS, push at scale  
> *بريد و SMS و Push على نطاق واسع*

#### ❓ Goal

<sub>**AR:** الهدف</sub>

**Answer (EN):**

Deliver emails, SMS, push, in-app to billions of users with retry, rate limits, dedupe, scheduling, and per-user preferences.

<details><summary>الإجابة بالعربي</summary>

توصيل بريد و SMS و Push و In-app لمليارات المستخدمين مع Retry و Rate Limits و Dedupe و Scheduling وتفضيلات لكل مستخدم.

</details>

---

#### ❓ Architecture

<sub>**AR:** البنية</sub>

**Answer (EN):**

Producers → Notification API → Queue (Kafka/SQS) → Channel Workers (Email/SMS/Push) → Provider (SES, Twilio, FCM). Retry & DLQ per channel.

<details><summary>الإجابة بالعربي</summary>

Producers → Notification API → Queue (Kafka/SQS) → Channel Workers → Provider (SES, Twilio, FCM). Retry + DLQ لكل قناة.

</details>

---

#### ❓ Idempotency & dedupe

<sub>**AR:** Idempotency و Dedupe</sub>

**Answer (EN):**

Each notification has an idempotency key. Dedupe table or Redis SET with TTL prevents duplicates from producer retries.

<details><summary>الإجابة بالعربي</summary>

كل Notification له Idempotency Key. جدول Dedupe أو Redis SET مع TTL يمنع التكرار من إعادة محاولة المنتج.

</details>

---

#### ❓ Rate limits

<sub>**AR:** Rate Limits</sub>

**Answer (EN):**

Per provider, per recipient, per channel. Token bucket implemented in Redis.

<details><summary>الإجابة بالعربي</summary>

لكل Provider ولكل مستلم ولكل قناة. Token Bucket في Redis.

</details>

---

### 💳 Payment Gateway

**Slug:** `sd-payment` · **AR:** Payment Gateway

> Idempotency, ledger, reconciliation  
> *Idempotency والـ Ledger والمطابقة*

#### ❓ Hard requirements

<sub>**AR:** المتطلبات الصارمة</sub>

**Answer (EN):**

Strong consistency. **No double charges.** PCI scope minimization. Audit trail. High availability. Idempotency end-to-end.

<details><summary>الإجابة بالعربي</summary>

اتساق قوي. **لا Double Charges.** تقليل نطاق PCI. Audit Trail. توفر عالٍ. Idempotency من البداية للنهاية.

</details>

---

#### ❓ Core flow

<sub>**AR:** التدفق الأساسي</sub>

**Answer (EN):**

Tokenize card → Authorize → Capture → Settle. Webhook receivers + reconciliation jobs vs the processor.

<details><summary>الإجابة بالعربي</summary>

Tokenize → Authorize → Capture → Settle. مستقبلو Webhooks + Jobs المطابقة مع المعالج.

</details>

---

#### ❓ Idempotency-Key

<sub>**AR:** Idempotency-Key</sub>

**Answer (EN):**

Every mutating endpoint accepts an Idempotency-Key. Server stores (key, response); replays return the same response.

<details><summary>الإجابة بالعربي</summary>

كل Endpoint مُعدِّل يقبل Idempotency-Key. Server يخزن (key, response)؛ التكرار يُرجع نفس الرد.

</details>

---

#### ❓ Ledger

<sub>**AR:** Ledger</sub>

**Answer (EN):**

Double-entry, append-only. Don't update balances in place — derive from journal. Run reconciliation against the processor daily.

<details><summary>الإجابة بالعربي</summary>

Double-entry وأنه Append-only. لا تُحدّث الأرصدة مباشرة — اشتقها من Journal. شغل المطابقة مع المعالج يوميًا.

</details>

---

#### ❓ Webhook delivery

<sub>**AR:** توصيل Webhooks</sub>

**Answer (EN):**

Signed payloads (HMAC), retries with backoff, at-least-once delivery → consumers must be idempotent.

<details><summary>الإجابة بالعربي</summary>

Payloads موقعة (HMAC)، Retries مع Backoff، توصيل At-least-once → المستهلكون يجب أن يكونوا Idempotent.

</details>

---

### 💭 Chat Application

**Slug:** `sd-chat` · **AR:** تطبيق محادثة

> Fan-out, ordering, read receipts  
> *Fan-out والترتيب وإيصالات القراءة*

#### ❓ Components

<sub>**AR:** المكونات</sub>

**Answer (EN):**

Auth, presence, connection manager (WebSocket), message service, fan-out service (groups), history store, push for offline, media service.

<details><summary>الإجابة بالعربي</summary>

Auth و Presence و Connection Manager (WebSocket) و Message Service و Fan-out Service (مجموعات) و History Store و Push للـ Offline و Media Service.

</details>

---

#### ❓ Fan-out

<sub>**AR:** Fan-out</sub>

**Answer (EN):**

**Fan-out on write:** push to each recipient's inbox. **Fan-out on read:** pull from a shared timeline. Chats use fan-out on write.

<details><summary>الإجابة بالعربي</summary>

**Fan-out on Write:** ادفع لـ Inbox كل مستلم. **Fan-out on Read:** اسحب من Timeline مشترك. المحادثات تستخدم Fan-out on Write.

</details>

---

#### ❓ Ordering & dedupe

<sub>**AR:** الترتيب والـ Dedupe</sub>

**Answer (EN):**

Monotonic message IDs per conversation (snowflake). Client dedupes by ID.

<details><summary>الإجابة بالعربي</summary>

IDs رسائل متزايدة لكل محادثة (Snowflake). العميل يزيل التكرار بالـ ID.

</details>

---

#### ❓ Read receipts & typing

<sub>**AR:** إيصالات القراءة والكتابة</sub>

**Answer (EN):**

Lightweight events on a separate topic; not durable.

<details><summary>الإجابة بالعربي</summary>

Events خفيفة على Topic منفصل؛ ليست Durable.

</details>

---

## Part VII — Architecture

<sub>الجزء السابع — البنية</sub>

### 🗃 Repository Pattern

**Slug:** `arch-repository` · **AR:** Repository Pattern

> Abstract data access  
> *تجريد الوصول للبيانات*

#### ❓ Definition

<sub>**AR:** التعريف</sub>

**Answer (EN):**

An abstraction over persistence. Code talks to `UserRepository` instead of Eloquent directly.

<details><summary>الإجابة بالعربي</summary>

تجريد فوق Persistence. الكود يتحدث مع `UserRepository` بدلاً من Eloquent مباشرة.

</details>

---

#### ❓ When to use in Laravel

<sub>**AR:** متى تستخدمه في Laravel؟</sub>

**Answer (EN):**

When you genuinely need to swap data sources (multi-DB, legacy migration) or want to test services without touching the ORM. Otherwise Eloquent already plays this role.

<details><summary>الإجابة بالعربي</summary>

عندما تحتاج فعلاً لتبديل مصدر البيانات (Multi-DB، ترحيل Legacy) أو الاختبار بدون ORM. غير ذلك Eloquent يقوم بهذا الدور.

</details>

---

### ⚙️ Service Pattern

**Slug:** `arch-service` · **AR:** Service Pattern

> Business logic orchestration  
> *تنسيق منطق العمل*

#### ❓ What is it?

<sub>**AR:** ما هو؟</sub>

**Answer (EN):**

A class that contains **business logic** — orchestrates models, repositories, external services. Keeps controllers thin and models persistence-only.

<details><summary>الإجابة بالعربي</summary>

Class يحتوي على **منطق العمل** — يُنسّق بين Models و Repositories والخدمات الخارجية. يجعل Controllers رفيعة والـ Models للحفظ فقط.

</details>

---

#### ❓ Anti-pattern: "service" graveyard

<sub>**AR:** النمط السيء: مقبرة Services</sub>

**Answer (EN):**

Don't dump every helper into `App\Services`. Group by domain (`App\Billing\…`, `App\Catalog\…`). Use actions/use-cases for single-purpose flows.

<details><summary>الإجابة بالعربي</summary>

لا ترمِ كل Helper في `App\Services`. جمّع حسب Domain (`App\Billing\…`, `App\Catalog\…`). استخدم Actions/Use-cases للتدفقات أحادية الغرض.

</details>

---

### 🏭 Factory Pattern

**Slug:** `arch-factory` · **AR:** Factory Pattern

> Encapsulate object creation  
> *تغليف إنشاء الكائنات*

#### ❓ Definition

<sub>**AR:** التعريف</sub>

**Answer (EN):**

Encapsulates the choice of class to instantiate. Hides constructor complexity. Great with the Service Container.

<details><summary>الإجابة بالعربي</summary>

يُغلّف اختيار Class للإنشاء. يُخفي تعقيد Constructor. مفيد مع Service Container.

</details>

```php
class PaymentGatewayFactory {
    public function make(string $type): PaymentGateway {
        return match ($type) {
            'stripe' => app(StripeGateway::class),
            'paypal' => app(PaypalGateway::class),
        };
    }
}
```

---

### 🎯 Strategy Pattern

**Slug:** `arch-strategy` · **AR:** Strategy Pattern

> Interchangeable algorithms  
> *خوارزميات قابلة للتبديل*

#### ❓ Definition

<sub>**AR:** التعريف</sub>

**Answer (EN):**

Define a family of algorithms behind a common interface; swap at runtime. Replaces sprawling `if/else` blocks.

<details><summary>الإجابة بالعربي</summary>

عرّف عائلة خوارزميات خلف Interface مشتركة؛ بدّلها وقت التشغيل. يُلغي كتل `if/else` الكثيرة.

</details>

```php
interface ShippingStrategy {
    public function cost(Order $o): int;
}
class Standard implements ShippingStrategy { /* ... */ }
class Express  implements ShippingStrategy { /* ... */ }
```

---

### 👀 Observer Pattern

**Slug:** `arch-observer` · **AR:** Observer Pattern

> One-to-many notifications  
> *إعلام One-to-Many*

#### ❓ Definition

<sub>**AR:** التعريف</sub>

**Answer (EN):**

One-to-many: when subject changes, listeners react. Laravel's Events system + Eloquent observers are direct implementations.

<details><summary>الإجابة بالعربي</summary>

One-to-many: عندما يتغير Subject، يتفاعل Listeners. Laravel Events + Eloquent Observers تطبيقات مباشرة.

</details>

---

### 🎁 Decorator Pattern

**Slug:** `arch-decorator` · **AR:** Decorator Pattern

> Wrap to add behavior  
> *تغليف لإضافة سلوك*

#### ❓ Definition

<sub>**AR:** التعريف</sub>

**Answer (EN):**

Wrap an object to add behavior without modifying it. Laravel middleware pipeline is decorator-style. Useful for caching layers (`CachedUserRepository` wraps `UserRepository`).

<details><summary>الإجابة بالعربي</summary>

غلّف كائنًا لإضافة سلوك دون تعديله. Laravel Middleware Pipeline مثال. مفيد لـ Caching (`CachedUserRepository` يغلف `UserRepository`).

</details>

---

### 🔌 Adapter Pattern

**Slug:** `arch-adapter` · **AR:** Adapter Pattern

> Make incompatible interfaces work together  
> *جعل واجهتين غير متوافقتين تعملان*

#### ❓ Definition

<sub>**AR:** التعريف</sub>

**Answer (EN):**

Make two incompatible interfaces work together. Wrap a third-party SDK behind a clean app-defined contract so it can be swapped or mocked.

<details><summary>الإجابة بالعربي</summary>

اجعل واجهتين غير متوافقتين تعملان معًا. غلّف SDK خارجي خلف عقد نظيف يُعرّفه التطبيق ليُمكن تبديله أو Mocking.

</details>

---

### 🔀 CQRS

**Slug:** `arch-cqrs` · **AR:** CQRS

> Command Query Responsibility Segregation  
> *فصل المسؤولية بين القراءة والكتابة*

#### ❓ Definition

<sub>**AR:** التعريف</sub>

**Answer (EN):**

Separate **commands** (writes) from **queries** (reads). Different models, possibly different stores. Reads can be denormalized/projected for performance.

<details><summary>الإجابة بالعربي</summary>

افصل **Commands** (كتابة) عن **Queries** (قراءة). Models مختلفة، وأحيانًا Stores مختلفة. القراءات يمكن أن تكون Denormalized للأداء.

</details>

---

#### ❓ When to use

<sub>**AR:** متى تستخدمه؟</sub>

**Answer (EN):**

Heavy read/write asymmetry, complex domain logic on writes, need for projection-driven views. Often paired with Event Sourcing.

<details><summary>الإجابة بالعربي</summary>

عدم تماثل قوي بين القراءة والكتابة، منطق Domain معقد للكتابة، الحاجة لـ Projections. غالبًا مع Event Sourcing.

</details>

---

#### ❓ Costs

<sub>**AR:** التكاليف</sub>

**Answer (EN):**

Eventual consistency between command and query side. Operational complexity. Don't apply CQRS to simple CRUD.

<details><summary>الإجابة بالعربي</summary>

Eventual Consistency بين جانب Command وجانب Query. تعقيد تشغيلي. لا تستخدم CQRS لـ CRUD بسيط.

</details>

---

### 🧭 Saga Pattern

**Slug:** `arch-saga` · **AR:** Saga Pattern

> Distributed transactions with compensation  
> *Transactions موزعة بدون 2PC*

#### ❓ Problem it solves

<sub>**AR:** المشكلة التي يحلها</sub>

**Answer (EN):**

Distributed transactions without 2PC. Coordinate multiple services around a long-running business process, with compensating actions on failure.

<details><summary>الإجابة بالعربي</summary>

Transactions موزعة بدون 2PC. تنسّق عدة Services في عملية أعمال طويلة، مع Compensating Actions عند الفشل.

</details>

---

#### ❓ Choreography vs Orchestration

<sub>**AR:** Choreography vs Orchestration</sub>

**Answer (EN):**

**Choreography:** services react to events — no central brain. Simpler but harder to reason about. **Orchestration:** a coordinator drives steps — explicit, easier to monitor.

<details><summary>الإجابة بالعربي</summary>

**Choreography:** Services تتفاعل مع Events — بلا عقل مركزي. أبسط لكن أصعب فهمًا. **Orchestration:** Coordinator يقود الخطوات — صريح وأسهل في المراقبة.

</details>

---

#### ❓ Example — Order Saga

<sub>**AR:** مثال — Order Saga</sub>

**Answer (EN):**

Create Order → Reserve Inventory → Charge Payment → Allocate Shipment. If charge fails, compensate: release inventory, mark order cancelled.

<details><summary>الإجابة بالعربي</summary>

إنشاء طلب → حجز المخزون → خصم الدفع → تخصيص الشحن. عند فشل الدفع: حرر المخزون، علّم الطلب ملغى.

</details>

---

## Part VIII — Linux

<sub>الجزء الثامن — Linux</sub>

### 🐧 Linux Essentials

**Slug:** `linux-essentials` · **AR:** أساسيات Linux

> Processes, FDs, signals, networking, systemd  
> *Processes و FDs و Signals والشبكات*

#### ❓ Process model

<sub>**AR:** نموذج الـ Process</sub>

**Answer (EN):**

Each process has a PID, parent (PPID), file descriptors, virtual memory map. `fork()` + `exec()` spawn child processes. PHP-FPM uses a master + worker model.

<details><summary>الإجابة بالعربي</summary>

كل Process له PID و Parent (PPID) و File Descriptors و Virtual Memory Map. `fork()` + `exec()` ينشئون Child Processes. PHP-FPM يستخدم نموذج Master + Worker.

</details>

---

#### ❓ File descriptors & ulimit

<sub>**AR:** File Descriptors و ulimit</sub>

**Answer (EN):**

Sockets and files are FDs. Bump `ulimit -n` on busy servers. PHP-FPM and Nginx hit defaults quickly.

<details><summary>الإجابة بالعربي</summary>

الـ Sockets والملفات FDs. ارفع `ulimit -n` على Servers مزدحمة. PHP-FPM و Nginx يصلون للحدود الافتراضية بسرعة.

</details>

---

#### ❓ Signals

<sub>**AR:** Signals</sub>

**Answer (EN):**

`SIGTERM` (graceful), `SIGKILL` (forced), `SIGHUP` (reload), `SIGUSR1/2` (app-defined). Queue workers should handle SIGTERM to finish the current job then exit.

<details><summary>الإجابة بالعربي</summary>

`SIGTERM` (لطيف)، `SIGKILL` (قسري)، `SIGHUP` (إعادة تحميل)، `SIGUSR1/2` (تطبيقية). Queue Workers يجب أن تتعامل مع SIGTERM لإنهاء Job ثم الخروج.

</details>

---

#### ❓ Networking commands

<sub>**AR:** أوامر الشبكات</sub>

**Answer (EN):**

`ss -tlnp`, `tcpdump`, `curl -v`, `dig`, `traceroute`, `ip a`, `iptables`/`nftables`.

<details><summary>الإجابة بالعربي</summary>

`ss -tlnp` و `tcpdump` و `curl -v` و `dig` و `traceroute` و `ip a` و `iptables`/`nftables`.

</details>

---

#### ❓ systemd basics

<sub>**AR:** أساسيات systemd</sub>

**Answer (EN):**

`systemctl status|start|stop|restart|enable`. Use a unit file for your queue workers; let systemd handle restarts.

<details><summary>الإجابة بالعربي</summary>

`systemctl status|start|stop|restart|enable`. استخدم Unit File لـ Queue Workers؛ دع systemd يدير إعادة التشغيل.

</details>

---

#### ❓ Performance tools

<sub>**AR:** أدوات الأداء</sub>

**Answer (EN):**

`top`, `htop`, `iotop`, `vmstat`, `iostat`, `strace`, `perf`. For CPU profiling: `perf top`. For latency: `bcc`/`bpftrace`.

<details><summary>الإجابة بالعربي</summary>

`top` و `htop` و `iotop` و `vmstat` و `iostat` و `strace` و `perf`. لـ CPU Profiling: `perf top`. للـ Latency: `bcc`/`bpftrace`.

</details>

---

#### ❓ Logs

<sub>**AR:** الـ Logs</sub>

**Answer (EN):**

`journalctl -u app`, `tail -F /var/log/...`. In containers, write logs to stdout/stderr.

<details><summary>الإجابة بالعربي</summary>

`journalctl -u app` و `tail -F /var/log/...`. في Containers، اكتب Logs لـ stdout/stderr.

</details>

---

## Part IX — CI/CD

<sub>الجزء التاسع — CI/CD</sub>

### 🚀 CI/CD Pipelines

**Slug:** `cicd-overview` · **AR:** CI/CD

> Continuous Integration/Delivery/Deployment, strategies  
> *الاستمرارية والاستراتيجيات*

#### ❓ CI vs CD vs CD

<sub>**AR:** CI vs CD vs CD</sub>

**Answer (EN):**

**Continuous Integration:** auto build & test on every push. **Continuous Delivery:** any green commit is releasable. **Continuous Deployment:** green commits auto-ship to production.

<details><summary>الإجابة بالعربي</summary>

**Continuous Integration:** Build و Test تلقائي مع كل Push. **Continuous Delivery:** أي Commit أخضر قابل للنشر. **Continuous Deployment:** Commits خضراء تنشر تلقائيًا.

</details>

---

#### ❓ A solid PHP CI pipeline

<sub>**AR:** CI Pipeline قوي لـ PHP</sub>

**Answer (EN):**

1. Checkout
2. Cache composer + node modules
3. Composer install (--no-dev for prod build)
4. PHPStan / Psalm (static analysis)
5. PHP-CS-Fixer / Pint (lint)
6. Pest / PHPUnit (tests with real DB)
7. Build Docker image
8. Push to registry
9. Deploy to staging → smoke tests → production

<details><summary>الإجابة بالعربي</summary>

1. Checkout
2. Cache لـ Composer و Node Modules
3. Composer Install (--no-dev للـ Production)
4. PHPStan / Psalm (تحليل ثابت)
5. PHP-CS-Fixer / Pint (Lint)
6. Pest / PHPUnit (اختبارات بـ DB حقيقية)
7. بناء Docker Image
8. Push للـ Registry
9. نشر لـ Staging → Smoke Tests → Production

</details>

---

#### ❓ Deployment strategies

<sub>**AR:** استراتيجيات النشر</sub>

**Answer (EN):**

**Rolling:** replace pods batch by batch. **Blue/Green:** two environments, swap traffic. **Canary:** route small % of traffic first. **Feature flags** to ship dark and toggle on.

<details><summary>الإجابة بالعربي</summary>

**Rolling:** استبدال Pods دفعة دفعة. **Blue/Green:** بيئتان مع تبديل Traffic. **Canary:** توجيه نسبة صغيرة من Traffic أولاً. **Feature Flags** للنشر مع التشغيل لاحقًا.

</details>

---

#### ❓ Database migrations in CD

<sub>**AR:** Database Migrations في CD</sub>

**Answer (EN):**

- Migrations must be **backwards-compatible**
- Two-phase changes: add column → deploy code → backfill → drop old column
- Never block deployment on long migrations — run async

<details><summary>الإجابة بالعربي</summary>

- Migrations يجب أن تكون **متوافقة للخلف**
- تغييرات على مرحلتين: أضف عمود → انشر كود → اعمل Backfill → احذف العمود القديم
- لا تعطل النشر بسبب Migrations طويلة — شغلها Async

</details>

---

#### ❓ Secrets management

<sub>**AR:** إدارة الـ Secrets</sub>

**Answer (EN):**

Vault, AWS Secrets Manager, GCP Secret Manager, Doppler. Never commit secrets — they leak via diffs even with .gitignore.

<details><summary>الإجابة بالعربي</summary>

Vault و AWS Secrets Manager و GCP Secret Manager و Doppler. لا تعمل Commit للـ Secrets أبدًا — تتسرب عبر Diffs.

</details>

---

#### ❓ Zero-downtime Laravel deploys

<sub>**AR:** نشر Laravel بدون توقف</sub>

**Answer (EN):**

- Symlink-based releases (Envoyer / Deployer)
- `php artisan config:cache route:cache view:cache event:cache`
- `php artisan migrate --force` with backward-compatible schemas
- Graceful PHP-FPM reload (USR2) and queue worker restart (`queue:restart`)

<details><summary>الإجابة بالعربي</summary>

- Releases بـ Symlinks (Envoyer / Deployer)
- `php artisan config:cache route:cache view:cache event:cache`
- `php artisan migrate --force` بمخططات متوافقة للخلف
- إعادة تحميل PHP-FPM (USR2) وإعادة تشغيل Workers (`queue:restart`)

</details>

---

## Part X — Async & Concurrency

<sub>الجزء العاشر — Async و Concurrency</sub>

### 🧵 PHP Fibers

**Slug:** `async-fibers` · **AR:** PHP Fibers

> PHP 8.1+ primitive enabling stackful coroutines  
> *Primitive في PHP 8.1+ يفتح Coroutines حقيقية*

#### ❓ What are PHP Fibers?

<sub>**AR:** ما هي PHP Fibers؟</sub>

**Answer (EN):**

A Fiber is a **stackful coroutine** — a callable that can suspend itself and be resumed later from the same point. Introduced in PHP 8.1, Fibers are the low-level primitive that frameworks like **ReactPHP**, **AmphP**, and **Swoole**-bridges build on to deliver async I/O without callback hell.

<details><summary>الإجابة بالعربي</summary>

الـ Fiber هو **Stackful Coroutine** — كود قابل للاستدعاء يستطيع أن يُعلّق نفسه ويُستأنف لاحقًا من نفس النقطة. ظهر في PHP 8.1، وهو الـ Primitive الذي تبني فوقه مكتبات مثل **ReactPHP** و **AmphP** و **Swoole** لتقدم Async I/O بدون Callback Hell.

</details>

```php
$fiber = new Fiber(function (): void {
    $value = Fiber::suspend('paused');
    echo "Resumed with: $value\n";
});
$received = $fiber->start();   // 'paused'
$fiber->resume('hello');       // prints 'Resumed with: hello'
```

---

#### ❓ Fibers vs Threads vs Generators

<sub>**AR:** Fibers vs Threads vs Generators</sub>

**Answer (EN):**

- **Threads:** OS-managed, true parallelism, expensive context switch, race conditions.
- **Generators:** stackless, only suspend at `yield` from *themselves*.
- **Fibers:** stackful, can suspend from *any depth* of the call stack — that's what makes them work for async libraries.

<details><summary>الإجابة بالعربي</summary>

- **Threads:** يديرها الـ OS، Parallelism حقيقي، Context Switch مكلف، خطر Race Conditions.
- **Generators:** Stackless، تُعلّق فقط عند `yield` من *نفسها*.
- **Fibers:** Stackful، تستطيع التعليق من *أي عمق* في Stack — لهذا تصلح للمكتبات الـ Async.

</details>

---

#### ❓ Do Fibers give me parallelism?

<sub>**AR:** هل Fibers يعطيني Parallelism؟</sub>

**Answer (EN):**

**No.** Fibers are *concurrency*, not parallelism. PHP still runs one thing at a time per process. The win is hiding I/O latency: while one fiber waits for a DB/HTTP response, the runtime resumes another fiber.

<details><summary>الإجابة بالعربي</summary>

**لا.** Fibers تعطي *Concurrency* لا Parallelism. PHP لا تزال تنفذ شيئًا واحدًا في الـ Process في أي لحظة. الربح أنها تُخفي زمن انتظار I/O: بينما Fiber ينتظر رد من DB/HTTP، الـ Runtime يستأنف Fiber آخر.

</details>

---

#### ❓ When would I use Fibers directly?

<sub>**AR:** متى أستخدم Fibers مباشرة؟</sub>

**Answer (EN):**

Almost never in app code — you'll use a framework on top (AmphP, ReactPHP, Octane/Swoole). Use raw Fibers if you're writing an async library or a runtime.

<details><summary>الإجابة بالعربي</summary>

نادرًا في كود التطبيق — ستستخدم Framework فوقها (AmphP, ReactPHP, Octane/Swoole). استخدم Fibers الخام فقط إذا كنت تكتب مكتبة Async أو Runtime.

</details>

> ✔️ **Senior tip:** Knowing what Fibers are and why they unlocked the modern async PHP ecosystem is the senior-level point.
>
> ✔️ **نصيحة Senior:** النقطة Senior هي معرفة ما هي Fibers ولماذا فتحت بيئة Async الحديثة في PHP.

---

### 🚀 Laravel Octane

**Slug:** `async-octane` · **AR:** Laravel Octane

> Booted-once worker model with Swoole/RoadRunner/FrankenPHP  
> *تشغيل Workers مع Boot مرة واحدة عبر Swoole/RoadRunner/FrankenPHP*

#### ❓ What problem does Octane solve?

<sub>**AR:** ما المشكلة التي يحلها Octane؟</sub>

**Answer (EN):**

Traditional PHP-FPM **boots the framework on every request** (autoload, config, providers, routes). Octane boots once into a long-lived worker; subsequent requests reuse the booted application. Result: **5–10× throughput** for typical Laravel apps.

<details><summary>الإجابة بالعربي</summary>

PHP-FPM التقليدي **يُمهّد Framework في كل Request** (Autoload, Config, Providers, Routes). Octane يُمهّد مرة واحدة في Worker طويل العمر، والـ Requests التالية تُعيد استخدام التطبيق المُمهّد. النتيجة: **إنتاجية 5-10x** لتطبيقات Laravel.

</details>

---

#### ❓ Octane runtimes: Swoole vs RoadRunner vs FrankenPHP

<sub>**AR:** Runtimes الـ Octane: Swoole vs RoadRunner vs FrankenPHP</sub>

**Answer (EN):**

- **Swoole:** PHP extension; full coroutines, `Octane::concurrently()`, tightest perf.
- **RoadRunner:** Go-based app server; simpler ops, no extension, no concurrency primitive.
- **FrankenPHP:** Caddy-embedded PHP runtime with native HTTPS/HTTP/3 — fastest cold path; modern choice.

<details><summary>الإجابة بالعربي</summary>

- **Swoole:** امتداد PHP؛ Coroutines كاملة، `Octane::concurrently()`، أعلى Performance.
- **RoadRunner:** App Server بـ Go؛ تشغيل أبسط، بدون امتداد، بدون Concurrency Primitive.
- **FrankenPHP:** Runtime مدمج في Caddy مع HTTPS/HTTP/3 جاهز — أسرع Cold Path؛ خيار حديث.

</details>

---

#### ❓ Octane gotchas — state leakage

<sub>**AR:** مخاطر Octane — تسرب الحالة</sub>

**Answer (EN):**

Because the worker stays alive, **singletons keep their state between requests**. Common bugs:

- Auth user / session leaking
- Static properties accumulating data
- Container-bound singletons containing per-request state
- Container-resolved values referencing stale closures

Use `scoped` bindings instead of `singleton` for per-request services, and listen for `RequestReceived` to reset state.

<details><summary>الإجابة بالعربي</summary>

لأن Worker يظل حيًا، **الـ Singletons تحتفظ بحالتها بين Requests**. أخطاء شائعة:

- تسرب Auth User / Session
- Static Properties تتراكم
- Singletons في Container تحمل حالة Request
- Closures قديمة

استخدم `scoped` بدلاً من `singleton` للخدمات per-request، واستمع لـ `RequestReceived` لإعادة ضبط الحالة.

</details>

> ❌ **Don't say:** Use `singleton` everywhere "for performance".
>
> ❌ **لا تقل:** استخدام `singleton` لكل شيء "للأداء".

---

#### ❓ Octane::concurrently()

<sub>**AR:** Octane::concurrently()</sub>

**Answer (EN):**

Swoole-only. Runs multiple I/O-bound closures **in parallel** on the same worker via coroutines.

<details><summary>الإجابة بالعربي</summary>

متاح فقط على Swoole. يُشغّل عدة Closures من نوع I/O **بالتوازي** داخل نفس Worker عبر Coroutines.

</details>

```php
[$users, $posts, $weather] = Octane::concurrently([
    fn() => User::all(),
    fn() => Http::get('/posts')->json(),
    fn() => Http::get('/weather')->json(),
]);
```

---

### ⚡ Swoole & Coroutines

**Slug:** `async-swoole` · **AR:** Swoole و Coroutines

> Async runtime, coroutine scheduling, hook system  
> *Runtime غير متزامن، جدولة Coroutines، Hooks*

#### ❓ What is Swoole?

<sub>**AR:** ما هو Swoole؟</sub>

**Answer (EN):**

A C extension turning PHP into an async, coroutine-based runtime. It hooks blocking I/O (mysql, redis, curl, file) and yields control while waiting — single-threaded, event-loop based, similar to Node.js.

<details><summary>الإجابة بالعربي</summary>

امتداد C يُحوّل PHP إلى Runtime غير متزامن مبني على Coroutines. يربط I/O الـ Blocking (mysql, redis, curl, file) ويُسلم التحكم أثناء الانتظار — Single-threaded مبني على Event Loop، مشابه لـ Node.js.

</details>

---

#### ❓ Coroutines vs Threads

<sub>**AR:** Coroutines vs Threads</sub>

**Answer (EN):**

Coroutines are **user-space**, scheduled cooperatively (yield at I/O), and cheap (KB of memory). Threads are kernel-scheduled, preemptive, and expensive (MB stacks). A single PHP process can run tens of thousands of coroutines.

<details><summary>الإجابة بالعربي</summary>

الـ Coroutines في **User Space**، جدولة تعاونية (Yield عند I/O)، رخيصة (KBs ذاكرة). الـ Threads تُجدولها Kernel، Preemptive، مكلفة (Stacks بحجم MB). Process واحد يستطيع تشغيل عشرات الآلاف من Coroutines.

</details>

---

#### ❓ Swoole gotchas

<sub>**AR:** مخاطر Swoole</sub>

**Answer (EN):**

- Some packages do native I/O bypassing the hook — they block the whole worker.
- Global state (statics, registries) is shared across coroutines on the same worker.
- Debugging is harder — stack traces span async hops.
- Long-running coroutines leak file descriptors if not managed.

<details><summary>الإجابة بالعربي</summary>

- بعض المكتبات تستخدم I/O أصلي ولا يلتقطه Hook — يُعطّل الـ Worker كله.
- Global State (Statics, Registries) مشترك عبر Coroutines في نفس Worker.
- التصحيح أصعب — Stack Traces تمتد عبر قفزات Async.
- Coroutines طويلة قد تُسرّب File Descriptors.

</details>

---

### 🔁 ReactPHP & AmphP

**Slug:** `async-event-loops` · **AR:** ReactPHP & AmphP

> Pure-PHP event loops, Promise/Future patterns  
> *Event Loops بـ PHP خالص وأنماط Promise/Future*

#### ❓ What are ReactPHP and AmphP?

<sub>**AR:** ما هي ReactPHP و AmphP؟</sub>

**Answer (EN):**

Pure-PHP async libraries. **ReactPHP** uses Promises (callback-style). **AmphP v3** uses Fibers — code looks synchronous but is async under the hood. Both run on a single-threaded event loop with non-blocking I/O.

<details><summary>الإجابة بالعربي</summary>

مكتبات Async مكتوبة بـ PHP خالص. **ReactPHP** تستخدم Promises (نمط Callback). **AmphP v3** تستخدم Fibers — الكود يبدو متزامنًا لكنه Async في الخلفية. كلاهما يعمل على Event Loop Single-threaded مع I/O غير Blocking.

</details>

---

#### ❓ Promises vs Fibers (AmphP v2 vs v3)

<sub>**AR:** Promises vs Fibers</sub>

**Answer (EN):**

AmphP v2 (Promises): nested `->then()`, callback hell on complex flows. v3 (Fibers): write straight-line code; `Future::await()` hides the suspension. Strong senior signal: explain why Fibers ended PHP's callback era.

<details><summary>الإجابة بالعربي</summary>

AmphP v2 (Promises): `->then()` متداخل و Callback Hell عند التعقيد. v3 (Fibers): اكتب كودًا مستقيمًا و`Future::await()` يُخفي التعليق. إشارة Senior قوية: اشرح كيف أنهت Fibers عصر Callbacks في PHP.

</details>

---

#### ❓ When pick Octane/Swoole vs pure-PHP loop

<sub>**AR:** متى Octane/Swoole vs Loop بـ PHP خالص</sub>

**Answer (EN):**

- **Octane/Swoole:** standard Laravel app needing throughput.
- **AmphP/ReactPHP:** long-running services (workers, daemons, bots, websockets servers) where adding a C extension isn't desired.

<details><summary>الإجابة بالعربي</summary>

- **Octane/Swoole:** تطبيق Laravel تحتاج Throughput.
- **AmphP/ReactPHP:** خدمات طويلة العمر (Workers, Daemons, Bots, WebSocket Servers) حيث لا تريد امتدادًا.

</details>

---

## Part XI — Security

<sub>الجزء الحادي عشر — الأمان</sub>

### 🛡 OWASP Top 10 (Web)

**Slug:** `sec-owasp-web` · **AR:** OWASP Top 10 للويب

> A01–A10: from broken access control to SSRF  
> *من Broken Access Control إلى SSRF*

#### ❓ List the OWASP Top 10 (2021)

<sub>**AR:** عدد OWASP Top 10 (2021)</sub>

**Answer (EN):**

1. **A01 Broken Access Control** — most common in 2021
2. **A02 Cryptographic Failures**
3. **A03 Injection** (SQLi, command, LDAP)
4. **A04 Insecure Design**
5. **A05 Security Misconfiguration**
6. **A06 Vulnerable & Outdated Components**
7. **A07 Identification & Authentication Failures**
8. **A08 Software & Data Integrity Failures**
9. **A09 Security Logging & Monitoring Failures**
10. **A10 Server-Side Request Forgery (SSRF)**

<details><summary>الإجابة بالعربي</summary>

1. **A01 Broken Access Control** — الأكثر شيوعًا
2. **A02 Cryptographic Failures**
3. **A03 Injection** (SQLi, Command, LDAP)
4. **A04 Insecure Design**
5. **A05 Security Misconfiguration**
6. **A06 Vulnerable & Outdated Components**
7. **A07 Authentication Failures**
8. **A08 Integrity Failures**
9. **A09 Logging Failures**
10. **A10 SSRF**

</details>

---

#### ❓ SQL Injection — show prevention in PHP

<sub>**AR:** حقن SQL — كيفية منعه</sub>

**Answer (EN):**

Use parameterized queries (PDO) or the framework's query builder. Never concatenate user input.

<details><summary>الإجابة بالعربي</summary>

استخدم Parameterized Queries (PDO) أو Query Builder. لا تجمع Input المستخدم بسلاسل.

</details>

```php
// ❌ Vulnerable
$pdo->query("SELECT * FROM users WHERE email='$email'");

// ✅ Safe
$stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
$stmt->execute([$email]);

// ✅ Eloquent (parameterised by default)
User::where('email', $email)->first();
```

---

#### ❓ XSS — types and defense

<sub>**AR:** XSS — الأنواع والدفاع</sub>

**Answer (EN):**

**Stored:** persisted then served (most dangerous). **Reflected:** bounced off the server. **DOM-based:** client-side only.

Defense: contextual output encoding (Blade `{{ }}` auto-escapes), **Content Security Policy (CSP)**, HttpOnly + Secure + SameSite cookies, `X-Content-Type-Options: nosniff`.

<details><summary>الإجابة بالعربي</summary>

**Stored:** يُخزن ثم يُعرض (الأخطر). **Reflected:** يرتد من السيرفر. **DOM-based:** داخل المتصفح فقط.

الدفاع: Output Encoding حسب السياق (Blade `{{ }}` يهرب تلقائيًا)، **CSP**، Cookies بـ HttpOnly + Secure + SameSite، `X-Content-Type-Options: nosniff`.

</details>

---

#### ❓ CSRF and how Laravel handles it

<sub>**AR:** CSRF وكيف يتعامل معها Laravel</sub>

**Answer (EN):**

An attacker tricks the user's browser into sending state-changing requests using the victim's session. Defense: anti-CSRF tokens on every state-changing request + `SameSite=Lax` cookies. Laravel adds `@csrf` to forms and `VerifyCsrfToken` middleware checks the token.

<details><summary>الإجابة بالعربي</summary>

مهاجم يخدع متصفح المستخدم لإرسال طلبات مُعدِّلة باستخدام Session الضحية. الدفاع: Anti-CSRF Tokens مع كل Request مُعدِّل + Cookies بـ `SameSite=Lax`. Laravel يضيف `@csrf` للنماذج و `VerifyCsrfToken` Middleware يتحقق.

</details>

---

#### ❓ SSRF — what is it?

<sub>**AR:** ما هي SSRF؟</sub>

**Answer (EN):**

Server-Side Request Forgery: the app fetches a URL supplied by the user — attacker points it to internal services (`http://169.254.169.254/` AWS IMDS, `http://localhost:6379`). Defense: allow-list of domains, block private CIDRs (10/8, 172.16/12, 192.168/16, 169.254/16), disable redirects.

<details><summary>الإجابة بالعربي</summary>

Server-Side Request Forgery: التطبيق يجلب URL يحدده المستخدم — المهاجم يوجهه لخدمات داخلية (`http://169.254.169.254/` AWS IMDS، `http://localhost:6379`). الدفاع: Allow-list للنطاقات، حظر CIDRs الخاصة، تعطيل Redirects.

</details>

---

### 🔓 OWASP API Top 10 (2023)

**Slug:** `sec-owasp-api` · **AR:** OWASP API Top 10 (2023)

> BOLA, BFLA, unrestricted resource consumption  
> *BOLA و BFLA والاستهلاك غير المحدود*

#### ❓ API Top 10 — 2023 edition

<sub>**AR:** API Top 10 — إصدار 2023</sub>

**Answer (EN):**

1. **API1 Broken Object Level Authorization (BOLA)** — #1 attack vector
2. API2 Broken Authentication
3. API3 Broken Object Property Level Authorization (BOPLA)
4. API4 Unrestricted Resource Consumption
5. **API5 Broken Function Level Authorization (BFLA)**
6. API6 Unrestricted Access to Sensitive Business Flows
7. API7 SSRF
8. API8 Security Misconfiguration
9. API9 Improper Inventory Management
10. API10 Unsafe Consumption of APIs

<details><summary>الإجابة بالعربي</summary>

1. **API1 BOLA** — رقم 1 في الهجمات
2. API2 Broken Authentication
3. API3 BOPLA
4. API4 Unrestricted Resource Consumption
5. **API5 BFLA**
6. API6 Sensitive Business Flows
7. API7 SSRF
8. API8 Misconfiguration
9. API9 Improper Inventory
10. API10 Unsafe Consumption

</details>

---

#### ❓ BOLA — concrete example

<sub>**AR:** BOLA — مثال محدد</sub>

**Answer (EN):**

Endpoint `GET /api/orders/{id}` returns the order — but does NOT check the order belongs to the calling user. Attacker iterates IDs and reads everyone's orders.

<details><summary>الإجابة بالعربي</summary>

Endpoint `GET /api/orders/{id}` يُرجع الطلب — لكن لا يتحقق أن الطلب يخص المستخدم المُصادق. المهاجم يُكرر الـ IDs ويقرأ طلبات الجميع.

</details>

```php
// ❌ Vulnerable
public function show($id) {
    return Order::findOrFail($id);
}

// ✅ Fixed — scope by current user
public function show($id) {
    return auth()->user()->orders()->findOrFail($id);
}

// ✅ Even better — Policy
Gate::authorize('view', $order);
```

---

#### ❓ BFLA — Broken Function Level Authorization

<sub>**AR:** BFLA — Broken Function Level Authorization</sub>

**Answer (EN):**

A regular user calls an admin-only endpoint that exists in the API but isn't exposed in the UI. Defense: explicit role/permission check at every sensitive endpoint, default-deny.

<details><summary>الإجابة بالعربي</summary>

مستخدم عادي يستدعي Endpoint مخصص للـ Admin موجود في API لكن غير ظاهر في UI. الدفاع: تحقق صريح من Role/Permission في كل Endpoint حساس، Default-Deny.

</details>

---

#### ❓ Mass assignment is API3 / BOPLA

<sub>**AR:** Mass Assignment هو API3 / BOPLA</sub>

**Answer (EN):**

Client sends `{"role": "admin"}` in a profile update, app blindly assigns. Defense: `$fillable` whitelist, Form Requests with explicit validated keys, never `$guarded = []`.

<details><summary>الإجابة بالعربي</summary>

العميل يُرسل `{"role": "admin"}` في تحديث الملف، التطبيق يُعيّنها بدون فحص. الدفاع: `$fillable` whitelist، Form Requests بمفاتيح صريحة، تجنب `$guarded = []`.

</details>

---

#### ❓ API4 Unrestricted Resource Consumption

<sub>**AR:** API4 الاستهلاك غير المحدود</sub>

**Answer (EN):**

No rate limits, no pagination caps, accepting huge payloads → DoS or wallet drain. Defense: per-route rate limit (token bucket), max body size, max page size, query complexity limits (GraphQL).

<details><summary>الإجابة بالعربي</summary>

بدون Rate Limits ولا حدود Pagination، قبول Payloads ضخمة → DoS أو استنزاف. الدفاع: Rate Limit لكل Route (Token Bucket)، حجم Body أقصى، حد لـ Page Size، حدود Query Complexity (GraphQL).

</details>

---

### 🎟 JWT Pitfalls

**Slug:** `sec-jwt` · **AR:** مخاطر JWT

> Algorithm confusion, revocation, refresh  
> *Algorithm Confusion والإلغاء و Refresh*

#### ❓ What is a JWT?

<sub>**AR:** ما هو JWT؟</sub>

**Answer (EN):**

A signed (and optionally encrypted) token: `header.payload.signature`. Self-contained — the server can validate without a DB lookup. Used for stateless auth.

<details><summary>الإجابة بالعربي</summary>

Token موقع (وأحيانًا مُشفّر): `header.payload.signature`. مكتفٍ ذاتيًا — يستطيع السيرفر التحقق دون استعلام DB. يُستخدم لـ Stateless Auth.

</details>

---

#### ❓ Algorithm confusion — the classic JWT bug

<sub>**AR:** Algorithm Confusion — الخطأ الكلاسيكي</sub>

**Answer (EN):**

Server uses RS256 (asymmetric) but the library accepts whatever `alg` the token claims. Attacker sets `alg: HS256` and signs with the public key (now used as HMAC secret). Defense: **pin the algorithm** on the verify side; never accept `alg: none`.

<details><summary>الإجابة بالعربي</summary>

السيرفر يستخدم RS256 لكن المكتبة تقبل أي `alg` يحدده Token. المهاجم يضع `alg: HS256` ويوقع بالـ Public Key (المستخدم الآن كـ HMAC Secret). الدفاع: **ثبّت الخوارزمية** عند التحقق، ولا تقبل `alg: none`.

</details>

---

#### ❓ How do you revoke a JWT?

<sub>**AR:** كيف تُلغي JWT؟</sub>

**Answer (EN):**

You can't — that's the JWT tradeoff. Common patterns: short TTL (5–15 min) + refresh token, **jti** claim + Redis blacklist on logout, opaque refresh + JWT access pattern, or just don't use JWT for sessions.

<details><summary>الإجابة بالعربي</summary>

لا تستطيع — هذه مقايضة JWT. أنماط شائعة: TTL قصير (5-15 دقيقة) + Refresh Token، استخدام **jti** + Redis Blacklist عند تسجيل الخروج، Refresh Opaque + JWT Access، أو لا تستخدم JWT للـ Sessions أصلاً.

</details>

---

#### ❓ Where to store JWT on the client?

<sub>**AR:** أين تخزن JWT على العميل؟</sub>

**Answer (EN):**

**Not localStorage** — XSS reads it. Best: HttpOnly + Secure + SameSite=Strict cookie. Pair with CSRF protection.

<details><summary>الإجابة بالعربي</summary>

**ليس في localStorage** — XSS يقرأها. الأفضل: Cookie بـ HttpOnly + Secure + SameSite=Strict مع حماية CSRF.

</details>

---

#### ❓ Senior insight

<sub>**AR:** رؤية Senior</sub>

**Answer (EN):**

JWT is misused for session management. For a typical web app, **opaque session tokens stored server-side** (Sanctum cookie sessions) are simpler, revokable, and just as fast at small scale. Reach for JWT only when you have a real reason: cross-service propagation, public APIs without DB lookups, federated identity.

<details><summary>الإجابة بالعربي</summary>

JWT يُساء استخدامها لإدارة الـ Sessions. لتطبيق Web عادي، **Opaque Session Tokens مخزنة على السيرفر** (Sanctum Cookies) أبسط وقابلة للإلغاء ومماثلة في السرعة. استخدم JWT فقط عند سبب حقيقي: نشر بين خدمات، APIs عامة دون DB Lookup، Federated Identity.

</details>

---

### 🚧 Rate Limiting Algorithms

**Slug:** `sec-rate-limiting` · **AR:** خوارزميات Rate Limiting

> Token bucket, leaky bucket, fixed/sliding window  
> *Token Bucket و Leaky Bucket و Sliding Window*

#### ❓ The four algorithms

<sub>**AR:** الخوارزميات الأربع</sub>

**Answer (EN):**

- **Fixed Window:** count requests in a calendar window. Simple, but burst at window boundaries (2× limit).
- **Sliding Window Log:** store timestamps; accurate but memory-heavy.
- **Sliding Window Counter:** weighted average of current + previous window — Stripe-style, low memory.
- **Token Bucket:** tokens refill at a rate; consume per request; allows controlled bursts.
- **Leaky Bucket:** requests queue, drain at fixed rate — smooths traffic.

<details><summary>الإجابة بالعربي</summary>

- **Fixed Window:** عدّ Requests في نافذة. بسيط لكن Burst عند الحدود.
- **Sliding Window Log:** خزن Timestamps؛ دقيق لكن ذاكرة عالية.
- **Sliding Window Counter:** متوسط مرجح بين النافذة الحالية والسابقة.
- **Token Bucket:** Tokens تتراكم بمعدل؛ تُستهلك لكل Request؛ يسمح بـ Bursts.
- **Leaky Bucket:** Requests في طابور، تسحب بمعدل ثابت — تسوي Traffic.

</details>

---

#### ❓ Implement a token bucket in Redis (Lua)

<sub>**AR:** تنفيذ Token Bucket في Redis (Lua)</sub>

**Answer (EN):**

Atomicity is key — use a Lua script so refill + consume happen in one round-trip.

<details><summary>الإجابة بالعربي</summary>

الذرية أساسية — استخدم Lua Script حتى يحدث Refill + Consume في Round-trip واحد.

</details>

```php
-- KEYS[1] = bucket key,  ARGV: now, rate, capacity, cost
local data = redis.call('HMGET', KEYS[1], 'tokens', 'ts')
local tokens   = tonumber(data[1]) or tonumber(ARGV[3])
local lastTs   = tonumber(data[2]) or tonumber(ARGV[1])
local refill   = (tonumber(ARGV[1]) - lastTs) * tonumber(ARGV[2])
tokens         = math.min(tonumber(ARGV[3]), tokens + refill)
if tokens < tonumber(ARGV[4]) then return 0 end
tokens = tokens - tonumber(ARGV[4])
redis.call('HMSET', KEYS[1], 'tokens', tokens, 'ts', ARGV[1])
return 1
```

---

#### ❓ Where to enforce limits

<sub>**AR:** أين تُفرض الحدود</sub>

**Answer (EN):**

Defense in depth: edge (CDN / WAF), API gateway, then app middleware. App-level rate limits should be *per user / API key / IP* and per endpoint, not global.

<details><summary>الإجابة بالعربي</summary>

دفاع متعدد الطبقات: Edge (CDN / WAF)، API Gateway، ثم Middleware. الحدود على مستوى التطبيق يجب أن تكون *لكل مستخدم / API Key / IP* ولكل Endpoint، لا Global.

</details>

---

#### ❓ 429 response headers

<sub>**AR:** Headers ردّ 429</sub>

**Answer (EN):**

Return `429 Too Many Requests` with `Retry-After` seconds and the modern `RateLimit-Limit / RateLimit-Remaining / RateLimit-Reset` (draft RFC).

<details><summary>الإجابة بالعربي</summary>

أرسل `429 Too Many Requests` مع `Retry-After` بالثواني والـ `RateLimit-Limit / RateLimit-Remaining / RateLimit-Reset` الحديثة (مسودة RFC).

</details>

---

### 🔑 Secrets, TLS, mTLS

**Slug:** `sec-secrets-tls` · **AR:** الـ Secrets و TLS و mTLS

> Secret rotation, TLS handshake, mutual TLS  
> *تدوير الـ Secrets و TLS و mTLS*

#### ❓ Where do secrets live in production?

<sub>**AR:** أين تعيش الـ Secrets في الإنتاج؟</sub>

**Answer (EN):**

Not in `.env` committed to git. Use a secret manager: AWS Secrets Manager, GCP Secret Manager, HashiCorp Vault, Doppler, 1Password. Mount at runtime, never log them, scope by IAM role.

<details><summary>الإجابة بالعربي</summary>

ليس في `.env` داخل Git. استخدم Secret Manager: AWS Secrets Manager أو HashiCorp Vault أو Doppler. حمّلها وقت التشغيل، لا تسجّلها، وقيّدها بـ IAM Role.

</details>

---

#### ❓ How and why to rotate secrets

<sub>**AR:** كيف ولماذا تُدوّر الـ Secrets</sub>

**Answer (EN):**

Limits blast radius if a secret leaks. Pattern: **two-key window** — accept old + new during rotation, then retire old. Encrypted data uses key versions so re-encryption is gradual.

<details><summary>الإجابة بالعربي</summary>

يحدّ من نطاق الضرر إذا تسرّب Secret. النمط: **نافذة مفتاحين** — اقبل القديم والجديد أثناء التدوير، ثم تخلص من القديم. البيانات المشفرة تستخدم Key Versions ليكون إعادة التشفير تدريجيًا.

</details>

---

#### ❓ TLS handshake essentials

<sub>**AR:** أساسيات مصافحة TLS</sub>

**Answer (EN):**

TLS 1.3 simplified to 1-RTT (or 0-RTT with PSK): ClientHello → ServerHello + Certificate + Finished → Client Finished. Forward secrecy by default via ephemeral DH.

<details><summary>الإجابة بالعربي</summary>

TLS 1.3 بسّطت لـ 1-RTT (أو 0-RTT مع PSK): ClientHello → ServerHello + Certificate + Finished → Client Finished. Forward Secrecy افتراضي عبر Ephemeral DH.

</details>

---

#### ❓ What is mTLS and when use it?

<sub>**AR:** ما هي mTLS ومتى تُستخدم؟</sub>

**Answer (EN):**

Mutual TLS — both client and server present certificates. Used for service-to-service auth in a mesh (Istio, Linkerd), or for high-trust APIs where you control both ends.

<details><summary>الإجابة بالعربي</summary>

TLS متبادلة — كلٌ من العميل والسيرفر يقدم Certificate. تُستخدم للمصادقة Service-to-Service في Mesh (Istio, Linkerd)، أو لـ APIs عالية الثقة بين أطراف تتحكم بها.

</details>

---

## Part XII — Observability

<sub>الجزء الثاني عشر — Observability</sub>

### 👁 Three Pillars

**Slug:** `obs-pillars` · **AR:** الأركان الثلاثة

> Logs, metrics, traces — what each is for  
> *Logs و Metrics و Traces — لماذا كل واحد*

#### ❓ Monitoring vs Observability

<sub>**AR:** Monitoring vs Observability</sub>

**Answer (EN):**

**Monitoring:** known unknowns — dashboards & alerts on metrics you already track. **Observability:** unknown unknowns — ability to ask new questions of your system after the fact (via rich, high-cardinality data).

<details><summary>الإجابة بالعربي</summary>

**Monitoring:** الـ Known Unknowns — Dashboards و Alerts على Metrics تتابعها أصلاً. **Observability:** الـ Unknown Unknowns — القدرة على طرح أسئلة جديدة عن النظام بأثر رجعي عبر بيانات غنية وعالية Cardinality.

</details>

---

#### ❓ Three pillars: logs, metrics, traces

<sub>**AR:** الأركان الثلاثة: Logs و Metrics و Traces</sub>

**Answer (EN):**

- **Logs:** discrete events with context. Cheap to write, expensive to query at scale. Use **structured (JSON)** logs with correlation IDs.
- **Metrics:** numeric time-series (counters, gauges, histograms). Cheap to query, low cardinality only.
- **Traces:** causal chain of spans across services. Best for understanding latency and dependencies.

<details><summary>الإجابة بالعربي</summary>

- **Logs:** أحداث منفصلة بسياق. رخيصة الكتابة، باهظة الاستعلام. استخدم **Logs مهيكلة (JSON)** مع Correlation IDs.
- **Metrics:** Time-series رقمية (Counters, Gauges, Histograms). رخيصة الاستعلام، Cardinality منخفض فقط.
- **Traces:** سلسلة سببية من Spans عبر الخدمات. الأفضل لفهم الـ Latency و Dependencies.

</details>

---

#### ❓ Correlation IDs

<sub>**AR:** Correlation IDs</sub>

**Answer (EN):**

One ID flows through every log line and span for a single request — generated at the edge, propagated via `X-Request-Id`/`traceparent`. Without it, debugging distributed systems is brutal.

<details><summary>الإجابة بالعربي</summary>

ID واحد يمر عبر كل سطر Log و Span للطلب الواحد — يُولّد عند Edge ويُمرر عبر `X-Request-Id`/`traceparent`. بدونه، تصحيح الأنظمة الموزعة كابوس.

</details>

---

### 📡 OpenTelemetry

**Slug:** `obs-otel` · **AR:** OpenTelemetry

> Vendor-neutral spec for traces, metrics, logs  
> *معيار محايد للـ Traces و Metrics و Logs*

#### ❓ What is OpenTelemetry?

<sub>**AR:** ما هي OpenTelemetry؟</sub>

**Answer (EN):**

An open standard (CNCF) for generating and exporting telemetry: traces, metrics, and logs. Replaces vendor-specific SDKs — instrument once, export to Jaeger, Tempo, Datadog, New Relic, anything.

<details><summary>الإجابة بالعربي</summary>

معيار مفتوح (CNCF) لتوليد وتصدير Telemetry: Traces و Metrics و Logs. يستبدل SDKs المُرتبطة بـ Vendor — Instrument مرة واحدة، صدّر لـ Jaeger أو Tempo أو Datadog أو أي شيء.

</details>

---

#### ❓ Core concepts

<sub>**AR:** المفاهيم الأساسية</sub>

**Answer (EN):**

- **Span:** one unit of work with start/end + attributes.
- **Trace:** a tree of spans sharing a trace ID.
- **Context propagation:** `traceparent` header (W3C Trace Context).
- **Resource:** the entity emitting telemetry (service name, version, host).
- **Collector:** receives, processes, exports.

<details><summary>الإجابة بالعربي</summary>

- **Span:** وحدة عمل بـ Start/End + Attributes.
- **Trace:** شجرة Spans تشترك في Trace ID.
- **Context Propagation:** Header الـ `traceparent` (W3C Trace Context).
- **Resource:** الكيان المُرسل (Service Name, Version, Host).
- **Collector:** يستقبل ويُعالج ويُصدّر.

</details>

---

#### ❓ Sampling strategies

<sub>**AR:** استراتيجيات Sampling</sub>

**Answer (EN):**

Tracing every request is expensive. **Head-based:** decide at start (random %). **Tail-based:** decide at end (keep errors and slow requests). Tail sampling at the Collector is the production sweet spot.

<details><summary>الإجابة بالعربي</summary>

تتبع كل Request مكلف. **Head-based:** قرار في البداية (نسبة عشوائية). **Tail-based:** قرار في النهاية (احتفظ بالأخطاء و Requests البطيئة). Tail Sampling في الـ Collector هو الخيار الأمثل في الإنتاج.

</details>

---

#### ❓ PHP / Laravel instrumentation

<sub>**AR:** Instrumentation في PHP / Laravel</sub>

**Answer (EN):**

`open-telemetry/opentelemetry` SDK + auto-instrumentation extensions for Laravel, Guzzle, PDO. Spans propagate via `traceparent` on outbound HTTP. Export to OTLP collector.

<details><summary>الإجابة بالعربي</summary>

SDK الـ `open-telemetry/opentelemetry` + Auto-instrumentation Extensions لـ Laravel و Guzzle و PDO. الـ Spans تُمرر عبر `traceparent` على HTTP الصادر. صدّر لـ OTLP Collector.

</details>

---

### 📊 Metrics: RED & USE

**Slug:** `obs-metrics` · **AR:** Metrics: RED و USE

> Prometheus, RED method, USE method  
> *Prometheus وطريقتا RED و USE*

#### ❓ RED method (services)

<sub>**AR:** طريقة RED (للخدمات)</sub>

**Answer (EN):**

For every service expose: **R**equests/sec, **E**rrors/sec, **D**uration (latency distribution). Three metrics tell you 90% of what's happening.

<details><summary>الإجابة بالعربي</summary>

لكل خدمة، اعرض: **R**equests/sec و **E**rrors/sec و **D**uration (توزيع Latency). ثلاث Metrics تخبرك بـ 90% مما يحدث.

</details>

---

#### ❓ USE method (resources)

<sub>**AR:** طريقة USE (للموارد)</sub>

**Answer (EN):**

For every resource (CPU, memory, disk, network): **U**tilization, **S**aturation, **E**rrors. Brendan Gregg's classic for capacity planning.

<details><summary>الإجابة بالعربي</summary>

لكل مورد (CPU, Memory, Disk, Network): **U**tilization و **S**aturation و **E**rrors. كلاسيكية Brendan Gregg للتخطيط للسعة.

</details>

---

#### ❓ Counter vs Gauge vs Histogram

<sub>**AR:** Counter vs Gauge vs Histogram</sub>

**Answer (EN):**

- **Counter:** monotonically increasing (requests_total). Use `rate()`.
- **Gauge:** a value that goes up and down (queue depth, in-flight).
- **Histogram:** distribution of observations (latency p50/p95/p99). Pre-bucketed at scrape time.
- **Summary:** like histogram but client-side percentiles — can't aggregate across instances.

<details><summary>الإجابة بالعربي</summary>

- **Counter:** يزداد فقط (requests_total). استخدم `rate()`.
- **Gauge:** قيمة تصعد وتنزل (Queue Depth, In-flight).
- **Histogram:** توزيع (Latency p50/p95/p99). مُجمّع مسبقًا في Buckets.
- **Summary:** مثل Histogram لكن Percentiles على Client — لا يجمّع عبر Instances.

</details>

---

#### ❓ High cardinality is the metrics killer

<sub>**AR:** الـ Cardinality العالي قاتل Metrics</sub>

**Answer (EN):**

Each unique label combination = a new time series. Putting `user_id` as a label = millions of series = OOM. Use logs/traces for high-cardinality fields, metrics for low-cardinality dimensions (route, status, method).

<details><summary>الإجابة بالعربي</summary>

كل تركيبة Labels فريدة = Time Series جديدة. وضع `user_id` كـ Label = ملايين Series = OOM. استخدم Logs/Traces للحقول عالية Cardinality، و Metrics لأبعاد منخفضة (Route, Status, Method).

</details>

---

### 🎯 SLOs & Error Budgets

**Slug:** `obs-slo` · **AR:** SLOs و Error Budgets

> SLI, SLO, SLA, burn-rate alerts  
> *SLI و SLO و SLA و Burn-rate Alerts*

#### ❓ SLI vs SLO vs SLA

<sub>**AR:** SLI vs SLO vs SLA</sub>

**Answer (EN):**

- **SLI** (Indicator): what you measure (e.g. *fraction of HTTP requests with status < 500*).
- **SLO** (Objective): your internal target (e.g. *99.9% over rolling 30 days*).
- **SLA** (Agreement): contractual promise to customers, usually weaker than the SLO — with financial penalties.

<details><summary>الإجابة بالعربي</summary>

- **SLI** (Indicator): ما تقيسه (مثلاً *نسبة Requests الناجحة*).
- **SLO** (Objective): الهدف الداخلي (مثلاً *99.9% عبر 30 يومًا*).
- **SLA** (Agreement): التزام تعاقدي للعملاء، عادة أضعف من SLO، مع غرامات.

</details>

---

#### ❓ Error budget

<sub>**AR:** Error Budget</sub>

**Answer (EN):**

1 − SLO. If your SLO is 99.9% over 30 days, your budget is 0.1% × 30d ≈ 43 minutes of badness. Once spent, freeze risky deploys and pay down reliability debt.

<details><summary>الإجابة بالعربي</summary>

1 − SLO. إذا كان SLO هو 99.9% خلال 30 يومًا، الميزانية ≈ 43 دقيقة من الفشل. بعد استهلاكها، جمّد الـ Deploys الخطرة واعمل على الموثوقية.

</details>

---

#### ❓ Burn-rate alerts

<sub>**AR:** Burn-rate Alerts</sub>

**Answer (EN):**

Don't page on raw error rate. Page on **burn rate** — how fast you're consuming the budget. Google SRE pattern: *multi-window, multi-burn-rate* (fast burn 1h, slow burn 6h) keeps signal high without flapping.

<details><summary>الإجابة بالعربي</summary>

لا تطلق Pages على Error Rate خام. أطلقها على **Burn Rate** — معدل استهلاك الميزانية. نمط Google SRE: *نوافذ متعددة بمعدلات احتراق متعددة* (سريع 1h، بطيء 6h) للحفاظ على إشارة قوية بدون Flapping.

</details>

---

#### ❓ How to write good SLOs

<sub>**AR:** كيف تكتب SLOs جيدة</sub>

**Answer (EN):**

- Reflect user experience, not internal mechanics
- Set just below what users actually need — 100% is wrong and costly
- Use windows of 28–30 days (rolling)
- Tie alerts to budget burn, not threshold violations

<details><summary>الإجابة بالعربي</summary>

- اعكس تجربة المستخدم لا الميكانيكا الداخلية
- اضبطها أقل قليلاً مما يحتاجه المستخدم — 100% خطأ ومكلف
- استخدم نوافذ 28-30 يومًا (Rolling)
- اربط Alerts بـ Budget Burn لا انتهاكات Threshold

</details>

---

## Part XIII — Messaging & Events

<sub>الجزء الثالث عشر — Messaging و Events</sub>

### 🪵 Kafka Deep Dive

**Slug:** `msg-kafka` · **AR:** Kafka بعمق

> Partitions, consumer groups, ordering, exactly-once  
> *Partitions و Consumer Groups والترتيب و Exactly-once*

#### ❓ What is Kafka, in one paragraph?

<sub>**AR:** ما هي Kafka في فقرة؟</sub>

**Answer (EN):**

A distributed, append-only, partitioned commit log. Producers append messages to **topics**; each topic is split into **partitions** for parallelism; consumers read at their own pace by tracking an **offset**. Retention is time/size based — data persists even after consumption, enabling replay.

<details><summary>الإجابة بالعربي</summary>

Commit Log موزّع Append-only مُقسّم. Producers يُضيفون رسائل لـ **Topics**؛ كل Topic مُقسّم لـ **Partitions** للتوازي؛ Consumers يقرؤون بإيقاعهم عبر تتبع **Offset**. Retention زمني/حجمي — البيانات تبقى بعد الاستهلاك مما يُمكّن Replay.

</details>

---

#### ❓ Partitions, keys, and ordering

<sub>**AR:** الـ Partitions والمفاتيح والترتيب</sub>

**Answer (EN):**

Ordering is guaranteed **within a partition**, not across topic. Producers route by hashing a **key** — same key → same partition → ordered. Choose keys carefully: `user_id` for per-user ordering; `order_id` for per-order ordering.

<details><summary>الإجابة بالعربي</summary>

الترتيب مضمون **داخل Partition** فقط لا عبر Topic كله. Producers يوزعون عبر Hashing الـ **Key** — نفس Key → نفس Partition → ترتيب. اختر المفاتيح بعناية: `user_id` للترتيب لكل مستخدم؛ `order_id` لكل طلب.

</details>

---

#### ❓ Consumer groups

<sub>**AR:** Consumer Groups</sub>

**Answer (EN):**

A group ID identifies one logical consumer. Partitions are split among the group members — adding a consumer to a group *parallelizes*; a different group ID = independent reads (broadcast). Max useful consumers = partition count.

<details><summary>الإجابة بالعربي</summary>

Group ID يُحدّد Consumer واحدًا منطقيًا. الـ Partitions تُقسّم على أعضاء المجموعة — إضافة Consumer *توازي*؛ Group ID مختلف = قراءات مستقلة (Broadcast). أقصى عدد Consumers مفيد = عدد Partitions.

</details>

---

#### ❓ Delivery semantics

<sub>**AR:** دلالات التوصيل</sub>

**Answer (EN):**

- **At-most-once:** commit offset before processing → drops on crash.
- **At-least-once** (default): process then commit → duplicates on crash, *requires idempotent consumers*.
- **Exactly-once:** producer idempotence + transactional API (Kafka Streams). Real but operationally heavier.

<details><summary>الإجابة بالعربي</summary>

- **At-most-once:** Commit Offset قبل المعالجة → فقدان عند Crash.
- **At-least-once** (افتراضي): عالج ثم Commit → تكرار عند Crash، *يتطلب Consumers Idempotent*.
- **Exactly-once:** Producer Idempotence + Transactional API (Kafka Streams). حقيقي لكن أثقل تشغيليًا.

</details>

---

#### ❓ Compaction vs deletion

<sub>**AR:** Compaction vs Deletion</sub>

**Answer (EN):**

**Delete (default):** retention by time/size. **Compact:** keep only the latest message per key — turns a topic into a queryable state store. Used for stream-table joins, CDC streams.

<details><summary>الإجابة بالعربي</summary>

**Delete (افتراضي):** Retention بالزمن/الحجم. **Compact:** احتفظ بآخر رسالة لكل Key فقط — تُحوّل Topic إلى مخزن حالة قابل للاستعلام. تُستخدم في Stream-table Joins و CDC.

</details>

---

### 🐰 RabbitMQ, SQS, SNS, Kafka — when to use what

**Slug:** `msg-rabbit-sqs` · **AR:** RabbitMQ و SQS و SNS و Kafka — متى أيهم

> Trade-offs across queues vs streams  
> *المقايضات بين Queues و Streams*

#### ❓ Queue vs stream — the fundamental split

<sub>**AR:** Queue vs Stream — الفصل الأساسي</sub>

**Answer (EN):**

**Queue (RabbitMQ, SQS):** messages are consumed and removed; designed for work distribution; ordering is best-effort. **Stream (Kafka):** append-only log, multiple independent consumers, replay, strict ordering per partition.

<details><summary>الإجابة بالعربي</summary>

**Queue (RabbitMQ, SQS):** الرسائل تُستهلك وتُحذف؛ مصممة لتوزيع العمل؛ الترتيب Best-effort. **Stream (Kafka):** Append-only Log، Consumers مستقلون متعددون، Replay، ترتيب صارم لكل Partition.

</details>

---

#### ❓ RabbitMQ strengths

<sub>**AR:** نقاط قوة RabbitMQ</sub>

**Answer (EN):**

- Flexible routing (exchanges: direct, topic, fanout, headers)
- Per-message ack, dead letter exchanges
- Lower operational overhead than Kafka for small/medium workloads
- Push model (vs Kafka pull)

<details><summary>الإجابة بالعربي</summary>

- Routing مرن (Exchanges: direct, topic, fanout, headers)
- Ack لكل رسالة، Dead Letter Exchanges
- تشغيل أبسط من Kafka للأعباء الصغيرة والمتوسطة
- نموذج Push (مقابل Pull في Kafka)

</details>

---

#### ❓ SQS Standard vs FIFO

<sub>**AR:** SQS Standard vs FIFO</sub>

**Answer (EN):**

**Standard:** at-least-once, best-effort order, unlimited throughput. **FIFO:** exactly-once + strict order, 3000 msg/s with batching. SQS visibility timeout replaces explicit ACKs.

<details><summary>الإجابة بالعربي</summary>

**Standard:** At-least-once، ترتيب Best-effort، Throughput بلا حد. **FIFO:** Exactly-once + ترتيب صارم، 3000 رسالة/ث مع Batching. Visibility Timeout يستبدل ACK الصريح.

</details>

---

#### ❓ SNS — when to use

<sub>**AR:** SNS — متى تستخدم</sub>

**Answer (EN):**

Pub/sub fanout to multiple SQS queues, Lambda, HTTP endpoints, email/SMS. Pair SNS → SQS when you want fanout + reliable queue semantics per consumer.

<details><summary>الإجابة بالعربي</summary>

Pub/sub Fanout لعدة SQS Queues و Lambda و HTTP و Email/SMS. ادمج SNS → SQS عندما تريد Fanout + Queue موثوقة لكل مستهلك.

</details>

---

### 📤 Outbox Pattern

**Slug:** `msg-outbox` · **AR:** نمط Outbox

> Atomic "save + emit event" without 2PC  
> *حفظ + إرسال حدث ذرّيًا بدون 2PC*

#### ❓ The problem outbox solves

<sub>**AR:** المشكلة التي يحلها Outbox</sub>

**Answer (EN):**

"Update DB + publish event" is two systems — without coordination you risk DB committed but event lost, or event sent but DB rolled back. Without outbox, your business state and your event stream drift apart.

<details><summary>الإجابة بالعربي</summary>

"تحديث DB + نشر Event" نظامان — بدون تنسيق، إما DB Committed و Event ضائع، أو Event مُرسل و DB Rolled Back. بدون Outbox، حالة العمل وStream الأحداث يتباعدان.

</details>

---

#### ❓ How the outbox works

<sub>**AR:** كيف يعمل Outbox</sub>

**Answer (EN):**

In the same DB transaction that updates business state, insert a row into an `outbox` table. A separate **relay process** (or CDC via Debezium) reads the outbox and publishes to Kafka/RabbitMQ — at-least-once. Consumers must be idempotent.

<details><summary>الإجابة بالعربي</summary>

في نفس Transaction الذي يحدث حالة العمل، أدرج صفًا في جدول `outbox`. **Relay Process** مستقل (أو CDC عبر Debezium) يقرأ Outbox وينشر لـ Kafka/RabbitMQ — At-least-once. Consumers يجب أن يكونوا Idempotent.

</details>

```php
BEGIN;
  INSERT INTO orders (...) VALUES (...);
  INSERT INTO outbox (aggregate_id, type, payload)
    VALUES (?, 'OrderPlaced', ?);
COMMIT;

-- Relay job (every N seconds):
SELECT * FROM outbox WHERE published_at IS NULL ORDER BY id LIMIT 500;
-- publish to broker, then UPDATE published_at
```

---

#### ❓ Why not just publish inside the transaction?

<sub>**AR:** لماذا لا أنشر داخل Transaction مباشرة؟</sub>

**Answer (EN):**

The transaction may commit after the publish — or roll back after. Network calls inside a transaction also hold locks. Outbox decouples the two and never loses events.

<details><summary>الإجابة بالعربي</summary>

الـ Transaction قد يـ Commit بعد النشر أو Rollback بعده. النداءات الشبكية داخل Transaction تحبس Locks. Outbox يفصل الاثنين ولا يُضيع الأحداث أبدًا.

</details>

---

### 📥 Inbox Pattern

**Slug:** `msg-inbox` · **AR:** نمط Inbox

> Consumer-side idempotency for at-least-once  
> *Idempotency على جانب المستهلك*

#### ❓ What problem does Inbox solve?

<sub>**AR:** ما المشكلة التي يحلها Inbox؟</sub>

**Answer (EN):**

At-least-once delivery means consumers will see duplicates. The inbox table stores already-processed message IDs; processing first checks the inbox in the same transaction as the side effect.

<details><summary>الإجابة بالعربي</summary>

At-least-once تعني أن المستهلكين سيرون تكرارات. جدول Inbox يخزن IDs الرسائل المُعالجة؛ المعالجة تتحقق من Inbox في نفس Transaction مع التأثير الجانبي.

</details>

---

#### ❓ Inbox schema

<sub>**AR:** مخطط Inbox</sub>

**Answer (EN):**

Primary key on `message_id` (the broker's id, or a producer-supplied idempotency key). Insert fails on duplicate → skip processing.

<details><summary>الإجابة بالعربي</summary>

Primary Key على `message_id` (ID الـ Broker أو Idempotency Key من المنتج). Insert يفشل عند التكرار → تخطي المعالجة.

</details>

```php
BEGIN;
  INSERT INTO inbox (message_id) VALUES (?);  -- fails if dup
  -- the real work (e.g. UPDATE balances)
COMMIT;
```

---

#### ❓ Compare to producer-side exactly-once

<sub>**AR:** مقارنة بـ Exactly-once على Producer</sub>

**Answer (EN):**

Kafka exactly-once works inside Kafka — your DB side effect is still external. The Inbox extends the guarantee end-to-end into your DB. Cheap and portable across brokers.

<details><summary>الإجابة بالعربي</summary>

Exactly-once في Kafka يعمل داخل Kafka — تأثيرك على DB لا يزال خارجيًا. Inbox يمد الضمان End-to-End إلى DB. رخيص ومحمول عبر Brokers مختلفة.

</details>

---

### 📜 Event Sourcing

**Slug:** `msg-event-sourcing` · **AR:** Event Sourcing

> Persist events as source of truth; derive state  
> *حفظ الأحداث كمصدر للحقيقة واشتقاق الحالة*

#### ❓ What is Event Sourcing?

<sub>**AR:** ما هو Event Sourcing؟</sub>

**Answer (EN):**

Instead of storing current state, store the **sequence of events** that produced it. Current state is a fold over events. Get audit log for free, time-travel debugging, and natural fit with CQRS projections.

<details><summary>الإجابة بالعربي</summary>

بدلاً من تخزين الحالة الحالية، نخزن **سلسلة الأحداث** التي أنتجتها. الحالة الحالية = Fold على الأحداث. تحصل على Audit Log مجانًا، وتصحيح بالعودة الزمنية، وتكامل طبيعي مع CQRS Projections.

</details>

---

#### ❓ Snapshots

<sub>**AR:** Snapshots</sub>

**Answer (EN):**

Replaying thousands of events is slow. Periodically snapshot the aggregate state; on load, apply latest snapshot + events since.

<details><summary>الإجابة بالعربي</summary>

إعادة تشغيل آلاف الأحداث بطيء. خذ Snapshot دوريًا للحالة؛ عند التحميل طبّق آخر Snapshot + الأحداث التالية له.

</details>

---

#### ❓ When NOT to use Event Sourcing

<sub>**AR:** متى لا تستخدم Event Sourcing</sub>

**Answer (EN):**

Simple CRUD. Domains without natural events. Teams new to async/eventual consistency. The operational cost of versioned events + projections + replay tooling is real.

<details><summary>الإجابة بالعربي</summary>

CRUD بسيط. Domains بلا أحداث طبيعية. فرق جديدة على Async/Eventual Consistency. التكلفة التشغيلية لإصدارات الأحداث + Projections + أدوات Replay حقيقية.

</details>

---

## Part XIV — Microservices

<sub>الجزء الرابع عشر — Microservices</sub>

### 🔌 Circuit Breaker, Retry, Bulkhead

**Slug:** `ms-circuit-breaker` · **AR:** Circuit Breaker و Retry و Bulkhead

> Stability patterns for distributed calls  
> *أنماط الاستقرار للاستدعاءات الموزعة*

#### ❓ Circuit Breaker — the idea

<sub>**AR:** Circuit Breaker — الفكرة</sub>

**Answer (EN):**

A wrapper around a remote call with three states: **Closed** (calls pass), **Open** (calls fail fast), **Half-Open** (limited probes to test recovery). Stops cascading failure when a downstream is dying.

<details><summary>الإجابة بالعربي</summary>

غلاف حول استدعاء بعيد بثلاث حالات: **Closed** (الاستدعاءات تمر)، **Open** (فشل سريع)، **Half-Open** (تجارب محدودة لاختبار التعافي). يوقف التتالي عندما تموت Downstream.

</details>

---

#### ❓ Retry with exponential backoff + jitter

<sub>**AR:** Retry مع Exponential Backoff + Jitter</sub>

**Answer (EN):**

Retry transient errors only (5xx, timeouts, 429). Wait `min(cap, base × 2^attempt)` + random jitter to avoid synchronized retry storms. Always cap attempts (3–5). Never retry non-idempotent writes without an idempotency key.

<details><summary>الإجابة بالعربي</summary>

أعد المحاولة فقط على أخطاء عابرة (5xx, Timeouts, 429). انتظر `min(cap, base × 2^attempt)` + Jitter عشوائي لتجنب عواصف Retries المتزامنة. حدّ المحاولات (3-5). لا تُعد كتابة غير Idempotent بدون Idempotency Key.

</details>

```php
// Wait time per attempt (ms)
for ($i = 0; $i < 5; $i++) {
    try { return $client->call(); } catch (\Throwable $e) {
        if (!$transient($e)) throw $e;
        usleep(min(10_000_000, 100_000 * (2 ** $i)) + random_int(0, 100_000));
    }
}
throw new RetryExhaustedException();
```

---

#### ❓ Bulkhead pattern

<sub>**AR:** نمط Bulkhead</sub>

**Answer (EN):**

Like ship compartments — isolate pools of resources so a flood in one area doesn't sink the whole ship. Concretely: separate HTTP client / thread pool / DB connection pool per downstream so a slow service can't starve everyone else.

<details><summary>الإجابة بالعربي</summary>

مثل غرف السفينة — اعزل مجمعات الموارد حتى لا يُغرق فيضان في منطقة السفينة كلها. عمليًا: افصل HTTP Client / Thread Pool / DB Pool لكل Downstream حتى لا تجوّع خدمة بطيئة الجميع.

</details>

---

#### ❓ Timeouts and deadline propagation

<sub>**AR:** Timeouts و Deadline Propagation</sub>

**Answer (EN):**

Always set timeouts — the default in many libs is "forever". Better: **deadline propagation** — pass remaining time downstream so chained calls don't exceed the original budget. gRPC supports this natively; HTTP needs a header convention.

<details><summary>الإجابة بالعربي</summary>

اضبط Timeouts دائمًا — الافتراضي في كثير من المكتبات "للأبد". الأفضل: **Deadline Propagation** — مرّر الوقت المتبقي للأسفل حتى لا تتجاوز الاستدعاءات المتسلسلة الميزانية الأصلية. gRPC يدعمه أصلاً؛ HTTP يحتاج اتفاقًا على Header.

</details>

---

### 🚪 API Gateway

**Slug:** `ms-api-gateway` · **AR:** API Gateway

> Single entry point: auth, rate limit, routing  
> *نقطة دخول موحدة للـ Auth و Rate Limit و Routing*

#### ❓ What does an API gateway do?

<sub>**AR:** ماذا تفعل API Gateway؟</sub>

**Answer (EN):**

- TLS termination
- Authentication / authorization
- Rate limiting and quotas
- Request/response transformation
- Routing & load balancing to services
- Caching, request shaping
- Observability hooks (logs/metrics/traces)

<details><summary>الإجابة بالعربي</summary>

- إنهاء TLS
- Authentication / Authorization
- Rate Limiting و Quotas
- تحويل Request/Response
- Routing و Load Balancing
- Caching و تشكيل الطلب
- روابط Observability

</details>

---

#### ❓ Common API gateways

<sub>**AR:** Gateways شائعة</sub>

**Answer (EN):**

Cloud-managed: AWS API Gateway, GCP Cloud Endpoints, Azure APIM. OSS: **Kong**, **APISIX**, **Tyk**, **Envoy**+control plane. Service mesh ingress (Istio Gateway, Linkerd).

<details><summary>الإجابة بالعربي</summary>

Cloud-managed: AWS API Gateway و GCP Cloud Endpoints و Azure APIM. OSS: **Kong** و **APISIX** و **Tyk** و **Envoy** + Control Plane. Service Mesh Ingress (Istio Gateway, Linkerd).

</details>

---

#### ❓ BFF (Backend for Frontend)

<sub>**AR:** BFF (Backend for Frontend)</sub>

**Answer (EN):**

A small gateway per client type (web, iOS, Android). Each BFF tailors aggregation, fields, and pagination to its client. Decouples mobile release cycles from backend churn.

<details><summary>الإجابة بالعربي</summary>

Gateway صغير لكل نوع عميل (Web, iOS, Android). كل BFF يُكيّف التجميع والحقول والـ Pagination لعميله. يفصل دورات إصدار الموبايل عن تغييرات الـ Backend.

</details>

---

### 🕸 Service Mesh

**Slug:** `ms-service-mesh` · **AR:** Service Mesh

> Sidecars for mTLS, retries, traffic shaping  
> *Sidecars لـ mTLS و Retries و Traffic Shaping*

#### ❓ What is a service mesh?

<sub>**AR:** ما هي Service Mesh؟</sub>

**Answer (EN):**

Cross-cutting networking concerns moved out of app code into a **sidecar proxy** (Envoy/Linkerd-proxy) injected next to each pod. The mesh handles mTLS, retries, timeouts, traffic shifting, observability — your app keeps speaking plain HTTP.

<details><summary>الإجابة بالعربي</summary>

تنقل اهتمامات الشبكات المتقاطعة من كود التطبيق إلى **Sidecar Proxy** (Envoy/Linkerd-proxy) يُحقن بجانب كل Pod. الـ Mesh تتولى mTLS و Retries و Timeouts و Traffic Shifting و Observability — وتطبيقك يبقى يتحدث HTTP عاديًا.

</details>

---

#### ❓ Istio vs Linkerd vs Cilium

<sub>**AR:** Istio vs Linkerd vs Cilium</sub>

**Answer (EN):**

- **Istio:** most features, highest complexity.
- **Linkerd:** simpler, Rust proxy, opinionated.
- **Cilium Service Mesh:** eBPF-based, no sidecars, lower overhead.

<details><summary>الإجابة بالعربي</summary>

- **Istio:** أكثر مميزات وأعلى تعقيد.
- **Linkerd:** أبسط، Proxy بـ Rust، رأيي.
- **Cilium Service Mesh:** مبني على eBPF بلا Sidecars، Overhead أقل.

</details>

---

#### ❓ When NOT to use a mesh

<sub>**AR:** متى لا تستخدم Mesh</sub>

**Answer (EN):**

Few services, single language, simple traffic. The mesh adds operational complexity, CPU/latency overhead, and learning curve. Reach for one when you have many services in heterogeneous languages, or you need mTLS everywhere.

<details><summary>الإجابة بالعربي</summary>

قلة خدمات، لغة واحدة، Traffic بسيط. الـ Mesh تضيف تعقيدًا تشغيليًا و CPU/Latency Overhead ومنحنى تعلم. استخدمها عند تعدد الخدمات بلغات مختلفة أو الحاجة لـ mTLS في كل مكان.

</details>

---

### 🔄 gRPC vs REST vs GraphQL

**Slug:** `ms-grpc-rest-graphql` · **AR:** gRPC vs REST vs GraphQL

> When to pick which protocol  
> *متى تختار أيهم*

#### ❓ Quick comparison

<sub>**AR:** مقارنة سريعة</sub>

<table><tr><th> <th><th>REST</th><th>gRPC</th><th>GraphQL</th> <tr><tr><td>Transport</td><td>HTTP/1 or 2, JSON</td><td>HTTP/2, Protobuf</td><td>HTTP, JSON</td> <tr><tr><td>Schema</td><td>OpenAPI (optional)</td><td>.proto (mandatory)</td><td>SDL (mandatory)</td> <tr><tr><td>Streaming</td><td>SSE/WebSocket</td><td>Native bidi streaming</td><td>Subscriptions (ws)</td> <tr><tr><td>Best for</td><td>Public APIs, simple</td><td>Service-to-service</td><td>Aggregating views, mobile</td> <tr><tr><td>Browser support</td><td>Native</td><td>Needs gRPC-Web proxy</td><td>Native</td> <tr> <table>

<details><summary>تفاصيل بالعربي</summary>

<table><tr><th> <th><th>REST</th><th>gRPC</th><th>GraphQL</th> <tr><tr><td>النقل</td><td>HTTP/1 أو 2، JSON</td><td>HTTP/2، Protobuf</td><td>HTTP، JSON</td> <tr><tr><td>المخطط</td><td>OpenAPI (اختياري)</td><td>.proto (إلزامي)</td><td>SDL (إلزامي)</td> <tr><tr><td>Streaming</td><td>SSE/WebSocket</td><td>ثنائي الاتجاه أصلي</td><td>Subscriptions (ws)</td> <tr><tr><td>الأنسب لـ</td><td>APIs عامة</td><td>Service-to-service</td><td>تجميع للموبايل</td> <tr><tr><td>دعم المتصفح</td><td>أصلي</td><td>يحتاج gRPC-Web</td><td>أصلي</td> <tr> <table>

</details>

---

#### ❓ GraphQL pitfalls

<sub>**AR:** مخاطر GraphQL</sub>

**Answer (EN):**

- N+1 query explosion → use DataLoader/batching
- Query complexity attacks → impose depth/complexity limits
- Caching is harder (POST + variable queries)
- Field-level authorization is easy to get wrong

<details><summary>الإجابة بالعربي</summary>

- انفجار Queries من نوع N+1 → استخدم DataLoader/Batching
- هجمات Query Complexity → افرض حدودًا للعمق والتعقيد
- Caching أصعب (POST + متغيرات)
- Field-level Authorization سهل أن يخطئ فيه المرء

</details>

---

#### ❓ gRPC strengths

<sub>**AR:** نقاط قوة gRPC</sub>

**Answer (EN):**

Binary Protobuf is smaller/faster. Code generation in many languages. Bidirectional streaming. Strongly typed. Pairs well with service mesh. Best for internal service-to-service calls.

<details><summary>الإجابة بالعربي</summary>

Protobuf Binary أصغر وأسرع. توليد كود لعدة لغات. Bidirectional Streaming. Typed بقوة. يتكامل مع Service Mesh. الأفضل للنداءات الداخلية بين الخدمات.

</details>

---

### 🏷 API Versioning

**Slug:** `ms-api-versioning` · **AR:** API Versioning

> Strategies and backwards-compatibility rules  
> *الاستراتيجيات وقواعد التوافق للخلف*

#### ❓ Strategies

<sub>**AR:** الاستراتيجيات</sub>

**Answer (EN):**

- **URI:** `/v1/users` — most common, easy to route
- **Header:** `Accept: application/vnd.api+json;v=2` — clean URLs, harder to debug
- **Query string:** `?v=2` — easy but messy

<details><summary>الإجابة بالعربي</summary>

- **URI:** `/v1/users` — الأشهر، سهل التوجيه
- **Header:** `Accept: application/vnd.api+json;v=2` — URLs نظيفة، أصعب في التصحيح
- **Query String:** `?v=2` — سهل لكن غير أنيق

</details>

---

#### ❓ Non-breaking vs breaking changes

<sub>**AR:** تغييرات Non-breaking vs Breaking</sub>

**Answer (EN):**

**Safe (additive):** new field, new optional query param, new endpoint, new enum value if client treats unknowns as default. **Breaking:** remove field, rename field, tighten validation, change types, change error codes.

<details><summary>الإجابة بالعربي</summary>

**آمنة (إضافية):** حقل جديد، Query Param اختياري، Endpoint جديد، Enum Value جديد إذا كان العميل يعامل المجهول كافتراضي. **كاسرة:** حذف حقل، إعادة تسمية، تشديد Validation، تغيير أنواع، تغيير أكواد الأخطاء.

</details>

---

#### ❓ Deprecation lifecycle

<sub>**AR:** دورة حياة الـ Deprecation</sub>

**Answer (EN):**

Announce → return `Deprecation`/`Sunset` headers → log usage to identify callers → contact them → enforce removal after agreed window (6–12 months for public APIs).

<details><summary>الإجابة بالعربي</summary>

أعلن → أرسل Headers `Deprecation`/`Sunset` → سجّل الاستخدام لتعرف من يتصل → تواصل معهم → فرض الإزالة بعد نافذة متفق عليها (6-12 شهرًا للـ APIs العامة).

</details>

---

## Part XV — Kubernetes & Cloud

<sub>الجزء الخامس عشر — Kubernetes و Cloud</sub>

### ☸️ Kubernetes Core Concepts

**Slug:** `k8s-basics` · **AR:** مفاهيم Kubernetes الأساسية

> Pods, Deployments, Services, Ingress, ConfigMaps  
> *Pods و Deployments و Services و Ingress و ConfigMaps*

#### ❓ What is Kubernetes in one paragraph?

<sub>**AR:** ما هو Kubernetes في فقرة؟</sub>

**Answer (EN):**

A declarative container orchestrator. You describe the desired state (YAML); the control plane runs **reconciliation loops** to make actual state match. Self-healing, autoscaling, rolling updates come from this loop.

<details><summary>الإجابة بالعربي</summary>

منسق Containers تصريحي. تصف الحالة المرغوبة (YAML)؛ Control Plane يُشغّل **Reconciliation Loops** لمطابقة الحالة الفعلية. Self-healing و Autoscaling و Rolling Updates يأتون من هذه الحلقة.

</details>

---

#### ❓ Pod vs Deployment vs ReplicaSet

<sub>**AR:** Pod vs Deployment vs ReplicaSet</sub>

**Answer (EN):**

**Pod:** smallest deployable — one or more containers sharing network and volumes. **ReplicaSet:** keeps N pod copies alive. **Deployment:** manages ReplicaSets for rolling updates and rollbacks. You write Deployments, never bare Pods.

<details><summary>الإجابة بالعربي</summary>

**Pod:** أصغر وحدة نشر — Container واحد أو أكثر يتشاركون الشبكة والـ Volumes. **ReplicaSet:** يحافظ على N نسخة Pod حية. **Deployment:** يدير ReplicaSets للـ Rolling Updates و Rollback. تكتب Deployments لا Pods مباشرة.

</details>

---

#### ❓ Service vs Ingress

<sub>**AR:** Service vs Ingress</sub>

**Answer (EN):**

- **Service:** stable virtual IP + DNS for a set of pods. Types: ClusterIP (internal), NodePort, LoadBalancer.
- **Ingress:** L7 HTTP router with host/path rules and TLS. Needs an Ingress Controller (nginx, Traefik, etc.).
- **Gateway API:** modern replacement for Ingress.

<details><summary>الإجابة بالعربي</summary>

- **Service:** IP و DNS ثابت لمجموعة Pods. الأنواع: ClusterIP و NodePort و LoadBalancer.
- **Ingress:** Router HTTP بمستوى L7 بقواعد Host/Path و TLS. يحتاج Ingress Controller (nginx, Traefik).
- **Gateway API:** البديل الحديث لـ Ingress.

</details>

---

#### ❓ ConfigMap vs Secret

<sub>**AR:** ConfigMap vs Secret</sub>

**Answer (EN):**

Both inject config into pods. **ConfigMap:** plaintext. **Secret:** base64 (not encryption!) — enable encryption at rest in etcd; better, integrate an external secret store (External Secrets Operator → AWS/Vault).

<details><summary>الإجابة بالعربي</summary>

كلاهما يحقن Config في Pods. **ConfigMap:** نص خام. **Secret:** base64 (ليس تشفيرًا!) — فعّل تشفير في etcd at rest؛ أو الأفضل، اربط External Secrets Operator مع AWS/Vault.

</details>

---

#### ❓ StatefulSet vs Deployment

<sub>**AR:** StatefulSet vs Deployment</sub>

**Answer (EN):**

Use a **StatefulSet** when pods need stable identity, ordered rollout, and persistent storage per pod (DBs, Kafka, Elasticsearch). Otherwise use a Deployment.

<details><summary>الإجابة بالعربي</summary>

استخدم **StatefulSet** عندما تحتاج Pods لهوية مستقرة وترتيب نشر و Persistent Storage لكل Pod (DBs, Kafka, Elasticsearch). غير ذلك استخدم Deployment.

</details>

---

#### ❓ Liveness, Readiness, Startup probes

<sub>**AR:** Liveness و Readiness و Startup Probes</sub>

**Answer (EN):**

- **Liveness:** if it fails, kubelet restarts the pod.
- **Readiness:** if it fails, pod is removed from Service endpoints — but not restarted.
- **Startup:** for slow-booting apps; disables liveness until startup succeeds.

<details><summary>الإجابة بالعربي</summary>

- **Liveness:** فشلها يُعيد تشغيل Pod.
- **Readiness:** فشلها يُزيل Pod من Service لكن لا يُعيد تشغيله.
- **Startup:** لتطبيقات بطيئة البدء؛ يُعطّل Liveness حتى ينجح Startup.

</details>

> ✔️ **Senior tip:** A common bug: using the same endpoint for liveness and readiness — DB outage makes readiness fail (good) AND liveness fail (kill cascade).
>
> ✔️ **نصيحة Senior:** خطأ شائع: استخدام نفس Endpoint للـ Liveness و Readiness — تعطل DB يُفشل Readiness (جيد) و Liveness (كارثة Cascade Kill).

---

### 🐛 K8s Debugging — the famous statuses

**Slug:** `k8s-debugging` · **AR:** تصحيح K8s — الحالات الشهيرة

> CrashLoopBackOff, OOMKilled, ImagePullBackOff  
> *CrashLoopBackOff و OOMKilled و ImagePullBackOff*

#### ❓ CrashLoopBackOff

<sub>**AR:** CrashLoopBackOff</sub>

**Answer (EN):**

The container keeps exiting and kubelet keeps restarting it with exponential backoff. Debug: `kubectl logs <pod> --previous`, `kubectl describe pod`, check `command`/`args`, check env vars and secrets exist, check liveness probe.

<details><summary>الإجابة بالعربي</summary>

الـ Container يخرج باستمرار و kubelet يُعيد تشغيله بـ Backoff متزايد. صحّح: `kubectl logs <pod> --previous`، `kubectl describe pod`، تحقق من `command`/`args` ومتغيرات البيئة و Secrets و Liveness Probe.

</details>

---

#### ❓ OOMKilled

<sub>**AR:** OOMKilled</sub>

**Answer (EN):**

Container exceeded its memory limit and was killed by the kernel OOM-killer. Fix: raise limit, or fix a leak. Check `kubectl describe pod` for `Last State: OOMKilled`. Watch `container_memory_working_set_bytes` over time.

<details><summary>الإجابة بالعربي</summary>

تجاوز الـ Container حد الذاكرة وقتله OOM-killer. الحل: ارفع الحد أو أصلح Leak. تحقق من `kubectl describe pod` لرؤية `Last State: OOMKilled`. راقب `container_memory_working_set_bytes` بمرور الوقت.

</details>

---

#### ❓ ImagePullBackOff / ErrImagePull

<sub>**AR:** ImagePullBackOff / ErrImagePull</sub>

**Answer (EN):**

Can't pull the image. Causes: typo in tag, missing imagePullSecret for private registry, registry down, node has no network, image arch mismatch (arm64 vs amd64).

<details><summary>الإجابة بالعربي</summary>

لا يستطيع جلب Image. الأسباب: خطأ مطبعي في Tag، imagePullSecret مفقود للـ Private Registry، Registry معطل، Node بلا شبكة، عدم تطابق المعمارية (arm64 vs amd64).

</details>

---

#### ❓ Pending / Unschedulable

<sub>**AR:** Pending / Unschedulable</sub>

**Answer (EN):**

The scheduler can't place the pod. `kubectl describe pod` reveals why: insufficient CPU/memory on all nodes, no node matches `nodeSelector`/affinity, taints without matching tolerations, PVC unbound.

<details><summary>الإجابة بالعربي</summary>

الـ Scheduler لا يستطيع وضع Pod. `kubectl describe pod` يكشف السبب: موارد غير كافية على كل Nodes، لا Node يطابق `nodeSelector`/Affinity، Taints بلا Tolerations مطابقة، PVC غير مربوط.

</details>

---

#### ❓ Resource requests vs limits

<sub>**AR:** Requests vs Limits</sub>

**Answer (EN):**

**Request:** guaranteed allocation (used by scheduler). **Limit:** hard cap (enforced by cgroups). CPU over-limit → throttled; memory over-limit → killed. Set both; set them based on real observations, not guesses.

<details><summary>الإجابة بالعربي</summary>

**Request:** تخصيص مضمون (يستخدمه Scheduler). **Limit:** حد أقصى صارم (يفرضه cgroups). تجاوز CPU → Throttle؛ تجاوز Memory → قتل. اضبط الاثنين بناءً على ملاحظات حقيقية لا تخمين.

</details>

---

### ⛵ Helm & GitOps

**Slug:** `k8s-helm-gitops` · **AR:** Helm و GitOps

> Package management + Git-driven delivery  
> *إدارة الباكدج + توصيل من Git*

#### ❓ Helm in one line

<sub>**AR:** Helm في سطر</sub>

**Answer (EN):**

The package manager for Kubernetes. A **chart** = templated YAML + a `values.yaml` for inputs; `helm install/upgrade/rollback` manages releases.

<details><summary>الإجابة بالعربي</summary>

مدير الباكدج لـ Kubernetes. الـ **Chart** = YAML بقوالب + `values.yaml` للمدخلات؛ `helm install/upgrade/rollback` يدير الـ Releases.

</details>

---

#### ❓ Kustomize vs Helm

<sub>**AR:** Kustomize vs Helm</sub>

**Answer (EN):**

**Kustomize:** overlay-based, no templating, native to `kubectl`. Best for small variant differences (prod vs staging). **Helm:** full templating, package-distribution model. Best for reusable third-party software.

<details><summary>الإجابة بالعربي</summary>

**Kustomize:** Overlays بدون قوالب، أصلي في `kubectl`. الأفضل لاختلافات بسيطة (prod vs staging). **Helm:** قوالب كاملة وتوزيع كباكدج. الأفضل للبرمجيات الخارجية القابلة لإعادة الاستخدام.

</details>

---

#### ❓ What is GitOps?

<sub>**AR:** ما هو GitOps؟</sub>

**Answer (EN):**

Git is the single source of truth for desired cluster state. A controller (**Argo CD**, **Flux**) running in-cluster watches the repo and reconciles. Benefits: auditable history, easy rollback (revert commit), separation of CI (build) and CD (deploy).

<details><summary>الإجابة بالعربي</summary>

Git هو مصدر الحقيقة الوحيد للحالة المرغوبة. Controller (**Argo CD** أو **Flux**) داخل الـ Cluster يراقب الـ Repo ويُصالح الحالة. الفوائد: تاريخ قابل للتدقيق، Rollback سهل (Revert commit)، فصل CI (Build) عن CD (Deploy).

</details>

---

### ☁️ AWS Core for Backend Engineers

**Slug:** `cloud-aws-core` · **AR:** AWS الأساسي للـ Backend

> EC2, S3, RDS, ECS/EKS, Lambda, IAM  
> *EC2 و S3 و RDS و ECS/EKS و Lambda و IAM*

#### ❓ Compute options summary

<sub>**AR:** خيارات الحوسبة</sub>

**Answer (EN):**

- **EC2:** raw VMs — most control, most ops
- **ECS:** AWS-managed container orchestration
- **EKS:** managed Kubernetes
- **Fargate:** serverless containers (ECS/EKS without managing nodes)
- **Lambda:** serverless functions — sub-second invocations, 15-min max
- **App Runner / Elastic Beanstalk:** PaaS for simple apps

<details><summary>الإجابة بالعربي</summary>

- **EC2:** VMs خام
- **ECS:** Containers مُدارة من AWS
- **EKS:** Kubernetes مُدار
- **Fargate:** Containers Serverless
- **Lambda:** Functions Serverless — حتى 15 دقيقة
- **App Runner / Beanstalk:** PaaS للتطبيقات البسيطة

</details>

---

#### ❓ S3 must-knows

<sub>**AR:** أساسيات S3</sub>

**Answer (EN):**

- Object storage, 11×9 durability across multi-AZ
- **Presigned URLs** for direct uploads/downloads — never proxy bytes through your app
- **Storage classes:** Standard / IA / Glacier — lifecycle rules transition automatically
- Strong read-after-write consistency since 2020
- Versioning + Object Lock for tamper-proof storage
- Default-deny is the only sane bucket policy starting point

<details><summary>الإجابة بالعربي</summary>

- تخزين Objects بصلابة 11x9 عبر Multi-AZ
- **Presigned URLs** للرفع/التحميل المباشر — لا تمرّر البيانات عبر تطبيقك
- **Storage Classes:** Standard / IA / Glacier — Lifecycle ينقل تلقائيًا
- Strong Read-after-write Consistency منذ 2020
- Versioning + Object Lock للتخزين غير القابل للعبث
- Default-Deny هو نقطة البدء الوحيدة العاقلة

</details>

---

#### ❓ IAM principles

<sub>**AR:** مبادئ IAM</sub>

**Answer (EN):**

- **Roles, not access keys** — IAM Roles for EC2/EKS/Lambda; OIDC for CI
- **Least privilege** — start with deny, add scoped permissions
- **Per-environment accounts** in an AWS Organization
- Use SCPs to put non-negotiable guardrails on accounts
- Never hardcode access keys

<details><summary>الإجابة بالعربي</summary>

- **Roles لا Access Keys** — IAM Roles لـ EC2/EKS/Lambda؛ OIDC للـ CI
- **أقل صلاحيات** — ابدأ بـ Deny ثم أضف بحذر
- **حساب لكل بيئة** في AWS Organization
- استخدم SCPs لحواجز إلزامية
- لا تُضع Access Keys في الكود أبدًا

</details>

---

#### ❓ VPC essentials

<sub>**AR:** أساسيات VPC</sub>

**Answer (EN):**

Private network with public + private subnets across AZs. **NAT Gateway** for outbound from private subnets. **Security Groups** are stateful instance-level firewalls. **NACLs** are stateless subnet-level firewalls.

<details><summary>الإجابة بالعربي</summary>

شبكة خاصة بـ Subnets عامة وخاصة عبر AZs. **NAT Gateway** للخروج من Subnets الخاصة. **Security Groups** جدران Stateful على مستوى Instance. **NACLs** Stateless على مستوى Subnet.

</details>

---

## Part XVI — Networking

<sub>الجزء السادس عشر — الشبكات</sub>

### 🌐 HTTP/1.1 vs HTTP/2 vs HTTP/3

**Slug:** `net-http` · **AR:** HTTP/1.1 vs HTTP/2 vs HTTP/3

> Multiplexing, head-of-line blocking, QUIC  
> *Multiplexing و HoL Blocking و QUIC*

#### ❓ HTTP/1.1 limitations

<sub>**AR:** حدود HTTP/1.1</sub>

**Answer (EN):**

One in-flight request per TCP connection (pipelining never worked in practice). Browsers open 6 connections per origin. Result: **head-of-line blocking**, slow page loads, lots of TCP overhead.

<details><summary>الإجابة بالعربي</summary>

طلب واحد في الـ Flight لكل اتصال TCP (Pipelining لم ينجح عمليًا). المتصفحات تفتح 6 اتصالات لكل Origin. النتيجة: **HoL Blocking**، تحميل صفحات بطيء، Overhead كثيف لـ TCP.

</details>

---

#### ❓ HTTP/2 improvements

<sub>**AR:** تحسينات HTTP/2</sub>

**Answer (EN):**

- **Multiplexing:** many streams per TCP connection
- **HPACK header compression**
- **Server push** (now deprecated by browsers)
- Still vulnerable to TCP-level head-of-line blocking — a lost packet stalls all streams

<details><summary>الإجابة بالعربي</summary>

- **Multiplexing:** عدة Streams على اتصال TCP واحد
- **HPACK ضغط Headers**
- **Server Push** (هُجر الآن)
- لا يزال يعاني من HoL على مستوى TCP — حزمة ضائعة تعطل كل Streams

</details>

---

#### ❓ HTTP/3 + QUIC

<sub>**AR:** HTTP/3 + QUIC</sub>

**Answer (EN):**

HTTP/3 runs over **QUIC** (UDP). Streams are independent → no TCP-level HoL. 0-RTT handshake for resumed connections. Connection survives IP changes (great for mobile). TLS 1.3 is built in.

<details><summary>الإجابة بالعربي</summary>

HTTP/3 يعمل فوق **QUIC** (UDP). الـ Streams مستقلة → لا HoL على مستوى TCP. مصافحة 0-RTT للاتصالات المستأنفة. الاتصال يصمد عند تغير IP (ممتاز للموبايل). TLS 1.3 مدمج.

</details>

---

#### ❓ How do I serve HTTP/3 today?

<sub>**AR:** كيف أقدم HTTP/3 اليوم؟</sub>

**Answer (EN):**

**Caddy**, **nginx ≥1.25**, **FrankenPHP**, **Cloudflare** all support it. Browsers auto-upgrade via the `Alt-Svc` header. Most of the work is configuration; your PHP code doesn't change.

<details><summary>الإجابة بالعربي</summary>

**Caddy** و **nginx ≥1.25** و **FrankenPHP** و **Cloudflare** كلها تدعمه. المتصفحات تتطور تلقائيًا عبر Header الـ `Alt-Svc`. معظم العمل إعدادات؛ كود PHP لا يتغير.

</details>

---

### 🔐 TLS, DNS, CDN essentials

**Slug:** `net-tls-dns-cdn` · **AR:** أساسيات TLS و DNS و CDN

> Handshake, DNS resolution, CDN cache invalidation  
> *المصافحة، حل DNS، إبطال Cache في CDN*

#### ❓ TLS 1.3 handshake summary

<sub>**AR:** ملخص مصافحة TLS 1.3</sub>

**Answer (EN):**

1-RTT: ClientHello (with key share) → ServerHello + certificate + Finished → Client Finished + application data. Resumed sessions can do 0-RTT (with replay-attack tradeoffs).

<details><summary>الإجابة بالعربي</summary>

1-RTT: ClientHello (مع Key Share) → ServerHello + Certificate + Finished → Client Finished + بيانات. الاتصالات المستأنفة يمكنها 0-RTT (مع مقايضات Replay-attack).

</details>

---

#### ❓ DNS in production

<sub>**AR:** DNS في الإنتاج</sub>

**Answer (EN):**

- Use short TTLs (60-300s) for things you might fail over
- Use long TTLs (24h+) for stable records — reduces query load
- **DNS caching at the resolver** can hide outages for hours; engineers underestimate this
- **Multi-value records** + health checks (Route 53) for client-side load balancing
- **CNAME at the apex** isn't valid → use ALIAS / ANAME records

<details><summary>الإجابة بالعربي</summary>

- استخدم TTLs قصيرة (60-300 ث) للسجلات القابلة للـ Failover
- طويلة (24h+) للمستقرة
- **DNS Caching عند Resolver** قد يُخفي أعطالاً لساعات
- **Multi-value Records** + Health Checks للـ LB من الـ Client
- **CNAME عند Apex** غير صالح → استخدم ALIAS / ANAME

</details>

---

#### ❓ CDN cache layers

<sub>**AR:** طبقات Cache في CDN</sub>

**Answer (EN):**

Browser → Edge POP → Mid-tier → Origin Shield → Origin. Each layer can cache. Use `Cache-Control: s-maxage` for CDN-only TTL, `stale-while-revalidate` for warm fallback, and a deterministic **cache key** (no random query strings).

<details><summary>الإجابة بالعربي</summary>

Browser → Edge POP → Mid-tier → Origin Shield → Origin. كل طبقة قد تُعمل Cache. استخدم `Cache-Control: s-maxage` للـ CDN فقط، `stale-while-revalidate` للـ Fallback الدافئ، و **Cache Key** ثابت (بدون Query Strings عشوائية).

</details>

---

#### ❓ Cache invalidation strategies

<sub>**AR:** استراتيجيات إبطال الـ Cache</sub>

**Answer (EN):**

1. **Versioned URLs** (`/app.v17.js`) — best, immutable
2. **Surrogate keys / tags** (Fastly, Varnish) — purge by tag on data change
3. **Explicit purge API** — last resort, slow + costly

<details><summary>الإجابة بالعربي</summary>

1. **URLs بإصدار** (`/app.v17.js`) — الأفضل وغير قابل للتغيير
2. **Surrogate Keys / Tags** (Fastly, Varnish) — Purge بالـ Tag عند تغير البيانات
3. **API Purge صريح** — كملاذ أخير، بطيء ومكلف

</details>

---

### ⚡ WebSocket vs SSE vs Long Polling

**Slug:** `net-realtime` · **AR:** WebSocket vs SSE vs Long Polling

> Real-time options compared  
> *خيارات الـ Real-time مقارنة*

#### ❓ Quick comparison

<sub>**AR:** مقارنة سريعة</sub>

<table><tr><th> <th><th>Long Polling</th><th>SSE</th><th>WebSocket</th> <tr><tr><td>Direction</td><td>Client→Server (one shot at a time)</td><td>Server→Client only</td><td>Bi-directional</td> <tr><tr><td>Protocol</td><td>HTTP</td><td>HTTP (text/event-stream)</td><td>ws:// (HTTP upgrade)</td> <tr><tr><td>Reconnect</td><td>Manual</td><td>Automatic</td><td>Manual</td> <tr><tr><td>Browser support</td><td>Universal</td><td>All except old IE</td><td>Universal</td> <tr><tr><td>Best for</td><td>Quick fix, legacy</td><td>Notifications, stock prices, server logs</td><td>Chats, games, collaborative editing</td> <tr> <table>

<details><summary>تفاصيل بالعربي</summary>

<table><tr><th> <th><th>Long Polling</th><th>SSE</th><th>WebSocket</th> <tr><tr><td>الاتجاه</td><td>Client→Server</td><td>Server→Client فقط</td><td>ثنائي الاتجاه</td> <tr><tr><td>البروتوكول</td><td>HTTP</td><td>HTTP (text/event-stream)</td><td>ws:// (HTTP Upgrade)</td> <tr><tr><td>إعادة الاتصال</td><td>يدوي</td><td>تلقائي</td><td>يدوي</td> <tr><tr><td>دعم المتصفح</td><td>عام</td><td>كل المتصفحات تقريبًا</td><td>عام</td> <tr><tr><td>الأنسب لـ</td><td>إصلاح سريع</td><td>إشعارات وأسعار وLogs</td><td>محادثات وألعاب وتحرير تشاركي</td> <tr> <table>

</details>

---

#### ❓ When SSE beats WebSocket

<sub>**AR:** متى SSE أفضل من WebSocket</sub>

**Answer (EN):**

Server-pushed, one-way streams (notifications, dashboards, AI token streaming). SSE works through plain HTTP/2, supports auto-reconnect with `Last-Event-ID`, and is dead-simple in browsers (`EventSource`).

<details><summary>الإجابة بالعربي</summary>

Streams من السيرفر بـ اتجاه واحد (إشعارات، Dashboards، Streaming Tokens من LLM). SSE يعمل عبر HTTP/2 عادي، يدعم إعادة الاتصال تلقائيًا مع `Last-Event-ID`، وبسيط جدًا في المتصفح (`EventSource`).

</details>

---

#### ❓ WebSocket scaling concerns

<sub>**AR:** تحديات Scaling لـ WebSocket</sub>

**Answer (EN):**

Persistent connections = stateful. Need sticky sessions or a pub/sub layer (Redis pub/sub, NATS, Kafka) so any node can fan out to any subscriber. Plan for **file descriptors**, **ephemeral port exhaustion**, and **graceful drain** on deploy.

<details><summary>الإجابة بالعربي</summary>

اتصالات مستمرة = Stateful. تحتاج Sticky Sessions أو طبقة Pub/Sub (Redis Pub/Sub, NATS, Kafka) حتى يستطيع أي Node Fan-out لأي مشترك. خطط لـ **File Descriptors** و **Ephemeral Port Exhaustion** و **Graceful Drain** عند النشر.

</details>

---

## Part XVII — Modern Data

<sub>الجزء السابع عشر — البيانات الحديثة</sub>

### 🗂 NoSQL Overview

**Slug:** `data-nosql-overview` · **AR:** نظرة عامة على NoSQL

> Document, key-value, wide-column, graph  
> *Document و Key-Value و Wide-Column و Graph*

#### ❓ The four NoSQL families

<sub>**AR:** عائلات NoSQL الأربع</sub>

**Answer (EN):**

- **Key-value** (Redis, DynamoDB, RocksDB) — simplest, fastest, no querying inside the value
- **Document** (MongoDB, CouchDB) — JSON with secondary indexes
- **Wide-column** (Cassandra, ScyllaDB, BigTable) — denormalized rows partitioned by key, designed for write throughput
- **Graph** (Neo4j, ArangoDB) — nodes + edges with relationship-first queries

<details><summary>الإجابة بالعربي</summary>

- **Key-value** (Redis, DynamoDB) — الأبسط والأسرع، بلا استعلام داخل القيمة
- **Document** (MongoDB, CouchDB) — JSON بفهارس ثانوية
- **Wide-column** (Cassandra, ScyllaDB, BigTable) — صفوف Denormalized مُقسّمة بالـ Key، مصمم لـ Write Throughput
- **Graph** (Neo4j) — Nodes + Edges بقدرات Relationship-first

</details>

---

#### ❓ When NoSQL beats SQL

<sub>**AR:** متى NoSQL أفضل من SQL</sub>

**Answer (EN):**

- Access patterns known in advance and limited
- Massive horizontal scale with low-cost writes
- Wide-range geo distribution
- Schema-flexible documents (events, logs)

Default to Postgres until you have a concrete reason — most teams that picked NoSQL early regretted it.

<details><summary>الإجابة بالعربي</summary>

- أنماط الوصول معروفة مسبقًا ومحدودة
- توسع أفقي ضخم بكلفة كتابة منخفضة
- توزيع جغرافي عالمي
- Documents مرنة المخطط (Events, Logs)

افتراضيًا اختر Postgres حتى يكون لديك سبب محدد — معظم من اختاروا NoSQL مبكرًا ندموا.

</details>

---

### 🍃 MongoDB

**Slug:** `data-mongodb` · **AR:** MongoDB

> Documents, embed vs reference, sharding  
> *Documents و Embed vs Reference و Sharding*

#### ❓ Embed vs reference

<sub>**AR:** Embed vs Reference</sub>

**Answer (EN):**

**Embed** when you fetch the parent and child together, the child has no independent lifecycle, and array size is bounded. **Reference** when the child is queried independently, large/unbounded, or shared across parents.

<details><summary>الإجابة بالعربي</summary>

**Embed** عندما تجلب الأب والابن معًا، والابن بلا دورة حياة مستقلة، وحجم Array محدود. **Reference** عندما يُستعلم عن الابن مستقلاً، أو حجمه كبير/غير محدود، أو مشترك بين آباء متعددين.

</details>

---

#### ❓ Indexes and the 1KB limit

<sub>**AR:** الفهارس وحد 1KB</sub>

**Answer (EN):**

Single-field, compound, multikey (on arrays), text, geospatial, partial, TTL (auto-delete by time). Indexed value limit is ~1KB per entry. Compound index follows the same leftmost-prefix rule as SQL.

<details><summary>الإجابة بالعربي</summary>

Single-field و Compound و Multikey (على Arrays) و Text و Geospatial و Partial و TTL (حذف تلقائي بالزمن). حد القيمة المفهرسة ~1KB لكل Entry. Compound يتبع نفس قاعدة Leftmost Prefix.

</details>

---

#### ❓ Replica sets and sharding

<sub>**AR:** Replica Sets و Sharding</sub>

**Answer (EN):**

A replica set = primary + secondaries with automatic failover. Sharding splits data by a **shard key** across many replica sets. Pick the shard key carefully — bad choices create hot partitions.

<details><summary>الإجابة بالعربي</summary>

Replica Set = Primary + Secondaries مع Failover تلقائي. Sharding يُقسّم البيانات بـ **Shard Key** عبر Replica Sets. اختر Shard Key بحذر — اختيارات سيئة تُنتج Hot Partitions.

</details>

---

#### ❓ Transactions in MongoDB

<sub>**AR:** Transactions في MongoDB</sub>

**Answer (EN):**

Multi-document ACID transactions are supported since 4.0. But they're slower and contention-prone — design schemas to keep related data in one document and avoid needing transactions in the first place.

<details><summary>الإجابة بالعربي</summary>

Transactions ACID متعددة الـ Documents مدعومة منذ 4.0. لكنها أبطأ وعرضة لـ Contention — صمم Schemas بحيث تبقى البيانات المرتبطة في Document واحد وتجنب الحاجة لها أصلاً.

</details>

---

### ⚡ DynamoDB & Single-Table Design

**Slug:** `data-dynamodb` · **AR:** DynamoDB و Single-Table Design

> PK/SK, access patterns, GSI  
> *PK/SK وأنماط الوصول و GSI*

#### ❓ Why single-table?

<sub>**AR:** لماذا Single-Table؟</sub>

**Answer (EN):**

DynamoDB is fast only when you fetch by partition+sort key. Cross-table joins don't exist. Putting all entities in one table lets you query related items with a single `Query` (e.g. user + their orders).

<details><summary>الإجابة بالعربي</summary>

DynamoDB سريع فقط عند الجلب بـ Partition + Sort Key. لا يوجد Joins بين Tables. وضع كل الكيانات في جدول واحد يسمح بجلب عناصر مرتبطة في `Query` واحد (المستخدم + طلباته).

</details>

---

#### ❓ PK / SK pattern

<sub>**AR:** نمط PK / SK</sub>

**Answer (EN):**

**Partition key** distributes data; **Sort key** orders within a partition and enables `begins_with`/range queries. Common: `USER#123` + `PROFILE` / `ORDER#2026-01-01` / `ADDRESS#shipping`.

<details><summary>الإجابة بالعربي</summary>

**Partition Key** يوزع البيانات؛ **Sort Key** يُرتب داخل Partition ويُمكّن استعلامات `begins_with`/Range. شائع: `USER#123` + `PROFILE` / `ORDER#2026-01-01`.

</details>

---

#### ❓ Global Secondary Index (GSI)

<sub>**AR:** GSI</sub>

**Answer (EN):**

A different PK/SK over the same data — enables alternative access patterns. Eventually consistent by default. Add one per access pattern; cost grows accordingly.

<details><summary>الإجابة بالعربي</summary>

PK/SK مختلفان على نفس البيانات — يُمكنان أنماط وصول بديلة. Eventually Consistent افتراضيًا. أضف واحدًا لكل نمط وصول؛ التكلفة ترتفع.

</details>

---

#### ❓ Hot partitions

<sub>**AR:** Hot Partitions</sub>

**Answer (EN):**

A partition key getting disproportionate traffic gets throttled even if your table's overall capacity is high. Fix: distribute via salts (`USER#123#0..9`) or rethink the key.

<details><summary>الإجابة بالعربي</summary>

Partition Key يحصل على Traffic مفرط يُخنق حتى لو سعة الجدول الكلية عالية. الحل: وزّع عبر Salts (`USER#123#0..9`) أو أعد التفكير في Key.

</details>

---

### 🔎 Elasticsearch / OpenSearch

**Slug:** `data-elasticsearch` · **AR:** Elasticsearch / OpenSearch

> Search index, mapping, analyzers, relevance  
> *فهرس البحث والـ Mapping والـ Analyzers والـ Relevance*

#### ❓ Inverted index — the core idea

<sub>**AR:** Inverted Index — الفكرة الأساسية</sub>

**Answer (EN):**

Tokenize documents into terms; for each term store the postings list (which documents contain it, where). Queries do set operations over postings.

<details><summary>الإجابة بالعربي</summary>

قسّم الـ Documents لـ Terms؛ لكل Term خزّن Postings List (أي Documents تحتوي عليه وأين). الاستعلامات تجري عمليات مجموعات على Postings.

</details>

---

#### ❓ Mapping & analyzers

<sub>**AR:** Mapping و Analyzers</sub>

**Answer (EN):**

The mapping declares field types and which analyzer tokenizes them. **Standard, English, Arabic** analyzers handle language quirks. **Keyword** fields are not analyzed — for exact match, sorting, aggregations.

<details><summary>الإجابة بالعربي</summary>

الـ Mapping يحدد أنواع الحقول و Analyzer لكل واحد. **Standard و English و Arabic** Analyzers تتعامل مع خصوصيات اللغة. الحقول **keyword** لا تُحلل — للمطابقة الدقيقة والترتيب والـ Aggregations.

</details>

---

#### ❓ Relevance — BM25 in one line

<sub>**AR:** Relevance — BM25 في سطر</sub>

**Answer (EN):**

The default scoring: rewards matching terms (TF), discounts common terms (IDF), normalizes by document length. **function_score** blends business signals (recency, popularity) with relevance.

<details><summary>الإجابة بالعربي</summary>

التقييم الافتراضي: يكافئ مطابقة Terms (TF)، يخصم Terms الشائعة (IDF)، يُسوّي بحجم Document. **function_score** يدمج إشارات العمل (الحداثة، الشعبية) مع Relevance.

</details>

---

#### ❓ Shards, replicas, refresh

<sub>**AR:** Shards و Replicas و Refresh</sub>

**Answer (EN):**

Index is split into **shards** for write parallelism; each has **replicas** for HA. **Refresh interval** (default 1s) controls how often new docs become searchable. Raise it (30s) for bulk loads.

<details><summary>الإجابة بالعربي</summary>

الفهرس مُقسّم لـ **Shards** للتوازي في الكتابة؛ كل واحد له **Replicas** لـ HA. **Refresh Interval** (افتراضي 1 ث) يتحكم في متى تصبح Docs قابلة للبحث. ارفعه (30 ث) للـ Bulk Loads.

</details>

---

### 🔄 CDC with Debezium

**Slug:** `data-cdc-debezium` · **AR:** CDC مع Debezium

> Stream DB changes from the WAL/binlog to Kafka  
> *بث تغييرات DB من WAL/binlog إلى Kafka*

#### ❓ What is Change Data Capture?

<sub>**AR:** ما هو CDC؟</sub>

**Answer (EN):**

Tap the database's replication log to emit a stream of row-level changes (insert/update/delete) to a broker. Powers search index sync, cache invalidation, data lake ingestion, audit, the Outbox pattern.

<details><summary>الإجابة بالعربي</summary>

الاستفادة من Replication Log في DB لبث تغييرات الصفوف (Insert/Update/Delete) لـ Broker. يُشغّل مزامنة فهارس البحث، وإبطال Cache، وتغذية Data Lake، و Audit، ونمط Outbox.

</details>

---

#### ❓ Debezium connectors

<sub>**AR:** Debezium Connectors</sub>

**Answer (EN):**

Kafka Connect-based connectors for MySQL (binlog), PostgreSQL (logical replication via `pgoutput`), MongoDB (oplog), SQL Server, Oracle. Emit standardized change events.

<details><summary>الإجابة بالعربي</summary>

Connectors مبنية على Kafka Connect لـ MySQL (binlog) و PostgreSQL (Logical Replication عبر `pgoutput`) و MongoDB (oplog) و SQL Server و Oracle. تُصدر Change Events موحدة.

</details>

---

#### ❓ Pitfalls

<sub>**AR:** مخاطر</sub>

**Answer (EN):**

- Snapshot vs streaming consistency at startup
- Schema evolution requires consumer handling
- WAL retention must outlast the consumer's lag
- Soft deletes look like updates — handle the convention

<details><summary>الإجابة بالعربي</summary>

- الاتساق بين Snapshot و Streaming عند البدء
- تطور Schema يحتاج معالجة من Consumers
- Retention الـ WAL يجب أن يتجاوز تأخر Consumer
- Soft Deletes تبدو كـ Updates — تعامل مع الاتفاقية

</details>

---

## Part XVIII — AI & LLM

<sub>الجزء الثامن عشر — AI و LLM</sub>

### 🧠 RAG Pipeline Design

**Slug:** `ai-rag-pipeline` · **AR:** تصميم RAG Pipeline

> Retrieval-Augmented Generation end-to-end  
> *Retrieval-Augmented Generation من البداية للنهاية*

#### ❓ What is RAG and why?

<sub>**AR:** ما هي RAG ولماذا؟</sub>

**Answer (EN):**

Retrieval-Augmented Generation: at query time, retrieve relevant chunks from your knowledge base and inject them into the LLM prompt. Solves three LLM problems: **hallucination**, **stale knowledge**, and **private data** the model never saw.

<details><summary>الإجابة بالعربي</summary>

Retrieval-Augmented Generation: عند الاستعلام، استرجع أجزاء مرتبطة من قاعدة معرفتك وأدخلها في prompt الـ LLM. تحل ثلاث مشاكل: **الهلوسة**، **المعرفة القديمة**، و**البيانات الخاصة** التي لم يرها النموذج.

</details>

---

#### ❓ The pipeline at a glance

<sub>**AR:** الـ Pipeline في لمحة</sub>

Docs → Chunk → Embed → Vector DB Query → Embed Q → Top-K search → Rerank → LLM (prompt+context) → Answer + citations

<details><summary>تفاصيل بالعربي</summary>

Docs → Chunk → Embed → Vector DB سؤال → Embed → Top-K → Rerank → LLM → إجابة + مصادر

</details>

---

#### ❓ Naïve vs production RAG

<sub>**AR:** RAG ساذجة vs RAG إنتاجية</sub>

**Answer (EN):**

- **Query rewriting** — clarify ambiguous user questions
- **Hybrid retrieval** — combine vector (semantic) with BM25 (lexical)
- **Reranker** (cross-encoder) on top-50 → keep top-5
- **Metadata filters** (tenant, language, recency)
- **Citations** in the response
- **Guardrails**: refuse if no good context

<details><summary>الإجابة بالعربي</summary>

- **Query Rewriting** — توضيح أسئلة غامضة
- **Hybrid Retrieval** — Vector (دلالي) + BM25 (لفظي)
- **Reranker** (Cross-encoder) على Top-50 → احتفظ بـ Top-5
- **Metadata Filters** (Tenant, لغة, حداثة)
- **Citations** في الإجابة
- **Guardrails**: ارفض إذا لم تجد سياقًا جيدًا

</details>

---

#### ❓ Common failure mode

<sub>**AR:** فشل شائع</sub>

**Answer (EN):**

Retrieval returns irrelevant chunks; LLM generates a confident wrong answer. Mitigations: better embeddings, hybrid search, rerank, lower the *top-k* threshold by score, return "I don't know" when scores are low.

<details><summary>الإجابة بالعربي</summary>

Retrieval يُرجع Chunks غير مرتبطة؛ LLM يُولّد إجابة خاطئة بثقة. الحلول: Embeddings أفضل، Hybrid Search، Rerank، حد Top-k حسب Score، وأرجع "لا أعلم" عندما تكون Scores منخفضة.

</details>

---

### 🧭 Vector Databases

**Slug:** `ai-vector-dbs` · **AR:** قواعد بيانات Vector

> pgvector, Pinecone, Weaviate, ANN, HNSW  
> *pgvector و Pinecone و Weaviate و ANN و HNSW*

#### ❓ Why a vector DB?

<sub>**AR:** لماذا Vector DB؟</sub>

**Answer (EN):**

Embeddings are high-dimensional vectors (768–3072 dims). Linear cosine over millions of vectors is too slow. Vector DBs use **Approximate Nearest Neighbor (ANN)** indexes (HNSW, IVF) to answer top-k similarity in milliseconds at the cost of slight recall loss.

<details><summary>الإجابة بالعربي</summary>

الـ Embeddings vectors ذات أبعاد عالية (768-3072). Cosine خطي على ملايين الـ Vectors بطيء جدًا. Vector DBs تستخدم فهارس **ANN** (HNSW, IVF) للإجابة على Top-k في ملي ثانية بفقدان طفيف في Recall.

</details>

---

#### ❓ pgvector vs dedicated vector DBs

<sub>**AR:** pgvector vs Vector DBs مخصصة</sub>

**Answer (EN):**

- **pgvector (Postgres):** uses your existing DB; supports HNSW since v0.5; great when ≤ ~10M vectors and you want filters joined to relational data.
- **Pinecone / Weaviate / Qdrant / Milvus:** built from scratch for vectors; scale to billions; managed hybrid search, metadata filters, namespaces.

<details><summary>الإجابة بالعربي</summary>

- **pgvector (Postgres):** يستخدم DB الموجودة؛ يدعم HNSW منذ v0.5؛ مناسب حتى ~10M vector.
- **Pinecone / Weaviate / Qdrant / Milvus:** مبنية من الصفر للـ Vectors؛ تصل للمليارات؛ Hybrid Search و Metadata Filters و Namespaces.

</details>

---

#### ❓ HNSW in one paragraph

<sub>**AR:** HNSW في فقرة</sub>

**Answer (EN):**

Hierarchical Navigable Small World: a multi-layer graph where each node links to neighbors. Search starts at the top (sparse) layer and descends, greedily following links closer to the query. Excellent recall and latency tradeoff. Tunable via `M`, `ef_construction`, `ef_search`.

<details><summary>الإجابة بالعربي</summary>

Hierarchical Navigable Small World: رسم بياني متعدد الطبقات حيث كل Node مرتبط بجيرانه. البحث يبدأ من الطبقة العلوية (المتناثرة) وينزل، متبعًا الروابط الأقرب للاستعلام. مقايضة ممتازة بين Recall و Latency. يُضبط عبر `M` و `ef_construction` و `ef_search`.

</details>

---

#### ❓ Distance metrics

<sub>**AR:** مقاييس المسافة</sub>

**Answer (EN):**

**Cosine** for normalized embeddings (most common). **Dot product** when magnitudes matter. **Euclidean (L2)** rarely. Match the metric to what the embedding model was trained for.

<details><summary>الإجابة بالعربي</summary>

**Cosine** للـ Embeddings المُسواة (الأشهر). **Dot Product** عندما يهم Magnitude. **Euclidean (L2)** نادرًا. اختر المقياس حسب ما دُرّب عليه نموذج الـ Embedding.

</details>

---

### 🧬 Embeddings & Chunking

**Slug:** `ai-embeddings-chunking` · **AR:** Embeddings و Chunking

> Picking models, semantic chunking, hybrid search  
> *اختيار النماذج، Semantic Chunking، Hybrid Search*

#### ❓ Picking an embedding model

<sub>**AR:** اختيار نموذج Embedding</sub>

**Answer (EN):**

- Match training language and domain
- Higher dim = potentially better recall, higher cost & storage
- Test on the MTEB leaderboard for your task
- Prefer **multilingual** models if you serve Arabic/English content
- Consistency matters more than model choice — never mix models in the same index

<details><summary>الإجابة بالعربي</summary>

- طابق لغة التدريب والمجال
- أبعاد أعلى = Recall أفضل غالبًا، تكلفة وتخزين أكثر
- اختبر على MTEB Leaderboard
- فضّل النماذج **متعددة اللغات** للمحتوى العربي/الإنجليزي
- الاتساق أهم من النموذج — لا تخلط نماذج في نفس Index

</details>

---

#### ❓ Fixed chunks vs semantic chunking

<sub>**AR:** Fixed Chunks vs Semantic Chunking</sub>

**Answer (EN):**

**Fixed** (e.g. 500 tokens with 50 overlap): simple, fast, often cuts mid-sentence. **Semantic**: respect markdown headings, paragraphs, list items; some libraries even use embedding similarity to find topic shifts. Senior-grade RAG uses semantic chunking.

<details><summary>الإجابة بالعربي</summary>

**Fixed** (مثلاً 500 Tokens مع 50 Overlap): بسيط وسريع لكنه يقطع منتصف الجملة. **Semantic**: يحترم عناوين Markdown والفقرات؛ بعض المكتبات تستخدم تشابه Embedding لإيجاد تحولات الموضوع. الـ RAG على مستوى Senior يستخدم Semantic Chunking.

</details>

---

#### ❓ Hybrid search (BM25 + vectors)

<sub>**AR:** Hybrid Search (BM25 + Vectors)</sub>

**Answer (EN):**

Vector retrieval misses exact-term matches (model numbers, names). BM25 misses semantic paraphrases. Combine them with **Reciprocal Rank Fusion** or weighted sum — almost always beats either alone.

<details><summary>الإجابة بالعربي</summary>

Vector Retrieval يفقد المطابقات الحرفية (أرقام موديلات، أسماء). BM25 يفقد الباراف raisingات الدلالية. ادمجهما عبر **Reciprocal Rank Fusion** أو Weighted Sum — يتفوق دائمًا تقريبًا على أي منهما وحده.

</details>

---

### 🤖 LLM Serving Patterns

**Slug:** `ai-llm-serving` · **AR:** أنماط تقديم LLM

> Latency budgets, streaming, caching, fallback  
> *ميزانيات Latency و Streaming و Caching و Fallback*

#### ❓ Latency budget for chat

<sub>**AR:** ميزانية Latency للمحادثة</sub>

**Answer (EN):**

Time-to-first-token (TTFT) is what users feel. Target ≤ 1s. Strategies: SSE streaming, smaller fast model for first response, prompt caching, regional routing to nearest inference endpoint.

<details><summary>الإجابة بالعربي</summary>

Time-to-first-token (TTFT) هو ما يشعر به المستخدم. استهدف ≤ 1 ث. الاستراتيجيات: SSE Streaming، نموذج صغير سريع للرد الأول، Prompt Caching، توجيه إقليمي لأقرب Endpoint.

</details>

---

#### ❓ Prompt caching

<sub>**AR:** Prompt Caching</sub>

**Answer (EN):**

Providers (Anthropic, OpenAI) cache the static prefix of a prompt; repeated prefixes are billed at a fraction of the cost. Put system prompts and RAG context *at the top, immutable*.

<details><summary>الإجابة بالعربي</summary>

المزودون (Anthropic, OpenAI) يخزنون البداية الثابتة من Prompt؛ التكرارات تُحسب بكسر من التكلفة. ضع System Prompt و RAG Context *في الأعلى وثابتًا*.

</details>

---

#### ❓ Graceful degradation

<sub>**AR:** Graceful Degradation</sub>

**Answer (EN):**

- Primary model fails / rate-limited → fall back to alternate provider/model
- If RAG retrieval times out → still answer with a "no context found" template
- Apply per-tenant **token budgets** to avoid wallet drain
- Show "thinking…" UX so users don't bail on cold latency

<details><summary>الإجابة بالعربي</summary>

- فشل النموذج الأساسي / Rate-limit → انتقل لمزود/نموذج بديل
- Timeout في Retrieval → أجب بقالب "لا سياق"
- طبّق **Token Budgets** لكل Tenant لتجنب الاستنزاف
- أظهر "يفكر…" حتى لا يهرب المستخدم

</details>

---

#### ❓ Versioning prompts & models

<sub>**AR:** إصدارات Prompts والنماذج</sub>

**Answer (EN):**

Treat prompts like code: in git, with PRs, with golden tests. Pin model versions (don't use floating `gpt-4o` in prod — pin `gpt-4o-2024-11-20`). A/B test new prompts against held-out evals before rolling out.

<details><summary>الإجابة بالعربي</summary>

عامل Prompts كالكود: في Git، مع PRs، مع Golden Tests. ثبّت إصدارات النماذج (لا تستخدم `gpt-4o` العائم في الإنتاج — ثبّت `gpt-4o-2024-11-20`). A/B-test الـ Prompts الجديدة قبل النشر.

</details>

---

### 📏 LLM Evaluation

**Slug:** `ai-evaluation` · **AR:** تقييم LLM

> RAGAS, LLM-as-judge, held-out evals  
> *RAGAS و LLM-as-judge و Held-out Evals*

#### ❓ Why evaluation is the bottleneck

<sub>**AR:** لماذا التقييم هو العقبة</sub>

**Answer (EN):**

Without solid evals, you have no idea whether prompt v17 is better than v16. Production AI projects live or die on evaluation infrastructure, not model choice.

<details><summary>الإجابة بالعربي</summary>

بدون تقييم متين، لن تعرف هل Prompt v17 أفضل من v16. مشاريع AI الإنتاجية تعيش أو تموت على بنية التقييم، لا على اختيار النموذج.

</details>

---

#### ❓ RAGAS metrics

<sub>**AR:** مقاييس RAGAS</sub>

**Answer (EN):**

- **Faithfulness**: does the answer stick to the retrieved context?
- **Answer relevancy**: does it address the question?
- **Context precision/recall**: did retrieval find the right chunks?

<details><summary>الإجابة بالعربي</summary>

- **Faithfulness**: هل الإجابة ملتزمة بالسياق؟
- **Answer Relevancy**: هل تجيب على السؤال؟
- **Context Precision/Recall**: هل وجد Retrieval Chunks الصحيحة؟

</details>

---

#### ❓ LLM-as-judge — caveats

<sub>**AR:** LLM-as-judge — تحفظات</sub>

**Answer (EN):**

Cheap and scalable but biased: prefers verbose, well-formatted answers, agrees with itself, drifts. Always anchor with a held-out human-labeled dataset and audit a sample regularly.

<details><summary>الإجابة بالعربي</summary>

رخيص وقابل للتوسع لكنه متحيز: يفضّل الإجابات المطولة المنسقة، يوافق نفسه، ينحرف. ثبّته دائمًا بمجموعة بشرية مُصنّفة وراجع عينة دوريًا.

</details>

---

#### ❓ CI for prompts

<sub>**AR:** CI للـ Prompts</sub>

**Answer (EN):**

Run the eval suite on every prompt/model change. Block merge if scores regress past a threshold. Snapshot a small set of "trap" examples that previous bugs broke.

<details><summary>الإجابة بالعربي</summary>

شغّل مجموعة الـ Evals عند كل تغير Prompt/نموذج. ابلوك الـ Merge إذا انخفضت الـ Scores. خزّن مجموعة "أمثلة فخ" كسرت أخطاء سابقة.

</details>

---

## Part XIX — Modern Laravel

<sub>الجزء التاسع عشر — Laravel الحديث</sub>

### 🚀 Octane in Depth

**Slug:** `lvm-octane-deep` · **AR:** Octane بعمق

> Workers, state leaks, request hooks  
> *Workers وتسرب الحالة و Hooks الطلب*

#### ❓ Stateful vs stateless services in Octane

<sub>**AR:** Stateful vs Stateless في Octane</sub>

**Answer (EN):**

Anything bound as `singleton` survives across requests. Anything `bind`-ed gets a fresh instance. New `scoped` binding lives per request — use it for request-bound dependencies (current user, request context, multi-tenant config).

<details><summary>الإجابة بالعربي</summary>

أي شيء مربوط كـ `singleton` يبقى عبر Requests. الـ `bind` يعطي Instance جديد كل مرة. الجديد `scoped` يعيش لكل Request — استخدمه للـ Dependencies المرتبطة بالطلب (المستخدم الحالي، السياق، Multi-tenant Config).

</details>

---

#### ❓ Octane request hooks

<sub>**AR:** Hooks الـ Request في Octane</sub>

**Answer (EN):**

`RequestReceived`, `RequestTerminated`, `WorkerStarting`, `WorkerStopping`, `TaskReceived`, `TickReceived`. Use `RequestTerminated` for cleanup of per-request state.

<details><summary>الإجابة بالعربي</summary>

`RequestReceived` و `RequestTerminated` و `WorkerStarting` و `WorkerStopping` و `TaskReceived` و `TickReceived`. استخدم `RequestTerminated` لتنظيف حالة الطلب.

</details>

---

#### ❓ Common Octane bug: leaking auth user

<sub>**AR:** خطأ شائع: تسرب Auth User</sub>

**Answer (EN):**

A singleton service caches `auth()->user()` at construction time → first user that hits the worker is "Auth-cached" for all subsequent requests on the same worker. Fix: never cache request-scoped data in singletons; resolve at use time.

<details><summary>الإجابة بالعربي</summary>

Singleton يخزن `auth()->user()` في Construction → أول مستخدم يصل لـ Worker يصبح "محفوظًا" لكل الطلبات التالية. الحل: لا تخزن بيانات Request في Singletons؛ احصل عليها وقت الاستخدام.

</details>

---

#### ❓ When NOT to use Octane

<sub>**AR:** متى لا تستخدم Octane</sub>

**Answer (EN):**

Legacy apps with global static state, packages that rely on per-request bootstrapping (some auth packages did this), workloads dominated by external HTTP/DB calls (Octane wins on CPU; if you're already 90% I/O-bound, gains shrink).

<details><summary>الإجابة بالعربي</summary>

تطبيقات قديمة بـ Static State، حزم تعتمد على Bootstrap لكل Request، أعباء يهيمن عليها HTTP/DB خارجي (Octane يربح في CPU؛ إذا كنت 90% I/O، الربح يقل).

</details>

---

### 📻 Reverb (Broadcasting)

**Slug:** `lvm-reverb` · **AR:** Reverb (Broadcasting)

> First-party WebSocket server for Laravel  
> *WebSocket Server رسمي لـ Laravel*

#### ❓ What is Reverb?

<sub>**AR:** ما هو Reverb؟</sub>

**Answer (EN):**

A first-party WebSocket server built on ReactPHP, Pusher-protocol compatible. Replaces external Pusher / Soketi for the broadcasting layer. Horizontally scalable via Redis pub/sub.

<details><summary>الإجابة بالعربي</summary>

WebSocket Server رسمي مبني على ReactPHP ومتوافق مع بروتوكول Pusher. يستبدل Pusher / Soketi لطبقة Broadcasting. قابل للتوسع الأفقي عبر Redis Pub/Sub.

</details>

---

#### ❓ Channels: public, private, presence

<sub>**AR:** القنوات: Public و Private و Presence</sub>

**Answer (EN):**

- **Public:** anyone can subscribe.
- **Private:** subscription requires server-side auth callback (`routes/channels.php`).
- **Presence:** like private + you see who else is on the channel — useful for live cursors, viewer counts.

<details><summary>الإجابة بالعربي</summary>

- **Public:** أي شخص يشترك.
- **Private:** يحتاج Auth Callback من السيرفر.
- **Presence:** مثل Private + ترى من معك — مفيد لـ Live Cursors وعدد المشاهدين.

</details>

---

#### ❓ Operational concerns

<sub>**AR:** مخاوف تشغيلية</sub>

**Answer (EN):**

- Long-lived connections — handle ulimit, ephemeral ports
- Sticky load balancing OR a Redis pub/sub backplane
- Graceful drain on deploy (SIGTERM, finish current handshakes)
- Monitor active connections, channel counts, broadcast rate

<details><summary>الإجابة بالعربي</summary>

- اتصالات طويلة — راعِ ulimit و Ephemeral Ports
- Sticky LB أو Redis Pub/Sub Backplane
- Graceful Drain على Deploy (SIGTERM)
- راقب الاتصالات النشطة وعدد القنوات ومعدل البث

</details>

---

### 🏢 Multi-Tenancy

**Slug:** `lvm-multi-tenancy` · **AR:** Multi-Tenancy

> Single DB, schema-per-tenant, DB-per-tenant  
> *DB واحدة أو Schema لكل Tenant أو DB لكل Tenant*

#### ❓ The three strategies

<sub>**AR:** الاستراتيجيات الثلاث</sub>

**Answer (EN):**

- **Single DB, tenant_id column:** simplest, cheapest, hardest isolation guarantees
- **Schema per tenant** (Postgres): physical separation, single connection pool, harder migrations
- **DB per tenant:** strongest isolation, easiest "export tenant", most ops

<details><summary>الإجابة بالعربي</summary>

- **DB واحدة + عمود tenant_id:** أبسط وأرخص، أصعب في ضمان العزل
- **Schema لكل Tenant** (Postgres): فصل فيزيائي، Connection Pool واحد، Migrations أصعب
- **DB لكل Tenant:** أقوى عزل، Export سهل، تشغيل أصعب

</details>

---

#### ❓ Picking a strategy

<sub>**AR:** اختيار الاستراتيجية</sub>

**Answer (EN):**

- **1000s of small tenants:** single DB + global scope
- **10s of large tenants:** DB per tenant; per-tenant scaling
- **Regulated industries:** isolation often required
- **Free tier + paid tier:** hybrid — single DB for free, dedicated for paid

<details><summary>الإجابة بالعربي</summary>

- **آلاف من Tenants الصغار:** DB واحدة + Global Scope
- **عشرات من Tenants الكبار:** DB لكل واحد
- **صناعات منظمة:** العزل عادة مطلوب
- **مجاني + مدفوع:** هجين

</details>

---

#### ❓ Common bugs

<sub>**AR:** أخطاء شائعة</sub>

**Answer (EN):**

- Forgetting the tenant scope in a query → cross-tenant data leak
- Caching *without* tenant in the key → Tenant A sees Tenant B's data
- Octane carrying the previous request's tenant container into the next
- Background jobs needing to re-establish tenant context

<details><summary>الإجابة بالعربي</summary>

- نسيان Tenant Scope في Query → تسرب بيانات
- Caching *بدون* Tenant في الـ Key → Tenant A يرى بيانات Tenant B
- Octane يحمل Tenant Container من الطلب السابق
- Jobs خلفية تحتاج لإعادة تأسيس Tenant Context

</details>

> ✔️ **Senior tip:** In senior interviews, the cache-key tenancy bug is a great war story to bring up — it shows you've seen production multi-tenancy.
>
> ✔️ **نصيحة Senior:** في مقابلات Senior، خطأ Cache Key بدون Tenant قصة ممتازة — تُظهر أنك رأيت Multi-tenancy في الإنتاج.

---

### 💗 Pulse & Pennant

**Slug:** `lvm-pulse-pennant` · **AR:** Pulse و Pennant

> Real-time app insights & first-party feature flags  
> *رؤى لحظية + Feature Flags رسمية*

#### ❓ Pulse — what it shows

<sub>**AR:** Pulse — ماذا يُظهر</sub>

**Answer (EN):**

Slow queries, slow requests, slow jobs, busy queues, exceptions, cache hit rates, user activity. Lightweight, sample-based, stores aggregates only — fits in your existing Redis/DB.

<details><summary>الإجابة بالعربي</summary>

Queries بطيئة، Requests بطيئة، Jobs بطيئة، Queues مزدحمة، Exceptions، معدلات Cache Hit، نشاط المستخدمين. خفيف، Sample-based، يخزن Aggregates فقط — يناسب Redis/DB الحالية.

</details>

---

#### ❓ Pennant — feature flags

<sub>**AR:** Pennant — Feature Flags</sub>

**Answer (EN):**

First-party flag system. Drivers: array (tests), database, in-memory. Supports per-user, per-team, percentage rollout via custom resolvers. Pairs with feature-flag-driven development for safer rollouts.

<details><summary>الإجابة بالعربي</summary>

نظام Feature Flags رسمي. Drivers: Array (للاختبار)، Database، In-memory. يدعم Flags لكل مستخدم/فريق ونسبة تدريجية عبر Resolvers مخصصة. يتكامل مع تطوير مدفوع بـ Feature Flags لنشر أأمن.

</details>

---

### 🔬 Static Analysis & Style

**Slug:** `lvm-static-analysis` · **AR:** تحليل ثابت وأسلوب الكود

> PHPStan, Larastan, Psalm, Pint  
> *PHPStan و Larastan و Psalm و Pint*

#### ❓ PHPStan vs Psalm

<sub>**AR:** PHPStan vs Psalm</sub>

**Answer (EN):**

Both find bugs without running code. PHPStan is more popular, Laravel-aware via **Larastan**. Psalm focuses on type strictness. PHPStan level 9 is the senior bar — types everywhere, no `mixed`.

<details><summary>الإجابة بالعربي</summary>

كلاهما يكشف أخطاء بدون تشغيل. PHPStan أشهر، يدعم Laravel عبر **Larastan**. Psalm يركز على صرامة Types. PHPStan Level 9 هو المستوى Senior — Types في كل مكان، بلا `mixed`.

</details>

---

#### ❓ Pint

<sub>**AR:** Pint</sub>

**Answer (EN):**

Laravel's opinionated PHP-CS-Fixer wrapper. Zero-config, fast. Run in CI to reject unformatted code; run as a pre-commit hook locally.

<details><summary>الإجابة بالعربي</summary>

غلاف رأيي حول PHP-CS-Fixer. بلا إعدادات وسريع. شغّله في CI لرفض الكود غير المنسق، وكـ Pre-commit Hook محليًا.

</details>

---

#### ❓ Rector for automated refactoring

<sub>**AR:** Rector للـ Refactoring الآلي</sub>

**Answer (EN):**

Apply codemods at scale: upgrade PHP versions, modernize syntax (constructor promotion, readonly), Laravel version upgrades. Pair with Pint & PHPStan in CI.

<details><summary>الإجابة بالعربي</summary>

تطبيق Codemods على نطاق واسع: ترقية إصدار PHP، تحديث الـ Syntax (Constructor Promotion, readonly)، ترقيات Laravel. ادمجه مع Pint و PHPStan في CI.

</details>

---

## Part XX — Interview Tactics

<sub>الجزء العشرون — تكتيكات المقابلة</sub>

### 🎯 System Design Framework

**Slug:** `iv-system-design-framework` · **AR:** إطار حل System Design

> A repeatable 7-step structure for the 45-min loop  
> *بنية مكررة من 7 خطوات لجلسة 45 دقيقة*

#### ❓ The 7 steps

<sub>**AR:** الخطوات السبع</sub>

**Answer (EN):**

1. **Requirements clarification** (5 min) — functional, non-functional, scope-cut what's out.
2. **Capacity estimation** (2-3 min) — users, RPS, data size, bandwidth.
3. **API design** (5 min) — key endpoints + payloads.
4. **Data model** (5 min) — main entities, picks of DB.
5. **High-level architecture** (5 min) — boxes, arrows.
6. **Deep dives** (15 min) — interviewer picks: scaling, sharding, hot path, durability.
7. **Bottlenecks & tradeoffs** (5 min) — what breaks first, what you'd do next.

<details><summary>الإجابة بالعربي</summary>

1. **توضيح المتطلبات** (5 د) — وظيفية، غير وظيفية، استبعاد ما هو خارج النطاق.
2. **تقدير السعة** (2-3 د) — مستخدمون، RPS، حجم بيانات، Bandwidth.
3. **تصميم API** (5 د) — Endpoints رئيسية + Payloads.
4. **نموذج البيانات** (5 د) — كيانات رئيسية، اختيار DB.
5. **البنية عالية المستوى** (5 د) — Boxes + Arrows.
6. **Deep Dives** (15 د) — يختار المُقابل.
7. **Bottlenecks & Tradeoffs** (5 د) — ما يكسر أولاً وماذا بعد.

</details>

---

#### ❓ Capacity estimation cheatsheet

<sub>**AR:** مذكرة تقدير السعة</sub>

**Answer (EN):**

- 1 day ≈ 86,400 s ≈ 10⁵ s
- 1 MB ≈ 10⁶ B
- 100M DAU × 10 actions = 1B events/day ≈ 10K/s avg, ~100K/s peak (10× burst)
- Disk: estimate row size × rows × replication factor × retention
- Bandwidth: avg payload × RPS × 2 (request + response)

<details><summary>الإجابة بالعربي</summary>

- اليوم ≈ 86,400 ث ≈ 10⁵ ث
- 1 MB ≈ 10⁶ B
- 100M DAU × 10 إجراءات = 1B Event/يوم ≈ 10K/ث متوسط، ~100K/ث ذروة
- القرص: حجم الصف × عدد الصفوف × Replication × Retention
- Bandwidth: متوسط Payload × RPS × 2

</details>

---

#### ❓ Drive the conversation

<sub>**AR:** قُد المحادثة</sub>

**Answer (EN):**

Don't wait to be asked. Narrate your decisions: *"I'm picking Postgres here because we need transactional consistency; in five minutes I'll come back and discuss how we'd shard if we got past 100K writes/sec."* Interviewers grade clarity of thought, not just correctness.

<details><summary>الإجابة بالعربي</summary>

لا تنتظر السؤال. اسرد قراراتك: *"أختار Postgres هنا لأننا نحتاج اتساقًا معاملاتيًا؛ بعد 5 دقائق سأرجع وأناقش كيف نُجزّئ لو تجاوزنا 100K كتابة/ث."* المُقابلون يقيّمون وضوح التفكير لا الإجابة فقط.

</details>

---

### ⚖️ Articulating Trade-offs

**Slug:** `iv-tradeoffs` · **AR:** صياغة الـ Trade-offs

> The #1 gap killing candidates in 2026  
> *الفجوة #1 التي تُسقط المرشحين في 2026*

#### ❓ The pattern interviewers love

<sub>**AR:** النمط الذي يعشقه المقابلون</sub>

**Answer (EN):**

"**Option A** gives us *X* but costs *Y*; **Option B** flips that. Because the requirements emphasize *X*, I'm picking A. If later *Y* becomes the priority, we'd revisit." Three sentences, but it shows decision-making instead of regurgitation.

<details><summary>الإجابة بالعربي</summary>

"**الخيار A** يعطي *X* بكلفة *Y*؛ **الخيار B** العكس. لأن المتطلبات تُؤكد *X*، أختار A. إذا أصبحت *Y* أولوية، نُراجع." ثلاث جمل، لكنها تُظهر اتخاذ قرار لا حفظًا.

</details>

---

#### ❓ Common trade-off axes you should keep ready

<sub>**AR:** محاور Trade-offs يجب أن تكون جاهزة</sub>

**Answer (EN):**

- Consistency vs availability (CAP)
- Latency vs throughput
- Cost vs durability (replication / retention)
- Read vs write optimization
- Simplicity vs flexibility
- Build vs buy
- Now-pain vs later-pain (tech debt)

<details><summary>الإجابة بالعربي</summary>

- Consistency vs Availability (CAP)
- Latency vs Throughput
- Cost vs Durability
- Read vs Write Optimization
- Simplicity vs Flexibility
- Build vs Buy
- ألم الآن vs ألم لاحقًا (Tech Debt)

</details>

---

#### ❓ Avoid the "describe components" trap

<sub>**AR:** تجنب فخ "وصف المكونات"</sub>

**Answer (EN):**

200+ interviews reviewed in 2026 found the killer gap: candidates listed services but never said "I chose this *because* …". Every component choice gets a justification. No buzzwords without reason.

<details><summary>الإجابة بالعربي</summary>

200+ مقابلة في 2026 كشفت الفجوة القاتلة: المرشحون يعددون خدمات دون أن يقولوا "اخترت هذا *لأن*…". كل اختيار يحتاج تبريرًا. لا Buzzwords بلا سبب.

</details>

---

#### ❓ Cost &amp; ops thinking

<sub>**AR:** التفكير في التكلفة والتشغيل</sub>

**Answer (EN):**

2026 loops explicitly grade cost reasoning. Mention dollar estimates ("a Kafka cluster of this size is ~$5K/mo"), on-call burden ("this adds a stateful component my team has to operate"), and migration risk.

<details><summary>الإجابة بالعربي</summary>

مقابلات 2026 تُقيّم التكلفة صراحة. اذكر تقديرات (Kafka بهذا الحجم ~$5K/شهر)، عبء On-call (مكوّن Stateful إضافي يجب على فريقي تشغيله)، ومخاطر الترحيل.

</details>

---

### 🗣 Behavioral & STAR

**Slug:** `iv-behavioral` · **AR:** الـ Behavioral و STAR

> Structured stories that land  
> *قصص منظمة تترك أثرًا*

#### ❓ STAR — what each letter does

<sub>**AR:** STAR — ماذا يفعل كل حرف</sub>

**Answer (EN):**

- **S — Situation:** 1 sentence, context only.
- **T — Task:** what specifically was on your plate.
- **A — Action:** the bulk of the answer. What *you* did, not "we".
- **R — Result:** measurable outcome, with numbers.

Keep stories under 3 minutes. The interviewer can ask for depth.

<details><summary>الإجابة بالعربي</summary>

- **S — Situation:** جملة واحدة سياق فقط.
- **T — Task:** ما كان عليك تحديدًا.
- **A — Action:** معظم الإجابة. ما فعلته *أنت* لا "نحن".
- **R — Result:** نتيجة قابلة للقياس بأرقام.

قصص أقل من 3 دقائق. المُقابل يستطيع طلب التفصيل.

</details>

---

#### ❓ Stories every senior should have ready

<sub>**AR:** قصص يجب أن تكون جاهزة لأي Senior</sub>

**Answer (EN):**

- A production incident I owned end-to-end
- A conflict with another engineer / team / PM I resolved
- A bad decision I made and how I corrected it
- A project I led without formal authority
- A time I changed a teammate's mind with data
- A time I delivered under a tight deadline by cutting scope

<details><summary>الإجابة بالعربي</summary>

- حادثة Production توليتها كاملة
- نزاع مع مهندس/فريق/PM وحللته
- قرار سيئ اتخذته ثم صححته
- مشروع قُدته بلا سلطة رسمية
- أقنعت زميلًا بتغيير رأيه عبر البيانات
- وفّيت بـ Deadline ضيق بقص النطاق

</details>

---

#### ❓ Anti-patterns

<sub>**AR:** أنماط مرفوضة</sub>

**Answer (EN):**

- "We did X" — interviewers want *your* contribution
- No numbers in the result
- Picking a story where you were the hero of everything — sounds rehearsed
- Trash-talking former colleagues

<details><summary>الإجابة بالعربي</summary>

- "نحن فعلنا" — المقابل يريد دورك *أنت*
- لا أرقام في النتيجة
- قصة كنت فيها بطل كل شيء — تبدو محفوظة
- إساءة لزملاء سابقين

</details>

---

#### ❓ "Tell me about a time you disagreed with your manager"

<sub>**AR:** "حدّثني عن مرة اختلفت فيها مع مديرك"</sub>

**Answer (EN):**

Common trap. Show disagreement without insubordination: *"I voiced concerns with data, listened to their reasoning, agreed on a compromise, and committed even after the decision didn't fully go my way."* "Disagree and commit" is the senior signal.

<details><summary>الإجابة بالعربي</summary>

فخ شائع. أظهر اختلافًا بدون عصيان: *"عبّرت عن قلقي بالبيانات، استمعت لسببه، اتفقنا على حل وسط، والتزمت حتى لو لم يكن القرار كما أردت."* "Disagree and Commit" هي إشارة Senior.

</details>

---


## 🛠 Regenerating this file

This README is generated from `data/*.php`. To regenerate:

```bash
php scripts/generate-readme.php > README.md
```

## 📝 License & contributing

This reference is open for personal and team use. PRs improving accuracy, depth, or adding new topics are welcome — keep the bilingual format and the senior framing.

---

<sub>Generated 2026-06-26.  113 topics · 397 Q&A.</sub>
# interview_question
