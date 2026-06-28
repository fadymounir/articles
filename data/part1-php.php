<?php
/**
 * All topics for the Senior PHP Interview Bible
 * Each topic = its own focused page.
 * Bilingual content (English + Arabic).
 */

return [

/* ==================== PART I — PHP ==================== */

'php-fundamentals' => [
    'part' => 'Part I — PHP',
    'part_ar' => 'الجزء الأول — PHP',
    'icon' => '🐘',
    'title_en' => 'PHP Fundamentals',
    'title_ar' => 'أساسيات PHP',
    'desc_en' => 'Types, comparison, PHP 8 features, common pitfalls',
    'desc_ar' => 'الأنواع، المقارنات، مميزات PHP 8، الأخطاء الشائعة',
    'qa' => [
        [
            'q_en' => 'What kind of language is PHP?',
            'q_ar' => 'ما نوع لغة PHP؟',
            'a_en' => '<p>PHP is a <strong>dynamically typed, interpreted server-side scripting language</strong> that is compiled to <strong>opcodes</strong> and executed by the <strong>Zend VM</strong>. PHP 8+ added a <strong>JIT</strong> that compiles hot paths to native code.</p>',
            'a_ar' => '<p>لغة PHP هي لغة <strong>سكربتية ديناميكية</strong> تُنفّذ على السيرفر، يتم تحويلها إلى <strong>Opcodes</strong> ثم تُنفّذها <strong>Zend VM</strong>. ومنذ PHP 8 أضيف لها <strong>JIT</strong> الذي يُحوّل أجزاء الكود المتكررة إلى Machine Code مباشرة.</p>',
            'tip_en' => 'Saying "PHP is interpreted" is incomplete. The senior answer is: <em>interpreted with a compilation step to opcodes, executed by the Zend VM, with optional JIT</em>.',
            'tip_ar' => 'لا تقل فقط "PHP لغة مفسّرة". الإجابة الصحيحة: <em>مفسّرة مع خطوة تحويل إلى Opcodes تُنفّذها Zend VM، وقد تتحول جزئيًا إلى Machine Code عبر JIT</em>.',
        ],
        [
            'q_en' => 'Difference between == and ===',
            'q_ar' => 'الفرق بين == و ===',
            'a_en' => '<p><code>==</code> compares values after <em>type juggling</em>. <code>===</code> compares value <strong>and</strong> type — strict comparison.</p>',
            'a_ar' => '<p><code>==</code> يقارن القيم بعد <em>تحويل النوع</em>. أما <code>===</code> فيقارن القيمة <strong>والنوع</strong> معًا — مقارنة صارمة.</p>',
            'example' => "var_dump(0 == \"abc\");   // false in PHP 8 (was true in PHP 7!)\nvar_dump(\"1\" == 1);     // true\nvar_dump(\"1\" === 1);    // false",
            'tip_en' => 'Always use <code>===</code> in business logic. PHP 7 had infamous quirks (<code>0 == "abc"</code> was true!). PHP 8 fixed many of them.',
            'tip_ar' => 'استخدم دائمًا <code>===</code> في منطق العمل. PHP 7 كان فيها مفارقات شهيرة (<code>0 == "abc"</code> كانت true!). PHP 8 صلّحت كثيرًا منها.',
            'followups' => [
                'What does strict_types=1 do?',
                'Why is 0 == "abc" false in PHP 8 but true in PHP 7?',
                'Difference between is_numeric() and ctype_digit()?',
            ],
        ],
        [
            'q_en' => 'What are PHP 8 new features?',
            'q_ar' => 'ما هي مميزات PHP 8؟',
            'a_en' => '<ul><li><strong>JIT compiler</strong> — limited gain for I/O-bound apps</li><li><strong>Named arguments</strong> and <strong>constructor property promotion</strong></li><li><strong>Match expression</strong> (strict, returns value)</li><li><strong>Enums</strong> (8.1), <strong>readonly properties</strong> (8.1), <strong>readonly classes</strong> (8.2)</li><li><strong>Fibers</strong> (8.1) — primitive for async libraries (Swoole, AmphP, ReactPHP)</li><li><strong>First-class callable syntax</strong> <code>strlen(...)</code></li><li><strong>Asymmetric visibility</strong> and <strong>property hooks</strong> (8.4)</li></ul>',
            'a_ar' => '<ul><li><strong>JIT</strong> — فائدته محدودة في تطبيقات I/O</li><li><strong>Named arguments</strong> و <strong>Constructor property promotion</strong></li><li><strong>Match expression</strong> (صارم ويُرجع قيمة)</li><li><strong>Enums</strong> (8.1) و <strong>readonly properties</strong> (8.1) و <strong>readonly classes</strong> (8.2)</li><li><strong>Fibers</strong> (8.1) — أساس مكتبات Async مثل Swoole و AmphP</li><li><strong>First-class callable syntax</strong> <code>strlen(...)</code></li><li><strong>Asymmetric visibility</strong> و <strong>Property hooks</strong> في 8.4</li></ul>',
        ],
        [
            'q_en' => 'include vs require vs include_once vs require_once',
            'q_ar' => 'الفرق بين include و require و include_once و require_once',
            'a_en' => '',
            'a_ar' => '',
            'extra_html_en' => '<table><tr><th>Construct</th><th>If file missing</th><th>Repeat allowed?</th></tr><tr><td>include</td><td>Warning; script continues</td><td>Yes</td></tr><tr><td>require</td><td>Fatal error</td><td>Yes</td></tr><tr><td>include_once / require_once</td><td>Same as above</td><td>No (tracked by realpath)</td></tr></table><p>In modern PHP, prefer <strong>Composer autoload (PSR-4)</strong> over manual includes.</p>',
            'extra_html_ar' => '<table><tr><th>الأمر</th><th>عند فقد الملف</th><th>يسمح بالتكرار؟</th></tr><tr><td>include</td><td>تحذير ويستمر السكربت</td><td>نعم</td></tr><tr><td>require</td><td>خطأ Fatal</td><td>نعم</td></tr><tr><td>include_once / require_once</td><td>نفس السابق</td><td>لا (يُتتبَّع عبر realpath)</td></tr></table><p>في PHP الحديثة، استخدم <strong>Composer autoload (PSR-4)</strong> بدلاً من Include اليدوي.</p>',
        ],
        [
            'q_en' => 'Pass by value vs pass by reference',
            'q_ar' => 'التمرير بالقيمة مقابل التمرير بالمرجع',
            'a_en' => '<p>By default PHP passes by value. Use <code>&</code> to pass by reference. <strong>Objects are handles</strong> — modifying an object property even when passed by value mutates the original; references are still different from object handles.</p>',
            'a_ar' => '<p>افتراضيًا PHP تُمرّر بالقيمة. استخدم <code>&</code> للتمرير بالمرجع. <strong>الكائنات Handles</strong> — أي إن تعديل خاصية كائن حتى لو تم تمريره بالقيمة سيُعدّل الأصلي، لكن المرجع شيء مختلف عن مقبض الكائن.</p>',
            'example' => "function add(&\$x) { \$x++; }\n\$a = 1;\nadd(\$a);   // \$a is now 2",
        ],
        [
            'q_en' => 'Common mistakes seniors avoid',
            'q_ar' => 'الأخطاء الشائعة التي يتجنبها Seniors',
            'a_en' => '<ul><li>Using <code>==</code> instead of <code>===</code></li><li>Forgetting <code>declare(strict_types=1);</code></li><li>Suppressing errors with <code>@</code></li><li>Calling <code>extract()</code> on user input</li><li>Storing secrets in code instead of <code>.env</code> + secret manager</li><li>N+1 queries in Eloquent</li><li>Doing HTTP calls inside DB transactions</li></ul>',
            'a_ar' => '<ul><li>استخدام <code>==</code> بدلاً من <code>===</code></li><li>نسيان <code>declare(strict_types=1);</code></li><li>إخفاء الأخطاء بـ <code>@</code></li><li>استدعاء <code>extract()</code> على Input المستخدم</li><li>تخزين الـ Secrets في الكود بدلاً من <code>.env</code> + Secret Manager</li><li>N+1 Queries في Eloquent</li><li>عمل HTTP Calls داخل DB Transactions</li></ul>',
        ],
    ],
],

'php-oop' => [
    'part' => 'Part I — PHP',
    'part_ar' => 'الجزء الأول — PHP',
    'icon' => '🧱',
    'title_en' => 'OOP — Object-Oriented Programming',
    'title_ar' => 'البرمجة الكائنية',
    'desc_en' => '4 pillars, abstract vs interface, composition vs inheritance, traits',
    'desc_ar' => 'الأركان الأربعة، Abstract vs Interface، Composition vs Inheritance',
    'qa' => [
        [
            'q_en' => 'What are the 4 OOP pillars?',
            'q_ar' => 'ما هي الأركان الأربعة للـ OOP؟',
            'a_en' => '<ul><li><strong>Encapsulation:</strong> hide internal state, expose through methods.</li><li><strong>Inheritance:</strong> reuse via <code>extends</code>.</li><li><strong>Polymorphism:</strong> one interface, many implementations.</li><li><strong>Abstraction:</strong> model only what matters via abstract classes / interfaces.</li></ul>',
            'a_ar' => '<ul><li><strong>التغليف (Encapsulation):</strong> إخفاء الحالة الداخلية وكشف الـ Methods فقط.</li><li><strong>الوراثة (Inheritance):</strong> إعادة الاستخدام عبر <code>extends</code>.</li><li><strong>تعدد الأشكال (Polymorphism):</strong> نفس الواجهة، تطبيقات مختلفة.</li><li><strong>التجريد (Abstraction):</strong> نمذجة ما يهم فقط عبر Abstract classes / Interfaces.</li></ul>',
        ],
        [
            'q_en' => 'Abstract class vs Interface',
            'q_ar' => 'الفرق بين Abstract Class و Interface',
            'a_en' => '',
            'a_ar' => '',
            'extra_html_en' => '<table><tr><th>Abstract Class</th><th>Interface</th></tr><tr><td>Can contain implementation</td><td>Only contracts (PHP 8 allows default constants)</td></tr><tr><td>Single inheritance</td><td>Multiple implementations allowed</td></tr><tr><td>Can have properties/state</td><td>No state</td></tr><tr><td>Use when classes share behavior</td><td>Use when classes share a contract only</td></tr></table>',
            'extra_html_ar' => '<table><tr><th>Abstract Class</th><th>Interface</th></tr><tr><td>يمكن أن تحتوي على تنفيذ</td><td>عقود فقط (PHP 8 تسمح بثوابت)</td></tr><tr><td>وراثة واحدة</td><td>تطبيقات متعددة مسموحة</td></tr><tr><td>يمكن أن تحتوي على Properties</td><td>لا State</td></tr><tr><td>استخدمها عندما تتشارك Classes في السلوك</td><td>استخدمه عندما يتشارك Classes في العقد فقط</td></tr></table>',
            'tip_en' => 'Program to interfaces. Use abstract classes only when there is real shared implementation.',
            'tip_ar' => 'برمج للـ Interfaces. استخدم Abstract Classes فقط عندما يكون هناك تنفيذ مشترك حقيقي.',
        ],
        [
            'q_en' => 'Composition vs Inheritance',
            'q_ar' => 'Composition vs Inheritance',
            'a_en' => '<p><strong>Favor composition over inheritance.</strong> Inheritance creates tight coupling and fragile base classes. Composition (injecting collaborators) lets you swap behavior at runtime.</p>',
            'a_ar' => '<p><strong>فضّل Composition على Inheritance.</strong> الوراثة تُنشئ ترابطًا قويًا و Fragile Base Classes. أما Composition (حقن المتعاونين) فيسمح بتبديل السلوك في وقت التشغيل.</p>',
            'example' => "// Inheritance (tight)\nclass PdfReport extends Report {}\n\n// Composition (flexible)\nclass Report {\n    public function __construct(private Exporter \$exporter) {}\n}",
        ],
        [
            'q_en' => 'What are Traits?',
            'q_ar' => 'ما هي Traits؟',
            'a_en' => '<p>Horizontal reuse of methods across classes. Useful but easily abused — they hide dependencies. Prefer composition for non-trivial behavior.</p>',
            'a_ar' => '<p>إعادة استخدام أفقية للـ Methods بين الـ Classes. مفيدة لكن يُساء استخدامها — تُخفي الـ Dependencies. فضّل Composition للسلوك المعقد.</p>',
        ],
        [
            'q_en' => 'Late Static Binding',
            'q_ar' => 'ما هو Late Static Binding؟',
            'a_en' => '<p><code>self::</code> refers to the class where the method was defined. <code>static::</code> refers to the class that was called at runtime.</p>',
            'a_ar' => '<p><code>self::</code> تشير للـ Class التي عُرّفت فيها الـ Method. <code>static::</code> تشير للـ Class التي استُدعيت في وقت التشغيل.</p>',
            'example' => "class A {\n    public static function create() { return new static(); }\n}\nclass B extends A {}\nB::create(); // returns B, not A",
        ],
        [
            'q_en' => 'Magic methods you should know',
            'q_ar' => 'الـ Magic Methods التي يجب معرفتها',
            'a_en' => '<p><code>__construct</code>, <code>__destruct</code>, <code>__get</code>, <code>__set</code>, <code>__call</code>, <code>__callStatic</code>, <code>__invoke</code>, <code>__toString</code>, <code>__isset</code>, <code>__unset</code>, <code>__clone</code>, <code>__serialize</code>/<code>__unserialize</code>. Laravel Eloquent uses <code>__get</code>/<code>__call</code> heavily.</p>',
            'a_ar' => '<p><code>__construct</code> و <code>__destruct</code> و <code>__get</code> و <code>__set</code> و <code>__call</code> و <code>__callStatic</code> و <code>__invoke</code> و <code>__toString</code> و <code>__isset</code> و <code>__unset</code> و <code>__clone</code> و <code>__serialize</code>/<code>__unserialize</code>. Laravel Eloquent تستخدم <code>__get</code>/<code>__call</code> بكثرة.</p>',
        ],
    ],
],

'php-solid' => [
    'part' => 'Part I — PHP',
    'part_ar' => 'الجزء الأول — PHP',
    'icon' => '🧩',
    'title_en' => 'SOLID Principles',
    'title_ar' => 'مبادئ SOLID',
    'desc_en' => 'Single Responsibility, Open/Closed, Liskov, Interface Segregation, Dependency Inversion',
    'desc_ar' => 'المبادئ الخمسة للتصميم النظيف',
    'qa' => [
        [
            'q_en' => 'S — Single Responsibility Principle',
            'q_ar' => 'S — مبدأ المسؤولية الواحدة',
            'a_en' => '<p>A class should have <strong>one reason to change</strong> — not "do one thing", but answer to one stakeholder.</p>',
            'a_ar' => '<p>الـ Class يجب أن يكون لها <strong>سبب واحد للتغيير</strong> — ليس "تفعل شيئًا واحدًا"، بل أن تُجيب عن حاجة جهة واحدة فقط.</p>',
            'bad_en' => 'A <code>UserController</code> that validates, persists, sends email, and writes audit logs.',
            'bad_ar' => 'الـ <code>UserController</code> يتحقق من البيانات ويحفظها ويرسل البريد ويسجل Audit Logs.',
            'tip_en' => 'Split into <code>UserController</code>, <code>UserService</code>, <code>Mailer</code>, <code>AuditLogger</code>.',
            'tip_ar' => 'قسّمها إلى <code>UserController</code> و <code>UserService</code> و <code>Mailer</code> و <code>AuditLogger</code>.',
        ],
        [
            'q_en' => 'O — Open/Closed Principle',
            'q_ar' => 'O — مبدأ Open/Closed',
            'a_en' => '<p>Open for extension, closed for modification. Add new behavior by adding new classes — not by editing existing ones.</p>',
            'a_ar' => '<p>مفتوح للتوسيع، مغلق للتعديل. أضف سلوكًا جديدًا بإضافة Classes جديدة — لا بتعديل القديمة.</p>',
            'example' => "interface PaymentMethod { public function pay(int \$amount): void; }\nclass Stripe implements PaymentMethod { /* ... */ }\nclass Paypal implements PaymentMethod { /* ... */ }\n// Add Adyen? New class — don't touch existing ones.",
        ],
        [
            'q_en' => 'L — Liskov Substitution Principle',
            'q_ar' => 'L — مبدأ Liskov',
            'a_en' => '<p>Subtypes must be substitutable for their base types <em>without breaking behavior</em>. Classic violation: a <code>Square</code> extending <code>Rectangle</code> overriding <code>setWidth</code> to also change height.</p>',
            'a_ar' => '<p>يجب أن يكون من الممكن استبدال الـ Subtype مكان الـ Base Type بدون كسر السلوك. مثال شهير: <code>Square</code> ترث من <code>Rectangle</code> وتعيد تعريف <code>setWidth</code> ليُغيّر الارتفاع أيضًا.</p>',
        ],
        [
            'q_en' => 'I — Interface Segregation Principle',
            'q_ar' => 'I — مبدأ Interface Segregation',
            'a_en' => '<p>Many small interfaces beat one fat interface. Clients should not depend on methods they do not use.</p>',
            'a_ar' => '<p>عدة Interfaces صغيرة أفضل من Interface واحدة ضخمة. لا يجب أن يعتمد الـ Client على Methods لا يستخدمها.</p>',
        ],
        [
            'q_en' => 'D — Dependency Inversion Principle',
            'q_ar' => 'D — مبدأ Dependency Inversion',
            'a_en' => '<p>High-level modules depend on <strong>abstractions</strong>, not on concretions. The Service Container in Laravel implements this. <strong>DI is not DIP</strong> — DI is the technique, DIP is the principle.</p>',
            'a_ar' => '<p>الـ Modules عالية المستوى تعتمد على <strong>تجريدات</strong>، لا على تطبيقات. Service Container في Laravel يطبّق هذا المبدأ. <strong>DI ≠ DIP</strong> — الـ DI تقنية، أما DIP فمبدأ.</p>',
            'tip_en' => 'Don\'t recite definitions. Anchor each principle to a real refactor you did.',
            'tip_ar' => 'لا تردد التعريفات. اربط كل مبدأ بإعادة هيكلة حقيقية قمت بها.',
        ],
    ],
],

'php-patterns' => [
    'part' => 'Part I — PHP',
    'part_ar' => 'الجزء الأول — PHP',
    'icon' => '🎨',
    'title_en' => 'Design Patterns',
    'title_ar' => 'أنماط التصميم',
    'desc_en' => 'Singleton, Factory, Strategy, Observer, Decorator, Adapter, Repository',
    'desc_ar' => 'الأنماط الأكثر سؤالاً في مقابلات Senior',
    'qa' => [
        [
            'q_en' => 'Singleton',
            'q_ar' => 'Singleton',
            'a_en' => '<p>Single shared instance. <strong>Often overused</strong> — it is global state in disguise. Prefer Service Container singleton bindings.</p>',
            'a_ar' => '<p>نسخة واحدة مشتركة. <strong>يساء استخدامه كثيرًا</strong> — فهو Global State متخفي. فضّل Singleton عبر Service Container.</p>',
        ],
        [
            'q_en' => 'Factory',
            'q_ar' => 'Factory',
            'a_en' => '<p>Encapsulates object creation. Use when construction logic is non-trivial (e.g. picking a payment gateway by config).</p>',
            'a_ar' => '<p>يُغلّف منطق إنشاء الكائنات. استخدمه عندما يكون المنطق معقدًا (مثلاً اختيار Payment Gateway حسب Config).</p>',
            'example' => "class PaymentGatewayFactory {\n    public function make(string \$type): PaymentGateway {\n        return match (\$type) {\n            'stripe' => app(StripeGateway::class),\n            'paypal' => app(PaypalGateway::class),\n        };\n    }\n}",
        ],
        [
            'q_en' => 'Strategy',
            'q_ar' => 'Strategy',
            'a_en' => '<p>Encapsulates interchangeable algorithms behind a common interface. Used for shipping calculators, tax rules, sort orders. Replaces sprawling <code>if/else</code> blocks.</p>',
            'a_ar' => '<p>يُغلّف خوارزميات قابلة للتبديل خلف Interface مشتركة. يُستخدم لحساب الشحن، قواعد الضرائب، الترتيب. يُلغي <code>if/else</code> الكثيرة.</p>',
        ],
        [
            'q_en' => 'Observer',
            'q_ar' => 'Observer',
            'a_en' => '<p>One-to-many notification: subject notifies observers. Laravel Events are observers.</p>',
            'a_ar' => '<p>إعلام One-to-Many: الـ Subject يُعلم الـ Observers. Laravel Events هي مثال على Observer Pattern.</p>',
        ],
        [
            'q_en' => 'Decorator',
            'q_ar' => 'Decorator',
            'a_en' => '<p>Wrap an object to add behavior without modifying it. Laravel middleware pipeline is decorator-style.</p>',
            'a_ar' => '<p>يُغلّف كائنًا لإضافة سلوك دون تعديله. Laravel Middleware Pipeline مثال جيد.</p>',
        ],
        [
            'q_en' => 'Adapter',
            'q_ar' => 'Adapter',
            'a_en' => '<p>Make two incompatible interfaces work together. Wrap a legacy SDK behind a clean PSR interface.</p>',
            'a_ar' => '<p>يجعل واجهتين غير متوافقتين تعملان معًا. مثل تغليف SDK قديم خلف Interface نظيفة.</p>',
        ],
        [
            'q_en' => 'Repository',
            'q_ar' => 'Repository',
            'a_en' => '<p>Abstract data access. In Laravel, opinions differ — many seniors say <em>Eloquent is already a Repository</em>. Use it only when you need to swap data sources or test without ORM.</p>',
            'a_ar' => '<p>تجريد للوصول إلى البيانات. في Laravel، الآراء متباينة — كثير من الـ Seniors يقولون <em>Eloquent بالفعل Repository</em>. استخدمه فقط عند الحاجة لتبديل مصدر البيانات أو الاختبار بدون ORM.</p>',
        ],
        [
            'q_en' => 'Builder',
            'q_ar' => 'Builder',
            'a_en' => '<p>Step-by-step construction of complex objects. Laravel Query Builder is a real-world example.</p>',
            'a_ar' => '<p>إنشاء كائنات معقدة خطوة بخطوة. Laravel Query Builder مثال حقيقي.</p>',
        ],
        [
            'q_en' => 'Command',
            'q_ar' => 'Command',
            'a_en' => '<p>Wrap a request as an object. Laravel <code>php artisan</code> commands and Bus dispatches are Command Pattern.</p>',
            'a_ar' => '<p>يُغلّف طلبًا في كائن. <code>php artisan</code> commands و Bus dispatches أمثلة.</p>',
        ],
    ],
],

'php-composer' => [
    'part' => 'Part I — PHP',
    'part_ar' => 'الجزء الأول — PHP',
    'icon' => '📦',
    'title_en' => 'Composer',
    'title_ar' => 'Composer',
    'desc_en' => 'Dependency manager, PSR-4 autoloading, version constraints',
    'desc_ar' => 'مدير الـ Dependencies والـ Autoloading',
    'qa' => [
        [
            'q_en' => 'What is Composer?',
            'q_ar' => 'ما هو Composer؟',
            'a_en' => '<p>The de-facto PHP package manager. Manages <strong>dependencies</strong> and <strong>autoloading</strong> via PSR-4. It does <em>not</em> install PHP extensions.</p>',
            'a_ar' => '<p>مدير الباكدجات الأساسي في PHP. يدير الـ <strong>Dependencies</strong> والـ <strong>Autoloading</strong> عبر PSR-4. <em>لا</em> يُثبت إضافات PHP.</p>',
        ],
        [
            'q_en' => 'composer.json vs composer.lock',
            'q_ar' => 'الفرق بين composer.json و composer.lock',
            'a_en' => '<p><code>composer.json</code> declares <em>desired</em> versions (constraints). <code>composer.lock</code> records the <em>exact</em> versions installed — commit it for app repos, but NOT for libraries.</p>',
            'a_ar' => '<p><code>composer.json</code> يحدد الإصدارات المطلوبة (Constraints). <code>composer.lock</code> يُسجّل الإصدارات المُثبّتة فعلاً — اعمل له Commit في تطبيقاتك، لكن لا في الـ Libraries.</p>',
        ],
        [
            'q_en' => 'Version constraints',
            'q_ar' => 'Version Constraints',
            'a_en' => '<ul><li><code>^1.2</code> — >=1.2 <2.0 (caret)</li><li><code>~1.2</code> — >=1.2 <1.3 (tilde)</li><li><code>1.*</code> — wildcard</li><li><code>>=1.2,<1.5</code> — explicit range</li></ul>',
            'a_ar' => '<ul><li><code>^1.2</code> — >=1.2 <2.0 (caret)</li><li><code>~1.2</code> — >=1.2 <1.3 (tilde)</li><li><code>1.*</code> — wildcard</li><li><code>>=1.2,<1.5</code> — مدى صريح</li></ul>',
        ],
        [
            'q_en' => 'PSR-4 Autoloading',
            'q_ar' => 'PSR-4 Autoloading',
            'a_en' => '<p>Map a namespace prefix to a directory. <code>App\\Services\\UserService</code> resolves to <code>app/Services/UserService.php</code>.</p>',
            'a_ar' => '<p>يُربط بادئة Namespace بمجلد. <code>App\\Services\\UserService</code> يُحلّ إلى <code>app/Services/UserService.php</code>.</p>',
            'example' => "\"autoload\": {\n  \"psr-4\": { \"App\\\\\": \"app/\" }\n}",
        ],
        [
            'q_en' => 'Production install flags',
            'q_ar' => 'أوامر التثبيت للـ Production',
            'a_en' => '<p>Skip dev packages and generate fast classmap:</p>',
            'a_ar' => '<p>تخطّى Dev Packages واصنع Classmap سريع:</p>',
            'example' => "composer install --no-dev --optimize-autoloader --classmap-authoritative",
            'tip_en' => 'Never run <code>composer update</code> in production — only <code>install</code> from the lock file.',
            'tip_ar' => 'لا تستخدم <code>composer update</code> في الـ Production — فقط <code>install</code> من lock file.',
        ],
    ],
],

'php-memory' => [
    'part' => 'Part I — PHP',
    'part_ar' => 'الجزء الأول — PHP',
    'icon' => '🧠',
    'title_en' => 'PHP Memory Management',
    'title_ar' => 'إدارة الذاكرة في PHP',
    'desc_en' => 'Reference counting, Copy-On-Write, Garbage Collection, Stack vs Heap',
    'desc_ar' => 'إدارة الذاكرة و COW و Garbage Collector',
    'qa' => [
        [
            'q_en' => 'How does PHP manage memory per request?',
            'q_ar' => 'كيف تدير PHP الذاكرة في كل Request؟',
            'a_en' => '<p>PHP-FPM uses a <strong>request-scoped memory model</strong>: each request gets a memory arena that is wiped at the end. That is why PHP "leaks" usually only matter inside a single request.</p>',
            'a_ar' => '<p>PHP-FPM يستخدم نموذج ذاكرة <strong>محصور بالطلب</strong>: كل Request له Memory Arena تُمسح في النهاية. لهذا فإن Memory Leaks غالبًا تهم داخل Request واحد فقط.</p>',
        ],
        [
            'q_en' => 'Reference Counting + Copy-On-Write',
            'q_ar' => 'Reference Counting + Copy-On-Write',
            'a_en' => '<p>Each zval tracks a refcount. Assignment does NOT copy until a write occurs.</p>',
            'a_ar' => '<p>كل zval يحمل عداد مراجع (RefCount). الإسناد لا ينسخ حتى تحدث عملية كتابة.</p>',
            'example' => "\$a = range(1, 1_000_000);\n\$b = \$a;       // No copy\n\$b[0] = 99;    // NOW the array is copied",
        ],
        [
            'q_en' => 'Circular References & the Cycle Collector',
            'q_ar' => 'Circular References و Cycle Collector',
            'a_en' => '<p>RefCount cannot free cycles. PHP runs a cycle collector when the buffer fills. Tune via <code>gc_enable()</code> / <code>gc_collect_cycles()</code>.</p>',
            'a_ar' => '<p>الـ RefCount لا يستطيع تحرير الحلقات (Cycles). PHP يشغّل Cycle Collector عندما يمتلئ الـ Buffer. يمكن التحكم عبر <code>gc_enable()</code> و <code>gc_collect_cycles()</code>.</p>',
            'example' => "class A { public \$b; }\nclass B { public \$a; }\n\$a = new A(); \$b = new B();\n\$a->b = \$b; \$b->a = \$a; // circular — handled by GC",
        ],
        [
            'q_en' => 'Generators and memory',
            'q_ar' => 'الـ Generators والذاكرة',
            'a_en' => '<p>Generators stream values lazily — essential for large datasets.</p>',
            'a_ar' => '<p>الـ Generators تنتج القيم بشكل كسول — ضرورية للبيانات الكبيرة.</p>',
            'example' => "function bigFile(\$path) {\n    \$h = fopen(\$path, 'r');\n    while ((\$line = fgets(\$h)) !== false) yield \$line;\n}\nforeach (bigFile('huge.csv') as \$line) { /* O(1) memory */ }",
        ],
        [
            'q_en' => 'How to debug memory issues?',
            'q_ar' => 'كيف تُصلح مشاكل الذاكرة؟',
            'a_en' => '<p><code>memory_get_usage(true)</code>, <code>memory_get_peak_usage(true)</code>, Blackfire, Xdebug, <code>php -d memory_limit=...</code>. In queues, restart workers after N jobs to mitigate leaks (Horizon does this automatically).</p>',
            'a_ar' => '<p>استخدم <code>memory_get_usage(true)</code> و <code>memory_get_peak_usage(true)</code> و Blackfire و Xdebug. في Queues، أعِد تشغيل Workers بعد عدد معين من Jobs (Horizon يفعل ذلك تلقائيًا).</p>',
        ],
    ],
],

'php-performance' => [
    'part' => 'Part I — PHP',
    'part_ar' => 'الجزء الأول — PHP',
    'icon' => '⚡',
    'title_en' => 'PHP Performance',
    'title_ar' => 'أداء PHP',
    'desc_en' => 'OPcache, JIT, PHP-FPM tuning, profiling',
    'desc_ar' => 'تحسين الأداء وضبط PHP-FPM',
    'qa' => [
        [
            'q_en' => 'Top knobs to make PHP fast in production',
            'q_ar' => 'أهم المفاتيح لتسريع PHP في الإنتاج',
            'a_en' => '<ol><li>Enable <strong>OPcache</strong> with <code>opcache.validate_timestamps=0</code> in prod</li><li>Use <strong>preloading</strong> (PHP 7.4+) for hot classes</li><li>Tune <strong>PHP-FPM</strong> pool (<code>pm = static</code> or <code>dynamic</code>, right <code>max_children</code>)</li><li>Avoid <strong>N+1</strong>; eager load with <code>with()</code></li><li>Cache aggressively (Redis, HTTP cache, route cache)</li><li>Move slow work to <strong>queues</strong></li><li>Use <strong>connection pooling</strong> (PgBouncer for Postgres)</li></ol>',
            'a_ar' => '<ol><li>فعّل <strong>OPcache</strong> مع <code>opcache.validate_timestamps=0</code> في الإنتاج</li><li>استخدم <strong>Preloading</strong> (PHP 7.4+) للـ Classes الساخنة</li><li>اضبط <strong>PHP-FPM Pool</strong> بشكل صحيح</li><li>تجنب <strong>N+1</strong>; استخدم <code>with()</code></li><li>اعمل Cache بقوة (Redis, HTTP Cache, Route Cache)</li><li>انقل العمل البطيء إلى <strong>Queues</strong></li><li>استخدم <strong>Connection Pooling</strong> (PgBouncer لـ Postgres)</li></ol>',
        ],
        [
            'q_en' => 'What is OPcache?',
            'q_ar' => 'ما هو OPcache؟',
            'a_en' => '<p>OPcache caches compiled opcodes in <strong>shared memory</strong>, eliminating repeated lexical analysis, parsing, and compilation. Reduces CPU and request latency.</p>',
            'a_ar' => '<p>OPcache يحفظ Opcodes المُجمَّعة في <strong>Shared Memory</strong>، فيُلغي تكرار Lexer/Parser/Compiler. يقلل من استهلاك CPU ويُسرّع Requests.</p>',
            'example' => "; php.ini\nopcache.memory_consumption=256\nopcache.max_accelerated_files=20000\nopcache.validate_timestamps=0   ; production\nopcache.revalidate_freq=0\nopcache.jit_buffer_size=128M\nopcache.preload=/var/www/preload.php",
        ],
        [
            'q_en' => 'What is JIT and does it help Laravel?',
            'q_ar' => 'ما هو JIT وهل يفيد Laravel؟',
            'a_en' => '<p>JIT (PHP 8+) compiles hot opcodes to <strong>machine code</strong>. Helps CPU-bound work (math, loops). <strong>Doesn\'t help much for Laravel</strong> because most time is spent on I/O (DB, Redis, HTTP).</p>',
            'a_ar' => '<p>JIT (PHP 8+) يُحوّل Opcodes الساخنة إلى <strong>Machine Code</strong>. يفيد العمليات الحسابية والـ Loops. <strong>لا يفيد Laravel كثيرًا</strong> لأن معظم الوقت يضيع في I/O (Database, Redis, HTTP).</p>',
        ],
        [
            'q_en' => 'PHP-FPM sizing',
            'q_ar' => 'ضبط PHP-FPM',
            'a_en' => '<p>Rule of thumb: <code>max_children ≈ (RAM available − OS − DB) / avg request memory</code>. Monitor <code>listen.backlog</code>, <code>slowlog</code>, and queue depth.</p>',
            'a_ar' => '<p>قاعدة عامة: <code>max_children ≈ (RAM المتاح − OS − DB) / متوسط ذاكرة Request</code>. راقب <code>listen.backlog</code> و <code>slowlog</code> وعمق الـ Queue.</p>',
        ],
        [
            'q_en' => 'Profiling tools',
            'q_ar' => 'أدوات تحليل الأداء',
            'a_en' => '<p>Blackfire, Tideways, Xdebug profile, Clockwork (Laravel), Laravel Telescope. For production tracing: <strong>OpenTelemetry</strong> + Jaeger/Tempo.</p>',
            'a_ar' => '<p>Blackfire و Tideways و Xdebug Profile و Clockwork و Laravel Telescope. للـ Production Tracing: <strong>OpenTelemetry</strong> + Jaeger/Tempo.</p>',
        ],
    ],
],

];
