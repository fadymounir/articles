<?php
/**
 * Master topics aggregator
 * Loads and merges all part data files in display order.
 */

return array_merge(
    require __DIR__ . '/part1-php.php',
    require __DIR__ . '/part2-laravel.php',
    require __DIR__ . '/part3-databases.php',
    require __DIR__ . '/part4-redis.php',
    require __DIR__ . '/part5-docker.php',
    require __DIR__ . '/part6-system-design.php',
    require __DIR__ . '/part7-architecture.php',
    require __DIR__ . '/part8-9-linux-cicd.php',
    require __DIR__ . '/part10-async.php',
    require __DIR__ . '/part11-security.php',
    require __DIR__ . '/part12-observability.php',
    require __DIR__ . '/part13-messaging.php',
    require __DIR__ . '/part14-microservices.php',
    require __DIR__ . '/part15-kubernetes-cloud.php',
    require __DIR__ . '/part16-networking.php',
    require __DIR__ . '/part17-modern-data.php',
    require __DIR__ . '/part18-ai-llm.php',
    require __DIR__ . '/part19-modern-laravel.php',
    require __DIR__ . '/part20-interview-tactics.php',
);
