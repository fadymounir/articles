<?php
/** Part VII — Architecture Patterns */

return [

'arch-repository' => [
    'part' => 'Part VII — Architecture', 'part_ar' => 'الجزء السابع — البنية',
    'icon' => '🗃',
    'title_en' => 'Repository Pattern',
    'title_ar' => 'Repository Pattern',
    'desc_en' => 'Abstract data access',
    'desc_ar' => 'تجريد الوصول للبيانات',
    'qa' => [
        [
            'q_en' => 'Definition',
            'q_ar' => 'التعريف',
            'a_en' => '<p>An abstraction over persistence. Code talks to <code>UserRepository</code> instead of Eloquent directly.</p>',
            'a_ar' => '<p>تجريد فوق Persistence. الكود يتحدث مع <code>UserRepository</code> بدلاً من Eloquent مباشرة.</p>',
        ],
        [
            'q_en' => 'When to use in Laravel',
            'q_ar' => 'متى تستخدمه في Laravel؟',
            'a_en' => '<p>When you genuinely need to swap data sources (multi-DB, legacy migration) or want to test services without touching the ORM. Otherwise Eloquent already plays this role.</p>',
            'a_ar' => '<p>عندما تحتاج فعلاً لتبديل مصدر البيانات (Multi-DB، ترحيل Legacy) أو الاختبار بدون ORM. غير ذلك Eloquent يقوم بهذا الدور.</p>',
        ],
    ],
],

'arch-service' => [
    'part' => 'Part VII — Architecture', 'part_ar' => 'الجزء السابع — البنية',
    'icon' => '⚙️',
    'title_en' => 'Service Pattern',
    'title_ar' => 'Service Pattern',
    'desc_en' => 'Business logic orchestration',
    'desc_ar' => 'تنسيق منطق العمل',
    'qa' => [
        [
            'q_en' => 'What is it?',
            'q_ar' => 'ما هو؟',
            'a_en' => '<p>A class that contains <strong>business logic</strong> — orchestrates models, repositories, external services. Keeps controllers thin and models persistence-only.</p>',
            'a_ar' => '<p>Class يحتوي على <strong>منطق العمل</strong> — يُنسّق بين Models و Repositories والخدمات الخارجية. يجعل Controllers رفيعة والـ Models للحفظ فقط.</p>',
        ],
        [
            'q_en' => 'Anti-pattern: "service" graveyard',
            'q_ar' => 'النمط السيء: مقبرة Services',
            'a_en' => '<p>Don\'t dump every helper into <code>App\\Services</code>. Group by domain (<code>App\\Billing\\…</code>, <code>App\\Catalog\\…</code>). Use actions/use-cases for single-purpose flows.</p>',
            'a_ar' => '<p>لا ترمِ كل Helper في <code>App\\Services</code>. جمّع حسب Domain (<code>App\\Billing\\…</code>, <code>App\\Catalog\\…</code>). استخدم Actions/Use-cases للتدفقات أحادية الغرض.</p>',
        ],
    ],
],

'arch-factory' => [
    'part' => 'Part VII — Architecture', 'part_ar' => 'الجزء السابع — البنية',
    'icon' => '🏭',
    'title_en' => 'Factory Pattern',
    'title_ar' => 'Factory Pattern',
    'desc_en' => 'Encapsulate object creation',
    'desc_ar' => 'تغليف إنشاء الكائنات',
    'qa' => [
        [
            'q_en' => 'Definition',
            'q_ar' => 'التعريف',
            'a_en' => '<p>Encapsulates the choice of class to instantiate. Hides constructor complexity. Great with the Service Container.</p>',
            'a_ar' => '<p>يُغلّف اختيار Class للإنشاء. يُخفي تعقيد Constructor. مفيد مع Service Container.</p>',
            'example' => "class PaymentGatewayFactory {\n    public function make(string \$type): PaymentGateway {\n        return match (\$type) {\n            'stripe' => app(StripeGateway::class),\n            'paypal' => app(PaypalGateway::class),\n        };\n    }\n}",
        ],
    ],
],

'arch-strategy' => [
    'part' => 'Part VII — Architecture', 'part_ar' => 'الجزء السابع — البنية',
    'icon' => '🎯',
    'title_en' => 'Strategy Pattern',
    'title_ar' => 'Strategy Pattern',
    'desc_en' => 'Interchangeable algorithms',
    'desc_ar' => 'خوارزميات قابلة للتبديل',
    'qa' => [
        [
            'q_en' => 'Definition',
            'q_ar' => 'التعريف',
            'a_en' => '<p>Define a family of algorithms behind a common interface; swap at runtime. Replaces sprawling <code>if/else</code> blocks.</p>',
            'a_ar' => '<p>عرّف عائلة خوارزميات خلف Interface مشتركة؛ بدّلها وقت التشغيل. يُلغي كتل <code>if/else</code> الكثيرة.</p>',
            'example' => "interface ShippingStrategy {\n    public function cost(Order \$o): int;\n}\nclass Standard implements ShippingStrategy { /* ... */ }\nclass Express  implements ShippingStrategy { /* ... */ }",
        ],
    ],
],

'arch-observer' => [
    'part' => 'Part VII — Architecture', 'part_ar' => 'الجزء السابع — البنية',
    'icon' => '👀',
    'title_en' => 'Observer Pattern',
    'title_ar' => 'Observer Pattern',
    'desc_en' => 'One-to-many notifications',
    'desc_ar' => 'إعلام One-to-Many',
    'qa' => [
        [
            'q_en' => 'Definition',
            'q_ar' => 'التعريف',
            'a_en' => '<p>One-to-many: when subject changes, listeners react. Laravel\'s Events system + Eloquent observers are direct implementations.</p>',
            'a_ar' => '<p>One-to-many: عندما يتغير Subject، يتفاعل Listeners. Laravel Events + Eloquent Observers تطبيقات مباشرة.</p>',
        ],
    ],
],

'arch-decorator' => [
    'part' => 'Part VII — Architecture', 'part_ar' => 'الجزء السابع — البنية',
    'icon' => '🎁',
    'title_en' => 'Decorator Pattern',
    'title_ar' => 'Decorator Pattern',
    'desc_en' => 'Wrap to add behavior',
    'desc_ar' => 'تغليف لإضافة سلوك',
    'qa' => [
        [
            'q_en' => 'Definition',
            'q_ar' => 'التعريف',
            'a_en' => '<p>Wrap an object to add behavior without modifying it. Laravel middleware pipeline is decorator-style. Useful for caching layers (<code>CachedUserRepository</code> wraps <code>UserRepository</code>).</p>',
            'a_ar' => '<p>غلّف كائنًا لإضافة سلوك دون تعديله. Laravel Middleware Pipeline مثال. مفيد لـ Caching (<code>CachedUserRepository</code> يغلف <code>UserRepository</code>).</p>',
        ],
    ],
],

'arch-adapter' => [
    'part' => 'Part VII — Architecture', 'part_ar' => 'الجزء السابع — البنية',
    'icon' => '🔌',
    'title_en' => 'Adapter Pattern',
    'title_ar' => 'Adapter Pattern',
    'desc_en' => 'Make incompatible interfaces work together',
    'desc_ar' => 'جعل واجهتين غير متوافقتين تعملان',
    'qa' => [
        [
            'q_en' => 'Definition',
            'q_ar' => 'التعريف',
            'a_en' => '<p>Make two incompatible interfaces work together. Wrap a third-party SDK behind a clean app-defined contract so it can be swapped or mocked.</p>',
            'a_ar' => '<p>اجعل واجهتين غير متوافقتين تعملان معًا. غلّف SDK خارجي خلف عقد نظيف يُعرّفه التطبيق ليُمكن تبديله أو Mocking.</p>',
        ],
    ],
],

'arch-cqrs' => [
    'part' => 'Part VII — Architecture', 'part_ar' => 'الجزء السابع — البنية',
    'icon' => '🔀',
    'title_en' => 'CQRS',
    'title_ar' => 'CQRS',
    'desc_en' => 'Command Query Responsibility Segregation',
    'desc_ar' => 'فصل المسؤولية بين القراءة والكتابة',
    'qa' => [
        [
            'q_en' => 'Definition',
            'q_ar' => 'التعريف',
            'a_en' => '<p>Separate <strong>commands</strong> (writes) from <strong>queries</strong> (reads). Different models, possibly different stores. Reads can be denormalized/projected for performance.</p>',
            'a_ar' => '<p>افصل <strong>Commands</strong> (كتابة) عن <strong>Queries</strong> (قراءة). Models مختلفة، وأحيانًا Stores مختلفة. القراءات يمكن أن تكون Denormalized للأداء.</p>',
        ],
        [
            'q_en' => 'When to use',
            'q_ar' => 'متى تستخدمه؟',
            'a_en' => '<p>Heavy read/write asymmetry, complex domain logic on writes, need for projection-driven views. Often paired with Event Sourcing.</p>',
            'a_ar' => '<p>عدم تماثل قوي بين القراءة والكتابة، منطق Domain معقد للكتابة، الحاجة لـ Projections. غالبًا مع Event Sourcing.</p>',
        ],
        [
            'q_en' => 'Costs',
            'q_ar' => 'التكاليف',
            'a_en' => '<p>Eventual consistency between command and query side. Operational complexity. Don\'t apply CQRS to simple CRUD.</p>',
            'a_ar' => '<p>Eventual Consistency بين جانب Command وجانب Query. تعقيد تشغيلي. لا تستخدم CQRS لـ CRUD بسيط.</p>',
        ],
    ],
],

'arch-saga' => [
    'part' => 'Part VII — Architecture', 'part_ar' => 'الجزء السابع — البنية',
    'icon' => '🧭',
    'title_en' => 'Saga Pattern',
    'title_ar' => 'Saga Pattern',
    'desc_en' => 'Distributed transactions with compensation',
    'desc_ar' => 'Transactions موزعة بدون 2PC',
    'qa' => [
        [
            'q_en' => 'Problem it solves',
            'q_ar' => 'المشكلة التي يحلها',
            'a_en' => '<p>Distributed transactions without 2PC. Coordinate multiple services around a long-running business process, with compensating actions on failure.</p>',
            'a_ar' => '<p>Transactions موزعة بدون 2PC. تنسّق عدة Services في عملية أعمال طويلة، مع Compensating Actions عند الفشل.</p>',
        ],
        [
            'q_en' => 'Choreography vs Orchestration',
            'q_ar' => 'Choreography vs Orchestration',
            'a_en' => '<p><strong>Choreography:</strong> services react to events — no central brain. Simpler but harder to reason about. <strong>Orchestration:</strong> a coordinator drives steps — explicit, easier to monitor.</p>',
            'a_ar' => '<p><strong>Choreography:</strong> Services تتفاعل مع Events — بلا عقل مركزي. أبسط لكن أصعب فهمًا. <strong>Orchestration:</strong> Coordinator يقود الخطوات — صريح وأسهل في المراقبة.</p>',
        ],
        [
            'q_en' => 'Example — Order Saga',
            'q_ar' => 'مثال — Order Saga',
            'a_en' => '<p>Create Order → Reserve Inventory → Charge Payment → Allocate Shipment. If charge fails, compensate: release inventory, mark order cancelled.</p>',
            'a_ar' => '<p>إنشاء طلب → حجز المخزون → خصم الدفع → تخصيص الشحن. عند فشل الدفع: حرر المخزون، علّم الطلب ملغى.</p>',
        ],
    ],
],

];
