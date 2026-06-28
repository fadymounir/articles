<?php
/** Part XV — Kubernetes & Cloud */

return [

'k8s-basics' => [
    'part' => 'Part XV — Kubernetes & Cloud', 'part_ar' => 'الجزء الخامس عشر — Kubernetes و Cloud',
    'icon' => '☸️',
    'title_en' => 'Kubernetes Core Concepts',
    'title_ar' => 'مفاهيم Kubernetes الأساسية',
    'desc_en' => 'Pods, Deployments, Services, Ingress, ConfigMaps',
    'desc_ar' => 'Pods و Deployments و Services و Ingress و ConfigMaps',
    'qa' => [
        [
            'q_en' => 'What is Kubernetes in one paragraph?',
            'q_ar' => 'ما هو Kubernetes في فقرة؟',
            'a_en' => '<p>A declarative container orchestrator. You describe the desired state (YAML); the control plane runs <strong>reconciliation loops</strong> to make actual state match. Self-healing, autoscaling, rolling updates come from this loop.</p>',
            'a_ar' => '<p>منسق Containers تصريحي. تصف الحالة المرغوبة (YAML)؛ Control Plane يُشغّل <strong>Reconciliation Loops</strong> لمطابقة الحالة الفعلية. Self-healing و Autoscaling و Rolling Updates يأتون من هذه الحلقة.</p>',
        ],
        [
            'q_en' => 'Pod vs Deployment vs ReplicaSet',
            'q_ar' => 'Pod vs Deployment vs ReplicaSet',
            'a_en' => '<p><strong>Pod:</strong> smallest deployable — one or more containers sharing network and volumes. <strong>ReplicaSet:</strong> keeps N pod copies alive. <strong>Deployment:</strong> manages ReplicaSets for rolling updates and rollbacks. You write Deployments, never bare Pods.</p>',
            'a_ar' => '<p><strong>Pod:</strong> أصغر وحدة نشر — Container واحد أو أكثر يتشاركون الشبكة والـ Volumes. <strong>ReplicaSet:</strong> يحافظ على N نسخة Pod حية. <strong>Deployment:</strong> يدير ReplicaSets للـ Rolling Updates و Rollback. تكتب Deployments لا Pods مباشرة.</p>',
        ],
        [
            'q_en' => 'Service vs Ingress',
            'q_ar' => 'Service vs Ingress',
            'a_en' => '<ul><li><strong>Service:</strong> stable virtual IP + DNS for a set of pods. Types: ClusterIP (internal), NodePort, LoadBalancer.</li><li><strong>Ingress:</strong> L7 HTTP router with host/path rules and TLS. Needs an Ingress Controller (nginx, Traefik, etc.).</li><li><strong>Gateway API:</strong> modern replacement for Ingress.</li></ul>',
            'a_ar' => '<ul><li><strong>Service:</strong> IP و DNS ثابت لمجموعة Pods. الأنواع: ClusterIP و NodePort و LoadBalancer.</li><li><strong>Ingress:</strong> Router HTTP بمستوى L7 بقواعد Host/Path و TLS. يحتاج Ingress Controller (nginx, Traefik).</li><li><strong>Gateway API:</strong> البديل الحديث لـ Ingress.</li></ul>',
        ],
        [
            'q_en' => 'ConfigMap vs Secret',
            'q_ar' => 'ConfigMap vs Secret',
            'a_en' => '<p>Both inject config into pods. <strong>ConfigMap:</strong> plaintext. <strong>Secret:</strong> base64 (not encryption!) — enable encryption at rest in etcd; better, integrate an external secret store (External Secrets Operator → AWS/Vault).</p>',
            'a_ar' => '<p>كلاهما يحقن Config في Pods. <strong>ConfigMap:</strong> نص خام. <strong>Secret:</strong> base64 (ليس تشفيرًا!) — فعّل تشفير في etcd at rest؛ أو الأفضل، اربط External Secrets Operator مع AWS/Vault.</p>',
        ],
        [
            'q_en' => 'StatefulSet vs Deployment',
            'q_ar' => 'StatefulSet vs Deployment',
            'a_en' => '<p>Use a <strong>StatefulSet</strong> when pods need stable identity, ordered rollout, and persistent storage per pod (DBs, Kafka, Elasticsearch). Otherwise use a Deployment.</p>',
            'a_ar' => '<p>استخدم <strong>StatefulSet</strong> عندما تحتاج Pods لهوية مستقرة وترتيب نشر و Persistent Storage لكل Pod (DBs, Kafka, Elasticsearch). غير ذلك استخدم Deployment.</p>',
        ],
        [
            'q_en' => 'Liveness, Readiness, Startup probes',
            'q_ar' => 'Liveness و Readiness و Startup Probes',
            'a_en' => '<ul><li><strong>Liveness:</strong> if it fails, kubelet restarts the pod.</li><li><strong>Readiness:</strong> if it fails, pod is removed from Service endpoints — but not restarted.</li><li><strong>Startup:</strong> for slow-booting apps; disables liveness until startup succeeds.</li></ul>',
            'a_ar' => '<ul><li><strong>Liveness:</strong> فشلها يُعيد تشغيل Pod.</li><li><strong>Readiness:</strong> فشلها يُزيل Pod من Service لكن لا يُعيد تشغيله.</li><li><strong>Startup:</strong> لتطبيقات بطيئة البدء؛ يُعطّل Liveness حتى ينجح Startup.</li></ul>',
            'tip_en' => 'A common bug: using the same endpoint for liveness and readiness — DB outage makes readiness fail (good) AND liveness fail (kill cascade).',
            'tip_ar' => 'خطأ شائع: استخدام نفس Endpoint للـ Liveness و Readiness — تعطل DB يُفشل Readiness (جيد) و Liveness (كارثة Cascade Kill).',
        ],
    ],
],

'k8s-debugging' => [
    'part' => 'Part XV — Kubernetes & Cloud', 'part_ar' => 'الجزء الخامس عشر — Kubernetes و Cloud',
    'icon' => '🐛',
    'title_en' => 'K8s Debugging — the famous statuses',
    'title_ar' => 'تصحيح K8s — الحالات الشهيرة',
    'desc_en' => 'CrashLoopBackOff, OOMKilled, ImagePullBackOff',
    'desc_ar' => 'CrashLoopBackOff و OOMKilled و ImagePullBackOff',
    'qa' => [
        [
            'q_en' => 'CrashLoopBackOff',
            'q_ar' => 'CrashLoopBackOff',
            'a_en' => '<p>The container keeps exiting and kubelet keeps restarting it with exponential backoff. Debug: <code>kubectl logs &lt;pod&gt; --previous</code>, <code>kubectl describe pod</code>, check <code>command</code>/<code>args</code>, check env vars and secrets exist, check liveness probe.</p>',
            'a_ar' => '<p>الـ Container يخرج باستمرار و kubelet يُعيد تشغيله بـ Backoff متزايد. صحّح: <code>kubectl logs &lt;pod&gt; --previous</code>، <code>kubectl describe pod</code>، تحقق من <code>command</code>/<code>args</code> ومتغيرات البيئة و Secrets و Liveness Probe.</p>',
        ],
        [
            'q_en' => 'OOMKilled',
            'q_ar' => 'OOMKilled',
            'a_en' => '<p>Container exceeded its memory limit and was killed by the kernel OOM-killer. Fix: raise limit, or fix a leak. Check <code>kubectl describe pod</code> for <code>Last State: OOMKilled</code>. Watch <code>container_memory_working_set_bytes</code> over time.</p>',
            'a_ar' => '<p>تجاوز الـ Container حد الذاكرة وقتله OOM-killer. الحل: ارفع الحد أو أصلح Leak. تحقق من <code>kubectl describe pod</code> لرؤية <code>Last State: OOMKilled</code>. راقب <code>container_memory_working_set_bytes</code> بمرور الوقت.</p>',
        ],
        [
            'q_en' => 'ImagePullBackOff / ErrImagePull',
            'q_ar' => 'ImagePullBackOff / ErrImagePull',
            'a_en' => '<p>Can\'t pull the image. Causes: typo in tag, missing imagePullSecret for private registry, registry down, node has no network, image arch mismatch (arm64 vs amd64).</p>',
            'a_ar' => '<p>لا يستطيع جلب Image. الأسباب: خطأ مطبعي في Tag، imagePullSecret مفقود للـ Private Registry، Registry معطل، Node بلا شبكة، عدم تطابق المعمارية (arm64 vs amd64).</p>',
        ],
        [
            'q_en' => 'Pending / Unschedulable',
            'q_ar' => 'Pending / Unschedulable',
            'a_en' => '<p>The scheduler can\'t place the pod. <code>kubectl describe pod</code> reveals why: insufficient CPU/memory on all nodes, no node matches <code>nodeSelector</code>/affinity, taints without matching tolerations, PVC unbound.</p>',
            'a_ar' => '<p>الـ Scheduler لا يستطيع وضع Pod. <code>kubectl describe pod</code> يكشف السبب: موارد غير كافية على كل Nodes، لا Node يطابق <code>nodeSelector</code>/Affinity، Taints بلا Tolerations مطابقة، PVC غير مربوط.</p>',
        ],
        [
            'q_en' => 'Resource requests vs limits',
            'q_ar' => 'Requests vs Limits',
            'a_en' => '<p><strong>Request:</strong> guaranteed allocation (used by scheduler). <strong>Limit:</strong> hard cap (enforced by cgroups). CPU over-limit → throttled; memory over-limit → killed. Set both; set them based on real observations, not guesses.</p>',
            'a_ar' => '<p><strong>Request:</strong> تخصيص مضمون (يستخدمه Scheduler). <strong>Limit:</strong> حد أقصى صارم (يفرضه cgroups). تجاوز CPU → Throttle؛ تجاوز Memory → قتل. اضبط الاثنين بناءً على ملاحظات حقيقية لا تخمين.</p>',
        ],
    ],
],

'k8s-helm-gitops' => [
    'part' => 'Part XV — Kubernetes & Cloud', 'part_ar' => 'الجزء الخامس عشر — Kubernetes و Cloud',
    'icon' => '⛵',
    'title_en' => 'Helm & GitOps',
    'title_ar' => 'Helm و GitOps',
    'desc_en' => 'Package management + Git-driven delivery',
    'desc_ar' => 'إدارة الباكدج + توصيل من Git',
    'qa' => [
        [
            'q_en' => 'Helm in one line',
            'q_ar' => 'Helm في سطر',
            'a_en' => '<p>The package manager for Kubernetes. A <strong>chart</strong> = templated YAML + a <code>values.yaml</code> for inputs; <code>helm install/upgrade/rollback</code> manages releases.</p>',
            'a_ar' => '<p>مدير الباكدج لـ Kubernetes. الـ <strong>Chart</strong> = YAML بقوالب + <code>values.yaml</code> للمدخلات؛ <code>helm install/upgrade/rollback</code> يدير الـ Releases.</p>',
        ],
        [
            'q_en' => 'Kustomize vs Helm',
            'q_ar' => 'Kustomize vs Helm',
            'a_en' => '<p><strong>Kustomize:</strong> overlay-based, no templating, native to <code>kubectl</code>. Best for small variant differences (prod vs staging). <strong>Helm:</strong> full templating, package-distribution model. Best for reusable third-party software.</p>',
            'a_ar' => '<p><strong>Kustomize:</strong> Overlays بدون قوالب، أصلي في <code>kubectl</code>. الأفضل لاختلافات بسيطة (prod vs staging). <strong>Helm:</strong> قوالب كاملة وتوزيع كباكدج. الأفضل للبرمجيات الخارجية القابلة لإعادة الاستخدام.</p>',
        ],
        [
            'q_en' => 'What is GitOps?',
            'q_ar' => 'ما هو GitOps؟',
            'a_en' => '<p>Git is the single source of truth for desired cluster state. A controller (<strong>Argo CD</strong>, <strong>Flux</strong>) running in-cluster watches the repo and reconciles. Benefits: auditable history, easy rollback (revert commit), separation of CI (build) and CD (deploy).</p>',
            'a_ar' => '<p>Git هو مصدر الحقيقة الوحيد للحالة المرغوبة. Controller (<strong>Argo CD</strong> أو <strong>Flux</strong>) داخل الـ Cluster يراقب الـ Repo ويُصالح الحالة. الفوائد: تاريخ قابل للتدقيق، Rollback سهل (Revert commit)، فصل CI (Build) عن CD (Deploy).</p>',
        ],
    ],
],

'cloud-aws-core' => [
    'part' => 'Part XV — Kubernetes & Cloud', 'part_ar' => 'الجزء الخامس عشر — Kubernetes و Cloud',
    'icon' => '☁️',
    'title_en' => 'AWS Core for Backend Engineers',
    'title_ar' => 'AWS الأساسي للـ Backend',
    'desc_en' => 'EC2, S3, RDS, ECS/EKS, Lambda, IAM',
    'desc_ar' => 'EC2 و S3 و RDS و ECS/EKS و Lambda و IAM',
    'qa' => [
        [
            'q_en' => 'Compute options summary',
            'q_ar' => 'خيارات الحوسبة',
            'a_en' => '<ul><li><strong>EC2:</strong> raw VMs — most control, most ops</li><li><strong>ECS:</strong> AWS-managed container orchestration</li><li><strong>EKS:</strong> managed Kubernetes</li><li><strong>Fargate:</strong> serverless containers (ECS/EKS without managing nodes)</li><li><strong>Lambda:</strong> serverless functions — sub-second invocations, 15-min max</li><li><strong>App Runner / Elastic Beanstalk:</strong> PaaS for simple apps</li></ul>',
            'a_ar' => '<ul><li><strong>EC2:</strong> VMs خام</li><li><strong>ECS:</strong> Containers مُدارة من AWS</li><li><strong>EKS:</strong> Kubernetes مُدار</li><li><strong>Fargate:</strong> Containers Serverless</li><li><strong>Lambda:</strong> Functions Serverless — حتى 15 دقيقة</li><li><strong>App Runner / Beanstalk:</strong> PaaS للتطبيقات البسيطة</li></ul>',
        ],
        [
            'q_en' => 'S3 must-knows',
            'q_ar' => 'أساسيات S3',
            'a_en' => '<ul><li>Object storage, 11×9 durability across multi-AZ</li><li><strong>Presigned URLs</strong> for direct uploads/downloads — never proxy bytes through your app</li><li><strong>Storage classes:</strong> Standard / IA / Glacier — lifecycle rules transition automatically</li><li>Strong read-after-write consistency since 2020</li><li>Versioning + Object Lock for tamper-proof storage</li><li>Default-deny is the only sane bucket policy starting point</li></ul>',
            'a_ar' => '<ul><li>تخزين Objects بصلابة 11x9 عبر Multi-AZ</li><li><strong>Presigned URLs</strong> للرفع/التحميل المباشر — لا تمرّر البيانات عبر تطبيقك</li><li><strong>Storage Classes:</strong> Standard / IA / Glacier — Lifecycle ينقل تلقائيًا</li><li>Strong Read-after-write Consistency منذ 2020</li><li>Versioning + Object Lock للتخزين غير القابل للعبث</li><li>Default-Deny هو نقطة البدء الوحيدة العاقلة</li></ul>',
        ],
        [
            'q_en' => 'IAM principles',
            'q_ar' => 'مبادئ IAM',
            'a_en' => '<ul><li><strong>Roles, not access keys</strong> — IAM Roles for EC2/EKS/Lambda; OIDC for CI</li><li><strong>Least privilege</strong> — start with deny, add scoped permissions</li><li><strong>Per-environment accounts</strong> in an AWS Organization</li><li>Use SCPs to put non-negotiable guardrails on accounts</li><li>Never hardcode access keys</li></ul>',
            'a_ar' => '<ul><li><strong>Roles لا Access Keys</strong> — IAM Roles لـ EC2/EKS/Lambda؛ OIDC للـ CI</li><li><strong>أقل صلاحيات</strong> — ابدأ بـ Deny ثم أضف بحذر</li><li><strong>حساب لكل بيئة</strong> في AWS Organization</li><li>استخدم SCPs لحواجز إلزامية</li><li>لا تُضع Access Keys في الكود أبدًا</li></ul>',
        ],
        [
            'q_en' => 'VPC essentials',
            'q_ar' => 'أساسيات VPC',
            'a_en' => '<p>Private network with public + private subnets across AZs. <strong>NAT Gateway</strong> for outbound from private subnets. <strong>Security Groups</strong> are stateful instance-level firewalls. <strong>NACLs</strong> are stateless subnet-level firewalls.</p>',
            'a_ar' => '<p>شبكة خاصة بـ Subnets عامة وخاصة عبر AZs. <strong>NAT Gateway</strong> للخروج من Subnets الخاصة. <strong>Security Groups</strong> جدران Stateful على مستوى Instance. <strong>NACLs</strong> Stateless على مستوى Subnet.</p>',
        ],
    ],
],

];
